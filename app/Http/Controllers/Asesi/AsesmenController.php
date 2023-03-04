<?php

namespace App\Http\Controllers\Asesi;

use Carbon\Carbon;
use App\Models\Soal;
use App\Models\User;
use App\Models\Sertifikasi;
use App\Models\JawabanAsesi;
use Illuminate\Http\Request;
use App\Models\AsesmenMandiri;
use App\Models\UnitKompetensi;
use App\Models\PelaksanaanUjian;
use App\Models\SkemaSertifikasi;
use App\Models\UnitKompetensiIsi;
use App\Models\UnitKompetensiSub;
use App\Models\AsesiUjiKompetensi;
use App\Models\MateriUjiKompetensi;
use App\Http\Controllers\Controller;
use App\Models\AsesorUjiKompetensi;
use App\Models\KoreksiJawaban;
use Illuminate\Support\Facades\Auth;
use App\Models\StatusUnitKompetensiAsesi;
use App\Models\UmpanBalikKomponen;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function index()
    {
        $sertifikasi = SkemaSertifikasi::where('jurusan_id', Auth::user()->jurusan_id)
            ->with('relasi_jurusan', 'relasi_unit_kompetensi', 'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->first();

        $unit_kompetensi = UnitKompetensi::where('skema_sertifikasi_id', $sertifikasi->id)
            ->get();

        $data_asesmen_mandiri = AsesmenMandiri::with('relasi_user_asesi', 'relasi_user_asesor')
            ->whereRelation('relasi_user_asesi', 'user_asesi_id', Auth::user()->id)
            ->first();

        $komponen_umpan_balik = UmpanBalikKomponen::get();
        $asesi_ujian_selesai = AsesiUjiKompetensi::where('status_ujian_berlangsung', 2)
            ->where('status_umpan_balik', null)
            ->where('user_asesi_id', Auth::user()->id)
            ->with(
                'relasi_user_asesi',
                'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
                'relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian'
            )
            ->first();
        // $asesor_ujian_selesai = AsesorUjiKompetensi::where('jadwal_uji_kompetensi_id', $asesi_ujian_selesai->jadwal_uji_kompetensi_id)->first() ?? new AsesorUjiKompetensi();
        // $pelaksanaan_ujian_selesai = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $asesi_ujian_selesai->jadwal_uji_kompetensi_id)->first()?? new PelaksanaanUjian();
        // $data_peserta_ukom = AsesiUjiKompetensi::where('user_asesi_id', Auth::user()->id)->first();

        $date = Carbon::now();
        return view('asesi.assesment.index', [
            'unit_kompetensi'      => $unit_kompetensi,
            'sertifikasi'          => $sertifikasi,
            'data_asesmen_mandiri' => $data_asesmen_mandiri,
            'tanggal'              => $date->format('d F Y'),
            'komponen_umpan_balik' => $komponen_umpan_balik,
            'asesi_ujian_selesai'  => $asesi_ujian_selesai
        ]);
    }

    // PENGAJUAN ASESMEN MANDIRI
    public function store(Request $request)
    {
        $unit_kompetensi_isi_id = $request->unit_kompetensi_isi;
        $unit_kompetensi_sub_id = $request->unit_kompetensi_sub;

        foreach ($unit_kompetensi_sub_id as $key => $sub_id) {
            UnitKompetensiSub::where('id', $sub_id)->update([
                'bukti_relevan' => $request['bukti_relevan-' . $sub_id]
            ]);
        }

        foreach ($unit_kompetensi_isi_id as $key => $isi_id) {
            $data_status_kompeten = StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id', $isi_id)->where('user_asesi_id', Auth::user()->id)->first();
            if (!$data_status_kompeten) {
                StatusUnitKompetensiAsesi::create([
                    'unit_kompetensi_isi_id' => $unit_kompetensi_isi_id[$key],
                    'user_asesi_id' => Auth::user()->id,
                    'status' => $request['status-' . $isi_id]
                ]);
            } else {
                StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id', $isi_id)->update([
                    'status' => $request['status-' . $isi_id]
                ]);
            }
        }
        $data_asesmen_mandiri = AsesmenMandiri::where('user_asesi_id', Auth::user()->id)->first();
        if (!$data_asesmen_mandiri) {
            AsesmenMandiri::create([
                'user_asesi_id' => Auth::user()->id,
                'ttd_asesi' => $request->ttd_asesi,
                'tanggal_asesi' => Carbon::now(),
            ]);
        } else {
            AsesmenMandiri::where('user_asesi_id', Auth::user()->id)->update([
                'ttd_asesi' => $request->ttd_asesi,
                'tanggal_asesi' => Carbon::now(),
            ]);
        }
        return response()->json([
            'status' => 1,
            'msg' => 'Berhasil'
        ]);
    }

    // JADWAL PELAKSANAAN UJIAN
    public function materi_uji_kompetensi(Request $request)
    {
        $data = PelaksanaanUjian::select([
            'pelaksanaan_ujian.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $data = $data->with(
            'relasi_jadwal_uji_kompetensi.relasi_user_login_asesi',
            'relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail',
            'relasi_jadwal_uji_kompetensi.relasi_muk',
            'relasi_jadwal_uji_kompetensi.relasi_soal',
            'relasi_tuk'
        )
            ->whereRelation('relasi_jadwal_uji_kompetensi.relasi_user_login_asesi', 'user_asesi_id', Auth::user()->id)
            ->get();

        $rekamFilter = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'data' => $data,
            'recordsTotal' => $rekamFilter,
            'recordsFiltered' => $rekamFilter
        ]);
    }

    // PENGERJAAN SOAL OLEH ASESI
    public function pengerjaan_soal($id_jadwal, $soal_id)
    {
        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('user_asesi_id', Auth::user()->id)->update([
            'status_ujian_berlangsung' => 1
        ]);
        $pelaksanaan_ujian = PelaksanaanUjian::with('relasi_jadwal_uji_kompetensi.relasi_muk')->where('jadwal_uji_kompetensi_id', $id_jadwal)->first();
        $soal = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', $soal_id)->first();
        $sebelumnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '<', $soal->id)->orderBy('id', 'desc')->first();
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $id_jadwal)->where('id', '>', $soal->id)->orderBy('id', 'asc')->first();
        $jawaban_asesi = JawabanAsesi::where('user_asesi_id', Auth::user()->id)->get();
        $semua_soal = Soal::with('relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian')
            ->whereRelation('relasi_jadwal_uji_kompetensi', 'jadwal_uji_kompetensi_id', $id_jadwal)
            ->get();
        // $status_asesi_ujian = AsesiUjiKompetensi::where('user_asesi_id', Auth::user()->id)->where('status_ujian_berlangsung', 2)->first();
        // if(!$status_asesi_ujian){
        return view('asesi.assesment.soal', compact(
            'soal',
            'pelaksanaan_ujian',
            'selanjutnya',
            'sebelumnya',
            'soal_id',
            'jawaban_asesi',
            'semua_soal'
        ));
        // =
    }

    // SIMPAN JAWABAN ASESI
    public function simpan_jawaban_asesi(Request $request)
    {
        $user_asesi_id  = Auth::user()->id;
        $jawaban_asesi  = $request->jawaban;
        $soal_id        = $request->soal_id;
        $jadwal_id      = $request->jadwal_id;
        $jenis_tes      = $request->jenis_tes;

        $data_soal = Soal::where('id', $soal_id)->select('jawaban')->first();
        $koreksi = $data_soal->jawaban == $jawaban_asesi;

        if ($jenis_tes == 1) {
            if (!$koreksi) {
                $koreksi_jawaban = 1;
            } else {
                $koreksi_jawaban = 2;
            }
        } elseif ($jenis_tes == 2 || $jenis_tes == 3) {
            $koreksi_jawaban = null;
        };

        $data_jawaban_asesi = JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->first();
        if ($data_jawaban_asesi == null) {
            JawabanAsesi::create([
                'user_asesi_id'     => $user_asesi_id,
                'soal_id'           => $soal_id,
                'jawaban'           => $jawaban_asesi,
                'koreksi_jawaban'   => $koreksi_jawaban
            ]);
        } else {
            JawabanAsesi::where('user_asesi_id', $user_asesi_id)->where('soal_id', $soal_id)->update([
                'jawaban'       => $jawaban_asesi,
                'koreksi_jawaban'   => $koreksi_jawaban
            ]);
        }
        $selanjutnya = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('id', '>', $soal_id)->orderBy('id', 'asc')->first();
        return \Redirect::route('asesi.PengerjaanSoal', ['jadwal_id' => $jadwal_id, 'soal_id' => $selanjutnya ?? $soal_id])->with('message', 'State saved correctly!!!');
    }

    public function selesai_mengerjakan_soal($jadwal_id)
    {
        User::where('id', Auth::user()->id)->update([
            'status_terlibat_uji_kompetensi' => 0
        ]);

        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', Auth::user()->id)->update([
            'status_ujian_berlangsung' => 2
        ]);

        KoreksiJawaban::create([
            'jadwal_uji_kompetensi_id' => $jadwal_id,
            'user_asesi_id'            => Auth::user()->id,
            'status_koreksi'          => 0
        ]);

        return response()->json([
            'status' => 1,
            'msg' => "Terima Kasih Telah Menyelesaikan Tes Kompetensi"
        ]);
    }

    public function waktu_ujian_habis($jadwal_id)
    {
        User::where('id', Auth::user()->id)->update([
            'status_terlibat_uji_kompetensi' => 0
        ]);

        AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $jadwal_id)->where('user_asesi_id', Auth::user()->id)->update([
            'status_ujian_berlangsung' => 2
        ]);

        KoreksiJawaban::create([
            'jadwal_uji_kompetensi_id' => $jadwal_id,
            'user_asesi_id'            => Auth::user()->id,
            'status_koreksi'          => 0
        ]);

        return \Redirect::route('asesi.Assesment');
    }

    public function review_jawaban($jadwal_id)
    {
        $soal = Soal::where('jadwal_uji_kompetensi_id', $jadwal_id)->with('relasi_jawaban_asesi')->get();
        $jenis_tes = PelaksanaanUjian::where('jadwal_uji_kompetensi_id', $jadwal_id)->first();
        return view('asesi.assesment.review_jawaban', compact('soal', 'jenis_tes'));
    }
}
