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

            <div class="buttons">
                <button type="button" id="dropdownMenuButton3" class="notifikasi col-auto" data-bs-toggle="dropdown"><img src="/images/notif.png"></button>
                <ul class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuButton3">
                    <div class="row notifikasi-alert" aria-labelledby="dropdownMenuButton3">
                        <div class="col-auto" style="width: 16.5%"><img src="/images/notif.png" style="width: 100%"></div>
                        <div class="d-flex row col-9 p-0">
                            <div class="col-auto fw-bold"><a href="{{route('peninjau.Dashboard')}}">Menjadi Peninjau</a></div>
                            <div class="col-auto" style="font-size: 14px">
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</header>
