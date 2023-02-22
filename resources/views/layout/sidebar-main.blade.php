    {{-- MENU SIDEBAR --}}
    {{-- <div class="sidebar-menu">
      <ul class="menu"> --}}
        {{-- MENU DASHBOARD --}}
       
        {{-- @if (Auth::user()->relasi_role->role == 'admin')
          <li class="sidebar-item {{ request()->routeIs('admin.Dashboard*') ? 'active' : '' }} ">
            <a href="{{ route('admin.Dashboard') }}" class='sidebar-link'>
              <i
                class="bi bi-grid{{ request()->routeIs('admin.Dashboard*') ? '-fill warna-white' : '' }}
                            warna-secondary"></i>
              <span>Dashboard</span>
            </a>
          </li>
    
          <li class="sidebar-item {{ request()->routeIs('admin.Assessment*') ? 'active' : '' }}">
            <a href="{{ route('admin.Assessment') }}" class='sidebar-link'>
              <i class="bi bi-journal-text {{ request()->routeIs('admin.Assessment*') ? 'warna-white' : '' }} warna-secondary"
                style="{{ request()->routeIs('admin.Assessment*') ? 'font-weight: 1000' : '' }}"></i>
              <span>Assessment</span>
            </a>
          </li>


          <li class="sidebar-item {{ request()->routeIs('admin.TampilanJadwalUjiKompetensi*') ? 'active' : '' }}">
            <a href="{{ route('admin.TampilanJadwalUjiKompetensi') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('admin.TampilanJadwalUjiKompetensi*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Jadwal Assessment</span>
            </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.DaftarPengguna*') ? 'active' : '' }}">
            <a href="{{ route('admin.DaftarPengguna') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('admin.DaftarPengguna*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Pengguna</span>
            </a>
          </li>

       
          <li class="sidebar-item {{ request()->routeIs('admin.Berkas*') ? 'active' : '' }}">
            <a href="{{ route('admin.Berkas') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('admin.Berkas*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Berkas</span>
            </a>
          </li>

          
          <li class="sidebar-item {{ request()->routeIs('admin.Pengaturan*') ? 'active' : '' }}">
            <a href="{{ route('admin.Pengaturan') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('admin.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        @elseif(Auth::user()->relasi_role->role == 'peninjau')
          <li class="sidebar-item {{ request()->routeIs('peninjau.Dashboard*') ? 'active' : '' }} ">
            <a href="{{ route('peninjau.Dashboard') }}" class='sidebar-link'>
              <i
                class="bi bi-grid{{ request()->routeIs('peninjau.Dashboard*') ? '-fill warna-white' : '' }}
                            warna-secondary"></i>
              <span>Dashboard</span>
            </a>
          </li>
        
          <li class="sidebar-item {{ request()->routeIs('peninjau.Assesment*') ? 'active' : '' }}">
            <a href="{{ route('peninjau.Assesment') }}" class='sidebar-link'>
              <i class="bi bi-journal-text {{ request()->routeIs('peninjau.Assesment*') ? 'warna-white' : '' }} warna-secondary"
                style="{{ request()->routeIs('peninjau.Assesment*') ? 'font-weight: 1000' : '' }}"></i>
              <span>Assesment</span>
            </a>
          </li>
         
          <li class="sidebar-item {{ request()->routeIs('peninjau.Pengaturan*') ? 'active' : '' }}">
            <a href="{{ route('peninjau.Pengaturan') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('peninjau.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        @elseif(Auth::user()->relasi_role->role == 'asesor')
          <li class="sidebar-item {{ request()->routeIs('asesor.Dashboard*') ? 'active' : '' }} ">
            <a href="{{ route('asesor.Dashboard') }}" class='sidebar-link'>
              <i
                class="bi bi-grid{{ request()->routeIs('asesor.Dashboard*') ? '-fill warna-white' : '' }}
                            warna-secondary"></i>
              <span>Dashboard</span>
            </a>
          </li>
         
          <li class="sidebar-item {{ request()->routeIs('asesor.Assesment*') ? 'active' : '' }}">
            <a href="{{ route('asesor.Assesment') }}" class='sidebar-link'>
              <i class="bi bi-journal-text {{ request()->routeIs('asesor.Assesment*') ? 'warna-white' : '' }} warna-secondary"
                style="{{ request()->routeIs('asesor.Assesment*') ? 'font-weight: 1000' : '' }}"></i>
              <span>Assesment</span>
            </a>
          </li>
        
          <li class="sidebar-item {{ request()->routeIs('asesor.Pengaturan*') ? 'active' : '' }}">
            <a href="{{ route('asesor.Pengaturan') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('asesor.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        @elseif(Auth::user()->relasi_role->role == 'asesi')
          <li class="sidebar-item {{ request()->routeIs('asesi.Dashboard*') ? 'active' : '' }} ">
            <a href="{{ route('asesi.Dashboard') }}" class='sidebar-link'>
              <i
                class="bi bi-grid{{ request()->routeIs('asesi.Dashboard*') ? '-fill warna-white' : '' }}
                            warna-secondary"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="sidebar-item {{ request()->routeIs('asesi.Assesment*') ? 'active' : '' }}">
            <a href="{{ route('asesi.Assesment') }}" class='sidebar-link'>
              <i class="bi bi-journal-text {{ request()->routeIs('asesi.Assesment*') ? 'warna-white' : '' }} warna-secondary"
                style="{{ request()->routeIs('asesi.Assesment*') ? 'font-weight: 1000' : '' }}"></i>
              <span>Assesment</span>
            </a>
          </li>
       
          <li class="sidebar-item {{ request()->routeIs('asesi.Pengaturan*') ? 'active' : '' }}">
            <a href="{{ route('asesi.Pengaturan') }}" class='sidebar-link'>
              <i
                class="bi bi-gear{{ request()->routeIs('asesi.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        @endif --}}
        {{-- <li class="sidebar-item ">
          <a href="{{ route('Logout') }}" class='sidebar-link'>
            <i class="bi bi-box-arrow-left warna-secondary"></i>
            <span>Logout</span>
          </a>
        </li> --}}
      {{-- </ul>
    </div> --}}

<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
          <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <a href="{{ route('asesi.Dashboard') }}"><img src="{{asset('images/logo/logo_lsp.png')}}" style="width: 100%; height:auto"
                  alt="Logo" srcset=""></a>              
                </div>
              <div class="sidebar-toggler  x">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>

      <div class="sidebar-menu">
        <ul class="menu">



          {{-- ADMIN AUTH --}}
          @if(Auth::user()->relasi_role->role == "admin")
          <li class="sidebar-item {{ request()->routeIs('admin.Dashboard*') ? 'active' : '' }} ">
              <a href="{{ route('admin.Dashboard') }}" class='sidebar-link'>
                  <i
                      class="bi bi-grid{{ request()->routeIs('admin.Dashboard*') ? '-fill warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('admin.Assessment*') ? 'active' : '' }}">
              <a href="{{ route('admin.Assessment') }}" class='sidebar-link'>
                  <i class="bi bi-journal-text {{ request()->routeIs('admin.Assessment*') ? 'warna-white' : '' }} warna-secondary"
                      style="{{ request()->routeIs('admin.Assessment*') ? 'font-weight: 1000' : '' }}"></i>
                  <span>Assessment</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('admin.TampilanJadwalUjiKompetensi*') ? 'active' : '' }}">
              <a href="{{ route('admin.TampilanJadwalUjiKompetensi') }}" class='sidebar-link'>
                  <i
                      class="bi bi-calendar-check{{ request()->routeIs('admin.TampilanJadwalUjiKompetensi*') ? 'bi bi-calendar-check warna-white' : '' }} warna-secondary"></i>
                  <span>Jadwal Assessment</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('admin.Berkas*') ? 'active' : '' }}">
            <a href="{{ route('admin.Berkas') }}" class='sidebar-link'>
              <i
                class="bi bi-file-pdf{{ request()->routeIs('admin.Berkas*') ? '-fill warna-white' : '' }} warna-secondary"></i>
              <span>Berkas</span>
            </a>
          </li>
    
          <li class="sidebar-item {{ request()->routeIs('admin.DaftarPengguna*') ? 'active' : '' }}">
              <a href="{{ route('admin.DaftarPengguna') }}" class='sidebar-link'>
                  <i
                      class="bi bi-people{{ request()->routeIs('admin.DaftarPengguna*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                  <span>Pengguna</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('admin.Pengaturan*') ? 'active' : '' }}">
              <a href="{{ route('admin.Pengaturan') }}" class='sidebar-link'>
                  <i
                      class="bi bi-gear{{ request()->routeIs('admin.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                  <span>Pengaturan</span>
              </a>
          </li>









          {{-- PENINJAU AUTH --}}
          @elseif(Auth::user()->relasi_role->role == "peninjau")
          <li class="sidebar-item {{ request()->routeIs('peninjau.Dashboard*') ? 'active' : '' }} ">
              <a href="{{ route('peninjau.Dashboard') }}" class='sidebar-link'>
                  <i
                      class="bi bi-grid{{ request()->routeIs('peninjau.Dashboard*') ? '-fill warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('peninjau.PengesahanMuk*') ? 'active' : '' }}">
              <a href="{{ route('peninjau.PengesahanMuk') }}" class='sidebar-link'>
                  <i class="bi bi-journal-text {{ request()->routeIs('peninjau.PengesahanMuk*') ? 'warna-white' : '' }} warna-secondary"
                      style="{{ request()->routeIs('peninjau.PengesahanMuk*') ? 'font-weight: 1000' : '' }}"></i>
                  <span>Pengesahan MUK</span>
              </a>
          </li>
          <li class="sidebar-item ">
            <a href="{{ route('Switch', [3, 'asesor']) }}" class='sidebar-link'>
                <i class="bi bi-box-arrow-left warna-secondary"></i>
                <span>Pindah Ke Asesor</span>
            </a>
          </li>
          {{-- <li class="sidebar-item {{ request()->routeIs('peninjau.Pengaturan*') ? 'active' : '' }}">
              <a href="{{ route('peninjau.Pengaturan') }}" class='sidebar-link'>
                  <i
                      class="bi bi-gear{{ request()->routeIs('peninjau.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                  <span>Pengaturan</span>
              </a>
          </li> --}}





          {{-- ASESOR AUTH --}}
          @elseif(Auth::user()->relasi_role->role == "asesor")
          <li class="sidebar-item {{ request()->routeIs('asesor.Dashboard*') ? 'active' : '' }} ">
              <a href="{{ route('asesor.Dashboard') }}" class='sidebar-link'>
                  <i
                      class="bi bi-grid{{ request()->routeIs('asesor.Dashboard*') ? '-fill warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('asesor.HalamanPengesahanAsesmemMandiri*') ? 'active' : '' }} ">
              <a href="{{ route('asesor.HalamanPengesahanAsesmemMandiri') }}" class='sidebar-link'>
                  <i
                      class="bi bi-file-earmark-medical{{ request()->routeIs('asesor.HalamanPengesahanAsesmemMandiri*') ? '-fill warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Pengesahan</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('asesor.KelolaSoal*') ? 'active' : '' }} ">
              <a href="{{ route('asesor.KelolaSoal') }}" class='sidebar-link'>
                  <i
                      class="bi bi-journal{{ request()->routeIs('asesor.KelolaSoal*') ? '-check warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Kelola Soal</span>
              </a>
          </li>
          <li class="sidebar-item {{ request()->routeIs('asesor.DaftarDataUjian*') ? 'active' : '' }} ">
            <a href="{{ route('asesor.DaftarDataUjian') }}" class='sidebar-link'>
                <i
                      class="bi bi-file-earmark-spreadsheet{{ request()->routeIs('asesor.DaftarDataUjian*') ? '-fill warna-white' : '' }} 
                    warna-secondary"></i>
                <span>Data Ujian</span>
            </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('Switch', [2, 'peninjau']) }}" class='sidebar-link'>
              <i class="bi bi-box-arrow-left warna-secondary"></i>
              <span>Pindah Ke Peninjau</span>
          </a>
        </li>

          {{-- ASESI AUTH --}}
          @elseif(Auth::user()->relasi_role->role == "asesi")
          <li class="sidebar-item {{ request()->routeIs('asesi.Dashboard*') ? 'active' : '' }} ">
              <a href="{{ route('asesi.Dashboard') }}" class='sidebar-link'>
                  <i
                      class="bi bi-grid{{ request()->routeIs('asesi.Dashboard*') ? '-fill warna-white' : '' }} 
                      warna-secondary"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          {{-- MENU ASSESMENT --}}
          {{-- JIKA MENU ASSESMENT DIPILIH MAKA TOMBOL AKAN AKTIF --}}
          <li class="sidebar-item {{ request()->routeIs('asesi.Assesment*') ? 'active' : '' }}">
              <a href="{{ route('asesi.Assesment') }}" class='sidebar-link'>
                  <i class="bi bi-journal-text {{ request()->routeIs('asesi.Assesment*') ? 'warna-white' : '' }} warna-secondary"
                      style="{{ request()->routeIs('asesi.Assesment*') ? 'font-weight: 1000' : '' }}"></i>
                  <span>Assesment</span>
              </a>
          </li>
          {{-- MENU PENGATURAN --}}
          {{-- JIKA MENU PENGATURAN DIPILIH MAKA TOMBOL AKAN AKTIF --}}
          <li class="sidebar-item {{ request()->routeIs('asesi.Pengaturan*') ? 'active' : '' }}">
              <a href="{{ route('asesi.Pengaturan') }}" class='sidebar-link'>
                  <i
                      class="bi bi-gear{{ request()->routeIs('asesi.Pengaturan*') ? '-fill warna-white' : '' }} warna-secondary"></i>
                  <span>Pengaturan</span>
              </a>
          </li>
          @endif
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