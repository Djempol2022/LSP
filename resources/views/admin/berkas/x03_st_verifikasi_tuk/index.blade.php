@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas X 03 ST Verifikasi TUK</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.X03STVerifikasiTUK.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 text-decoration-underline font-extrabold">SURAT TUGAS</h6>
            <h6 class="d-flex align-items-center justify-content-center gap-3 fw-light">Nomor : <input type="text"
                class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" style="width: 40%"
                value="{{ old('no_surat') ?? '08/132/LSP.SMKN1-SINTANG/II/2022' }}" required />
              @error('no_surat')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
            </h6>
          </div>
          <div style="margin-top: 20px">
            <table>
              <tr>
                <td style="width: 30%; vertical-align: top;">Dasar</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%; vertical-align: top;">
                  <ol style="padding-left: 15px;">
                    <li>Peraturan BNSP Nomor : 12/BNSP.214/XII/2013 Tentang Pedoman Verifikasi TUK oleh TUK</li>
                    <li>Berdasarkan Surat Keputusan Ketua LSP-P1 SMKN 1 Sintang Nomor: SK 004/LSP.SMKN1-STG/VIII/2021
                      Tanggal 19 Agustus 2021 Tentang Penetapan Struktur Organisasi LSP</li>
                  </ol>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Maksud</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Diperlukan Tim untuk memverifikasi Tempat Uji Kompetensi untuk memenuhi
                  ketentuan Peraturan BNSP.</td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Luaran</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Dokumen verifikasi sesuai format, daftar hadir, foto dokumentasi</td>
              </tr>
              <tr>
                <td style="vertical-align: top;">MENUGASKAN</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Nama yang tertera dibawah ini dianggap cakap menjadi tim untuk
                  memverifikasi Tempat Uji Kompetensi (sewaktu).</td>
              </tr>
              <tr>
                <td style="vertical-align: top;"></td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">
                  <table cellspacing=0 cellpadding=5 class="table table-bordered" id="tableX03STVerifikasiTUK">
                    <thead>
                      <tr>
                        <td style="width: 5%">No</td>
                        <td style="width: 55%">Nama</td>
                        <td style="width: 40%">Jabatan</td>
                        <td>Aksi</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="5" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
                            class="border-0 bg-transparent text-primary" id="addRow">+</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Untuk</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">
                  <ol style="padding-left: 15px;">
                    <li>Melaksanakan tugas sebaik-baiknya dan penuh tanggung jawab yang akan diselenggarakan pada : <br />
                      <table>
                        <tr>
                          <td style="width: 25%; vertical-align: top;">Hari/Tanggal</td>
                          <td style="width: 5%; vertical-align: top;">:</td>
                          <td style="width: 70%; vertical-align: top;"><input type="date" class="form-control"
                              name="tanggal_mulai" required> s.d
                            <input type="date" class="form-control" name="tanggal_selesai" required>
                          </td>
                        </tr>
                        <tr>
                          <td style="vertical-align: top;">Waktu</td>
                          <td style="vertical-align: top;">:</td>
                          <td style="vertical-align: top;" class="d-flex align-items-center"><input type="time"
                              class="form-control w-40" name="waktu" required>
                            <span>WIB
                              - selesai</span>
                          </td>
                        </tr>
                        <tr>
                          <td style="vertical-align: top;">Nama TUK</td>
                          <td style="vertical-align: top;">:</td>
                          <td style="vertical-align: top;">
                            <select name="nama_tuk" class="form-control" required>
                              @foreach ($nama_tuk as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_tuk }}</option>
                              @endforeach
                            </select>
                            @error('nama_tuk')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </td>
                        </tr>
                      </table>
                    </li>
                    <li>Melaporkan hasil verifikasi secara tertulis kepada Ketua LSP</li>
                  </ol>
                </td>
              </tr>
              <tr>
                <td colspan=3>Demikian Surat Tugas ini dibuat untuk melaksanakan sebagaimana mestinya.</td>
              </tr>
            </table>
          </div>

          <div class="d-flex justify-content-end text-black mt-3">
            <div class="text-start w-40">
              <div class="mb-2">
                <input type="text" class="form-control mb-2 @error('tempat_ditetapkan') is-invalid @enderror"
                  name="tempat_ditetapkan" value="Sintang" required />
                @error('tempat_ditetapkan')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                <input type="date" class="form-control mb-2 @error('tanggal_ditetapkan') is-invalid @enderror"
                  name="tanggal_ditetapkan" required>
                @error('tanggal_ditetapkan')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                <input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror" name="jabatan_bttd"
                  value="Ketua LSP" required />
                @error('jabatan_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div>
                {{-- TANDA TANGAN / TTD --}}
                <div class="mb-2 signature-pad" id="signature-pad">
                  <canvas id="sig"></canvas>
                  <input type="hidden" name="ttd" value="" id="ttd">
                </div>
                <div id="signature-clear">
                  <button type="button" class="button button-primary tombol-primary-small mb-2"
                    id="clear">Clear</button>
                </div>
              </div>
              <div>
                <input type="text" class="form-control @error('nama_bttd') is-invalid @enderror" name="nama_bttd"
                  value="Agus Pramono, ST,M.Pd" required />
                @error('nama_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group d-flex align-items-center mt-2">
                <label for="no_met_bttd" class="form-label align-middle">MET.</label>
                <input type="text" class="form-control @error('no_met_bttd') is-invalid @enderror"
                  name="no_met_bttd" value="000.015352.2019" required />
                @error('no_met_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="text-black mt-5 fst-italic">
            <p class="mb-0" style="font-size: 12px">Tembusan :</p>
            <ol class="ps-3" style="font-size: 12px">
              <li>Dewan Pengarah</li>
              <li>Yang Bersangkutan</li>
            </ol>
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
