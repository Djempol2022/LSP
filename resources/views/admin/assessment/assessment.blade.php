@extends('layout.main-layout', ['title' => 'Asessment'])
@section('main-section')
    {{-- JALUR FILE --}}
    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Asessment</li>
        </ol>
    </nav>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    {{-- <div class="col-6 col-lg-3 col-md-8">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.PermohonanSertifikasi') }}">
                                <div class="row">
                                    <div class="col-md-2 col-xl-4 col-xxl-4">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Permohonan Sertifikasi Kompetensi</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-8">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DataAsesiAsessmentMandiri') }}">
                                <div class="row">
                                    <div class="col-md-2 col-xl-4 col-xxl-4">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Assessment Mandiri</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-8">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('admin.DaftarJurusan') }}">
                                <div class="row">
                                    <div class="col-md-2 col-xl-4 col-xxl-4">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">Umpan Balik</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.Assessment.PermohonanSertifikasi') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-scroll fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-bold">Permohonan Sertifikasi</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.Assessment.DataAsesiAsessmentMandiri') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-vote-yea fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-extrabold mb-0">Asesmen Mandiri</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.Assessment.HalamanUmpanBalik') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-retweet fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-extrabold mb-0">Umpan Balik</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="card">
            <div class="card-header">
                <div class="col profil-section-title">Rekap Berkas</div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <fieldset class="form-group">
                                <select class="form-select filter-role-pengguna" id="role-id">
                                    <option value="" disabled selected>Filter berdasarkan Jurusan</option>
                                    <option value="">Semua Pengguna</option>
                                    <option value="2">Peninjau</option>
                                    <option value="3">Asesor</option>
                                    <option value="4">Asesi</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <table class="table table-striped" id="rekap-berkas-asesi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Asesi</th>
                                <th>Permohonan Sertifikasi</th>
                                <th>Asesmen Mandiri</th>
                                <th>Umpan Balik</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            </div>
        </div>
@endsection
@section('script')
<script>
    let list_asesi_pemohon = [];
    const table_peserta_selesai_ujian = $('#rekap-berkas-asesi').DataTable({
        "destroy": true,
        "rowspan": [0, 2],
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        "searching": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "{{route('admin.DataRekapanBerkas')}}",
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
                    list_asesi_pemohon[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_asesi_pemohon[row.id] = row;
                    return row.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_asesi_pemohon[row.id] = row;
                    let cek_asesi_sertifikasi;
                    if(row.relasi_sertifikasi != null){
                        cek_asesi_sertifikasi = `<a href="/admin/detail-rekapan-permohonan-sertifikasi/${row.id}">
                                                    <button class="btn btn-sm icon icon-left btn-success"><i class="fa fa-check-circle"></i>Lengkap</button>
                                                </a>`
                    }else{
                        cek_asesi_sertifikasi = `<a href="#!" class="btn icon btn-sm icon-left btn-danger"><i class="fa fa-times-circle"></i>
                                Tidak Lengkap</a>`
                    }
                    return cek_asesi_sertifikasi;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_asesi_pemohon[row.id] = row;
                    let cek_asesi_asesmen_mandiri;
                    if(row.relasi_asesmen_mandiri !== null){
                        cek_asesi_asesmen_mandiri = `<a href="/admin/detail-rekapan-asesmen-mandiri/${row.id}/${row.jurusan_id}">
                                                        <button class="btn btn-sm icon icon-left btn-success"><i class="fa fa-check-circle"></i>Lengkap</button>
                                                    </a>`
                    }else{
                        cek_asesi_asesmen_mandiri = `<a href="#!" class="btn icon btn-sm icon-left btn-danger"><i class="fa fa-times-circle"></i>
                                Tidak Lengkap</a>`
                    }
                    return cek_asesi_asesmen_mandiri;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_asesi_pemohon[row.id] = row;
                     let status_koreksi;
                     return "Tes"
                }
            },
        ]
    });
</script>
@endsection