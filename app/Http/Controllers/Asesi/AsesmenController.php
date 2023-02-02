<?php

namespace App\Http\Controllers\Asesi;

use Carbon\Carbon;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiSub;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\AsesmenMandiri;
use App\Models\JawabanAsesi;
use App\Models\PelaksanaanUjian;
use App\Models\Soal;
use App\Models\StatusUnitKompetensiAsesi;
use App\Models\UnitKompetensi;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function index(){
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', Auth::user()->jurusan_id)
            ->first();

        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)
            ->get();

        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', Auth::user()->id)
            ->first();

        $date = Carbon::now();
        return view('asesi.assesment.index', [
            'unit_kompetensi'      => $unit_kompetensi,
            'sertifikasi'          => $sertifikasi,
            'data_asesmen_mandiri' => $data_asesmen_mandiri,
            'tanggal'              => $date->format('d F Y')
        ]);
    }

    // PENGAJUAN ASESMEN MANDIRI
    public function store(Request $request)
    {
        // dd($request->all());
        $unit_kompetensi_isi_id = $request->unit_kompetensi_isi;
        $unit_kompetensi_sub_id = $request->unit_kompetensi_sub;

        foreach($unit_kompetensi_sub_id as $key => $sub_id){
            UnitKompetensiSub::where('id', $sub_id)->update([
                'bukti_relevan' => $request['bukti_relevan-' . $sub_id]
            ]);
        }

        foreach($unit_kompetensi_isi_id as $key => $isi_id)
        {
            $data_status_kompeten = StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id', $isi_id)->first();
            if(!$data_status_kompeten){
                StatusUnitKompetensiAsesi::create([
                    'unit_kompetensi_isi_id' => $unit_kompetensi_isi_id[$key],
                    'user_asesi_id' => Auth::user()->id,
                    'status' => $request['status-' . $isi_id]
                ]);
            }else{
                StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id', $isi_id)->update([
                    'status' => $request['status-' . $isi_id]
                ]);
            }
        }
        $data_asesmen_mandiri = AsesmenMandiri::where('user_asesi_id', Auth::user()->id)->first();
        if(!$data_asesmen_mandiri){
            AsesmenMandiri::create([
                'user_asesi_id' => Auth::user()->id,
                'ttd_asesi' => $request->ttd_asesi,
                'tanggal_asesi' => Carbon::now(),
                'rekomendasi' => 0,
            ]); 
        }else{
            AsesmenMandiri::where('user_asesi_id', Auth::user()->id)->update([
                'ttd_asesi' => $request->ttd_asesi,
                'tanggal_asesi' => Carbon::now(),
            ]);
        }
        return response()->json([
            'status'=>1,
            'msg'=>'Berhasil'
        ]);
    }

    // JADWAL PELAKSANAAN UJIAN
    public function materi_uji_kompetensi(Request $request)
    {
        $data = PelaksanaanUjian::select([
            'pelaksanaan_ujian.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->with('relasi_jadwal_uji_kompetensi.relasi_user_asesi', 
                            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
                            'relasi_jadwal_uji_kompetensi.relasi_muk',
                            'relasi_jadwal_uji_kompetensi.relasi_soal')
                    ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_asesi', 'user_asesi_id', Auth::user()->id)
                    ->get();
        // $data_soal = Soal::where('')
        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    // PENGERJAAN SOAL OLEH ASESI
    public function pengerjaan_soal($id_jadwal, $soal_id)
    {
        $pelaksanaan_ujian = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $id_jadwal)->first();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', $soal_id)->first();
        $sebelumnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '<', $soal->id)->orderBy('id','desc')->first();
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '>', $soal->id)->orderBy('id','asc')->first();
        $jawaban_asesi = JawabanAsesi::where('user_asesi_id', Auth::user()->id)->get();
        $semua_soal = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->select('id')->get();
        return view('asesi.assesment.soal', compact(
                    'soal', 
                    'pelaksanaan_ujian', 
                    'selanjutnya',
                    'sebelumnya', 
                    'soal_id', 
                    'jawaban_asesi',
                    'semua_soal'));
    }

    // SIMPAN JAWABAN ASESI
    public function simpan_jawaban_asesi(Request $request){
        $user_asesi_id  = Auth::user()->id;
        $jawaban_asesi  = $request->jawaban;
        $soal_id        = $request->soal_id;
        $jadwal_id      = $request->jadwal_id;

        $data_jawaban_asesi = JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->first();
        if($data_jawaban_asesi == null){
            JawabanAsesi::create([
                'user_asesi_id' => $user_asesi_id,
                'soal_id'       => $soal_id,
                'jawaban'       => $jawaban_asesi
            ]);
        }else{
            JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->update([
                'jawaban'       => $jawaban_asesi
            ]);
        }
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('id', '>', $soal_id)->orderBy('id','asc')->first();
        return \Redirect::route('asesi.PengerjaanSoal', ['jadwal_id'=>$jadwal_id, 'soal_id'=>$selanjutnya ?? $soal_id])->with('message', 'State saved correctly!!!');
    }

}
