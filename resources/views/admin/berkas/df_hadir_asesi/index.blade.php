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
                <td style="width: 85%" class="d-flex align-items-center @error('tgl') is-invalid @enderror">
                  <input type="date" name="tgl" class="form-control w-25" required>
                  @error('tgl')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td class="d-flex align-items-center"><input type="time" name="wkt_mulai"
                    class="form-control @error('wkt_mulai') is-invalid @enderror" style="width: 15%" required>
                  @error('wkt_mulai')
                    <span class="text-danger">
                      <strong>Waktu Mulai {{ $message }}</strong>
                    </span>
                  @enderror
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td class="d-flex align-items-center">
                  <input type="text" name="tempat" class="form-control w-40 @error('tempat') is-invalid @enderror"
                    required>
                  @error('tempat')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </td>
              </tr>
              <tr>
                <td>Skema</td>
                <td>:</td>
                <td class="d-flex align-items-center">
                  <select name="skema_sertifikasi"
                    class="form-control w-40 @error('skema_sertifikasi') is-invalid @enderror" required>
                    <option value="">-- Pilih Skema Sertifikasi --</option>
                    @foreach ($skema_sertifikasi as $item)
                      <option value="{{ $item->id }}">{{ $item->judul_skema_sertifikasi }}</option>
                    @endforeach
                  </select>
                  @error('skema_sertifikasi')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered" id="dfHadirAsesi">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 28%;">No. Peserta</th>
                  <th style="width: 23%;">Nama Asesi</th>
                  <th style="width: 19%;">Asal Sekolah</th>
                  <th style="width: 20%;">Tanda Tangan</th>
                  <th style="width: 5%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="6" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
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
                <td id="jabatan_bttd" style="padding-left: 20%">
                  <input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror"
                    name="jabatan_bttd" value="Ketua LSP" id="jabatan_bttd" />
                  @error('jabatan_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
              </tr>
              <tr>
                <td style="height: 70px; padding-left: 5%; padding-right: 15%">
                  {{-- TANDA TANGAN / TTD --}}
                  <div class="mb-2 signature-pad" id="signature-pad-asesor">
                    <canvas id="sig-asesor"></canvas>
                    <input type="hidden" name="ttd-asesor" value="" id="ttd-asesor">
                  </div>
                  <div id="signature-clear-asesor">
                    <button type="button" class="button button-primary tombol-primary-small mb-2"
                      id="clear-asesor">Clear</button>
                  </div>
                </td>
                <td style="height: 70px; padding-left: 20%">
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
              </tr>
              <tr>
                <td style="padding-left: 5%; font-weight: bold; padding-right: 17%">
                  <select name="nama_asesor" id="nama_asesor"
                    class="form-select @error('nama_asesor') is-invalid @enderror">
                    <option value="">-- Pilih Asesor --</option>
                    @foreach ($nama_asesor as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                  </select>
                  @error('nama_asesor')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
                <td style="font-weight: bold; padding-left: 20%">
                  <input type="text" class="form-control @error('nama_bttd') is-invalid @enderror" name="nama_bttd"
                    value="Agus Pramono, ST,M.Pd" id="nama_bttd" />
                  @error('nama_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
              </tr>
              <tr>
                <td style="padding-left: 5%">
                  <div class="d-flex align-items-center">
                    MET.<span><input type="text" class="form-control @error('no_met_asesor') is-invalid @enderror"
                        name="no_met_asesor" value="000.015352.2019" id="no_met_asesor" />
                      @error('no_met_asesor')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                </td>
                <td style="padding-left: 20%">
                  <div class="d-flex align-items-center justify-content-end">
                    MET.<span><input type="text" class="form-control @error('no_met_bttd') is-invalid @enderror"
                        name="no_met_bttd" value="000.015352.2019" id="no_met_bttd" />
                      @error('no_met_bttd')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </span>
                  </div>
                </td>
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
  @include('admin.berkas.df_hadir_asesi.script-berkas-df-hadir-asesi')
@endsection
@endsection
