@extends('layout.main-layout', ['title'=>"Permohonan Sertifikasi"])
@section('main-section')

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>


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
@section('script')
<script>

    $(document).ready(function () {
        $('#table-sertifikasi').DataTable();
    });
    let list_sertifikasi = [];
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
            // data:function(d){
            //     d.data_kabupaten = data_kabupaten;
            //     d.data_status_id = data_status_id;
            //     return d
            // }
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
                    return row.relasi_user.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/admin/detail-permohonan-sertifikasi-kompetensi/${row.id}">Detail</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });
</script>
@endsection
