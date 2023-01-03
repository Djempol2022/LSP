<header class="container-fluid my-4">
    <div class="row align-items-center d-flex mb-3">
        {{-- BURGER BUTTON UNTUK TAMPILAN MOBILE --}}
        <a href="#" class="burger-btn d-block d-xl-none col-auto">
            <i class="bi bi-justify fs-3"></i>
        </a>
        {{-- JUDUL HALAMAN --}}
        <h3 class="col-auto m-0">{{ $where }}</h3>
        {{-- NOTIFIKASI --}}
        <div class="col d-flex justify-content-end">
            <button type="button" class="col-auto notifikasi"><img src="/images/notif.png">
                <span class="position-absolute translate-middle badge rounded-pill bg-success">
                    <small>9</small>
                </span>
            </button>
        </div>
    </div>
</header>
