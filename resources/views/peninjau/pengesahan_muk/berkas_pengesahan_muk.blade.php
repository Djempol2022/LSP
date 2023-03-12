@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<div class="page-content">
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{route('peninjau.DaftarPengesahanMuk')}}">Daftar Materi Uji Kompetensi</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Pengesahan Materi Uji Kompetensi</li>
    </ol>
</nav>
    <form action="{{route('peninjau.MukDiSahkan')}}" method="POST" id="form-PengesahanMuk">
        @csrf

    <section class="row">
        <div class="card p-5">
          @include('layout.header-berkas')
          <div>
            <h6 class="line-sp mb-2 text-center">MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h6>

            {{-- TABLE 1 SKEMA SERTIFIKASI--}}
            <div class="table-responsive">
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


             {{-- TABLE 2 PENDEKATAN ASESMEN--}}
            <table class="table table-bordered text-wrap table-responsive">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">1.  Menentukan Pendekatan Asesmen</th>
                    </tr>
                </thead>
            </table>

            <table class="table table-bordered text-wrap table-responsive">
                <tbody>

                    {{-- KANDIDAT --}}
                    <tr>
                        <th rowspan="21">1.1</th>
                        <th rowspan="3">Kandidat</th>
                        <input type="hidden" value="{{$jadwal_id->id}}" name="jadwal_uji_kompetensi_id" hidden>
                        <input type="hidden" value="{{$jadwal_id->muk_id}}" name="muk_id" hidden>

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


            {{-- TABLE 3 MEMPERSIAPKAN RENCANA ASESMEN--}}
            <table class="table table-bordered text-wrap table-responsive">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">2.	Mempersiapkan Rencana Asesmen </th>
                    </tr>
                </thead>
            </table>
        
            @foreach ($unit_kompetensi as $data_unit_kompetensi)
            <table class="table table-bordered text-wrap table-responsive">
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
    
            <table class="table table-bordered text-wrap table-responsive" style="font-size:80%" id="berkas-pengesahan-muk">
                <thead>
                  <tr>
                    <th rowspan="2"><h6 style="text-align:center;">Kriteria Unjuk Kerja</h6></th>

                    <th rowspan="2">
                        <h6 style="text-align:center">Bukti-Bukti</h6>
                        <h6 style="font-weight:lighter; text-align:center;">(Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan 
                        Kriteria Unjuk Kerja dan Pendekatan Asesmen.</h6>
                    </th>
                      
                    <td colspan="3"><h6 style="text-align:center">Jenis Bukti</h6></td>
                      <td colspan="6"><h6 style="text-align:center">
                        Metode dan Perangkat Asesmen
                        CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan),
                         DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</h6>
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
                    <td colspan="11"><b><h6>Elemen {{$index+1}}. {{$data_unit_kompetensi_elemen_get->judul_unit_kompetensi_sub}}</h6></b></td>
                    @php
                        $elemen_isi = \App\Models\UnitKompetensiIsi::where('unit_kompetensi_sub_id', $data_unit_kompetensi_elemen_get->id)->get();
                        $index = 1;
                    @endphp
                    @foreach ($elemen_isi as $index_isi => $data_elemen_isi)
                    <tr>
                        @php
                            $elemen_isi_isi = \App\Models\UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $data_elemen_isi->id)->get();
                            $dd = \App\Models\UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $data_elemen_isi->id)->count();
                            $isi_count = \App\Models\UnitKompetensiIsi2::with('relasi_unit_kompetensi_isi')
                                        ->whereRelation('relasi_unit_kompetensi_isi', 'unit_kompetensi_isi_id', $data_elemen_isi->id)->count();
                            $index_isi = 1;
                        @endphp
                        <td rowspan="{{$dd+1}}">
                            <h6 style="font-weight:lighter; font-size:90%">
                                {{$index_isi}}.{{$loop->iteration}} {{$data_elemen_isi->judul_unit_kompetensi_isi}}
                            </h6>
                        </td>
                    </tr>
                        @foreach ($elemen_isi_isi as $index => $data_elemen_isi_isi)
                        @php
                            $hasil_elemen_isi = \App\Models\PengesahanMuk_RencanaAsesmen::where('jadwal_uji_kompetensi_id', $jadwal_id->id)->where('elemen_isi_2_id', $data_elemen_isi_isi->id)->first();
                        @endphp
                        <input value="{{$data_elemen_isi_isi->id}}" type="hidden" name="elemen_isi_2_id[]" hidden>                        
                            <tr>
                                <td>
                                    <h6 style="font-weight:lighter; font-size:90%">
                                        {{$data_elemen_isi_isi->judul_unit_kompetensi_isi_2}}
                                    </h6>
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

            {{-- TABLE 4 MENGIDENTIFIKASI PERSYARATAN--}}
            <table class="table table-bordered text-wrap table-responsive">
                <thead>
                    <tr>
                        <th style="background-color: #f9c9ad; color:black;" colspan="7">3.  Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi</th>
                    </tr>
                </thead>
            </table>
            
            <table class="table table-bordered text-wrap table-responsive">
                <tbody>
                    @foreach ($mengidentifikasi as $data_mengidentifikasi)
                    @php
                        $hasil_identifikasi = \App\Models\PengesahanMuk_Mengidentifikasi_2::where('jadwal_uji_kompetensi_id', $jadwal_id->id)->where('keterangan_id', $data_mengidentifikasi->id)->first();
                    @endphp
                    <tr>
                        <td width="50%">{{$data_mengidentifikasi->keterangan}}</td>
                        <td>

                            <input value="{{$data_mengidentifikasi->id}}" type="hidden" name="mengidentifikasi_id[]" hidden>
                            <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="ada"
                            @isset($hasil_identifikasi->status)
                            @if ($hasil_identifikasi->status == "ada")
                                @checked(true)   
                            @endif @endisset required>Ada
                            <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="tidak ada"
                            @isset($hasil_identifikasi->status) @if ($hasil_identifikasi->status == "tidak ada")
                                @checked(true)   
                            @endif @endisset required>Tidak Ada
                            <p>Jika Ada, tuliskan</p>
                            @isset($hasil_identifikasi->tuliskan_keterangan)
                                <textarea name="tuliskan-{{$data_mengidentifikasi->id}}" class="form-input form-control">{{$hasil_identifikasi->tuliskan_keterangan}}</textarea>
                            @else
                                <textarea name="tuliskan-{{$data_mengidentifikasi->id}}" class="form-input form-control" placeholder="Kosongkan jika tidak ada"></textarea>
                            @endisset
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{-- TABLE 5 TTD ORANG RELEVAN --}}
            <table class="table table-bordered text-wrap table-responsive">
                <thead>
                    <p class="font-bold mb-1" style="color:black;">Konfirmasi dengan orang yang relevan</p>
                    <tr>
                        <th class="text-center" style="background-color: #f9c9ad; color:black;" colspan="2">Orang yang relevan</th>
                        <th class="text-center" style="background-color: #f9c9ad; color:black;">Tandatangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orang_relevan as $data_orang_relevan)
                    @php
                        $ttd_orang_relevan = \App\Models\PengesahanMuk_OrangRelevanTtd::where('jadwal_uji_kompetensi_id', $jadwal_id->id)
                            ->where('jadwal_uji_kompetensi_id', $jadwal_id->id)
                            ->where('orang_relevan_id', $data_orang_relevan->id)
                            ->first();
                        $orang_relevan_lainnya = \App\Models\PengesahanMuk_OrangRelevanLainnyaTtd::where('jadwal_uji_kompetensi_id', $jadwal_id->id)
                            ->where('orang_relevan_id', $data_orang_relevan->id)
                            ->first();
                    @endphp
                    <input value="{{$data_orang_relevan->id}}" type="hidden" name="orang_relevan[]" hidden>
                    <tr>
                        <td><input type="checkbox" name="pilih-{{$data_orang_relevan->id}}" value="{{$data_orang_relevan->id}}" 
                        @isset($ttd_orang_relevan)
                            @checked(true)    
                        @endisset>
                        </td>
                        <td width="58.4%">
                            <p>{{$data_orang_relevan->orang_relevan}}</p>
                            @if ($data_orang_relevan->id == 4)
                                <textarea name="orang_relevan_lainnya" class="form-control" cols="55" placeholder="{{$orang_relevan_lainnya->orang_relevan_lainnya ?? 'Inputkan nama atau jabatan orang relevan lainnya'}}"></textarea>
                            @endif
                        </td>
                        <td class="text-center">
                            @isset($ttd_orang_relevan->ttd)
                                <img src="{{$ttd_orang_relevan->ttd}}" alt="ttd" width="180px">
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad{{$data_orang_relevan->id}}">
                                    <canvas id="sig{{$data_orang_relevan->id}}"></canvas>
                                    <input type="hidden" name="ttd-{{$data_orang_relevan->id}}" id="ttd{{$data_orang_relevan->id}}" value="{{$ttd_orang_relevan->ttd}}" hidden>
                                </div>
                                <div class="col" id="signature-clear{{$data_orang_relevan->id}}">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-{{$data_orang_relevan->id}}"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @else
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad{{$data_orang_relevan->id}}">
                                    <canvas id="sig{{$data_orang_relevan->id}}"></canvas>
                                    <input type="hidden" name="ttd-{{$data_orang_relevan->id}}" id="ttd{{$data_orang_relevan->id}}" value="" hidden>
                                </div>
                                <div class="col" id="signature-clear{{$data_orang_relevan->id}}">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-{{$data_orang_relevan->id}}"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @endisset
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- TABLE 6 PENYUSUN DAN VALIDATOR --}}
            <table class="table table-bordered text-wrap table-responsive">
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
                            <div class="input-group">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Dibuat oleh : {{$jadwal_id->relasi_user_asesor->relasi_user_asesor_detail->nama_lengkap}}</span>
                                    <input type="hidden" name="asesor_id" value="{{$jadwal_id->relasi_user_asesor->user_asesor_id}}" hidden>
                                </div>
                            </div>
                        </div>
                        </td>
                        <td>
                            <p>Penyusun</p>
                        </td>
                        <td>


                        @isset($penyusun->ttd_asesor)
                            <img src="{{$penyusun->ttd_asesor}}" alt="ttd" width="180px">
                            <div class="col edit-profil mb-2 signature-pad" id="signature-pad-asesor">
                                <canvas id="sig-asesor"></canvas>
                                <input type="hidden" name="ttd_asesor" value="{{$penyusun->ttd_asesor}}" id="ttd-asesor" hidden>
                            </div>
                            <div class="col" id="signature-clear-asesor">
                                <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-asesor"><i
                                        class="fa fa-eraser"></i>
                                </button>
                            </div>
                        @else
                            <div class="col edit-profil mb-2 signature-pad" id="signature-pad-asesor">
                                <canvas id="sig-asesor"></canvas>
                                <input type="hidden" name="ttd_asesor" value="" id="ttd-asesor" hidden>
                            </div>
                            <div class="col" id="signature-clear-asesor">
                                <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-asesor"><i
                                        class="fa fa-eraser"></i>
                                </button>
                            </div>
                        @endisset

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group input-group-sm">
                                    <label class="input-group-text" for="inputGroupSelect01">Divalidasi oleh : {{$jadwal_id->relasi_user_peninjau->relasi_user_peninjau_detail->nama_lengkap}}</label>
                                    <input type="hidden" name="peninjau_id" value="{{$jadwal_id->relasi_user_peninjau->user_peninjau_id}}" hidden>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>Validator</p>
                        </td>
                        <td>
                            @isset($validator->ttd_peninjau)
                                <img src="{{$validator->ttd_peninjau}}" alt="ttd" width="180px">
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad-peninjau">
                                    <canvas id="sig-peninjau"></canvas>
                                    <input type="hidden" name="ttd_peninjau" value="{{$validator->ttd_peninjau}}" id="ttd-peninjau" hidden>
                                </div>
                                <div class="col" id="signature-clear-peninjau">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-peninjau"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @else
                                <div class="col edit-profil mb-2 signature-pad" id="signature-pad-peninjau">
                                    <canvas id="sig-peninjau"></canvas>
                                    <input type="hidden" name="ttd_peninjau" value="" id="ttd-peninjau" hidden>
                                </div>
                                <div class="col" id="signature-clear-peninjau">
                                    <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-peninjau"><i
                                            class="fa fa-eraser"></i>
                                    </button>
                                </div>
                            @endisset
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="row">   
            <div class="col-md-12">
                <div class="buttons">
                    <a href="{{route('peninjau.CetakPengesahanMukPDF', $jadwal_id->id)}}" class="btn btn-warning rounded-4 text-black"><i class="fa fa-print"></i> Simpan PDF</a>
                    <button id="pengesahan-muk-btn" type="submit" class="btn btn-primary ml-1 rounded-4">
                        <i id="icon-button-pengesahan-muk"></i>
                        <span id="text-simpan-pengesahan-muk" class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
    </section>
  </div>

