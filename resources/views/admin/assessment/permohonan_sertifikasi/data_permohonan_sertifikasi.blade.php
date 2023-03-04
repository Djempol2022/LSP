@extends('layout.main-layout', ['title' => 'Permohonan Sertifikasi'])
@section('main-section')
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{route('admin.Assessment')}}">Asessment</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Permohonan Sertifikasi</li>
    </ol>
</nav>
  <div class="page-content">
    <section class="section">
        <div class="card">
            <div class="row">
                <div class="col-md-6 stretch-card">
                    <div class="card-body">
                        <select class="form-control form-control-sm filter" id="filter-jurusan">
                            <option value="">Semua Jurusan</option>
                            @foreach ($jurusan as $data_jurusan)
                            <option value="{{ $data_jurusan->id }}">{{ $data_jurusan->jurusan }}</option>
                            @endforeach
                        </select>
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
                            <th>No</th>
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
      </div>
    </section>
  </div>
@endsection
@section('script')
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
        "responsive": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
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
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    let i = 1;
                    list_sertifikasi[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.relasi_jurusan.jurusan;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    return row.relasi_user.relasi_institusi.nama_institusi;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_sertifikasi[row.id] = row;
                    let status;
                    if(row.relasi_tanda_tangan_admin == null || row.relasi_tanda_tangan_admin.status == null){
                        status = `<h6 class="text-danger" style="font-size:0.8rem;" >Belum di Verifikasi</h6>`;
                    }
                    else{
                        status = `<h6 class="text-success" style="font-size:0.8rem;">Telah di Verifikasi</h6>`;
                    }
                    return status;
                }
            },
            {
                "targets": 5,
                "class": "none",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span class="badge bg-info rounded-pill">
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
        if(data_jurusan == ""){
            $('#tambah_edit_sertifikasi').html("");
        }else{
            $('#tambah_edit_sertifikasi').html(
                `<span class="badge bg-info rounded-pill"><a class="text-white" href="/admin/data-sertifikasi-jurusan/${data_jurusan}">Data Sertifikasi ${nama_jurusan}</a></span>`
                );
        }
    })

</script>
@endsection
