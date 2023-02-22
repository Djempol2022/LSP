'@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Daftar Hadir Asesi
      </li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.DFHadirAsesi.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR ASESI</h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%">
                  ..................................................................................................</td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>..................................................................................................
                </td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>..................................................................................................
                </td>
              </tr>
              <tr>
                <td>Skema</td>
                <td>:</td>
                <td>..................................................................................................
                </td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 30%;">No. Peserta</th>
                  <th style="width: 22%;">Nama Asesi</th>
                  <th style="width: 18%;">Asal Sekolah</th>
                  <th style="width: 25%;">Tanda Tangan</th>
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
            <table style="width: 100%;">
              <tr>
                <td style="width: 50%; padding-left: 5%"></td>
                <td style="width: 50%; padding-left: 20%">Mengetahui,</td>
              </tr>
              <tr>
                <td style="padding-left: 15%;">Asesor</td>
                <td id="jabatan_bttd" style="padding-left: 20%">Ketua LSP,</td>
              </tr>
              <tr>
                <td style="height: 70px; padding-left: 5%"></td>
                <td style="height: 70px; padding-left: 20%"></td>
              </tr>
              <tr>
                <td style="padding-left: 5%">(..............................................................)</td>
                <td style="font-weight: bold; padding-left: 20%" id="nama_bttd">Agus Pramono, ST. M.Pd</td>
              </tr>
              <tr>
                <td style="padding-left: 5%">MET.</td>
                <td style="padding-left: 20%">
                  MET.<span id="no_met_bttd">000.015352.2019</span></td>
              </tr>
            </table>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang
            </p>
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
