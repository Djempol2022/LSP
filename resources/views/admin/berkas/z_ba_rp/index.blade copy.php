@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Z Berita Acara Pecah Rapat
        Pleno</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.ZBAPecahRP.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">BERITA ACARA</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">PELAKSANAAN RAPAT PLENO</h6>
          </div>
          <div style="margin-top: 20px">
            <p>Pada hari ini ............................................. tanggal
              ..................................................
              Bulan ................................................. tahun
              ............................................. bertempat di <span id="institusi">SMKN 1 Jawai Selatan</span>,
              telah diadakan
              Rapat Pleno LSP SMK Negeri 1 Sintang untuk membahas hasil uji kompetensi <span id="skema_sertifikasi">KKNI
                Level II Skema Teknik
                Komputer dan Jaringan</span>. <br />
              Adapun hasil dari Rapat Pleno tersebut tercantum sebagai berikut:
            </p>
            <div style="margin-top: 40px">
              <ol>
                <li>Pelaksanaan asesmen dilaksanakan pada tanggal <span id="tgl_tes_tertulis">7 Maret 2022</span> untuk
                  tes tertulis dan tanggal
                  <span id="tgl_tes_praktek">8 Maret 2022</span> untuk tes praktek.
                </li>
                <li>
                  Jumlah asesi yang mengikuti uji kompetensi secara keseluruhan berjumlah <span
                    id="jumlah_asesi">40</span> peserta.
                </li>
                <li>Uji Kompetensi dimulai dari pukul <span id="wkt_mulai_uk">08.00</span> WIB sampai pukul <span
                    id="wkt_selesai_uk">08.00</span> WIB fi <span id="nama_tuk">TUK Lab. TKJ SMKN 1 Jawai Selatan</span>.
                </li>
                <li>Diperlukan persiapan beberapa bahan habis pakai dan perlengkapan untuk keperluan uji kompetensi yang
                  selanjutnya dikoordinasikan dengan pihak TUK.</li>
              </ol>
            </div>
            <p style="margin-top: 40px">Demikian Berita Acara Rapat Pleno ini dibuat dengan sebenar-benarnya.</p>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td></td>
                <td style="width: 35%">Sintang, .......................................</td>
              </tr>
              <tr>
                <td></td>
                <td id="jabatan_bttd">Ketua LSP</td>
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

        {{-- lembar 2 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">NOTULEN RAPAT PLENO PELAKSANAAN UJI KOMPETENSI</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">LSP SMK NEGERI 1 SINTANG</h6>
          </div>

          <div style="margin-top: 20px">
            <div>
              <table style="width: 100%">
                <tr style="font-weight: bolder; color: black;">
                  <td style="width: 22%;">Tanggal Rapat</td>
                  <td style="width: 3%;">:</td>
                  <td style="width: 75%;">..........................................................................</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Waktu Rapat</td>
                  <td>:</td>
                  <td>..........................................................................</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Tempat Rapat</td>
                  <td>:</td>
                  <td id="tempat_rapat">Ruang Sekretariat SMKN 1 Jawai Selatan</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Topik</td>
                  <td>:</td>
                  <td id="topik">Kendala dan hasil uji kompetensi</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Ketua Rapat</td>
                  <td>:</td>
                  <td id="ketua_rapat">Agus Pramono, ST, M.Pd</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Notulis</td>
                  <td>:</td>
                  <td id="notulis">Ivo Fajrin Hartini, S.Pd</td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td colspan="3">Daftar Peserta Rapat</td>
                </tr>
              </table>
            </div>
            <div>
              <table style="width: 100%; table-layout: fixed;" class="table table-bordered" cellspacing=0 cellpadding=5>
                <thead>
                  <tr style="text-align: center;">
                    <td style="width: 7%;">No</td>
                    <td style="width: 41%;">Nama Peserta</td>
                    <td style="width: 29%;">Jabatan</td>
                    <td style="width: 23%;">Tanda Tangan</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;">1</td>
                    <td>
                      Agusdddddddd</td>
                    <td>Ketua LSP</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td style="text-align: center;">2</td>
                    <td>Agus</td>
                    <td>Ketua LSP</td>
                    <td style="padding-left: 8%">2</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div style="margin-top: 30px;">
              <h6 style="color: black; font-weight: bolder;">Latar Belakang Pelaksanaan Rapat</h6>
              <p style="color: black;">Setelah pelaksanaan uji kompetensi pada tanggal <span id="tgl_tes_tertulis_2">7
                  Maret</span> dan <span id="tgl_tes_praktek_2">8 Maret 2022</span>, maka dirasa perlu mengadakan rapat
                pleno untuk membahas segala kendala dan pencapaian dalam uji kompetensi tersebut.</p>
            </div>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        {{-- lembar 3 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="color: black;">
            <h6 style="font-weight: bold">Bahasan/Diskusi</h6>
            <ol style="padding-left: 18px;">
              <li>Ketidakhadiran peserta ujian</li>
              <li>Proses Ujian</li>
            </ol>
          </div>

          <div style="margin-top: 20px">
            <h6 style="font-weight: bold; color: black;">Kesimpulan Rapat</h6>
            <table style="width: 100%; table-layout: fixed;" class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 8%">No.</th>
                  <th style="width: 21%">Masalah/Isu</th>
                  <th style="width: 26%">Uraian</th>
                  <th style="width: 23%">Tindak Lanjut</th>
                  <th style="width: 20%">Target Penyelesaian</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="height: 140px;"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td style="height: 140px;"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td style="height: 140px;"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%;">
              <tr>
                <td style="width: 72%"></td>
                <td style="width: 28%">Sintang, .......................................</td>
              </tr>
              <tr>
                <td>Notulis,</td>
                <td id="jabatan_bttd">Ketua LSP</td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 70px;"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;" id="notulis">Ivo Fajrin Hartini, S.Pd</td>
                <td style="font-weight: bold;" id="nama_bttd">Agus Pramono, ST. M.Pd</td>
              </tr>
              <tr>
                <td>
                  MET.<span id="no_met_notulis">000.015352.2019</span></td>
                <td>
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

@section('script')
  @include('admin.berkas.x03_st_verifikasi_tuk.script-berkas-x03-st-verifikasi-tuk')
@endsection
@endsection
