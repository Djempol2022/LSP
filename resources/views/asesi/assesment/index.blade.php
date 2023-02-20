@extends('layout.main-layout', ['title' => 'Assesment'])
@section('main-section')
  <div class="container-fluid">
    {{-- JALUR FILE --}}
    <nav class="jalur-file mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
            href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item text-primary active">Assesment</li>
      </ol>
    </nav>

    {{-- ASSESMENT MANDIRI --}}
    <div class="col-auto card-assesment mb-5">
      <h5>Formulir Assesment Mandiri</h5>
      <p>Isi formulir assesment mandiri dengan menekan tombol di bawah, untuk melanjutkan assesment </p>
      <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal"
        data-bs-target="#assesmentMandiri">Assesment Mandiri</button>
    </div>
    {{-- TABEL MATERI UJI KOMPETENSI --}}
    <div class="col-auto card-assesment">
      <h5>Materi Uji Kompetensi</h5>
      <p>Daftar Materi Uji Kompetensi LSP Multimedia</p>
      <table class="table" id="table-muk">
        <thead>
          <tr>
            <th class="px-4" style="width: 70%" scope="col">Materi Uji Kompetensi</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    {{-- FORMULIR UMPAN BALIK --}}
    <div class="col-auto card-assesment my-5">
      <h5>Formulir Umpan Balik</h5>
      <p>Isi formulir umpan balik dengan menekan tombol di bawah, untuk memberi ulasan mengenai assesment </p>
      <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal"
        data-bs-target="#umpanBalik">Umpan Balik</button>
    </div>
  </div>

  {{-- MODAL ASSESMENT MANDIRI --}}
  @include('asesi.assesment._form-modal-assesment-mandiri')

  {{-- MODAL DETAIL UJIAN --}}
  @include('asesi.assesment._form-modal-detail-ujian')

  {{-- MODAL UMPAN BALIK --}}
  @include('asesi.assesment._form-modal-umpan-balik')



@section('script')
  <script>
    //   TTD
    let canvas;
    let signaturePad;

    function setupSignatureBox() {
      canvas = document.getElementById('sig');
      signaturePad = new SignaturePad(canvas);

      var ratio = Math.max(window.devicePixelRatio || 1, 1);

      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      var w = window.innerWidth;
      if (canvas.width == 0 && canvas.height == 0) {
        if (w > 1200) {
          canvas.width = 496 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 1200 && w > 992) {
          canvas.width = 334 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 992) {
          canvas.width = 399 * ratio;
          canvas.height = 200 * ratio;
        }
      } else {
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
      }
      canvas.getContext("2d").scale(ratio, ratio);
      signaturePad.clear();
    }

    function clear() {
      signaturePad.clear();
    }

    function sentToController() {
      if (signaturePad.isEmpty()) {
        let ttdData = data.relasi_sertifikasi.ttd_asesi;
        document.getElementById('ttd').value = ttdData;
      } else {
        let ttdData = signaturePad.toDataURL();
        document.getElementById('ttd').value = ttdData;
      }
    }

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);



    // table muk
    $(document).ready(function() {
      $('#table-muk').DataTable();
    });
    let list_muk = [];
    const table_muk = $('#table-muk').DataTable({
      //   "pageLength": 10,
      //   "lengthMenu": [
      //     [10, 25, 50, 100, -1],
      //     [10, 25, 50, 100, 'semua']
      //   ],
      "bLengthChange": false,
      "bFilter": false,
      "bInfo": true,
      "processing": true,
      "bServerSide": true,
      "responsive": true,
      ajax: {
        url: "{{ route('asesi.MateriUjiKompetensi') }}",
        type: "POST",
      },
      columnDefs: [{
          targets: '_all',
          visible: true
        },
        {
          "targets": 0,
          "class": "text-nowrap my-1 px-4",
          "render": function(data, type, row, meta) {
            list_muk[row.id] = row;
            return row.muk;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap text-center",
          "render": function(data, type, row, meta) {
            let tampilan;
            tampilan = `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailUjian(${row.id})">Detail
                Ujian</button>`
            return tampilan;
          }
        },
      ]
    });

    // detail ujian
    function detailUjian(id) {
      const data_muk = list_muk[id];
      $("#detailUjian").modal('show');
      $("#detailUjianLabel").text(data_muk.muk);
      $(".sesi").text('Sesi : ' + data_muk.relasi_jadwal_uji_kompetensi.sesi);
      $(".jenis_tes").text('Jenis Tes : ' + data_muk.relasi_jadwal_uji_kompetensi.jenis_tes);
      //   $("#formDetailUjian [name='id']").val(id)
      //   $("#formDetailUjian .muk").val(data_muk.muk);

      //   $('#formDetailUjian').on('submit', function(e) {
      //     e.preventDefault();
      //     $.ajax({
      //       url: $(this).attr('action'),
      //       method: $(this).attr('method'),
      //       data: new FormData(this),
      //       processData: false,
      //       dataType: 'json',
      //       contentType: false,
      //       beforeSend: function() {
      //         $(document).find('label.error-text').text('');
      //       },
      //       success: function(data) {
      //         if (data.status == 0) {
      //           $.each(data.error, function(prefix, val) {
      //             $('label.' + prefix + '_error').text(val[0]);
      //             // $('span.'+prefix+'_error').text(val[0]);
      //           });
      //         } else if (data.status == 1) {
      //           $("#detailUjian").modal('hide');
      //           swal({
      //               title: "Berhasil",
      //               text: `${data.msg}`,
      //               icon: "success",
      //               buttons: true,
      //               successMode: true,
      //             }),
      //             table_muk.ajax.reload(null, false);
      //         }
      //       }
      //     });
      //   });
    }
  </script>
@endsection
@endsection
