@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<div class="card page-content">
    <section class="row">
        <div class="p-5">
          @include('layout.header-berkas')
    
            <h6 class="text-center"><b>FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</b></h6>
          <div style="padding: 5%; padding-top:0%">   
              {{-- LEMBAR 1 --}}
              <p class="card-text">
                  <h6>Bagian 1 :  Rincian Data Pemohon Sertifikasi</h6>
              </p>
              <p class="card-text" style="width: 100%;">
                  Pada bagian ini,  cantumlan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.
              </p>
              <p class="card-text">
                  <b>a. Data Pribadi</b>
              </p>
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:5%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                      <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Nama Lengkap</h6>
                          </td>
                          <td >
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->nama_lengkap }}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">No. KTP/NIK/Paspor</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_user_detail->ktp_nik_paspor }}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Tempat /tgl.Lahir</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_user_detail->tempat_lahir}} / {{ $data_permohonan_user_sertifikasi->relasi_user_detail->tanggal_lahir }}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Jenis Kelamin</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">@if($data_permohonan_user_sertifikasi->relasi_user_detail->jenis_kelamin == "laki-laki")Laki-Laki / <s>Wanita</s>@else <s>Laki-Laki</s> / Wanita @endif</h6>
                          </td>
                        </tr>

                        <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Kebangsaan</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kebangsaan->kebangsaan}}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Alamat Rumah</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_user_detail->alamat_rumah }}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Kode Pos : {{$data_permohonan_user_sertifikasi->relasi_pekerjaan->kode_pos}}</h6>
                            </td>
                        </tr>

                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">No. Telepon/E-mail</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Rumah : {{ $data_permohonan_user_sertifikasi->relasi_user_detail->nomor_hp}}</h6>
                          </td>
                          <td style="width: 30%">
                              <h6 style="margin: 0; font-weight: lighter;">Kantor : </h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">HP : {{ $data_permohonan_user_sertifikasi->relasi_user_detail->nomor_hp }}</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">E-mail : {{ $data_permohonan_user_sertifikasi->email }}</h6>
                            </td>
                        </tr>

                        <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Kualifikasi Pendidikan</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan}}</h6>
                          </td>
                        </tr>
                  </tbody>
              </table>
              <p class="card-text">
                  <b>b. Data Pekerjaan Sekarang</b>
              </p>
              <table class="table table-bordered" style="font-size: 13px; width: 100%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                      <tr>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Nama Institusi / Perusahaan</h6>
                          </td>
                          <td >
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nama_pekerjaan }}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Jabatan</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->jabatan }}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Alamat Kantor</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->alamat_pekerjaan }}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Kode Pos : {{$data_permohonan_user_sertifikasi->relasi_pekerjaan->kode_pos}}</h6>
                            </td>
                        </tr>

                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">No. Telp/Fax/E-mail</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Telp : {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nomor_hp_pekerjaan}}</h6>
                          </td>
                          <td style="width: 30%">
                              <h6 style="margin: 0; font-weight: lighter;">Fax : </h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">E-mail : {{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->email_pekerjaan }}</h6>
                            </td>
                        </tr>

                  </tbody>
              </table>


              {{-- LEMBAR 2 --}}
              <p class="card-text">
                  <h6>Bagian  2 :  Data Sertifikasi</h6>
              </p>
              <p class="card-text" style="width: 100%;">
                  Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan berikut Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
              </p>
              <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Skema Sertifikasi   (KKNI/Okupasi/Klaster)</h6>
                          </td>
                          <td style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Judul</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->judul_skema_sertifikasi}}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Nomor</h6>
                          </td>
                          <td style="width: 10%">
                              <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->nomor_skema_sertifikasi}}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="5" colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">Tujuan Asesmen</h6>
                          </td>
                          <td style="width: 5%">
                            <h6 style="margin: 0; font-weight: lighter;">:</h6>
                          </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;"><b>Sertifikasi</b></h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 5%">
                              <h6 style="margin: 0; font-weight: lighter;"></h6>
                            </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Sertifikasi Ulang</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 5%">
                              <h6 style="margin: 0; font-weight: lighter;"></h6>
                            </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Pengakuan Kompetensi Terkini (PKT)</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 5%">
                              <h6 style="margin: 0; font-weight: lighter;"></h6>
                            </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Rekognisi Pembelajaran Lampau</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 5%">
                              <h6 style="margin: 0; font-weight: lighter;"></h6>
                            </td>
                          <td style="width: 30%">
                            <h6 style="margin: 0; font-weight: lighter;">Lainnya</h6>
                          </td>
                        </tr>

                  </tbody>
              </table>

              <p class="card-text">
                  <b>Daftar Unit Kompetensi sesuai kemasan:</b>
              </p>
              <table class="table table-bordered" style="table-layout: fixed; font-size: 13px; width: 100%" cellspacing=0 cellpadding=5>
                  <thead>
                      <tr class="text-center">
                          <th>No</th>
                          <th>Kode unit</th>
                          <th>Judul Unit</th>
                          <th style="word-wrap: break-word;">Jenis Standar(Standar khusus/Standar
                              internasional/SKKNI)</th>
                      </tr>
                  </thead>
                  <tbody style="font-size: 13px">
                      @php
                          $unit_kompetensi = \App\Models\UnitKompetensi::where('skema_sertifikasi_id', $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->id)->get();
                          $i = 1;
                      @endphp
                          @foreach ($unit_kompetensi as $data_unit_kompetensi)
                          <tr>
                              <td>
                                  <h6 style="font-weight: lighter;">{{$i++}}</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">{{$data_unit_kompetensi->kode_unit}}</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">{{$data_unit_kompetensi->judul_unit}}</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">{{$data_unit_kompetensi->jenis_standar}}</h6>
                              </td>
                          </tr>
                          @endforeach
                  </tbody>
              </table>
              
              {{-- LEMBAR 3 --}}
              <p class="card-text">
                  <h6>Bagian  3  :  Bukti Kelengkapan Pemohon</h6>
                  <h6>Bukti Persyaratan Dasar Pemohon</h6>
              </p>
              <table class="table table-bordered" style="table-layout: fixed; font-size: 13px; width: 100%" cellspacing=0 cellpadding=5>
                  <thead>
                      <tr class="text-center">
                          <th rowspan="2">No.</th>
                          <th rowspan="2">Bukti Persyaratan Dasar</th>
                          <th colspan="2">Ada</th>
                          <th rowspan="2">Tidak Ada</th>
                      </tr>
                      <tr class="text-center">
                          <th>Memenuhi Syarat</th>
                          <th>Tidak Memenuhi Syarat</th>
                      </tr>
                  </thead>
                  <tbody style="font-size: 13px">
                          <tr>
                              <td>
                                  <h6 style="font-weight: lighter;">1</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Fotocopy Nilai Mata Pelajaran Kompetensi Keahlian {{$data_permohonan_user_sertifikasi->relasi_jurusan->jurusan}}</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>
                                  <h6 style="font-weight: lighter;">2</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Fotocopy Sertifikat Prakerin atau surat keterangan telah melaksanakan Praktek Kerja Industri</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>
                                  <h6 style="font-weight: lighter;">3</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Fotocopy Nilai Raport</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td>
                                  <h6 style="font-weight: lighter;">Centang</h6>
                              </td>
                              <td></td>
                          </tr>
                  </tbody>
              </table>

                <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
                  <tbody style="font-size: 13px">
                        <tr>
                          <td rowspan="3" style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Rekomendasi (diisi oleh LSP):</b>
                                  Berdasarkan ketentuan persyaratan dasar, maka pemohon: 
                                  <b style="font-weight: bold;">Diterima/ <s>Tidak diterima</s> *)</b> sebagai peserta  sertifikasi
                              </h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Pemohon/ Kandidat :</b></h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Nama</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->nama_lengkap}}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Tanda Tangan/Tanggal</h6>
                          </td>
                          <td style="width: 20%">
                              <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->ttd_asesi}}" alt="ttd" width="80px">
                              <h6 style="margin: 0; font-weight: lighter;">{{$tanggal}}</h6>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="4" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Catatan :</b> {{$data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan}}</h6>
                          </td>
                          <td colspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;"><b style="font-weight: bold;">Admin LSP:</b></h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Nama</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin}}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">No. Reg</h6>
                          </td>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg}}</h6>
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 20%">
                              <h6 style="margin: 0; font-weight: lighter;">Tanda Tangan/Tanggal</h6>
                          </td>
                          <td style="width: 20%">
                              <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin}}" alt="ttd" width="80px">
                              <h6 style="margin: 0; font-weight: lighter;">{{$data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal}}</h6>
                          </td>
                        </tr>
                  </tbody>
              </table>    
              <a href="{{route('admin.CetakPermohonanSertifikasi', $data_permohonan_user_sertifikasi->id)}}" target="_blank" class="btn btn-sm btn-primary">Simpan ke PDF</a>
          </div>
      </div>
    </section>
  </div>

@endsection
