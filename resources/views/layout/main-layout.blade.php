<!DOCTYPE html>
@include('layout.head-main')
<html lang="en">

{{-- JIKA PENGGUNA BELUM LOGIN --}}
@if (Request::is('login') || Request::is('registrasi'))
    @yield('login')
@else
    {{-- JIKA PENGGUNA SUDAH LOGIN --}}

    <body>
        @include('sweetalert::alert')
        @if (!request()->routeIs('asesi.PengerjaanSoal') && !request()->routeIs('asesor.DaftarDataUjian.ProsesWawancaraAsesi'))
            <div id="app">
                <div id="main">
                    @include('layout.sidebar-main')
                    @include('layout.header-main')
                    @yield('main-section')
                    @include('layout.footer-main')
                </div>
            </div>
        @else
            <div class="container-fluid px-5 pt-3">
                @include('layout.header-main')
                @yield('soal-section')
                @include('layout.footer-main')
            </div>
        @endif
    </body>
@endif

@include('layout.script-main')

</html>
