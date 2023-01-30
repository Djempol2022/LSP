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
use App\Models\UnitKompetensi;
use Illuminate\Support\Facades\Auth;

class AsesmenController extends Controller
{
    private $path = 'asesi/assesment/';
    public function index()
    {
        $sertifikasi = SkemaSertifikasi::with( 
            'relasi_jurusan',
            'relasi_unit_kompetensi.relasi_unit_kompetensi_sub')
            ->where('jurusan_id', Auth::user()->jurusan_id)->first();

        $unit_kompetensi = UnitKompetensi::with('skema_sertifikasi_id')->
            whereRelation('skema_sertifikasi_id', 'skema_sertifikasi_id', $sertifikasi->id)->get();
            
        // $sertifikasi = Sertifikasi::with('relasi_unit_kompetensi.relasi_unit_kompetensi_sub.relasi_unit_kompetensi_isi')
        //     ->where('user_id', auth()->user()->id)->first();
        $date = Carbon::now();
        // dd($sertifikasi);
        return view($this->path . 'index', [
            'where' => 'Pengaturan',
            'unit_kompetensi' => $unit_kompetensi,
            'sertifikasi' => $sertifikasi,
            'tanggal' => $date->format('Y-m-d')
        ]);
    }

    public function store(Request $request)
    {
        $sertifikasi = Sertifikasi::with('relasi_unit_kompetensi.relasi_unit_kompetensi_sub.relasi_unit_kompetensi_isi',
                        'relasi_unit_kompetensi.relasi_skema_sertifikasi')->where('user_id', auth()->user()->id)->first();

        foreach ($sertifikasi->relasi_unit_kompetensi->relasi_unit_kompetensi_sub as $item) {
            foreach ($item->relasi_unit_kompetensi_isi as $isi) {
                UnitKompetensiIsi::where('id', $isi->id)->where('unit_kompetensi_sub_id', $isi->unit_kompetensi_sub_id)->update([
                    'status' => $request['status-' . $isi->id . '-' . $isi->unit_kompetensi_sub_id]
                ]);
            }
            UnitKompetensiSub::where('id', $item->id)->where('unit_kompetensi_id', $item->unit_kompetensi_id)->update([
                'bukti_relevan' => $request['bukti_relevan-' . $item->id . '-' . $item->unit_kompetensi_id]
            ]);
        }

        Sertifikasi::where('user_id', auth()->user()->id)->update([
            'ttd_asesi' => $request->ttd,
            'tanggal' => $request->tanggal,
        ]);
    }

    public function materi_uji_kompetensi(Request $request)
    {
        $data = MateriUjiKompetensi::select([
            'muk.*'
        ]);

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

        $rekamTotal = $data->count();
        $data = $data->with('relasi_jadwal_uji_kompetensi')->get()->toArray();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $rekamTotal
        ]);
    }

    public function soal()
    {
        return view($this->path . 'soal', [
            'where' => 'Pengaturan'
        ]);
    }
}
