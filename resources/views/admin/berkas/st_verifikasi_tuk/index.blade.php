@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas ST Verifikasi TUK</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.STVerifikasiTUK.Add') }}" method="POST">
        @csrf
        {{-- lembar 1 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 text-decoration-underline font-extrabold">SURAT PERINTAH TUGAS VERIFIKASI TUK</h6>
            <h6 class="d-flex align-items-center justify-content-center gap-3 fw-light">Nomor : <input type="text"
                class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" style="width: 40%"
                value="{{ old('no_surat') ?? '08/132/LSP.SMKN1-SINTANG/II/2022' }}" />
              @error('no_surat')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
            </h6>
          </div>
          <div>
            <p class="mt-3"><span class="font-bold text-black">Dasar :</span> Peraturan Badan Nasional Sertifikasi
              Profesi (BNSP) 201
            </p>
            <div>
              <input type="text" id="tempat_uji_1"
                class="form-control w-40 mb-2 @error('tempat_uji') is-invalid @enderror" name="tempat_uji"
                style="width: 40%" value="{{ old('tempat_uji') ?? 'SMK Negeri 1 Jawai Selatan' }}"
                placeholder="Masukkan tempat uji" onkeyup="inputAutoTempatUji()" />
              @error('tempat_uji')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
              <select name="skema_sertifikasi" id="skema_sertifikasi_1" class="form-control w-40 mb-2"
                onchange="inputAutoSkemaSertifikasi(this)">
                @foreach ($skema_sertifikasi as $item)
                  <option value="{{ $item->id }}">{{ $item->judul_skema_sertifikasi }}</option>
                @endforeach
              </select>
              @error('skema_sertifikasi')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
              <input type="date" class="form-control w-40 @error('tanggal_dilaksanakan') is-invalid @enderror"
                name="tanggal_dilaksanakan" onchange="inputAutoTanggal()" id="tanggal_dilaksanakan_1"
                value="{{ old('tanggal_dilaksanakan') }}" />
              @error('tanggal_dilaksanakan')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
              <p class="text-black">Sehubungan dengan diperlukannya verifikasi untuk Tempat Uji Kompetensi
                (TUK)
                LSP <span id="tempat_uji_2" class="font-bold text-decoration-underline"></span> untuk
                memenuhi
                persyaratan pelaksanaan Uji Kompetensi <span id="skema_sertifikasi_2"
                  class="font-bold text-decoration-underline"></span>, dengan ini Ketua Lembaga
                Sertifikasi Profesi (LSP) SMK Negeri 1 Sintang menugaskan kepada yang
                namanya tercantum di bawah ini :
              </p>
              <div class="table-responsive">
                <table class="table table-bordered" id="tableSTVerifikasiTUK">
                  <thead>
                    <tr class="text-center">
                      <th>NO</th>
                      <th>NAMA</th>
                      <th>Jabatan</th>
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
            </div>
            <div>
              <table cellpadding=10>
                <tr>
                  <td>Untuk</td>
                  <td>Menjadi tim asesor lisensi untuk melakukan verifikasi terhadap</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <ol class="ps-3">
                      <li>Tempat Uji Kompetensi (TUK) <span id="tempat_uji_3"
                          class="font-bold text-decoration-underline"></span>. <br>Melaksanakan tugas dengan
                        sebaik-baiknya dan penung tanggung jawab. <br> Tugas ini dilaksanakan dari <span
                          id="tanggal_dilaksanakan_2" class="font-bold text-decoration-underline"></span></li>
                      <li>Melaporkan hasil verifikasi kepada Pimpinan LSP</li>
                    </ol>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <div class="d-flex justify-content-center justify-content-sm-end text-black">
            <div class="text-start w-40">
              <div class="mb-2">
                <input type="text" class="form-control mb-2 @error('tempat_ditetapkan') is-invalid @enderror"
                  name="tempat_ditetapkan" value="Sintang" />
                @error('tempat_ditetapkan')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                <input type="date" class="form-control mb-2 @error('tanggal_ditetapkan') is-invalid @enderror"
                  name="tanggal_ditetapkan">
                @error('tanggal_ditetapkan')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                <input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror" name="jabatan_bttd"
                  value="Ketua LSP" />
                @error('jabatan_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
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
                <input type="text" class="form-control @error('nama_bttd') is-invalid @enderror" name="nama_bttd"
                  value="Agus Pramono, ST,M.Pd" />
                @error('nama_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>

          <div class="text-black mt-5">
            <p class="mb-0" style="font-size: 12px">Tembusan :</p>
            <ol class="ps-3" style="font-size: 12px">
              <li>Ybs</li>
              <li>Arsip</li>
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
  @include('admin.berkas.st_verifikasi_tuk.script-berkas-st-verifikasi-tuk')
@endsection
@endsection
