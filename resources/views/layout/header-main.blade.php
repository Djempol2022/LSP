@php
    function notifikasi()
    {
        switch (auth()->user()->relasi_role->role) {
            case 'asesi':
                $type_asesi_1 = \App\Models\UserDetail::where('user_id', auth()->user()->id)->first('ktp_nik_paspor');
                $tmp = \App\Models\Sertifikasi::where('user_id', auth()->user()->id)->first('id');
                $id_sertifikasi = $tmp->id ?? 0;
                $type_asesi_2 = \App\Models\TandaTangan::where('sertifikasi_id', $id_sertifikasi)->first();
                $type_asesi_3 = \App\Models\StatusUnitKompetensiAsesi::where('user_asesi_id', auth()->user()->id)->first();
                $condition = \App\Models\AsesmenMandiri::where('user_asesi_id', auth()->user()->id)->first();
                if (is_null($type_asesi_1->ktp_nik_paspor)) {
                    $notif[0] = 'Lengkapi Profil';
                    $notif[1] = 'Silahkan Lengkapi Profil Anda Untuk Melanjutkan !';
                } elseif (is_null($type_asesi_2)) {
                    $notif[0] = 'Verifikasi admin';
                    $notif[1] = 'Silahkan tunggu verifikasi data oleh admin !';
                } elseif ($type_asesi_2->status == 1) {
                    $notif[0] = 'Akun Sudah Diverifikasi';
                    $notif[1] = 'Silahkan lanjut ke menu Assesment / Assesment Mandiri !';
                } elseif ($type_asesi_2->status != 1) {
                    $notif[0] = 'Akun Anda Tidak Memenuhi Syarat';
                    $notif[1] = 'Silahkan lengkapi data-data anda atau hubungi admin !';
                } else {
                    $notif[0] = 'Notifikasi';
                    $notif[1] = 'Tidak ada notifikasi';
                }
                if (!is_null($type_asesi_3) && is_null($condition)) {
                    $notif[0] = 'Verifikasi asesor';
                    $notif[1] = 'Silahkan tunggu verifikasi data oleh asesor !';
                } else {
                    $notif[0] = 'Notifikasi';
                    $notif[1] = 'Tidak ada notifikasi';
                }
                break;
            case 'admin':
                $sertifikasi = \App\Models\Sertifikasi::with('relasi_tanda_tangan_admin')->get();
                $type_admin_1 = false;
                foreach ($sertifikasi as $key) {
                    $tmp = \App\Models\TandaTangan::where('sertifikasi_id', $key->id)->first('id');
                    if (is_null($tmp)) {
                        $type_admin_1 = true;
                    }
                }
                if ($type_admin_1) {
                    $notif[0] = 'Permohonan verifikasi';
                    $notif[1] = 'Ada permohonan verifikasi sertifikasi !';
                } else {
                    $notif[0] = 'Notifikasi';
                    $notif[1] = 'Tidak ada notifikasi';
                }
                break;
            case 'asesor':
                $assesmen_mandiri = \App\Models\AsesmenMandiri::all();
                $type_asesor_1 = false;
                foreach ($assesmen_mandiri as $key) {
                    if (is_null($key->user_asesor_id)) {
                        $type_asesor_1 = true;
                    }
                }
                if ($type_asesor_1) {
                    $notif[0] = 'Permohonan verifikasi';
                    $notif[1] = 'Ada permohonan verifikasi assesmen mandiri !';
                } else {
                    $notif[0] = 'Notifikasi';
                    $notif[1] = 'Tidak ada notifikasi';
                }
                break;
            default:
                $notif[0] = 'Notifikasi';
                $notif[1] = 'Tidak ada notifikasi';
                break;
        }
        return $notif;
    }
    $notif = notifikasi();
@endphp
<header class="container-fluid my-4">
    <div class="row align-items-center d-flex mb-3">
        {{-- BURGER BUTTON UNTUK TAMPILAN MOBILE --}}
        @if (!request()->routeIs('asesi.Assesment.Soal'))
            <a href="#" class="burger-btn d-block d-xl-none col-auto">
                <i class="bi bi-justify fs-3"></i>
            </a>
        @endif
        {{-- JUDUL HALAMAN --}}
        <h3 class="col-auto m-0">{{ $title }}</h3>
        {{-- NOTIFIKASI --}}
        <div class="col d-flex justify-content-end">
            <button type="button" class="notifikasi col-auto " data-bs-toggle="dropdown"><img src="/images/notif.png">
                @if ($notif[1] != 'Tidak ada notifikasi')
                    <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                        !
                    </span>
                @endif
            </button>
            {{-- NOTIFIKASI ALERT --}}
            <ul class="dropdown-menu shadow-sm">
                <div class="row notifikasi-alert">
                    <div class="col-auto" style="width: 16.5%"><img src="/images/notif.png" style="width: 100%">
                    </div>
                    <div class="d-flex row col-9 p-0">
                        <div class="col-auto fw-bold">{{ $notif[0] }}</div>
                        <div class="col-lg-12" style="font-size: 14px">
                            {{ $notif[1] }}
                        </div>
                    </div>
            </ul>
        </div>
    </div>
</header>
