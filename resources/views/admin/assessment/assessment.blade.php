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
                        <div class="col-md-4 mb-4">
                            <fieldset class="form-group">
                                <select class="form-control form-control-sm filter-jurusan" id="filter-jurusan">
                                    <option value="" selected disabled>Filter berdasarkan jurusan</option>
                                    <option value="">Semua Jurusan</option>
                                    @foreach ($jurusan as $data_jurusan)
                                    <option value="{{ $data_jurusan->id }}">{{ $data_jurusan->jurusan }}</option>
                                    @endforeach
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
    let data_jurusan = $('#filter-jurusan').val();
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
            data:function(d){
                d.jurusan_pengguna = data_jurusan;
                return d
            },
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
                    if(row.relasi_sertifikasi == null || row.relasi_sertifikasi.relasi_tanda_tangan_admin == null || row.relasi_sertifikasi.relasi_tanda_tangan_admin.status == null){
                        cek_asesi_sertifikasi = `<a href="#!" class="btn icon btn-sm icon-left btn-danger rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-times fa-xs"></i>
                                Belum Lengkap</a>`
                    }else{
                        cek_asesi_sertifikasi = `<a href="/admin/detail-rekapan-permohonan-sertifikasi/${row.id}">
                                                    <button class="btn btn-sm icon icon-left btn-success rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-check fa-xs"></i>Lengkap</button>
                                                </a>`
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
                    if(row.relasi_asesmen_mandiri == null || row.relasi_asesmen_mandiri.rekomendasi == null){
                        cek_asesi_asesmen_mandiri = `<a href="#!" class="btn icon btn-sm icon-left btn-danger rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-times fa-xs"></i>
                                Belum Lengkap</a>`
                    }else{
                        cek_asesi_asesmen_mandiri = `<a href="/admin/detail-rekapan-asesmen-mandiri/${row.id}/${row.jurusan_id}">
                                                        <button class="btn btn-sm icon icon-left btn-success rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-check fa-xs"></i>Lengkap</button>
                                                    </a>`
                    }
                    return cek_asesi_asesmen_mandiri;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_asesi_pemohon[row.id] = row;
                     let cek_asesi_umpan_balik;
                     if(row.relasi_user_asesi_ukom == null){
                        cek_asesi_umpan_balik = `<a href="#!" class="btn icon btn-sm icon-left btn-danger rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-times fa-xs"></i>
                                                    Belum Lengkap
                                                </a>`
                     }else{
                        cek_asesi_umpan_balik = `<a href="/admin/detail-rekapan-umpan-balik/${row.id}">
                                                        <button class="btn btn-sm icon icon-left btn-success rounded-pill" style="padding:2%; font-size:80%;"><i class="fa fa-check fa-xs"></i>Lengkap</button>
                                                </a>`
                                                
                     }
                     return cek_asesi_umpan_balik;
                }
            },
        ]
    });
    
    $(".filter-jurusan").on('change', function(){
            data_jurusan = $('#filter-jurusan').val();
        table_peserta_selesai_ujian.ajax.reload();
    })
</script>
@endsection