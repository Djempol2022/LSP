<header class="container-fluid my-4">
    <div class="row align-items-center d-flex mb-3">
        {{-- BURGER BUTTON UNTUK TAMPILAN MOBILE --}}
        <a href="#" class="burger-btn d-block d-xl-none col-auto">
            <i class="bi bi-justify fs-3"></i>
        </a>
        {{-- JUDUL HALAMAN --}}
        <h3 class="col-auto m-0">{{ $title }}</h3>
        {{-- NOTIFIKASI --}}
        <div class="col d-flex justify-content-end">
            <button type="button" class="col-auto notifikasi" data-bs-toggle="dropdown"><img src="/images/notif.png">
                <span class="position-absolute translate-middle badge rounded-pill bg-success">
                    <small>9</small>
                </span>
            </button>
            {{-- NOTIFIKASI ALERT --}}
            <ul class="dropdown-menu shadow">
                <div class="row notifikasi-alert">
                    <div class="col-auto" style="width: 16.5%"><img src="/images/notif.png" style="width: 100%"></div>
                    <div class="d-flex row col-9 p-0">
                        <div class="col-auto fw-bold">Notifikasi</div>
                        <div class="col-auto" style="font-size: 14px">Lengkapi formulir permohonan sertifikasi
                            kompetensi anda pada
                            menu
                            profil! </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</header>
