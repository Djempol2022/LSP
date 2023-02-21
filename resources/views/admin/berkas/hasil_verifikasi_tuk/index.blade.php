@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{ route('admin.Berkas') }}">Berkas
          Admin</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Hasil Verifikasi TUK</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.HasilVerifikasiTUK.Add') }}" method="POST">
        @csrf
        <div class="card p-5">
          @include('layout.header-berkas')
          <div class="text-center">
            <h5 class="font-extrabold mb-0">HASIL VERIFIKASI TEMPAT UJI KOMPETENSI ( TUK )</h5>
            <h5 class="font-extrabold d-flex justify-content-center gap-2 my-2">
              "<select name="jurusan" class="form-control w-50 text-center font-extrabold" id="jurusan"
                onchange="selectAuto(this, 'jurusan')">
                {{-- @foreach ($jurusans as $jurusan)
                  <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                @endforeach --}}
              </select>"
            </h5>
            <h6 class="font-extrabold mb-3 d-flex justify-content-center"><select name="skema_sertifikasi"
                id="skema_sertifikasi" class="form-control text-center font-extrabold"
                onchange="selectAuto(this, 'skema_sertifikasi')">
                {{-- @foreach ($skema_sertifikasi as $item)
                  <option value="{{ $item->id }}">{{ $item->judul_skema_sertifikasi }}</option>
                @endforeach --}}
              </select></h6>
          </div>

          {{-- table 1 --}}
          <div>
            <h6 class="font-extrabold indent ms-4">A. SARANA DAN PRASARANA</h6>
            @error('sarana_prasarana')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
            <table class="table table-bordered text-center" id="tableHasilVerifikasiTUK">
              <thead>
                <tr class="table-success">
                  <th rowspan="2">No.</th>
                  <th rowspan="2">Sarana dan Prasarana</th>
                  <th rowspan="2">Ada</th>
                  <th rowspan="2">Tidak</th>
                  <th colspan="2">Kondisi</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <tr class="table-success">
                  <th>Sesuai</th>
                  <th>Tidak Sesuai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="7" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
                      class="border-0 bg-transparent text-primary" id="addRow">+</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- table 2 --}}
          <div class="mt-5">
            <h6 class="font-extrabold indent ms-4">B. PENGUJI</h6>
            @error('standar')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
            <table class="table table-bordered" id="tableHasilVerifikasiTUKPenguji">
              <thead>
                <tr class="table-success text-center">
                  <th rowspan="2">No.</th>
                  <th rowspan="2">Aspek Kompetensi</th>
                  <th rowspan="2">Standar</th>
                  <th colspan="2">Kondisi</th>
                </tr>
                <tr class="table-success text-center">
                  <th>Sesuai</th>
                  <th>Tidak Sesuai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1.</td>
                  <td>Pendidikan</td>
                  <td class="text-center">
                    <input type="text" class="form-control" name="standar[]">
                  </td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]1"
                      value="1" onchange="onlyOneCheckBox(this)"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]1"
                      value="0" onchange="onlyOneCheckBox(this)"></td>
                </tr>
                <tr>
                  <td class="text-center">2.</td>
                  <td>Pelatihan</td>
                  <td class="text-center"><input type="text" class="form-control" name="standar[]"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]2"
                      value="1" onchange="onlyOneCheckBox(this)"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]2"
                      value="0" onchange="onlyOneCheckBox(this)"></td>
                </tr>
                <tr>
                  <td class="text-center">3.</td>
                  <td>Pengalaman</td>
                  <td class="text-center"><input type="text" class="form-control" name="standar[]"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]3"
                      value="1" onchange="onlyOneCheckBox(this)"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]3"
                      value="0" onchange="onlyOneCheckBox(this)"></td>
                </tr>
                <tr>
                  <td class="text-center">4.</td>
                  <td>Ketrampilan</td>
                  <td class="text-center"><input type="text" class="form-control" name="standar[]"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]4"
                      value="1" onchange="onlyOneCheckBox(this)"></td>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="kondisi_penguji[]4"
                      value="0" onchange="onlyOneCheckBox(this)">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div>
            <h6>Catatan :</h6>
            <textarea name="catatan" cols="30" rows="5" class="form-control"></textarea>
            <h6 class="mt-2 mb-0">Kesimpulan Verifikasi : (* pilih salah satu )</h6>
            <p>* Sesuai / Belum sesuai dengan persyaratan tempat uji kompetensi</p>
          </div>

          <div class="d-flex justify-content-end text-black">
            <div class="text-start w-40">
              <div class="mb-2">
                <input type="text" class="form-control mb-2 @error('tempat_ditetapkan') is-invalid @enderror"
                  name="tempat_ditetapkan" value="" />
                @error('tempat_ditetapkan')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
                <input type="date" class="form-control @error('tanggal_ditetapkan') is-invalid @enderror"
                  name="tanggal_ditetapkan">
                @error('tanggal_ditetapkan')
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
                  value="" />
                @error('nama_bttd')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>

        </div>
        <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
      </form>

    </section>
  </div>

@section('script')
  @include('admin.berkas.hasil_verifikasi_tuk.script-berkas-hasil-verifikasi')
@endsection
@endsection
