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
      <form action="{{ route('admin.Berkas.SKPenetapanTUKTerverifikasi.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0">SURAT KEPUTUSAN</h6>
            <h6 class="mb-0">KETUA LSP SMK NEGERI 1 SINTANG</h6>
            <h6 class="d-flex align-items-center justify-content-center gap-3">Nomor : <input type="text"
                class="form-control @error('no_sk') is-invalid @enderror" name="no_sk" style="width: 30%"
                onkeyup="inputAutoNoSK('no_sk_1')" id="no_sk_1"
                value="{{ old('no_sk') ?? 'SK 005/LSP.SMKN1-STG/X/2020' }}" />
              @error('no_sk')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
            </h6>
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
                    <td class="lh-sm align-text-top" style="width: 80%">Untuk menjamin Sertifikasi Kompetensi Keahlian
                      maka
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
                        <li class="ps-3">UU No. 13 tahun 2003 tentang ketenagakerjaan pasal 18 bahwa Pengakuan
                          Kompetensi
                          Kerja dilakukan
                          melalui sertifikasi kompetensi kerja oleh BNSP yang indipenden;</li>
                        <li class="ps-3">UU No. 20 tahun 2003 tentang Sistim Pendidikan Nasional;</li>
                        <li class="ps-3">UU No. 12 tahun 2012 tentang Pendidikan Tinggi bahwa sertifikat kompetensi/
                          profesi diberikan
                          kepada lulusan pendidikan tinggi vokasi/profesi; </li>
                        <li class="ps-3">Peraturan Pemerintah No. 23 tahun 2004 tentang Badan Nasional Sertifikasi
                          Profesi
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
                    <td class="lh-sm align-text-top" style="width: 80%">Menetapkan bengkel praktik sebagai TUK sesuai
                      dengan
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
                    <td class="lh-sm align-text-top" style="width: 80%">Surat Keputusan ini berlaku sejak tanggal
                      ditetapkan
                      dan apabila
                      terdapat kesalahan dalam penetapan ini akan diadakan perubahan seperlunya.</td>
                  </tr>
                  <tr style="height: 60px">
                    <td colspan="3" class="lh-sm" style="width: 80%">
                      <div class="d-flex justify-content-center justify-content-sm-end">
                        <div class="text-start w-sm-auto">
                          <div class="d-flex justify-content-between align-items-center mb-2">
                            <span style="width: 47%">Ditetapkan di</span>
                            <span style="width: 3%">:</span>
                            <span style="width: 50%"><input type="text"
                                class="form-control @error('tempat_ditetapkan') is-invalid @enderror"
                                name="tempat_ditetapkan" value="{{ old('tempat_ditetapkan') ?? 'Sintang' }}"
                                onkeyup="inputAutoTempat('tempat_1')" id="tempat_1" />
                              @error('tempat_ditetapkan')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </span></span>
                          </div>
                          <div class="d-flex justify-content-between align-items-center mb-2">
                            <span style="width: 47%">Pada tanggal</span>
                            <span style="width: 3%">:</span>
                            <span style="width: 50%"><input type="date"
                                class="form-control @error('tanggal_ditetapkan') is-invalid @enderror"
                                name="tanggal_ditetapkan" onchange="inputAutoTanggal('tanggal_1')" id="tanggal_1"
                                value="{{ old('tanggal_ditetapkan') }}" />
                              @error('tanggal_ditetapkan')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </span>
                          </div>
                          <div class="mb-2">
                            <span><input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror"
                                name="jabatan_bttd"
                                value="{{ old('jabatan_bttd') ?? 'Ketua LSP SMK Negeri 1 Sintang' }}"
                                onkeyup="inputAutoJabatan('jabatan_1')" id="jabatan_1" />
                              @error('jabatan_bttd')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </span>
                          </div>
                          <div style="height: 60px">
                          </div>
                          <div>
                            <span><input type="text" class="form-control @error('nama_bttd') is-invalid @enderror"
                                name="nama_bttd" value="{{ old('nama_bttd') ?? 'Agus Pramono, S.T,M.Pd' }}"
                                onkeyup="inputAutoNama('nama_1')" id="nama_1" />
                              @error('nama_bttd')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </span>
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
                  <td style="width: 90%" class="d-flex justify-content-left align-items-center gap-3">
                    <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk"
                      style="width: 33%" id="no_sk_2" onkeyup="inputAutoNoSK('no_sk_2')" />
                    @error('no_sk')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td>
                    <h6 class="fw-light mb-0">Tanggal</h6>
                  </td>
                  <td>
                    <h6 class="fw-light mb-0">:</h6>
                  </td>
                  <td class="d-flex justify-content-left align-items-center gap-3">
                    <input type="date" class="form-control @error('tanggal_ditetapkan') is-invalid @enderror"
                      name="tanggal_ditetapkan" style="width: 30%" onchange="inputAutoTanggal('tanggal_2')"
                      id="tanggal_2" />
                    @error('tanggal_ditetapkan')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <div>
              <h6 class="line-sp mb-0 text-center">PENEMPATAN TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h6>
              <h6 class="text-center">LSP SMK NEGERI 1 SINTANG</h6>
              <div class="table-responsive">
                <table class="table table-bordered" id="tableTUK">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA TUK</th>
                      <th>NAMA SKEMA SERTIFIKASI</th>
                      <th>TEMPAT</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="bodyTable">
                    <tr>
                      <td colspan="5" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
                          class="border-0 bg-transparent text-primary" id="addRow">+</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center justify-content-sm-end text-black">
                <div class="text-start w-sm-auto">
                  {{-- <div class="text-start w-sm-auto" style="width: 35%"> --}}
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span style="width: 47%">Ditetapkan di</span>
                    <span style="width: 3%">:</span>
                    <span style="width: 50%"><input type="text"
                        class="form-control @error('tempat_ditetapkan') is-invalid @enderror" name="tempat_ditetapkan"
                        onkeyup="inputAutoTempat('tempat_2')" id="tempat_2" />
                      @error('tempat_ditetapkan')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span style="width: 47%">Pada tanggal</span>
                    <span style="width: 3%">:</span>
                    <span style="width: 50%"><input type="date"
                        class="form-control @error('tanggal_ditetapkan') is-invalid @enderror" name="tanggal_ditetapkan"
                        onchange="inputAutoTanggal('tanggal_3')" id="tanggal_3" />
                      @error('tanggal_ditetapkan')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                  <div class="mb-2">
                    <span><input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror"
                        name="jabatan_bttd" onkeyup="inputAutoJabatan('jabatan_2')" id="jabatan_2" />
                      @error('jabatan_bttd')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                  <div>
                    {{-- TANDA TANGAN / TTD --}}
                    <div class="mb-2 signature-pad" id="signature-pad" style="width: 75%">
                      <canvas id="sig"></canvas>
                      <input type="hidden" name="ttd" value="" id="ttd">
                    </div>
                    <div id="signature-clear">
                      <button type="button" class="button button-primary tombol-primary-small mb-2"
                        id="clear">Clear</button>
                    </div>
                  </div>
                  <div>
                    <span><input type="text" class="form-control @error('nama_bttd') is-invalid @enderror"
                        name="nama_bttd" onkeyup="inputAutoNama('nama_2')" id="nama_2" />
                      @error('nama_bttd')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                </div>
              </div>
              {{--  --}}
            </div>
          </div>
        </div>

        <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
      </form>
    </section>
  </div>

@section('script')
  @include('admin.berkas.sk_penetapan_tuk_terverifikasi.script-berkas-sk')
@endsection
@endsection
