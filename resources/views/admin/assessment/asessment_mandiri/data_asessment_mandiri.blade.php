@extends('layout.main-layout', ['title' => 'Asessment Mandiri'])
@section('main-section')
<div class="container mt-5 jalur-file">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{route('admin.Assessment')}}">Asessment</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Asessment Mandiri</li>
    </ol>
</nav>
</div>
  <div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped fs-100" id="table-asesmen-mandiri">
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
    let list_asesmen_mandiri = [];
    let data_jurusan = $('#filter-jurusan').val()
    const table_asesmen_mandiri = $('#table-asesmen-mandiri').DataTable({
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
            url: "{{ route('admin.DataPengajuanAsesmenMandiri') }}",
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
                    list_asesmen_mandiri[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_asesmen_mandiri[row.id] = row;
                    return row.relasi_user_asesi.relasi_jurusan.jurusan;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_asesmen_mandiri[row.id] = row;
                    return row.relasi_user_asesi.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_asesmen_mandiri[row.id] = row;
                    return row.relasi_user_asesi.relasi_institusi.nama_institusi;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_asesmen_mandiri[row.id] = row;
                    let status_rekomendasi;
                    if(row.rekomendasi == 1)
                    {
                        status_rekomendasi = `<h6 class="text-success" style="font-size:0.8rem;">Dapat dilanjutkan</h6>`
                    }else if(row.rekomendasi == 0){
                        status_rekomendasi = `<h6 class="text-danger" style="font-size:0.8rem;">Tidak dapat dilanjutkan</h6></p>`
                    }else if(row.rekomendasi == null){
                        status_rekomendasi = `<h6 class="text-black" style="font-size:0.8rem;">Belum diputuskan</h6>`
                    }
                    return status_rekomendasi;
                }
            },
            {
                "targets": 5,
                "class": "none",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/admin/detail-data-pengajuan-asesmen-mandiri-acc/${row.user_asesi_id}/${row.relasi_user_asesi.jurusan_id}">Detail</a>
                                </span>`
            return tampilan;
          }
        },
      ]
    });
    
    $(".filter").on('change', function () {
        data_jurusan = $('#filter-jurusan').val()
        nama_jurusan = $("#filter-jurusan option:selected").text();
        table_asesmen_mandiri.ajax.reload(null, false)
        $('#tambah_edit_sertifikasi').html(
            `<span class="badge bg-info rounded-pill"><a class="text-white" href="/admin/data-sertifikasi-jurusan/${data_jurusan}">Data Sertifikasi ${nama_jurusan}</a></span>`
            );
    })

</script>
@endsection