@endsection
@section('script')
<script>
        // var sig1 = $('#sig-1').signature({syncField: '#signature-1', syncFormat: 'PNG'});
        // var sig2 = $('#sig-2').signature({syncField: '#signature-2', syncFormat: 'PNG'});
        // var sig3 = $('#sig-3').signature({syncField: '#signature-3', syncFormat: 'PNG'});
        // var sig4 = $('#sig-4').signature({syncField: '#signature-4', syncFormat: 'PNG'});

        $('#clear-1').click(function(e) {
            e.preventDefault();
            sig1.signature('clear-1');
            $("#signature-1").val('');
        });
        $('#clear-2').click(function(e) {
            e.preventDefault();
            sig2.signature('clear-2');
            $("#signature-2").val('');
        });
        $('#clear-3').click(function(e) {
            e.preventDefault();
            sig3.signature('clear-3');
            $("#signature-3").val('');
        });
        $('#clear-4').click(function(e) {
            e.preventDefault();
            sig4.signature('clear-4');
            $("#signature-4").val('');
        });

        let ttd1 = @json($ttd1);
        let ttd2 = @json($ttd2);
        let ttd3 = @json($ttd3);
        let ttd4 = @json($ttd4);

        let penyusun = @json($penyusun);
        let validator = @json($validator);

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

        
        function check_ttd(pad, ttd, element){
            if(pad.isEmpty()){
                let ttdData = ttd;
                document.getElementById(element).value = ttdData;
            } else {
                let ttdData = pad.toDataURL();
                document.getElementById(element).value = ttdData;
            }
            return element;
        }


        function sentToController() {
            check_ttd(signaturePad1, ttd1.ttd, 'ttd1');
            check_ttd(signaturePad2, ttd2.ttd, 'ttd2');
            check_ttd(signaturePad3, ttd3.ttd, 'ttd3');
            check_ttd(signaturePad4, ttd4.ttd, 'ttd4');
            check_ttd(signaturePad_asesor, penyusun.ttd_asesor, 'ttd-asesor');
            check_ttd(signaturePad_peninjau, validator.ttd_peninjau, 'ttd-peninjau');
            
            // if (signaturePad1.isEmpty()) {
            //     let ttdData1 = ttd1.ttd;
            //     document.getElementById('ttd1').value = ttdData1;
            // }else {
            //     let ttdData1 = signaturePad1.toDataURL();
            //     document.getElementById('ttd1').value = ttdData1;
            // }

            // if (signaturePad2.isEmpty()) {
            //     let ttdData2 = ttd2.ttd;
            //     document.getElementById('ttd2').value = ttdData2;
            // }else {
            //     let ttdData2 = signaturePad2.toDataURL();
            //     document.getElementById('ttd2').value = ttdData2;
            // }

            // if (signaturePad2.isEmpty()) {
            //     let ttdData2 = ttd2.ttd;
            //     document.getElementById('ttd2').value = ttdData2;
            // }else {
            //     let ttdData2 = signaturePad2.toDataURL();
            //     document.getElementById('ttd2').value = ttdData2;
            // }
            
        }

        // function sentToController() {
        //     if (signaturePad1.isEmpty() && signaturePad2.isEmpty() && signaturePad3.isEmpty() && signaturePad4.isEmpty() && signaturePad_asesor.isEmpty() && signaturePad_peninjau.isEmpty()) {
        //         let ttdData1 = ttd1.ttd;
        //         let ttdData2 = ttd2.ttd;
        //         let ttdData3 = ttd3.ttd;
        //         let ttdData4 = ttd4.ttd;
        //         let ttdData_asesor = penyusun.ttd_asesor;
        //         let ttdData_peninjau = validator.ttd_peninjau;
        //         document.getElementById('ttd1').value = ttdData1;
        //         document.getElementById('ttd2').value = ttdData2;
        //         document.getElementById('ttd3').value = ttdData3;
        //         document.getElementById('ttd4').value = ttdData4;
        //         document.getElementById('ttd-asesor').value = ttdData_asesor;
        //         document.getElementById('ttd-peninjau').value = ttdData_peninjau;
        //     }else {
        //         let ttdData1 = signaturePad1.toDataURL();
        //         let ttdData2 = signaturePad2.toDataURL();
        //         let ttdData3 = signaturePad3.toDataURL();
        //         let ttdData4 = signaturePad4.toDataURL();
        //         let ttdData_asesor   = signaturePad_asesor.toDataURL();
        //         let ttdData_peninjau = signaturePad_peninjau.toDataURL();
        //         document.getElementById('ttd1').value = ttdData1;
        //         document.getElementById('ttd2').value = ttdData2;
        //         document.getElementById('ttd3').value = ttdData3;
        //         document.getElementById('ttd4').value = ttdData4;
        //         document.getElementById('ttd-asesor').value = ttdData_asesor;
        //         document.getElementById('ttd-peninjau').value = ttdData_peninjau;
        //     }
        // }

        document.getElementById('clear-1').addEventListener("click", clear1);
        document.getElementById('clear-2').addEventListener("click", clear2);
        document.getElementById('clear-3').addEventListener("click", clear3);
        document.getElementById('clear-4').addEventListener("click", clear4);
        document.getElementById('clear-asesor').addEventListener("click", clear_asesor);
        document.getElementById('clear-peninjau').addEventListener("click", clear_peninjau);

        document.getElementById('pengesahan-muk-btn').addEventListener("click", sentToController);
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


    // $('#form-PengesahanMuk').on('submit', function (e) {
    //     e.preventDefault();

    //     var $search = $("#search-button")
    //     // $("#simpan-elemen-btn").attr('disabled','disabled');
        
    //     $.ajax({
    //         url: $(this).attr('action'),
    //         method: $(this).attr('method'),
    //         data: new FormData(this),
    //         processData: false,
    //         dataType: 'json',
    //         contentType: false,
    //         beforeSend: function () {
    //             $(document).find('label.error-text').text('');
    //         },
    //         success: function (data) {
    //             if (data.status == 0) {
    //                 $("#simpan-elemen-btn").removeAttr('disabled');
    //                 $.each(data.error, function (prefix, val) {
    //                     $('label.' + prefix + '_error').text(val[0]);
    //                     // $('span.'+prefix+'_error').text(val[0]);
    //                 });
    //             } else if (data.status == 1) {
    //                 swal({
    //                     title: "Berhasil",
    //                     text: `${data.msg}`,
    //                     icon: "success",
    //                     buttons: true,
    //                     successMode: true,
    //                 }),
    //                 location.reload();
    //             }
    //         }
    //     });
    // });

    $('#form-PengesahanMuk').on('submit', function(e) {
            e.preventDefault();
            $("#pengesahan-muk-btn").attr('disabled','disabled');
            $("#text-simpan-pengesahan-muk").html('')
            $("#icon-button-pengesahan-muk").addClass("fa fa-spinner fa-spin")
            
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                        $("#pengesahan-muk-btn").removeAttr('disabled')
                        $(".batal").removeAttr('disabled')
                    }
                    else if (data.status == 1) {
                        $("#icon-button-pengesahan-muk").addClass("fa fa-spinner fa-spin")
                        $("#text-simpan-pengesahan-muk").html('')
    
                        setTimeout(function() {
                            swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                successMode: true,
                            }),
                            location.reload();
                        },2000);
                    }
                }
            });
        });
</script>
@endsection