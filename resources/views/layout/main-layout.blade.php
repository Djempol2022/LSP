<!DOCTYPE html>
@include('layout.head-main')
<html lang="en">

{{-- JIKA PENGGUNA BELUM LOGIN --}}
@if (Request::is('login') || Request::is('registrasi'))
    @yield('login')
@else
    {{-- JIKA PENGGUNA SUDAH LOGIN --}}

    <body>
        <div id="app">
            <div id="main">
                @include('layout.sidebar-main')
                @include('layout.header-main')
                @yield('main-section')
                @include('layout.footer-main')
            </div>
        </div>
    </body>
@endif

@include('layout.script-main')

</html>
