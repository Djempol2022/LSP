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
                        <th style="background-color: orange" colspan="7">1.  Menentukan Pendekatan Asesmen</th>
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
                        <th style="background-color: orange" colspan="7">2.	Mempersiapkan Rencana Asesmen </th>
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
            
            
            {{-- <table class="table table-bordered text-wrap text-center" id="berkas-pengesahan-muk">
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
                        <input value="{{$data_elemen_isi_isi->id}}" type="hidden" name="elemen_isi_2_id[]" hidden>                        
                            <tr>
                                <td>
                                    {{$data_elemen_isi_isi->judul_unit_kompetensi_isi_2}}
                                </td>

                                @for($i=0;$i<3;$i++)@endfor
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="L" />L<br />
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="TL" />TL<br />
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="T" />T<br />
                                    </td>

                              
                                @for($i=0;$i<6;$i++)@endfor
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="CL" /><br/>CL
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DIT" /><br/>DIT
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DPL" /><br/>DPL
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="DPT" /><br/>DPT
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="VP" /><br/>VP
                                    </td>
                                    <td height="200">
                                        <input type="radio" name="metode-{{$data_elemen_isi_isi->id}}" value="CUP" /><br/>CUP
                                    </td>
                                
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                @endforeach
            </table> --}}

            @endforeach
            
            
        </div>
        <button type="submit">Simpan</button>
    </form>
    </section>
  </div>

@endsection
@section('script')
<script>
    //   $("#berkas-pengesahan-muk").rowspanizer({vertical_align: 'middle'});

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