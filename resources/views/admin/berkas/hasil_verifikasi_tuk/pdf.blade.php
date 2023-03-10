<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PDF</title>
  <style>
    /** Define the margins of your page **/
    @page {
      margin: 150px 60px;
    }

    header {
      position: fixed;
      top: -150px;
      left: 0px;
      right: 0px;
      height: 50px;
    }

    table {
      border-left: 0.01em solid #000000;
      border-right: 0;
      border-top: 0.01em solid #000000;
      border-bottom: 0;
      border-collapse: collapse;
    }

    table td,
    table th {
      border-left: 0;
      border-right: 0.01em solid #000000;
      border-top: 0;
      border-bottom: 0.01em solid #000000;
    }
  </style>

</head>

<html lang="en">


<body style="font-family: sans-serif">

  <header>
    @include('layout.header-berkas-pdf')
  </header>

  <main>
    <div style="page-break-after: never;">
      <div class="text-center d-flex flex-column" style="text-align: center; font-size: 15px;">
        <h3 style="margin-bottom: -20px; margin-top: 0px;">HASIL VERIFIKASI TEMPAT UJI KOMPETENSI ( TUK )</h3>
        <h4 style="margin-bottom: -20px">{{ $hasil_verifikasi_tuk->relasi_skema_sertifikasi->judul_skema_sertifikasi }}
        </h4>
      </div>
      <div>
        <h6 style="font-weight: bolder; margin-left: 10px">A. SARANA DAN PRASARANA</h6>
        <table style="margin: 0 auto; font-size: 15px; width: 100%" cellpadding='5' cellspacing='0'>
          <thead>
            <tr style="text-align: center">
              <th rowspan="2">No.</th>
              <th rowspan="2">Sarana dan Prasarana</th>
              <th rowspan="2">Ada</th>
              <th rowspan="2">Tidak Ada</th>
              <th colspan="2">Kondisi</th>
            </tr>
            <tr>
              <th>Sesuai</th>
              <th>Tidak Sesuai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($hasil_verifikasi_tuk->relasi_sarana_prasarana as $item_sarana_prasarana)
              <tr>
                <td
                  rowspan="{{ $item_sarana_prasarana->relasi_sarana_prasarana_sub ? count($item_sarana_prasarana->relasi_sarana_prasarana_sub) : '' }}">
                  {{ $loop->iteration }}</td>
                <td>{{ $item_sarana_prasarana->sarana_prasarana }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              @if ($item_sarana_prasarana->relasi_sarana_prasarana_sub)
                @foreach ($item_sarana_prasarana->relasi_sarana_prasarana_sub as $item_sarana_prasarana_sub)
                  <tr>
                    <td>
                      {{ $loop->iteration }}. {{ $item_sarana_prasarana_sub->sarana_prasarana_sub }} <br />
                      @if ($item_sarana_prasarana_sub->relasi_sarana_prasarana_sub2)
                        <ol style="list-style: disc; margin: 0">
                          @foreach ($item_sarana_prasarana_sub->relasi_sarana_prasarana_sub2 as $item_sarana_prasarana_sub2)
                            <li>{{ $item_sarana_prasarana_sub2->sarana_prasarana_sub_2 }}</li>
                          @endforeach
                        </ol>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                @endforeach
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
