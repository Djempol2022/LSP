'@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Daftar Hadir Asesor Pleno
      </li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.DFHadirAsesorPleno.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR ASESOR</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">RAPAT PLENO PELAKSANAAN UJI KOMPETENSI</h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Hari/Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%"><span id="hari">Selasa</span> / <span id="tgl">1 Maret 2022</span></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><span id="wkt">09.00</span> WIB - Selesai</td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td id="tempat">Ruang LSP SMKN 1 Sintang</td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 25%;">Nama</th>
                  <th style="width: 20%;">No.Reg.MET</th>
                  <th style="width: 20%;">Jabatan</th>
                  <th style="width: 30%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="5" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
                      class="border-0 bg-transparent text-primary w-100" id="addRow">+</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td></td>
                <td id="jabatan_bttd" style="width: 35%">Ketua LSP,</td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 70px;"></td>
              </tr>
              <tr>
                <td></td>
                <td style="font-weight: bold;" id="nama_bttd">Agus Pramono, ST. M.Pd</td>
              </tr>
              <tr>
                <td></td>
                <td>
                  MET.<span id="no_met_bttd">000.015352.2019</span></td>
              </tr>
            </table>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
      </form>
    </section>
  </div>

  {{-- @section('script')
  @include('admin.berkas.x03_st_verifikasi_tuk.script-berkas-x03-st-verifikasi-tuk')
@endsection --}}
@endsection
'
