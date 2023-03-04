@extends('layout.main-layout', ['title' => 'Data Umpan Balik'])
@section('main-section')
    {{-- JALUR FILE --}}

    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-black text-decoration-none" href="{{ route('admin.Dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-black text-decoration-none" href="{{ route('admin.Assessment') }}">
                    Asessment
                </a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-black text-decoration-none" href="{{ route('admin.Assessment.HalamanUmpanBalik') }}">
                    Umpan Balik
                </a>
            </li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
                Data Umpan Balik Asesi
            </li>
        </ol>
    </nav>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table-data-umpan-balik-asesi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Asesi</th>
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
      let list_umpan_balik_asesi = [];
        const table_umpan_balik_asesi = $('#table-data-umpan-balik-asesi').DataTable({
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
            "searching": false,
            ajax: {
                url: "{{ route('admin.DataUmpanBalikAsesi') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            columnDefs: [{
                    targets: '_all',
                    visible: true
                },
                {
                    "targets": 0,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        let i = 1;
                        list_umpan_balik_asesi[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-wrap",
                    "render": function(data, type, row, meta) {
                        list_umpan_balik_asesi[row.id] = row;
                        return row.nama_lengkap;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        let tampilan;
                        tampilan = `<span onclick="editKomponenUmpanBalik(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#!">Edit</a>
                                </span>
                                <span id-komponen-umpan-balik = "${row.id}" class="badge bg-danger rounded-pill hapus_komponen_umpan_balik">
                                    <a class="text-white" href="#!">Hapus</a>
                                </span>`
                        return tampilan;
                    }
                },
            ]
        });
</script>
@endsection
