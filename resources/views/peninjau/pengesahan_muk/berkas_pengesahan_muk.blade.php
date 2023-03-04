@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<div class="page-content">
    <form action="{{route('peninjau.MukDiSahkan')}}" method="POST">
        @csrf

    <section class="row">
        <div class="card p-5">
          @include('layout.header-berkas')
          <div>
            <h6 class="line-sp mb-2 text-center">MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h6>

            {{-- TABLE 1 --}}
            <table class="table table-bordered text-wrap">
              <thead>
                <tr>
                  <th rowspan="2">Skema Sertifikasi(IKKNI/<s>Okupasi</s>/<s>Klaster</s>)</th>
                    <td>
                        Judul
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$skema_sertifikasi->judul_skema_sertifikasi}}
                    </td>
                </tr>
                <tr>
                      <td>
                          Nomor
                      </td>
                      <td>
                          :
                      </td>
                      <td>
                          {{$skema_sertifikasi->nomor_skema_sertifikasi}}
                      </td>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2" class="text-center font-extrabold h1 m-0 p-0">
                  </td>
                </tr>
              </tbody>
            </table>

             {{-- TABLE 2 --}}
            <table class="table table-bordered text-wrap">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">1.  Menentukan Pendekatan Asesmen</th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered text-wrap">
                <tbody>
                    {{-- KANDIDAT --}}
                    <tr>
                        <th rowspan="21">1.1</th>
                        <th rowspan="3">Kandidat</th>
                        <input type="hidden" value="{{$skema_sertifikasi->id}}" name="skema_sertifikasi_id" hidden>

                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->kandidat == 1) type="checkbox" checked @endif name="kandidat"></td>
                        <td colspan="4"><b>Hasil pelatihan dan / atau pendidikan:</b></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->kandidat == 2) type="checkbox"  checked @endif name="kandidat"></td>
                        <td colspan="4">Pekerja berpengalaman</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->kandidat == 3) type="checkbox"  checked @endif name="kandidat"></td>
                        <td colspan="4">Pelatihan / belajar mandiri</td>
                    </tr>

                    {{-- TUJUAN ASESMEN --}}
                    <tr>
                        <th rowspan="5">Tujuan Asesmen</th>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->tujuan == 1) checked @endif name="tujuan"></td>
                        <td colspan="4"><b>Sertifikasi</b></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->tujuan == 2) checked @endif name="tujuan"></td>
                        <td colspan="4">Sertifikasi Ulang</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->tujuan == 3) checked @endif name="tujuan"></td>
                        <td colspan="4">Pengakuan Kompetensi Terkini(PKT)</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="4" @if($penekatan_asesmen->tujuan == 4) checked @endif name="tujuan"></td>
                        <td colspan="4">Rekognisi Pembelajaran Lampau</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="5" @if($penekatan_asesmen->tujuan == 5) checked @endif name="tujuan"></td>
                        <td colspan="4">Lainnya</td>
                    </tr>

                    {{-- KONTEKS ASESMEN --}}
                    <tr>
                        <th rowspan="9">Konteks Asesmen</th>
                    </tr>
                    <tr>
                        <td>Lingkungan</td>
                        <td colspan="1" class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->konteks_asesmen_lingkungan == 1) checked @endif name="konteks_asesmen_lingkungan"></td>
                        <td>Tempat Kerja nyata</td>
                        <td  class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->konteks_asesmen_lingkungan == 2) checked @endif name="konteks_asesmen_lingkungan"></td>
                        <td>Tempat Kerja simulasi</td>
                    </tr>
                    <tr>
                        <td width="40">Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->konteks_asesmen_peluang == 1) checked @endif name="konteks_asesmen_peluang"></td>
                        <td>Tersedia</td>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->konteks_asesmen_peluang == 2) checked @endif name="konteks_asesmen_peluang"></td>
                        <td>Terbatas</td>
                    </tr>
                    <tr>
                        <td rowspan="3">Hubungan antara standar kompetensi dan:</td>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->konteks_asesmen_hubungan == 1) checked @endif name="konteks_asesmen_hubungan"></td>
                        <td colspan="4">Bukti untuk mendukung asesmen / RPL:  </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->konteks_asesmen_hubungan == 2) checked @endif name="konteks_asesmen_hubungan"></td>
                        <td colspan="4">Aktivitas kerja di tempat kerja Asesi: </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->konteks_asesmen_hubungan == 3) checked @endif name="konteks_asesmen_hubungan"></td>
                        <td colspan="4">Kegiatan Pembelajaran:</td>
                    </tr>

                    <tr>
                        <td rowspan="3">Siapa yang melakukan asesmen / RPL</td>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->konteks_asesmen_siapa == 1) checked @endif name="konteks_asesmen_siapa"></td>
                        <td colspan="4">Lembaga Sertifikasi </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->konteks_asesmen_siapa == 2) checked @endif name="konteks_asesmen_siapa"></td>
                        <td colspan="4">Organisasi Pelatihan </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->konteks_asesmen_siapa == 3) checked @endif name="konteks_asesmen_siapa"></td>
                        <td colspan="4">Asesor Perusahaan</td>
                    </tr>
                    

                     {{-- TUJUAN ASESMEN --}}
                     <tr>
                        <th rowspan="4">Konfirmasi dengan orang yang relevan</th>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->konfirmasi == 1) checked @endif name="konfirmasi"></td>
                        <td colspan="4"><b>Manajer sertifikasi LSP</b></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->konfirmasi == 2) checked @endif name="konfirmasi"></td>
                        <td colspan="4">Master Asesor / Master Trainer / Asesor Utama Kompetensi</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->konfirmasi == 3) checked @endif name="konfirmasi"></td>
                        <td colspan="4">Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="4" @if($penekatan_asesmen->konfirmasi == 4) checked @endif name="konfirmasi"></td>
                        <td colspan="4">Lainnya: Kaprodi …. dan Ketua dan Teknisi TUK …….</td>
                    </tr>

                      {{-- TOLAK UKUR --}}
                      <tr>
                        <th rowspan="21">1.2</th>
                        <th rowspan="5">Tolok Ukur Asesmen</th>
                        <td class="text-center"><input type="radio" value="1" @if($penekatan_asesmen->tolok == 1) checked @endif name="tolok"></td>
                        <td colspan="4"><b>Standar Kompetensi: SKKNI Nomor : KEP.115/MEN/III/2007</b></td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="2" @if($penekatan_asesmen->tolok == 2) checked @endif name="tolok"></td>
                        <td colspan="4">Kriteria asesmen dari kurikulum pelatihan</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="3" @if($penekatan_asesmen->tolok == 3) checked @endif name="tolok"></td>
                        <td colspan="4">Spesifikasi kinerja suatu perusahaan atau industri:</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="4" @if($penekatan_asesmen->tolok == 4) checked @endif name="tolok"></td>
                        <td colspan="4">Spesifikasi Produk:</td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="radio" value="5" @if($penekatan_asesmen->tolok == 5) checked @endif name="tolok"></td>
                        <td colspan="4">Pedoman khusus:</td>
                    </tr>
                </tbody>
            </table>

            {{-- TABLE 3 --}}
            <table class="table table-bordered text-wrap">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">2.	Mempersiapkan Rencana Asesmen </th>
                    </tr>
                </thead>
            </table>
        
        
            @foreach ($unit_kompetensi as $data_unit_kompetensi)
            <table class="table table-bordered text-wrap">
              <thead>
                <tr>
                  <th rowspan="2"><b>Unit Kompetensi</b></th>
                    <td>
                        Kode Unit
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$data_unit_kompetensi->kode_unit}}
                    </td>
                </tr>
                <tr>
                      <td>
                          Judul Unit
                      </td>
                      <td>
                          :
                      </td>
                      <td>
                          {{$data_unit_kompetensi->judul_unit}}
                      </td>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2" class="text-center font-extrabold h1 m-0 p-0">
                  </td>
                </tr>
              </tbody>
            </table>
            
            
            <table class="table table-bordered text-wrap text-center" id="berkas-pengesahan-muk">
                <thead>
                  <tr>
                    <th rowspan="2"><b>Kriteria Unjuk Kerja</b></th>

                    <th rowspan="2">
                        <b>Bukti-Bukti
                        (Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan 
                        Kriteria Unjuk Kerja dan Pendekatan Asesmen.
                        </b>
                    </th>
                      
                    <td colspan="3">Jenis Bukti</td>
                      <td colspan="6">
                        Metode dan Perangkat Asesmen
                        CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan),
                         DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)
                      </td>

                      <tr>
                        <td height="40">L</td>
                        <td height="40">TL</td>
                        <td height="40">L</td>
                        <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:auto; font-size:10px;">
                            Obsevasi langsung
                            (kerja nyata/aktivitas waktu nyata di tempat kerja di kingkungan tempat kerja yang disimulasikan)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Kegiatan Terstruktur
                            (latihan simulasi dan bermain peran, proyek,  presentasi, lembar kegiatan)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Tanya Jawab (pertanyaan tertulis, wawancara, asesmen diri, tanya jawab lisan, angket, ujian lisan atau tertulis)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Verifikasi  Portfolio (sampel pekerjaaan yang disusun oleh Asesi, produk dengan dokumentasi pendukung, bukti sejarah, jurnal atau buku catatan, informasi tentang pengalaman hidup)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Review produk
                            (testimoni dan laporan dari atasan,  bukti pelatihan, otentikasi pencapaian sebelumnya, wawancara dengan atasan,
                            atau rekan kerja)
                         </td>
                         <td class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Lainnya ....
                         </td>
                    </tr>
                  </tr>
                </thead>
                @php
                    $elemen = \App\Models\UnitKompetensiSub::where('unit_kompetensi_id', $data_unit_kompetensi->id)->get();
                @endphp
                @foreach ($elemen as $index => $data_unit_kompetensi_elemen_get)
                <tbody>
                    <td colspan="11"><b><h6>{{$index+1}}. {{$data_unit_kompetensi_elemen_get->judul_unit_kompetensi_sub}}</h6></b></td>
                    @php
                        $elemen_isi = \App\Models\UnitKompetensiIsi::where('unit_kompetensi_sub_id', $data_unit_kompetensi_elemen_get->id)->get();
                    @endphp
                    @foreach ($elemen_isi as $index => $data_elemen_isi)
                    <tr>
                        @php
                            $elemen_isi_isi = \App\Models\UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $data_elemen_isi->id)->get();
                            $dd = \App\Models\UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $data_elemen_isi->id)->count();
                            $isi_count = \App\Models\UnitKompetensiIsi2::with('relasi_unit_kompetensi_isi')->whereRelation('relasi_unit_kompetensi_isi', 'unit_kompetensi_isi_id', $data_elemen_isi->id)->count();
                        @endphp
                        <td rowspan="{{$dd+1}}">{{$data_elemen_isi->judul_unit_kompetensi_isi}}</td>
                    </tr>
                        @foreach ($elemen_isi_isi as $index => $data_elemen_isi_isi)
                        @php
                            $hasil_elemen_isi = \App\Models\PengesahanMuk_RencanaAsesmen::where('elemen_isi_2_id', $data_elemen_isi_isi->id)->first();
                        @endphp
                        <input value="{{$data_elemen_isi_isi->id}}" type="hidden" name="elemen_isi_2_id[]" hidden>                        
                            <tr>
                                <td>
                                    {{$data_elemen_isi_isi->judul_unit_kompetensi_isi_2}}
                                </td>

                                @for($i=0;$i<3;$i++)@endfor
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="L"
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->jenis_bukti == 'L')
                                            @checked(true)    
                                        @endif    
                                        @endisset
                                        >L<br />
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="TL" 
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->jenis_bukti == 'TL')
                                            @checked(true)    
                                        @endif
                                        @endisset>TL<br />
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="T" 
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->jenis_bukti == 'T')
                                            @checked(true)    
                                        @endif
                                        @endisset>T<br />
                                    </td>

                              
                                @for($i=0;$i<6;$i++)@endfor
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="CL" 
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->metode == 'CL')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>CL
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DIT" 
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->metode == 'DIT')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>DIT
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DPL"
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->metode == 'DPL')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>DPL
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DPT"
                                        @isset($hasil_elemen_isi->jenis_bukti) 
                                        @if ($hasil_elemen_isi->metode == 'DPT')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>DPT
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="VP" 
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        @if ($hasil_elemen_isi->metode == 'VP')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>VP
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="CUP"
                                        @isset($hasil_elemen_isi->jenis_bukti) 
                                        @if ($hasil_elemen_isi->metode == 'CUP')
                                            @checked(true)    
                                        @endif
                                        @endisset><br/>CUP
                                    </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                @endforeach
            </table>
            @endforeach

            {{-- TABLE 4 --}}
            <table class="table table-bordered text-wrap">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">3.  Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi</th>
                    </tr>
                </thead>
            </table>
            
            <table class="table table-bordered text-wrap">
                <tbody>
                    {{-- KANDIDAT --}}
                    @foreach ($mengidentifikasi as $data_mengidentifikasi)
                    @php
                        $hasil_identifikasi = \App\Models\PengesahanMuk_Mengidentifikasi_2::where('skema_sertifikasi_id', $skema_sertifikasi->id)->where('keterangan_id', $data_mengidentifikasi->id)->first();
                    @endphp
                    <tr>
                        <td width="50%">{{$data_mengidentifikasi->keterangan}}</td>
                        <td>

                            <input value="{{$data_mengidentifikasi->id}}" type="hidden" name="mengidentifikasi_id[]" hidden>
                            <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="ada" 
                            @isset($hasil_identifikasi->status)
                            @if ($hasil_identifikasi->status == "ada")
                                @checked(true)   
                            @endif @endisset>Ada
                            <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="tidak ada"
                            @isset($hasil_identifikasi->status) @if ($hasil_identifikasi->status == "tidak ada")
                                @checked(true)   
                            @endif @endisset>Tidak Ada
                            <p>Jika Ada, tuliskan</p>
                            @isset($hasil_identifikasi->tuliskan_keterangan)
                                <textarea name="tuliskan-{{$data_mengidentifikasi->id}}" class="form-input">{{$hasil_identifikasi->tuliskan_keterangan}}</textarea>
                            @endisset
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <table class="table table-bordered text-wrap">
                <thead>
                    <p class="font-bold mb-1" style="color:black;">Konfirmasi dengan orang yang relevan</p>
                    <tr>
                        <th class="text-center" style="background-color: #f9c9ad; color:black;" colspan="2">Orang yang relevan</th>
                        <th class="text-center" style="background-color: #f9c9ad; color:black;">Tandatangan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- KANDIDAT --}}
                    @foreach ($orang_relevan as $data_orang_relevan)
                    @php
                        $ttd_orang_relevan = \App\Models\PengesahanMuk_OrangRelevanTtd::where('skema_sertifikasi_id', $skema_sertifikasi->id)->where('orang_relevan_id', $data_orang_relevan->id)->first();
                    @endphp
                    <input value="{{$data_orang_relevan->id}}" type="hidden" name="orang_relevan[]" hidden>
                    <tr>
                        <td><input type="checkbox" name="pilih-{{$data_orang_relevan->id}}" value="{{$data_orang_relevan->id}}" 
                        @isset($ttd_orang_relevan)
                            @checked(true)    
                        @endisset>
                        </td>
                        <td>
                            <p>{{$data_orang_relevan->orang_relevan}}</p>
                        </td>
                        <td class="text-center">
                            @isset($ttd_orang_relevan->ttd)
                                <img src="{{$ttd_orang_relevan->ttd}}" alt="ttd" width="180px" id="clear-{{$data_orang_relevan->id}}">
                                {{-- <canvas hidden id="sig{{$data_orang_relevan->id}}"></canvas> --}}
                            @endisset
                            @if(empty($ttd_orang_relevan->ttd))
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad{{$data_orang_relevan->id}}">
                                    <canvas id="sig{{$data_orang_relevan->id}}"></canvas>
                                    <input type="hidden" name="ttd-{{$data_orang_relevan->id}}" value="" id="ttd{{$data_orang_relevan->id}}" hidden>
                                </div>
                                <div class="col" id="signature-clear{{$data_orang_relevan->id}}">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-{{$data_orang_relevan->id}}"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered text-wrap">
                <thead>
                    <p class="font-bold mb-1" style="color:black;">Penyusun dan Validator</p>
                    <tr>
                        <th class="text-center" style="background-color: #f9c9ad">Nama</th>
                        <th class="text-center" style="background-color: #f9c9ad">Jabatan</th>
                        <th class="text-center" style="background-color: #f9c9ad">Tanggal dan Tandatangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="col-md-12">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Dibuat oleh :</label>
                                <select class="form-select" id="inputGroupSelect01" name="asesor_id" required>
                                    <option selected="" disabled>Pilih Asesor</option>
                                    @foreach ($asesor as $data_asesor)
                                        <option value="{{$data_asesor->id}}" @selected($penyusun->user_asesor_id == $data_asesor->id)>{{$data_asesor->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </td>
                        <td>
                            <p>Penyusun</p>
                        </td>
                        <td>


                        @isset($penyusun->ttd_asesor)
                            <img src="{{$penyusun->ttd_asesor}}" alt="ttd" width="180px" id="clear-asesor">
                        @endisset
                        @if(empty($penyusun->ttd_asesor))
                        <div class="col edit-profil mb-2 signature-pad" id="signature-pad-asesor">
                            <canvas id="sig-asesor"></canvas>
                            <input type="text" name="ttd_asesor" value="" id="ttd-asesor">
                        </div>
                        <div class="col" id="signature-clear-asesor">
                            <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-asesor"><i
                                    class="fa fa-eraser"></i>
                            </button>
                        </div>
                        @endif

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Divalidasi oleh :</label>
                                <select class="form-select" id="inputGroupSelect01" name="peninjau_id" required>
                                    <option selected="" disabled>Pilih Peninjau</option>
                                    @foreach ($peninjau as $data_peninjau)
                                        <option value="{{$data_peninjau->id}}" @selected($validator->user_peninjau_id == $data_peninjau->id)>{{$data_peninjau->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <p>Validator</p>
                        </td>
                        <td>
                            @isset($validator->ttd_peninjau)
                                <img src="{{$validator->ttd_peninjau}}" alt="ttd" width="180px">
                            @endisset
                            @if(empty($validator->ttd_peninjau))
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad-peninjau">
                                    <canvas id="sig-peninjau"></canvas>
                                    <input type="text" name="ttd_peninjau" value="" id="ttd-peninjau">
                                </div>
                                <div class="col" id="signature-clear-peninjau">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-peninjau"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">   
            <div class="col-md-12">
                <div class="buttons">
                    <button class="btn btn-primary rounded-4" type="submit" id="simpan">Submit</button>
                    <a href="{{route('peninjau.CetakPengesahanMukPDF')}}" class="btn btn-warning rounded-4">Simpan PDF &nbsp;<i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
    </form>
    </section>
  </div>

@endsection
@section('script')
<script>

        function setupSignatureBox() {

            canvas1 = document.getElementById('sig1');
            signaturePad1 = new SignaturePad(canvas1);

            canvas2 = document.getElementById('sig2');
            signaturePad2 = new SignaturePad(canvas2);

            canvas3 = document.getElementById('sig3');
            signaturePad3 = new SignaturePad(canvas3);

            canvas4 = document.getElementById('sig4');
            signaturePad4 = new SignaturePad(canvas4);

            canvas_asesor = document.getElementById('sig-asesor');
            signaturePad_asesor = new SignaturePad(canvas_asesor);

            canvas_peninjau = document.getElementById('sig-peninjau');
            signaturePad_peninjau = new SignaturePad(canvas_peninjau);

            var ratio = Math.max(window.devicePixelRatio || 1, 1);

            canvas1.width = canvas1.offsetWidth * ratio;
            canvas1.height = canvas1.offsetHeight * ratio;

            canvas2.width = canvas2.offsetWidth * ratio;
            canvas2.height = canvas2.offsetHeight * ratio;

            canvas3.width = canvas3.offsetWidth * ratio;
            canvas3.height = canvas3.offsetHeight * ratio;

            canvas4.width = canvas4.offsetWidth * ratio;
            canvas4.height = canvas4.offsetHeight * ratio;

            canvas_asesor.width = canvas_asesor.offsetWidth * ratio;
            canvas_asesor.height = canvas_asesor.offsetHeight * ratio;

            canvas_peninjau.width = canvas_peninjau.offsetWidth * ratio;
            canvas_peninjau.height = canvas_peninjau.offsetHeight * ratio;

            var w = window.innerWidth;
            if (canvas1.width == 0 && canvas1.height == 0 || canvas2.width == 0 && canvas2.height == 0 || canvas3.width == 0 && canvas3.height == 0 || canvas4.width == 0 && canvas4.height == 0 || canvas_asesor.width == 0 && canvas_asesor.height == 0 || canvas_peninjau.width == 0 && canvas_peninjau.height == 0) {
                if (w > 1200) {
                    canvas1.width = 496 * ratio;
                    canvas1.height = 200 * ratio;

                    canvas2.width = 496 * ratio;
                    canvas2.height = 200 * ratio;

                    canvas3.width = 496 * ratio;
                    canvas3.height = 200 * ratio;

                    canvas4.width = 496 * ratio;
                    canvas4.height = 200 * ratio;
                    
                    canvas_asesor.width = 496 * ratio;
                    canvas_asesor.height = 200 * ratio;

                    canvas_peninjau.width = 496 * ratio;
                    canvas_peninjau.height = 200 * ratio;

                } else if (w < 1200 && w > 992) {
                    canvas1.width = 334 * ratio;
                    canvas1.height = 200 * ratio;

                    canvas2.width = 334 * ratio;
                    canvas2.height = 200 * ratio;
                    
                    canvas3.width = 334 * ratio;
                    canvas3.height = 200 * ratio;

                    canvas4.width = 334 * ratio;
                    canvas4.height = 200 * ratio;

                    canvas_asesor.width = 334 * ratio;
                    canvas_asesor.height = 200 * ratio;

                    canvas_peninjau.width = 334 * ratio;
                    canvas_peninjau.height = 200 * ratio;

                } else if (w < 992) {
                    canvas1.width = 399 * ratio;
                    canvas1.height = 200 * ratio;
                    
                    canvas2.width = 399 * ratio;
                    canvas2.height = 200 * ratio;
                    
                    canvas3.width = 399 * ratio;
                    canvas3.height = 200 * ratio;

                    canvas4.width = 399 * ratio;
                    canvas4.height = 200 * ratio;

                    canvas_asesor.width = 399 * ratio;
                    canvas_asesor.height = 200 * ratio;

                    canvas_peninjau.width = 399 * ratio;
                    canvas_peninjau.height = 200 * ratio;
                }
            } else {
                canvas1.width = canvas1.offsetWidth * ratio;
                canvas1.height = canvas1.offsetHeight * ratio;
                
                canvas2.width = canvas2.offsetWidth * ratio;
                canvas2.height = canvas2.offsetHeight * ratio;

                canvas3.width = canvas3.offsetWidth * ratio;
                canvas3.height = canvas3.offsetHeight * ratio;

                canvas4.width = canvas4.offsetWidth * ratio;
                canvas4.height = canvas4.offsetHeight * ratio;

                canvas_asesor.width = canvas_asesor.offsetWidth * ratio;
                canvas_asesor.height = canvas_asesor.offsetHeight * ratio;
                
                canvas_peninjau.width = canvas_peninjau.offsetWidth * ratio;
                canvas_peninjau.height = canvas_peninjau.offsetHeight * ratio;
            }
            canvas1.getContext("2d").scale(ratio, ratio);
            canvas2.getContext("2d").scale(ratio, ratio);
            canvas3.getContext("2d").scale(ratio, ratio);
            canvas4.getContext("2d").scale(ratio, ratio);
            canvas_asesor.getContext("2d").scale(ratio, ratio);
            canvas_peninjau.getContext("2d").scale(ratio, ratio);
            signaturePad1.clear();
            signaturePad2.clear();
            signaturePad3.clear();
            signaturePad4.clear();
            signaturePad_asesor.clear();
            signaturePad_peninjau.clear();
        }

        function clear1() {
            signaturePad1.clear();
        }

        function clear2() {
            signaturePad2.clear();
        }

        function clear3() {
            signaturePad3.clear();
        }

        function clear4() {
            signaturePad4.clear();
        }

        function clear_asesor() {
            signaturePad_asesor.clear();
        }

        function clear_peninjau() {
            signaturePad_peninjau.clear();
        }

        function sentToController() {
            if (signaturePad1.isEmpty() && signaturePad2.isEmpty() && signaturePad3.isEmpty() && signaturePad4.isEmpty() && signaturePad_asesor.isEmpty() && signaturePad_peninjau.isEmpty()) {
                let ttdData1 = data.relasi_sertifikasi.ttd_asesi;
                let ttdData2 = data.relasi_sertifikasi.ttd_asesi;
                let ttdData3 = data.relasi_sertifikasi.ttd_asesi;
                let ttdData4 = data.relasi_sertifikasi.ttd_asesi;
                let ttdData_asesor = data.relasi_sertifikasi.ttd_asesi;
                let ttdData_peninjau = data.relasi_sertifikasi.ttd_asesi;
                document.getElementById('ttd1').value = ttdData1;
                document.getElementById('ttd2').value = ttdData2;
                document.getElementById('ttd3').value = ttdData3;
                document.getElementById('ttd4').value = ttdData4;
                document.getElementById('ttd-asesor').value = ttdData_asesor;
                document.getElementById('ttd-peninjau').value = ttdData_peninjau;
            } else {
                let ttdData1 = signaturePad1.toDataURL();
                let ttdData2 = signaturePad2.toDataURL();
                let ttdData3 = signaturePad3.toDataURL();
                let ttdData4 = signaturePad4.toDataURL();
                let ttdData_asesor   = signaturePad_asesor.toDataURL();
                let ttdData_peninjau = signaturePad_peninjau.toDataURL();
                document.getElementById('ttd1').value = ttdData1;
                document.getElementById('ttd2').value = ttdData2;
                document.getElementById('ttd3').value = ttdData3;
                document.getElementById('ttd4').value = ttdData4;
                document.getElementById('ttd-asesor').value = ttdData_asesor;
                document.getElementById('ttd-peninjau').value = ttdData_peninjau;
            }
        }

        document.getElementById('clear-1').addEventListener("click", clear1);
        document.getElementById('clear-2').addEventListener("click", clear2);
        document.getElementById('clear-3').addEventListener("click", clear3);
        document.getElementById('clear-4').addEventListener("click", clear4);
        document.getElementById('clear-asesor').addEventListener("click", clear_asesor);
        document.getElementById('clear-peninjau').addEventListener("click", clear_peninjau);

        document.getElementById('simpan').addEventListener("click", sentToController);
        document.addEventListener("DOMContentLoaded", setupSignatureBox);

    $(function() {  
        function groupTable($rows, startIndex, total){
            if (total === 0){
            return;
        }
        var i , currentIndex = startIndex, count=1, lst=[];
        var tds = $rows.find('td:eq('+ currentIndex +')');
        var ctrl = $(tds[0]);
        lst.push($rows[0]);
        for (i=1;i<=tds.length;i++){
            if (ctrl.text() ==  $(tds[i]).text()){
                count++;
                $(tds[i]).addClass('deleted');
                lst.push($rows[i]);
        }else{
            if (count>1){
                ctrl.attr('rowspan',count);
                groupTable($(lst),startIndex+1,total-1)
            }
                count=1;
                lst = [];
                ctrl=$(tds[i]);
                lst.push($rows[i]);
            }
        }
    }
    var totalColumns = $("#myTable tr:first-child").children().length;
        groupTable($('#berkas-pengesahan-muk tr:has(td)'),0,totalColumns);
        $('#berkas-pengesahan-muk .deleted').remove();
    });

</script>
@endsection