@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas SK Penetapan TUK
        Terverifikasi</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      {{-- lembar 1 --}}
      <div class="card p-5">
        @include('layout.header-berkas')
        <div class="text-center d-flex flex-column">
          <h6 class="mb-0">SURAT KEPUTUSAN</h6>
          <h6 class="mb-0">KETUA LSP SMK NEGERI 1 SINTANG</h6>
          <h6>Nomor : SK 005/LSP.SMKN1-STG/X/2020</h6>
          <h6 class="fw-light fst-italic">Tentang</h6>
          <h6 class="line-sp">PENEMPATAN TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h6>
        </div>
        <div>
          <div>
            <table>
              <tbody class="text-black">
                <tr>
                  <td colspan="3" class="text-center">
                    <h6>Ketua LSP</h6>
                  </td>
                </tr>
                <tr style="height: 60px">
                  <td style="width: 18%" class="align-text-top">MENIMBANG</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%">Untuk menjamin Sertifikasi Kompetensi Keahlian maka
                    harus didukung
                    oleh Kelayakan
                    Tempat Uji
                    Kompetensi yang selalu siap pakai dan sesuai dengan keahlian yang akan diujikan.</td>
                </tr>
                <tr>
                  <td style="width: 18%" class="align-text-top">MENGINGAT</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%">
                    <ol class="ps-3">
                      <li class="ps-3">UU No. 13 tahun 2003 tentang ketenagakerjaan pasal 18 bahwa Pengakuan Kompetensi
                        Kerja dilakukan
                        melalui sertifikasi kompetensi kerja oleh BNSP yang indipenden;</li>
                      <li class="ps-3">UU No. 20 tahun 2003 tentang Sistim Pendidikan Nasional;</li>
                      <li class="ps-3">UU No. 12 tahun 2012 tentang Pendidikan Tinggi bahwa sertifikat kompetensi/
                        profesi diberikan
                        kepada lulusan pendidikan tinggi vokasi/profesi; </li>
                      <li class="ps-3">Peraturan Pemerintah No. 23 tahun 2004 tentang Badan Nasional Sertifikasi Profesi
                        bahwa BNSP
                        mempunyai tugas melaksanakan sertifikasi kompetensi kerja (pasal 3); </li>
                      <li class="ps-3">Peraturan Pemerintah No. 31 tahun 2006 tentang Sistem Pelatihan Kerja Nasional
                        (SISLATKERNAS)
                        bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP; </li>
                      <li class="ps-3">Peraturan Pemerintah No. 31 tahun 2006 tentang Sistem Pelatihan Kerja Nasional
                        (SISLATKERNAS)
                        bahwa sertifikasi kompetensi kerja oleh LSP terlisensi BNSP; </li>
                      <li class="ps-3">ISO 17024 tahun 2012 Conformity Assisment General Requirements for Bodies
                        Operating
                        Certification System of Persons.</li>
                      <li class="ps-3">Panduan BNSP 206 tentang persyaratan Tempat Uji Kompetensi</li>
                      <li class="ps-3">Hasil Verifikasi Kelayakan Tempat Uji Kompetensi</li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="text-center">
                    <h6>Memutuskan</h6>
                  </td>
                </tr>
                <tr>
                  <td style="width: 18%" class="align-text-top">MENETAPKAN</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%"></td>
                </tr>
                <tr>
                  <td style="width: 18%" class="align-text-top">PERTAMA</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%">Menetapkan bengkel praktik sebagai TUK sesuai dengan
                    Kompetensi
                    dan skema sertifikasi yang telah ditetapkan sebagaimana dalam lampiran surat keputusan ini.</td>
                </tr>
                <tr>
                  <td style="width: 18%" class="align-text-top">KEDUA</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%">Tempat Uji Kompetensi telah terverifikasi dengan
                    memenuhi syarat
                    sesuai kebutuhan skema sertifikasi pada kompetensinya sehingga dapat menjamin terlaksananya
                    Sertifikasi Profesi Kompetensi berdasarkan skema sertifikasi yang akan diujikan.</td>
                </tr>
                <tr style="height: 70px">
                  <td style="width: 18%" class="align-text-top">KETIGA</td>
                  <td style="width: 2%" class="align-text-top">:</td>
                  <td class="lh-sm align-text-top" style="width: 80%">Surat Keputusan ini berlaku sejak tanggal ditetapkan
                    dan apabila
                    terdapat kesalahan dalam penetapan ini akan diadakan perubahan seperlunya.</td>
                </tr>
                <tr style="height: 60px">
                  <td colspan="3" class="lh-sm" style="width: 80%">
                    <div class="d-flex justify-content-end">
                      <div class="text-start" style="width: 35%">
                        <div class="d-flex justify-content-between">
                          <span style="width: 47%">Ditetapkan di</span>
                          <span style="width: 3%">:</span>
                          <span style="width: 50%">Sintang</span>
                        </div>
                        <div class="d-flex justify-content-between">
                          <span style="width: 47%">Pada tanggal</span>
                          <span style="width: 3%">:</span>
                          <span style="width: 50%">20 Oktober 2020</span>
                        </div>
                        <div>
                          <span>Ketua LSP SMK Negeri 1 Sintang</span>
                        </div>
                        <div style="height: 60px"></div>
                        <div>
                          <span>Agus Pramono, S.T,M.Pd</span>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- lembar 2 --}}
      <div class="card p-5">
        @include('layout.header-berkas')
        <div class="text-left d-flex flex-column mb-3">
          <h6 class="mb-0 fw-light">Lampiran SK</h6>
          </h6>
          <table>
            <tbody class="text-black">
              <tr>
                <td style="width: 8%">
                  <h6 class="fw-light mb-0">Nomor</h6>
                </td>
                <td style="width: 2%">
                  <h6 class="fw-light mb-0">:</h6>
                </td>
                <td style="width: 90%" class="text-left">
                  <h6 class="fw-light mb-0">SK 005/LSP.SMKN1-STG/X/2020</h6>
                </td>
              </tr>
              <tr>
                <td>
                  <h6 class="fw-light mb-0">Tanggal</h6>
                </td>
                <td>
                  <h6 class="fw-light mb-0">:</h6>
                </td>
                <td>
                  <h6 class="fw-light mb-0">30 Oktober 2020</h6>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div>
          <div>
            <h6 class="line-sp mb-0 text-center">PENEMPATAN TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h6>
            <h6 class="text-center">LSP SMK NEGERI 1 SINTANG</h6>
            {{--  --}}
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA TUK</th>
                  <th>NAMA SKEMA SERTIFIKASI</th>
                  <th>TEMPAT</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>TUK TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>SKKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>BENGKEL PRAKTEK TEKNIK INSTALASI TENAGA LISTRIK</td>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>TUK TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>SKKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>BENGKEL PRAKTEK TEKNIK INSTALASI TENAGA LISTRIK</td>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>TUK TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>SKKNI LEVEL II PADA KOMPETENSI KEAHLIAN TEKNIK INSTALASI TENAGA LISTRIK</td>
                  <td>BENGKEL PRAKTEK TEKNIK INSTALASI TENAGA LISTRIK</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end text-black">
              <div class="text-start" style="width: 35%">
                <div class="d-flex justify-content-between">
                  <span style="width: 47%">Ditetapkan di</span>
                  <span style="width: 3%">:</span>
                  <span style="width: 50%">Sintang</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span style="width: 47%">Pada tanggal</span>
                  <span style="width: 3%">:</span>
                  <span style="width: 50%">20 Oktober 2020</span>
                </div>
                <div>
                  <span>Ketua LSP SMK Negeri 1 Sintang</span>
                </div>
                <div style="height: 60px"></div>
                <div>
                  <span>Agus Pramono, S.T,M.Pd</span>
                </div>
              </div>
            </div>
            {{--  --}}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
