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

    body {
        display: table-cell;
        vertical-align: middle;
    }
    
    html,body{
    height:297mm;
    width:210mm;
    }

    @media print {
    body{
        width: 21cm;
        height: 29.7cm;
        /* margin: 30mm 45mm 30mm 45mm;  */
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
      
              <h6 class="text-center"><b>FR.APL.02. ASESMEN MANDIRI</b></h6>
            <div style="padding: 5%; padding-top:0%">   

                {{-- LEMBAR 1 --}}
                <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
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
                                <h6 style="margin: 0; font-weight: lighter;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->judul_skema_sertifikasi}}</h6>
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
                                <h6 style="margin: 0; font-weight: lighter;">{{$sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->nomor_skema_sertifikasi}}</h6>
                            </td>
                          </tr>

                    </tbody>
                </table>
                <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%;" cellspacing=0 cellpadding=5>
                  <thead>
                    <th><h5>PANDUAN ASESMEN MANDIRI</h5></th>
                  </thead>
                  <tbody style="font-size: 13px">
                        <tr>
                          <td rowspan="2" style="width: 20%">
                            <h6 style="margin: 0; font-weight: lighter;">
                              Instruksi:<br>
                              Baca setiap pertanyaan di kolom sebelah kiri
                              Beri tanda centang () pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.
                              Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.
                            </h6>
                          </td>
                        </tr>
                  </tbody>
              </table>
              @foreach ($unit_kompetensi as $data_unit_kompetensi)
                @php
                $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
                    ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
                    ->get();
                @endphp
                  <table class="table table-bordered" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5 id="demo-{{$data_unit_kompetensi->id}}">
                    <thead>
                      <tr>
                        <td style="width: 7%">
                          <h6 style="margin: 0; font-weight: bold;">Unit Kompetensi</h6>
                        </td>
                        <td colspan="5" style="width: 20%">
                          <h6 style="margin: 0; font-weight: bold;"><b>{{$data_unit_kompetensi->judul_unit}}<br>{{$data_unit_kompetensi->judul_unit}}</b></h6>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 20%">
                          <h6 style="margin: 0; font-weight: bold; ">Dapatkah Saya ................?</h6>
                        </td>
                        <td style="width: 3%">
                          <h6 style="margin: 0; font-weight: bold;">K</h6>
                        </td>
                        <td style="width: 3%">
                          <h6 style="margin: 0; font-weight: bold;">KB</h6>
                        </td>
                        <td style="width: 20%">
                          <h6 style="margin: 0; font-weight: bold;">Bukti yang relevan</h6>
                        </td>
                      </tr>
                    </thead>
                    <tbody style="font-size: 13px; page-break-inside:avoid;">
                      @foreach ($unit_kompetensi_sub as $index => $data_unit_kompetensi_sub)
                        @php
                        $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                            ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                            ->get();

                        $dd = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                            ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                            ->count();
                        $i = 1;
                        @endphp
                          
                          <tr>
                            <td colspan="4" style="padding-top: 0.4%;padding-bottom: 0%; border:1px solid; page-break-inside: avoid;">
                              <p style="margin: 0%; padding:0%;">{{$index+1}}. Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }} </p>
                              <p style="margin: 0%; padding:0%; padding-left:5%;">Kriteria Unjuk Kerja:</p>
                            </td>
                            {{-- <td rowspan="{{$dd+1}}" style="border:1px solid; page-break-inside: avoid;">
                              <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                            </td> --}}
                          </tr>
                          {{-- <tr>
                            <td>
                              <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                            </td>
                          </tr> --}}
                            @forelse ($unit_kompetensi_isi as $index2 => $isi)
                            @php
                                $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                                      ->where('user_asesi_id', $user_asesi_id)->first();
                                $j = 1;
                            @endphp
                            <tr>
                                <td style="padding-top: 0.4%;padding-bottom: 0%; border:1px solid; page-break-inside: avoid;">
                                  <p style="margin: 0%; padding:0%; padding-left:5%;">{{$index+1}}.{{$index2+1}} {{$isi->judul_unit_kompetensi_isi}}</p>
                                </td>
                                @isset($data_status_kompeten_asesi->status)
                                    @if ($data_status_kompeten_asesi->status == 'kompeten')
                                      <td colspan="0" class="text-center">
                                        <i class="fa fa-check"></i>
                                        <input type="hidden" value="{{$index2+1}}" hidden>
                                      </td>
                                      <td colspan="0">
                                        <input type="hidden" value="{{$index2+1}}" hidden>
                                      </td>
                                    @elseif($data_status_kompeten_asesi->status == 'belum kompeten')
                                      <td colspan="0">
                                        <input type="hidden" value="{{$index2+1}}" hidden>
                                      </td>
                                      <td colspan="0" class="text-center">
                                        <i class="fa fa-check"></i>
                                        <input type="hidden" value="{{$index2+1}}" hidden>
                                      </td>
                                    @endif
                                @else
                                  <td colspan="0">
                                    <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                  </td>
                                  <td colspan="0">
                                    <h6 style="margin: 0; font-weight: lighter;">?</h6>
                                  </td>
                                @endisset
                                <td>
                                  <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan {{$index+1}}</h6>
                                </td>
                              </tr>
                              @empty
                            @endforelse
                      @endforeach
                    </tbody>
                  </table>
              @endforeach
            </div>
        </div>
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