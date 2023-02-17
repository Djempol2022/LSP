@extends('layout.main-layout', ['title'=>'Asessment'])
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
                                <a href="{{ route('admin.PermohonanSertifikasi') }}">
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
                                <a href="{{ route('admin.DataAsesiAsessmentMandiri') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-vote-yea fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-extrabold mb-0">Assessment Mandiri</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.HalamanUmpanBalik') }}">
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
    </div>

    @endsection