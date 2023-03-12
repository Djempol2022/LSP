@extends('layout.main-layout', ['title' => 'Umpan Balik'])
@section('main-section')
    {{-- JALUR FILE --}}

    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    class="text-black text-decoration-none"href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('admin.Assessment') }}">Asessment</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Umpan Balik</li>
        </ol>
    </nav>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.Assessment.HalamanBuatKomponenUmpanBalik') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-receipt fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-bold">Buat Umpan Balik</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <a href="{{ route('admin.Assessment.DaftarKomponenUmpanBalikAsesi') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <i class="fa fa-vote-yea fa-lg"></i>
                                        </div>
                                        <div class="ms-3 name">
                                            <h6 class="font-extrabold mb-0">Data Umpan Balik Asesi</h6>
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
