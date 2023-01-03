<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        {{-- HEADER SIDEBAR --}}
        <div class="sidebar-header position-relative">
            <div class="d-flex align-items-center" style="width: 95px">
                <div class="logo">
                    <a href="{{ route('Dashboard') }}"><img src="/images/logo/logo.png" style="width: 100%; height:auto"
                            alt="Logo" srcset=""></a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        {{-- MENU SIDEBAR --}}
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- MENU DASHBOARD --}}
                {{-- JIKA MENU DASHBOARD DIPILIH MAKA TOMBOL AKAN AKTIF --}}
                <li class="sidebar-item {{ Request::is('dashboard*') ? 'active' : '' }} ">
                    <a href="{{ route('Dashboard') }}" class='sidebar-link'>
                        <i
                            class="bi bi-grid{{ Request::is('dashboard*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- MENU ASSESMENT --}}
                {{-- JIKA MENU ASSESMENT DIPILIH MAKA TOMBOL AKAN AKTIF --}}
                <li class="sidebar-item {{ Request::is('assesment*') ? 'active' : '' }}">
                    <a href="{{ route('Assesment') }}" class='sidebar-link'>
                        <i class="bi bi-journal-text {{ Request::is('assesment*') ? 'warna-white' : '' }} warna-secondary"
                            style="{{ Request::is('assesment*') ? 'font-weight: 1000' : '' }}"></i>
                        <span>Assesment</span>
                    </a>
                </li>
                {{-- MENU PENGATURAN --}}
                {{-- JIKA MENU PENGATURAN DIPILIH MAKA TOMBOL AKAN AKTIF --}}
                <li class="sidebar-item {{ Request::is('pengaturan*') ? 'active' : '' }}">
                    <a href="{{ route('Pengaturan') }}" class='sidebar-link'>
                        <i
                            class="bi bi-gear{{ Request::is('pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                {{-- MENU LOGOUT --}}
                <li class="sidebar-item ">
                    <a href="{{ route('Logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left warna-secondary"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
