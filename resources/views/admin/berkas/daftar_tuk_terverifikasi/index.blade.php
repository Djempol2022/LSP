@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Daftar TUK Terverifikasi</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.DaftarTUKTerverifikasi.Add') }}" method="POST">
        @csrf
        <div class="card p-5">
          @include('layout.header-berkas')
          <div>
            <h6 class="line-sp mb-0 text-center">DAFTAR TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h6>
            <h6 class="text-center">LSP SMK NEGERI 1 SINTANG</h6>
            {{--  --}}
            <table class="table table-bordered" id="tableTUK">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA TUK</th>
                  <th>NAMA SKEMA SERTIFIKASI</th>
                  <th>PENANGGUNG JAWAB TUK</th>
                  <th></th>
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
            <div class="d-flex justify-content-end text-black">
              <div class="text-start" style="width: 35%">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span style="width: 47%">Ditetapkan di</span>
                  <span style="width: 3%">:</span>
                  <span style="width: 50%"><input type="text"
                      class="form-control @error('tempat_ditetapkan') is-invalid @enderror" name="tempat_ditetapkan"
                      value="{{ old('tempat_ditetapkan') ?? 'Sintang' }}" />
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
                      name="jabatan_bttd" value="{{ old('jabatan_bttd') ?? 'Ketua LSP SMK Negeri 1 Sintang' }}" />
                    @error('jabatan_bttd')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </span>
                </div>
                <div>
                  {{-- TANDA TANGAN / TTD --}}
                  <div class="mb-2 signature-pad" id="signature-pad">
                    <canvas id="sig"></canvas>
                    <input type="hidden" name="ttd" value="" id="ttd">
                  </div>
                  <div class="col" id="signature-clear">
                    <button type="button" class="btn-sm btn btn-danger mb-2"
                        id="clear"><i class="fa fa-eraser"></i>
                    </button>
                </div>
                </div>
                <div>
                  <span><input type="text" class="form-control @error('nama_bttd') is-invalid @enderror"
                      name="nama_bttd" value="{{ old('nama_bttd') ?? 'Agus Pramono, S.T,M.Pd' }}" />
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

        <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
      </form>
    </section>
  </div>
@section('script')
  @include('admin.berkas.daftar_tuk_terverifikasi.script-berkas-daftar')
@endsection
@endsection
