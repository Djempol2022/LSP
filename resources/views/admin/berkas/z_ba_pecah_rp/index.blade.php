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
        <input type="hidden" name="dropdown_value" value="z-ba-pecah-rp">
        {{-- lembar 1 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">BERITA ACARA</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">PELAKSANAAN RAPAT PLENO</h6>
          </div>
          <div style="margin-top: 20px">
            <p>Pada hari ini ................................. tanggal
              ........................................
              Bulan ..................................... tahun
              ................................. bertempat di <span><select name="institusi" id="institusi"
                  style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center;" class=""
                  required>
                  @foreach ($institusis as $institusi)
                    <option value="{{ $institusi->id }}">{{ $institusi->nama_institusi }}</option>
                  @endforeach
                </select>
              </span>,
              telah diadakan
              Rapat Pleno LSP SMK Negeri 1 Sintang untuk membahas hasil uji kompetensi <span><select
                  name="skema_sertifikasi" id="skema_sertifikasi"
                  style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center;" class="w-50"
                  required>
                  @foreach ($skema_sertifikasi as $item)
                    <option value="{{ $item->id }}">{{ $item->judul_skema_sertifikasi }}</option>
                  @endforeach
                </select></span>. <br />
              Adapun hasil dari Rapat Pleno tersebut tercantum sebagai berikut:
            </p>
            <div style="margin-top: 40px">
              <ol>
                <li>Pelaksanaan asesmen dilaksanakan pada tanggal <span><input type="date" name="tgl_tes_tertulis"
                      id="tgl_tes_tertulis_1" onchange="inputAutoTglTesTertulis()"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center"
                      required></span>
                  untuk
                  tes tertulis dan tanggal
                  <span><input type="date" name="tgl_tes_praktek" id="tgl_tes_praktek_1"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center"
                      onchange="inputAutoTglTesPraktek()" required></span> untuk
                  tes praktek.
                </li>
                <li>
                  Jumlah asesi yang mengikuti uji kompetensi secara keseluruhan berjumlah <span><input type="number"
                      name="jml_asesi" id="jml_asesi"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center; width: 60px;"
                      required min="0" value="0"></span>
                  peserta.
                </li>
                <li>Uji Kompetensi dimulai dari pukul <span><input type="time" name="wkt_mulai_uk" id="wkt_mulai_uk"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center;"
                      required></span> WIB sampai pukul <span><input type="time" name="wkt_selesai_uk"
                      id="wkt_selesai_uk"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center;"
                      required></span> WIB di
                  <span><select name="nama_tuk" id="nama_tuk"
                      style="border: none; outline-color: skyblue; font-weight: bolder; text-align: center;" required>
                      @foreach ($nama_tuk as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_tuk }}</option>
                      @endforeach
                    </select></span>.
                </li>
                <li>Diperlukan persiapan beberapa bahan habis pakai dan perlengkapan untuk keperluan uji kompetensi yang
                  selanjutnya dikoordinasikan dengan pihak TUK.</li>
              </ol>
            </div>
            <p style="margin-top: 40px">Demikian Berita Acara Rapat Pleno ini dibuat dengan sebenar-benarnya.</p>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%;">
              <tr>
                <td></td>
                <td style="width: 35%">Sintang, .......................................</td>
              </tr>
              <tr>
                <td></td>
                <td><input type="text" class="form-control @error('jabatan_bttd') is-invalid @enderror"
                    name="jabatan_bttd" value="Ketua LSP" id="jabatan_bttd_1" onkeyup="inputAutoJabatan()" />
                  @error('jabatan_bttd')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 70px;"></td>
              </tr>
              <tr>
                <td></td>
                <td style="font-weight: bold;"><input type="text"
                    class="form-control @error('nama_bttd') is-invalid @enderror" name="nama_bttd"
                    value="Agus Pramono, ST,M.Pd" id="nama_bttd_1" onkeyup="inputAutoNamaBttd()" />
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

        {{-- lembar 2 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
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
                  <td>
                    <input type="text" class="form-control w-50 @error('tempat_rapat') is-invalid @enderror"
                      name="tempat_rapat" value="Ruang Sekretariat SMKN 1 Jawai Selatan" />
                    @error('tempat_rapat')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Topik</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control w-50 @error('topik') is-invalid @enderror" name="topik"
                      value="Kendala dan hasil uji kompetensi" />
                    @error('topik')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Ketua Rapat</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control w-50 @error('ketua_rapat') is-invalid @enderror"
                      name="ketua_rapat" value="Agus Pramono, ST, M.Pd" />
                    @error('ketua_rapat')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td>Notulis</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="notulis_1"
                      class="form-control w-50 @error('notulis') is-invalid @enderror" name="notulis"
                      value="Ivo Fajrin Hartini, S.Pd" onkeyup="inputAutoNotulis()" />
                    @error('notulis')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </td>
                </tr>
                <tr style="font-weight: bolder; color: black;">
                  <td colspan="3">Daftar Peserta Rapat</td>
                </tr>
              </table>
            </div>
            <div>
              <table style="width: 100%; table-layout: fixed;" class="table table-bordered" cellspacing=0 cellpadding=5
                id="tableZBAPecahRP">
                <thead>
                  <tr style="text-align: center;">
                    <td style="width: 5%;">No</td>
                    <td style="width: 39%;">Nama Peserta</td>
                    <td style="width: 27%;">Jabatan</td>
                    <td style="width: 22%;">Tanda Tangan</td>
                    <td style="width: 7%;">Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  {{-- <tr>
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
                  </tr> --}}
                  <tr>
                    <td colspan="5" class="text-center font-extrabold h1 m-0 p-0"><button type="button"
                        class="border-0 bg-transparent text-primary w-100" id="addRow">+</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div style="margin-top: 30px;">
              <h6 style="color: black; font-weight: bolder;">Latar Belakang Pelaksanaan Rapat</h6>
              <p style="color: black;">Setelah pelaksanaan uji kompetensi pada tanggal <span class="font-extrabold"
                  id="tgl_tes_tertulis_2"></span> dan <span class="font-extrabold" id="tgl_tes_praktek_2"></span>, maka
                dirasa perlu mengadakan
                rapat
                pleno untuk membahas segala kendala dan pencapaian dalam uji kompetensi tersebut.</p>
            </div>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang
            </p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        {{-- lembar 3 --}}
        <div class="card p-5 overflow-x-auto" style="width: 56rem">
          @include('layout.header-bnsp-berkas')
          <div style="color: black;">
            <h6 style="font-weight: bold">Bahasan/Diskusi <button type="button"
                class="border-0 text-primary font-extrabold bg-primary text-white rounded mr-2"
                style="width: 25px; text-align: center" id="addBahasanDiskusi">+</button> <button type="button"
                class="border-0 text-primary font-extrabold bg-danger text-white rounded"
                style="width: 25px; text-align: center" id="removeBahasanDiskusi">-</button>
            </h6>
            <div id="bahasan_diskusi">
              <input type="text" name="bahasan_diskusi[]" class="form-control w-40" required>
            </div>
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
                <td id="jabatan_bttd_2"></td>
              </tr>
              <tr>
                <td></td>
                <td>
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
                <td style="font-weight: bold;" id="notulis_2"></td>
                <td style="font-weight: bold;" id="nama_bttd_2"></td>
              </tr>
              <tr>
                <td class="d-flex align-items-center">
                  MET.<span><input type="text" class="form-control @error('no_met_notulis') is-invalid @enderror"
                      name="no_met_notulis" value="000.015352.2019" id="no_met_notulis" />
                    @error('no_met_notulis')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </span></td>
                <td>
                  MET.<span id="no_met_bttd_2"></span></td>
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
  @include('admin.berkas.z_ba_pecah_rp.script-berkas-z-ba-pecah-rp')
@endsection
@endsection
