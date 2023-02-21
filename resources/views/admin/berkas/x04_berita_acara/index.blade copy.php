@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas X 04 Berita Acara</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.X04BeritaAcara') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 font-extrabold">SURAT TUGAS</h6>
            <h6 class="mb-0 font-extrabold">VERIFIKASI TEMPAT UJI KOMPETENSI</h6>
          </div>
          <div style="margin-top: 20px">
            <p>Pada hari ini ............................................. tanggal
              ..................................................
              Bulan ................................................. tahun
              ............................................. di SMK
              ..............................................................................................................
            </p>
          </div>

          <div style="margin-top: 20px">
            <ol style="list-style: lower-alpha">
              <li>Telah dilaksanakan verifikasi calon Tempat Uji Kompetensi untuk pelaksanaan Uji Kompetensi. <br />
                <table>
                  <tr>
                    <td style="width: 42%">Kompetensi/Paket Keahlian</td>
                    <td style="width: 3%">:</td>
                    <td style="width: 55%">Teknik Komputer dan Jaringan</td>
                  </tr>
                  <tr>
                    <td>Paket Ujian</td>
                    <td>:</td>
                    <td>KKNI Level II Teknik Komputer dan Jaringan</td>
                  </tr>
                  <tr>
                    <td>Rencana Pelaksanaan</td>
                    <td>:</td>
                    <td>
                      .....................................................................................
                    </td>
                  </tr>
                  <tr>
                    <td>Rekomendasi</td>
                    <td>:</td>
                    <td style="font-weight: bold">Sangat layak/layak/belum layak *</td>
                  </tr>
                </table>
              </li>
              <li>
                Catatan selama pelaksanaan verifikasi <br />
                _________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
                <br />
                Berita acara ini dibuat sesungguhnya dengan instrument verifikasi terlampir.
              </li>
            </ol>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td colspan="2">Yang melakukan verifikasi</td>
              </tr>
              <tr>
                <td>Perwakilan Verifikator</td>
                <td style="text-align: right">Perwakilan Tempat Uji Kompetensi</td>
              </tr>
              <tr>
                <td style="height: 70px"></td>
                <td style="height: 70px; text-align: right"></td>
              </tr>
              <tr>
                <td>(Agus Pramono, ST. M.Pd)</td>
                <td style="text-align: right">
                  (...................................................................)</td>
              </tr>
              <tr>
                <td>NIP.19751208 200701 1 009</td>
                <td style="text-align: right">
                  NIP..............................................................</td>
              </tr>
            </table>
          </div>

          <div class="mt-5" style="margin-left: 28px">
            <p>* coret yang tidak perlu</p>
          </div>

          <div class="text-end mt-5">
            <p class="mb-0 fst-italic" style="font-size: 10px">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p class="mb-0 fst-italic" style="font-size: 10px">Telp (0565)21377 e-mail : lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
      </form>
    </section>
  </div>

@section('script')
  @include('admin.berkas.x03_st_verifikasi_tuk.script-berkas-x03-st-verifikasi-tuk')
@endsection
@endsection
