@extends('layout.main-layout', ['title'=>'Jenis Soal'])
@section('main-section')
    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('asesor.KelolaSoal') }}">Kelola Soal</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Jenis Soal</li>
        </ol>
    </nav>

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    
                    @foreach ($jenis_soal as $jenis_soals)
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('asesor.KelolaSoal.BuatSoal',['id' => $id, 'jenis_soal_id' => $jenis_soals->id]) }}">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            @if ($jenis_soals->id == 1)
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa fa-list-alt fa-lg" style="color: white"></i>
                                            </div>
                                            @elseif($jenis_soals->id == 2)
                                            <div class="stats-icon green mb-2">
                                                <i class="fa fa-scroll fa-lg" style="color: white"></i>
                                            </div>
                                            @elseif($jenis_soals->id == 3)
                                            <div class="stats-icon grey mb-2">
                                                <i class="fa fa-vote-yea fa-lg" style="color: white"></i>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7" style="padding-right: calc(var(--bs-gutter-x) * 0.2)">
                                            <h6 class="font-extrabold mb-0">{{ $jenis_soals->jenis_soal }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
{{-- 
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    @foreach ($jenis_soal as $jenis_soals)
                    <div class="col-6 col-lg-3 col-md-8">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="{{ route('asesor.KelolaSoal.BuatSoal',['id' => $id, 'jenis_soal_id' => $jenis_soals->id]) }}">
                                <div class="row">
                                    <div class="col-md-2 col-xl-4 col-xxl-4">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-0">{{ $jenis_soals->jenis_soal }}</h6>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div> --}}
@endsection