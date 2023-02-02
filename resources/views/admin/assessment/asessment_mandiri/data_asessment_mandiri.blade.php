@extends('layout.main-layout', ['title' => 'Asessment Mandiri'])
@section('main-section')
  <div class="page-content">
    <section class="section">
        <div class="card">
            <div class="row">
                <div class="col-md-6 stretch-card">
                    <div class="card-body">
                    </div>
                </div>
                <div class="col-md-6 stretch-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a id="tambah_edit_sertifikasi"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table-sertifikasi">
                    <thead>
                        <tr>
                            <th>Jurusan</th>
                            <th>Nama Asesi</th>
                            <th>Asal Sekolah/Institusi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        @foreach ($status_kompeten_asesi as $user_asesi)
        {{$user_asesi->user_asesi_id}}<br>
        @endforeach

        <div class="card-body">
          <table class="table table-striped" id="table-sertifikasi">
            <thead>
              <tr>
                <th>Jurusan</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </section>
  </div>
@endsection
{{-- @section('script')
<script>
    $(document).ready(function () {
        $('#table-sertifikasi').DataTable();
    });
    let list_sertifikasi = [];
    let data_jurusan = $('#filter-jurusan').val()
    const table_sertifikasi = $('#table-sertifikasi').DataTable({
        "pageLength": 10,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
            url: "{{ route('admin.DataPermohonanSertifikasiKompetensi') }}",
            type: "POST",
            data: function (d) {
                d.data_jurusan = data_jurusan;
                return d
            }
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.relasi_jurusan.jurusan;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.relasi_institusi.nama_institusi;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return "Status";
                }
            },
            {
                "targets": 4,
                "class": "none",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/admin/detail-permohonan-sertifikasi-kompetensi/${row.user_id}">Detail</a>
                                </span>`
            return tampilan;
          }
        },
      ]
    });
    
    $(".filter").on('change', function () {
        data_jurusan = $('#filter-jurusan').val()
        nama_jurusan = $("#filter-jurusan option:selected").text();
        table_sertifikasi.ajax.reload(null, false)
        $('#tambah_edit_sertifikasi').html(
            `<span class="badge bg-info rounded-pill"><a class="text-white" href="/admin/data-sertifikasi-jurusan/${data_jurusan}">Data Sertifikasi ${nama_jurusan}</a></span>`
            );
    })

</script>
@endsection --}}
