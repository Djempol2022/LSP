<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="/css/app.css">
  {{-- COSTUM CSS --}}
  <link rel="stylesheet" href="/css/costum.css">
  
  {{-- FAVICON --}}
  {{-- <link rel="shortcut icon" href="images/logo/favicon.svg" type="image/x-icon"> --}}
  <link rel="shortcut icon" href="/images/logo/favicon_lsp.png" type="image/png">
  <link rel="stylesheet" href="/extensions/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/css/simple-datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/css/simple-datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/select2.min.css">
  <link rel="stylesheet" href="/css/select2-bootstrap-5-theme.min.css">
  <link rel="stylesheet" href="/css/bootstrap-editable.css">

  {{-- BOOTSTRAP CSS --}}
  {{-- <link rel="stylesheet" href="/css/pdf.css"> --}}
  <style>
    table thead{
      display: table-row-group;
    }

    html {
        display: table;
        margin: auto;
    }
    
    html,body{
    height:297mm;
    width:210mm;
    }
    
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    /* thead { display:table-header-group } */

    @media print {
    body{
        width: 21cm;
        height: 29.7cm;
        /* change the margins as you want them to be. */
    } 
}
  </style>
</head>

<html lang="en">


<body>
  <div page size="A4">
    <div class="card page-content col-md-12">
      <section class="row col-md-12">
          <div class="p-5">
            <table>
              <tr>
                  <td>@include('layout.image-base64.img-logo-lsp')</td>
                  <td>
                      <h1 style="margin: 0px; color: skyblue; font-size: 24px;">Lembaga Sertifikasi Profesi</h1>
                      <h2 style="margin: 0px; font-family: serif; font-weight: bolder; color: grey; font-size: 24px;">SMK
                          Negeri 1
                          Sintang</h2>
                      <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Jalan Raya Sintang -
                          Pontianak KM.8
                          Sintang</h5>
                      <h5 style="margin: 0px; color: grey; font-weight: lighter; font-size: 15px;">Telp.: (0565)21377, Fax:
                          (0565)21377</h5>
                  </td>
                  <td>@include('layout.image-base64.img-logo-bnsp')</td>
              </tr>
          </table>
          <hr />
        </div>
              <h6 class="text-center"><b>FR.APL.02. ASESMEN MANDIRI</b></h6>
            <div style="padding: 5%; padding-top:0%">   

              <h6 class="line-sp mb-2 text-center">MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h6>

              {{-- TABLE 1 SKEMA SERTIFIKASI--}}
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
              <table class="table table-bordered text-wrap">
                  <thead>
                      <tr>
                          <th style="background-color: #f9c9ad; color:black;" colspan="7">1.  Menentukan Pendekatan Asesmen</th>
                      </tr>
                  </thead>
              </table>
  
              <table class="table table-bordered">
                  <tbody>
  
                      <tr>
                          {{-- <th rowspan="8">1.1</th> --}}
                          <th rowspan="3">Kandidat</th>
                          <input type="hidden" value="{{$jadwal_id->id}}" name="jadwal_uji_kompetensi_id" hidden>
                          <input type="hidden" value="{{$jadwal_id->muk_id}}" name="muk_id" hidden>
  
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->kandidat == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4"><b>Hasil pelatihan dan / atau pendidikan:</b></td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->kandidat == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Pekerja berpengalaman</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->kandidat == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Pelatihan / belajar mandiri</td>
                      </tr>
  
                      <tr>
                          <th rowspan="5">Tujuan Asesmen</th>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->tujuan == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4"><b>Sertifikasi</b></td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->tujuan == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Sertifikasi Ulang</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->tujuan == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Pengakuan Kompetensi Terkini(PKT)</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="4" @if($penekatan_asesmen->tujuan == 4)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Rekognisi Pembelajaran Lampau</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->tujuan == 5)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Lainnya</td>
                      </tr>
  
                      <tr>
                          <th rowspan="9">Konteks Asesmen</th>
                      </tr>
                      <tr>
                          <td>Lingkungan</td>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->konteks_asesmen_lingkungan == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td>Tempat Kerja nyata</td>
                          <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->konteks_asesmen_lingkungan == 2)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td>Tempat Kerja simulasi</td>
                      </tr>
                      <tr>
                          <td width="40">Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->konteks_asesmen_peluang == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td>Tersedia</td>
                          <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->konteks_asesmen_peluang == 2)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td>Terbatas</td>
                      </tr>
                      <tr>
                          <td rowspan="3">Hubungan antara standar kompetensi dan:</td>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->konteks_asesmen_hubungan == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4">Bukti untuk mendukung asesmen / RPL:  </td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->konteks_asesmen_hubungan == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Aktivitas kerja di tempat kerja Asesi: </td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->konteks_asesmen_hubungan == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Kegiatan Pembelajaran:</td>
                      </tr>
  
                      <tr>
                          <td rowspan="3">Siapa yang melakukan asesmen / RPL</td>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->konteks_asesmen_siapa == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4">Lembaga Sertifikasi </td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->konteks_asesmen_siapa == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Organisasi Pelatihan </td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->konteks_asesmen_siapa == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Asesor Perusahaan</td>
                      </tr>
                      
                      <tr>
                          <th rowspan="4">Konfirmasi dengan orang yang relevan</th>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->konfirmasi == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4"><b>Manajer sertifikasi LSP</b></td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->konfirmasi == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Master Asesor / Master Trainer / Asesor Utama Kompetensi</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->konfirmasi == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="4" @if($penekatan_asesmen->konfirmasi == 4)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Lainnya: Kaprodi …. dan Ketua dan Teknisi TUK …….</td>
                      </tr>
  
                      <tr>
                          {{-- <th rowspan="21">1.2</th> --}}
                          <th rowspan="5">Tolok Ukur Asesmen</th>
                          <td class="text-center"><input type="hidden" value="1" @if($penekatan_asesmen->tolok == 1)>
                            <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                          </td>
                          <td colspan="4"><b>Standar Kompetensi: SKKNI Nomor : {{$skema_sertifikasi->nomor_skema_sertifikasi}}</b></td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="2" @if($penekatan_asesmen->tolok == 2)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Kriteria asesmen dari kurikulum pelatihan</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="3" @if($penekatan_asesmen->tolok == 3)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Spesifikasi kinerja suatu perusahaan atau industri:</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="4" @if($penekatan_asesmen->tolok == 4)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Spesifikasi Produk:</td>
                      </tr>
                      <tr>
                        <td class="text-center"><input type="hidden" value="5" @if($penekatan_asesmen->tolok == 5)>
                          <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                        </td>
                          <td colspan="4">Pedoman khusus:</td>
                      </tr>
                  </tbody>
              </table>
  
  
              {{-- TABLE 3 MEMPERSIAPKAN RENCANA ASESMEN--}}
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
              </table>
      
              <table class="table table-bordered text-wrap" style="font-size:80%">
                  <thead>
                    <tr>
                      <th rowspan="2"><h6 style="text-align:center; font-size:80%"">Kriteria Unjuk Kerja</h6></th>
  
                      <th rowspan="2">
                          <h6 style="text-align:center; font-size:80%">Bukti-Bukti</h6>
                          <h6 style="font-weight:lighter; text-align:center; font-size:80%;">(Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan 
                          Kriteria Unjuk Kerja dan Pendekatan Asesmen.</h6>
                      </th>
                        
                      <td colspan="3"><h6 style="text-align:center; font-size:80%">Jenis Bukti</h6></td>
                        <td colspan="6"><h6 style="text-align:center; font-size:80%">
                          Metode dan Perangkat Asesmen
                          CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan),
                           DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</h6>
                        </td>
  
                        <tr>
                          <td height="20"><h6>L</h6></td>
                          <td height="20"><h6>TL</h6></td>
                          <td height="20"><h6>L</h6></td>
                          <td height="30" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Obsevasi langsung
                              (kerja nyata/aktivitas waktu nyata di tempat kerja di kingkungan tempat kerja yang disimulasikan)</h6>
                           </td>
                           <td height="30" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Kegiatan Terstruktur
                              (latihan simulasi dan bermain peran, proyek,  presentasi, lembar kegiatan)</h6>
                           </td>
                           <td height="30" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Tanya Jawab (pertanyaan tertulis, wawancara, asesmen diri, tanya jawab lisan, angket, ujian lisan atau tertulis)</h6>
                           </td>
                           <td height="30" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Verifikasi  Portfolio (sampel pekerjaaan yang disusun oleh Asesi, produk dengan dokumentasi pendukung, bukti sejarah, 
                              jurnal atau buku catatan, informasi tentang pengalaman hidup)</h6>
                           </td>
                           <td height="30" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Review produk
                              (testimoni dan laporan dari atasan,  bukti pelatihan, otentikasi pencapaian sebelumnya, wawancara dengan atasan,
                              atau rekan kerja)</h6>
                           </td>
                           <td class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;"><h6 style="font-size:80%;">
                              Lainnya ....</h6>
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

                                  {{-- <td class="text-center">
                                    <input type="hidden" value="2" @if($penekatan_asesmen->konteks_asesmen_lingkungan == 2)>
                                    <h6 style="text-align:center; margin: 0%; padding:0%; font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔@endif</h6>
                                  </td> --}}

                                      <td class="text-center">
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        <input type="hidden" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="L">
                                          @if ($hasil_elemen_isi->jenis_bukti == "L")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">L</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        <input type="hidden" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="TL">
                                          @if ($hasil_elemen_isi->jenis_bukti == "TL")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">TL</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->jenis_bukti)
                                        <input type="hidden" name="jenis_bukti-{{$data_elemen_isi_isi->id}}" value="T">
                                          @if ($hasil_elemen_isi->jenis_bukti == "T")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">T</h6>
                                          @endif
                                        @endisset
                                      </td>
  
                                
                                  @for($i=0;$i<6;$i++)@endfor
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="CL">
                                          @if ($hasil_elemen_isi->metode == "CL")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">CL</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="DT">
                                          @if ($hasil_elemen_isi->metode == "DT")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">DT</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="DPL">
                                          @if ($hasil_elemen_isi->metode == "DPL")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">DPL</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="DPT">
                                          @if ($hasil_elemen_isi->metode == "DPT")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">DPT</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="VP">
                                          @if ($hasil_elemen_isi->metode == "VP")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">VP</h6>
                                          @endif
                                        @endisset
                                      </td>
                                      <td>
                                        @isset($hasil_elemen_isi->metode)
                                        <input type="hidden" name="metode-{{$data_elemen_isi_isi->id}}" value="CUP">
                                          @if ($hasil_elemen_isi->metode == "CUP")
                                            <h6 style="text-align:center; margin: 0%; padding:0%;">CUP</h6>
                                          @endif
                                        @endisset
                                      </td>
                              </tr>
                          @endforeach
                      @endforeach
                  </tbody>
                  @endforeach
              </table>
              @endforeach
  
  
              {{-- TABLE 4 MENGIDENTIFIKASI PERSYARATAN--}}
              <table class="table table-bordered text-wrap">
                  <thead>
                      <tr>
                          <th style="background-color: #f9c9ad; color:black;" colspan="7">3.  Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi</th>
                      </tr>
                  </thead>
              </table>
              
              <table class="table table-bordered text-wrap">
                  <tbody>
                      @foreach ($mengidentifikasi as $data_mengidentifikasi)
                      @php
                          $hasil_identifikasi = \App\Models\PengesahanMuk_Mengidentifikasi_2::where('jadwal_uji_kompetensi_id', $jadwal_id->id)->where('keterangan_id', $data_mengidentifikasi->id)->first();
                      @endphp
                      <tr>
                          <td width="50%">{{$data_mengidentifikasi->keterangan}}</td>
                          <td>
  
                              <input value="{{$data_mengidentifikasi->id}}" type="hidden" name="mengidentifikasi_id[]" hidden>
                              {{-- <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="ada" --}}
                              {{-- @isset($hasil_identifikasi->status)
                              @if ($hasil_identifikasi->status == "ada")
                                  @checked(true)   
                              @endif @endisset required>
                              Ada --}}

                              <ol class="breadcrumb">
                                @isset($hasil_identifikasi->status) 
                                @if ($hasil_identifikasi->status == "ada")
                                  <li class="breadcrumb-item"><a style="color: black;" href="#!">Ada</a></li>
                                  <li class="breadcrumb-item"><a style="color: black;" href="#!"><s>Tidak ada</s></a></li>
                                @elseif($hasil_identifikasi->status == "tidak ada")
                                  <li class="breadcrumb-item"><a style="color: black;" href="#!"><s>Ada</s></a></li>
                                  <li class="breadcrumb-item"><a style="color: black;" href="#!">  Tidak ada</a></li>
                                @endif
                                @endif

                                {{-- @isset($hasil_identifikasi->status) @elseif ($hasil_identifikasi->status == "tidak ada")<li class="breadcrumb-item"><a href="#"><s>Tidak Ada</s></a></li>@endisset --}}
                              </ol>

                              {{-- <input type="radio" name="status-{{$data_mengidentifikasi->id}}" value="tidak ada"
                              @isset($hasil_identifikasi->status) @if ($hasil_identifikasi->status == "tidak ada")
                                  @checked(true)   
                              @endif @endisset required>
                              Tidak Ada --}}
                              @isset($hasil_identifikasi->tuliskan_keterangan)
                                  <p>{{$hasil_identifikasi->tuliskan_keterangan}}</p>
                              @endisset
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
              {{-- TABLE 5 TTD ORANG RELEVAN --}}
              <table class="table table-bordered text-wrap">
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
                          <td style="text-align:center;">
                          @isset($ttd_orang_relevan)
                              <h6 style="font-weight: lighter;font-family: DejaVu Sans, sans-serif;">✔</h6>
                          @endisset
                          </td>
                          <td width="58.4%">
                              <p>{{$data_orang_relevan->orang_relevan}}</p>
                              @if ($data_orang_relevan->id == 4)
                                  <label>{{$orang_relevan_lainnya->orang_relevan_lainnya ?? ''}}</label>
                              @endif
                          </td>
                          <td class="text-center">
                              @isset($ttd_orang_relevan->ttd)
                                  <img src="{{$ttd_orang_relevan->ttd}}" alt="ttd" width="180px" id="clear-{{$data_orang_relevan->id}}">
                              @endisset
                              @if(empty($ttd_orang_relevan->ttd))
                                  {{-- <div class="col edit-profil mb-2 signature-pad">
                                      <div id="sig-{{$data_orang_relevan->id}}"></div>
                                          <br><br>
                                          <button id="clear-{{$data_orang_relevan->id}}" class="btn btn-danger">Clear Signature</button>
                                      <textarea id="signature-{{$data_orang_relevan->id}}" name="ttd-{{$data_orang_relevan->id}}" style="display: none"></textarea>
                                  </div> --}}
  
                                  <div class="col edit-profil mb-2 signature-pad" id="signature-pad{{$data_orang_relevan->id}}">
                                      <canvas id="sig{{$data_orang_relevan->id}}"></canvas>
                                      <input type="hidden" name="ttd-{{$data_orang_relevan->id}}" id="ttd{{$data_orang_relevan->id}}" value="{{$data_orang_relevan->id}}" hidden>
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
  
              {{-- TABLE 6 PENYUSUN DAN VALIDATOR --}}
              <table class="table table-bordered text-wrap text-center">
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
                            <span>Dibuat oleh : {{$jadwal_id->relasi_user_asesor->relasi_user_asesor_detail->nama_lengkap}}</span>
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
                              <input type="hidden" name="ttd_asesor" value="" id="ttd-asesor" hidden>
                          </div>
                          <div class="col" id="signature-clear-asesor">
                              <button type="button" class="btn-sm btn btn-danger mb-2" id="clear-asesor"><i class="fa fa-eraser"></i>
                              </button>
                          </div>
                          @endif
  
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span>Divalidasi oleh : {{$jadwal_id->relasi_user_peninjau->relasi_user_peninjau_detail->nama_lengkap}}</span>
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
                                      <input type="hidden" name="ttd_peninjau" value="" id="ttd-peninjau" hidden>
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
      </section>
    </div>
  </div>
</body>
{{-- JAVASCRIPT BOOTSTRAP --}}

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/app.js"></script>
<script src="/extensions/fontawesome/js/all.min.js"></script>
<script src="/js/jquery.rowspanizer.js"></script>

<script>
  window.print();

  let unit_komp = @json($unit_kompetensi);

  $.each(unit_komp, function(key, value) {
    $("#demo-"+value.id).rowspanizer({
      vertical_align: 'middle'
    });
  });
</script>
</html>