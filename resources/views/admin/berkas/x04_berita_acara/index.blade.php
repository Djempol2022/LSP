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
      <form action="{{ route('admin.Berkas.X04BeritaAcara.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
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
                <div class="table-responsive">
                  <table style="width: 100%">
                    <tr>
                      <td style="width: 42%">Kompetensi/Paket Keahlian</td>
                      <td style="width: 3%">:</td>
                      <td style="width: 55%">
                        <select name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                          onchange="selectAuto(this, 'jurusan')" required>
                        </select>
                        @error('jurusan')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Paket Ujian</td>
                      <td>:</td>
                      <td>
                        <select name="skema_sertifikasi" id="skema_sertifikasi"
                          class="form-control @error('skema_sertifikasi') is-invalid @enderror"
                          onchange="selectAuto(this, 'skema_sertifikasi')" required>
                          @error('skema_sertifikasi')
                            <div class="text-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Rencana Pelaksanaan</td>
                      <td>:</td>
                      <td>
                        ..............................................................................................................
                      </td>
                    </tr>
                    <tr>
                      <td>Rekomendasi</td>
                      <td>:</td>
                      <td style="font-weight: bold">Sangat layak/layak/belum layak *</td>
                    </tr>
                  </table>
                </div>
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
            <table style="width: 90%; margin-left: 28px">
              <tr>
                <td colspan="2">Yang melakukan verifikasi</td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="jabatan_bttd"
                    class="form-control w-40 @error('jabatan_bttd') is-invalid @enderror" required>
                  @error('jabatan_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
                <td style="text-align: right">Perwakilan Tempat Uji Kompetensi</td>
              </tr>
              <tr>
                <td style="height: 70px" class="w-40">
                  {{-- TANDA TANGAN / TTD --}}
                  <div class="mb-2 signature-pad" id="signature-pad">
                    <canvas id="sig"></canvas>
                    <input type="hidden" name="ttd" value="" id="ttd">
                  </div>
                  <div id="signature-clear">
                    <button type="button" class="button button-primary tombol-primary-small mb-2"
                      id="clear">Clear</button>
                  </div>
                </td>
                <td style="height: 70px; text-align: right"></td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="nama_bttd"
                    class="form-control w-40 @error('nama_bttd') is-invalid @enderror" required>
                  @error('nama_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
                <td style="text-align: right">
                  (...................................................................)</td>
              </tr>
              <tr>
                <td class="d-flex align-items-center">NIP.
                  <input type="number" name="nip_bttd" class="form-control w-40 @error('nip_bttd') is-invalid @enderror"
                    required>
                  @error('nip_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
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
  @include('admin.berkas.x04_berita_acara.script-berkas-x04-berita-acara')
@endsection
@endsection
