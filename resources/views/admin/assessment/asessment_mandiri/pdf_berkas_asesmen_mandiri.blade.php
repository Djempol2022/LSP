<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>

    <style>
        .page-break {
            page-break-after: always;
        }

    </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">
    {{-- lembar 1 --}}
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

    <div style="text-align: center; font-size: 15px;">
        <h4 style="margin-top: 10px;">FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI
        </h4>
    </div>
    <div style="padding: 5%; padding-top:0% ">
    {{-- LEMBAR 1 --}}

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
    @foreach ($unit_kompetensi as $data_unit_kompetensi)
    <div class="col">
      <div class="row col unit-kompetensi">
        <span>Unit Kompetensi</span><br>
        <div class="col row fs-6">
          <div class="col-lg-auto unit-kode" style="width: auto !important">{{ $data_unit_kompetensi->kode_unit }}</div>
          <div class="col-lg-auto unit-isi">{{ $data_unit_kompetensi->judul_unit }}
          </div>
        </div>
      </div>
    </div>
    
    <div class="my-4 fw-bold fs-6">Dapatkah Saya ?</div>
    <div class="col mb-5">
      <ol class="list-group list-group-numbered">
          @php
          $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
              ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
              ->get();
          @endphp
        @foreach ($unit_kompetensi_sub as $data_unit_kompetensi_sub)
          @php
          $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
              ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
              ->get();
          @endphp

          <li class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
            <div class="ms-2 me-auto ">
              Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}
              <div class="py-1">Kriteria Kerja:</div>
              <div class="row col mx-3">
              @forelse ($unit_kompetensi_isi as $isi)
                @php
                    $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                          ->where('user_asesi_id', $user_asesi_id)->first();
                @endphp
                <div class="col mb-3">
                  <div class="row mt-3">
                    <div class="col-2" style="width: 2%">{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                    </div>
                    <div class="col-2">{{ $isi->judul_unit_kompetensi_isi }}
                    </div>
                    {{-- <input type="hidden" name="unit_kompetensi_sub[]" value="{{$isi->unit_kompetensi_sub_id}}" hidden>
                    <input type="hidden" name="unit_kompetensi_isi[]" value="{{$isi->id}}" hidden> --}}

                    <div class="col-2">
                      @isset($data_status_kompeten_asesi->status)
                      @if($data_status_kompeten_asesi->status === 'kompeten')
                          <label class="form-check-label text-success" for="kompeten-{{ $isi->id }}">Kompeten</label>
                      @else
                          <label class="form-check-label text-danger" for="kompeten-{{ $isi->id }}">Belum Kompeten</label>
                      @endif
                      @endisset
                    </div>

                  </div>
                </div>
                <hr>
              @empty
                Kosong
              @endforelse
              </div>
              <div class="col mt-4">
                <div class="mb-3 fw-semibold fs-6">
                  <label for="bukti_relevan-{{ $data_unit_kompetensi_sub->id }}"
                    class="form-label">Bukti yang relevan</label>
                  <p class="form-label">{{ $data_unit_kompetensi_sub->bukti_relevan ?? '' }}</p>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
  @endforeach
    {{-- @foreach ($unit_kompetensi as $data_unit_kompetensi)
    @php
    $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
        ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)
        ->get();
    @endphp
      <table border="1" style="font-size: 13px; width: 100%; margin-bottom:2%" cellspacing=0 cellpadding=5>
        <thead>
          <tr>
            <td style="width: 7%">
              <h6 style="margin: 0; font-weight: lighter;">Unit Kompetensi</h6>
            </td>
            <td colspan="3" style="width: 20%">
              <h6 style="margin: 0; font-weight: lighter;">TIK.MM01.007.01
                Memilih dan Memakai Software Dan Hardware Untuk Multimedia</h6>
            </td>
          </tr>
          <tr>
            <td style="width: 20%">
              <h6 style="margin: 0; font-weight: lighter;">Dapatkah Saya ................?</h6>
            </td>
            <td style="width: 3%">
              <h6 style="margin: 0; font-weight: lighter;">K</h6>
            </td>
            <td style="width: 3%">
              <h6 style="margin: 0; font-weight: lighter;">KB</h6>
            </td>
            <td style="width: 20%">
              <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
            </td>
          </tr>
        </thead>
        <tbody style="font-size: 13px" >
          @foreach ($unit_kompetensi_sub as $data_unit_kompetensi_sub)
            @php
            $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                ->get();
            @endphp
              
              <tr>
                <td colspan="4">
                  <p>Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}</p>
                  <p>Kriteria Unjuk Kerja:</p>
                </td>
                @forelse ($unit_kompetensi_isi as $isi)
                @php
                    $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                          ->where('user_asesi_id', $user_asesi_id)->first();
                @endphp
                <tr>
                    <td>
                      {{$isi->judul_unit_kompetensi_isi}}
                    </td>
                    <td colspan="0">
                      <h6 style="margin: 0; font-weight: lighter;">K</h6>
                    </td>
                    <td colspan="0">
                      <h6 style="margin: 0; font-weight: lighter;">KB</h6>
                    </td>
                    <td colspan="0" ></td>
                  </tr>
                  @empty
                  @endforelse
                </tr>
                <td>
                  <h6 style="margin: 0; font-weight: lighter;">Bukti yang relevan</h6>
                </td>
              
          @endforeach
        </tbody>
      </table>
    @endforeach --}}
    </div>

</body>

</html>
