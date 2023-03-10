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
                <td style="width: 85%" class="d-flex align-items-center @error('tgl') is-invalid @enderror">
                  <input type="date" name="tgl" class="form-control w-40" required>
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
                <td class="d-flex align-items-center"><span id="wkt"><input type="time" name="wkt"
                      class="form-control @error('wkt') is-invalid @enderror" required></span>
                  WIB - Selesai
                  @error('wkt')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </td>
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
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered" id="tableDFHadirAsesorPleno">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 28%;">Nama</th>
                  <th style="width: 21%;">No.Reg.MET</th>
                  <th style="width: 21%;">Jabatan</th>
                  <th style="width: 22%;">Tanda Tangan</th>
                  <th style="width: 3%">Aksi</th>
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
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td></td>
                <td style="width: 35%"><input type="text"
                    class="form-control @error('jabatan_bttd') is-invalid @enderror" name="jabatan_bttd" value="Ketua LSP"
                    id="jabatan_bttd" />
                  @error('jabatan_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 70px;">
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
                <td></td>
                <td style="font-weight: bold;"><input type="text"
                    class="form-control @error('nama_bttd') is-invalid @enderror" name="nama_bttd"
                    value="Agus Pramono, ST,M.Pd" id="nama_bttd" />
                  @error('nama_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
              </tr>
              <tr>
                <td></td>
                <td class="d-flex align-items-center">
                  MET.<span><input type="text" class="form-control @error('no_met_bttd') is-invalid @enderror"
                      name="no_met_bttd" value="000.015352.2019" id="no_met_bttd_1" onkeyup="inputAutoNoMetBttd()" />
                    @error('no_met_bttd')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </span></td>
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

@section('script')
  @include('admin.berkas.df_hadir_asesor_pleno.script-berkas-df-hadir-asesor-pleno')
@endsection
@endsection
'
