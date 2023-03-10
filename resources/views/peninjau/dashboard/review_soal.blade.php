@extends('layout.main-layout', ['title' => 'Review Soal'])
@section('main-section')

<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
            href="{{ route('peninjau.Dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Review Soal</li>
    </ol>
</nav>

    <div class="container-fluid" style="margin-top: 20px;">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="col profil-section-title">
                            Detail Jadwal Ujian
                          </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Nama Asesor</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" value="{{$asesor->relasi_user_asesor_detail->nama_lengkap}}"readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Nama Peninjau</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                              <input class="form-control" value="{{$peninjau->relasi_user_peninjau_detail->nama_lengkap}}" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Jenis Soal</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                              <input class="form-control" value="@if($pelaksanaan_ujian->jenis_tes == 1)Pilihan Ganda @elseif($pelaksanaan_ujian->jenis_tes ==2) Essay @elseif ($pelaksanaan_ujian->jenis_tes == 3)Wawancara @endif" readonly>
                                            </div>
                                            <div class="col-md-3">
                                              <label>Materi Uji Kompetensi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" value="{{$muk->relasi_muk->muk}}" readonly>
                                              </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>

        {{-- <h5>Materi Uji Kompetensi {{$pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->muk}}</h5> --}}
        {{-- <h3 class="mt-5" id="timer"></h3> --}}
        <div class="row col gap-5 ms-0 mt-2">
                <div class="col-12 px-0" >
                        <div class="col-12 pernyataan">
                            <div class="card">
                            <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                
                                @foreach ($soal as $index => $data_soal)
                                {{-- <div class="accordion-item" style="color: black">
                                    <h2 class="accordion-header" id="headingSoal-{{$index}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#soal-{{$index}}" aria-expanded="true" aria-controls="soal-{{$index}}">
                                            Pertanyaan {{$index+1}}
                                        </button>
                                    </h2>
                                    <div id="soal-{{$index}}" class="accordion-collapse collapse @if ($index==0) show @else @endif" aria-labelledby="headingSoal-{{$index}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{$data_soal->pertanyaan}}</p>
                                        </div>

                                        @if ($pelaksanaan_ujian->jenis_tes == 1)
                                        @php
                                            $pilihan = explode(";", $data_soal->pilihan);
                                            $nomor_pilihan = 1;
                                            $alfabet = "A";
                                        @endphp
                                        @foreach (array_chunk($pilihan, 4) as $pilihan_tersedia)
                                        <div class="row">
                                            @foreach ($pilihan_tersedia as $multi_pilihan)
                                            <div class="col-lg-3 mb-1">
                                                <div class="input-group mb-3 shadow-textarea">
                                                    <span class="input-group-text">{{$alfabet++}}</span>
                                                    <textarea type="text" name="jawaban"
                                                        class="form-control input-text rounded-3" placeholder="Addon to left"
                                                        aria-label="Username" aria-describedby="basic-addon1">{{$multi_pilihan}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    @elseif ($pelaksanaan_ujian->jenis_tes == 2)
                                        <div class="col-lg-6">
                                            <div class="col-lg-12 mb-4">
                                                <textarea name="jawaban" cols="30" rows="10">{{$jawaban_asesi->jawaban}}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div> --}}
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item"style="color: black">
                                      <h2 class="accordion-header" id="panelsStayOpen-headingOne-{{$index}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne-{{$index}}" 
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Soal {{$index+1}}
                                        </button>
                                      </h2>
                                      <div id="panelsStayOpen-collapseOne-{{$index}}" class="accordion-collapse collapse @if ($index==0) show @else @endif" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="form-group has-icon-left">
                                                        <h4 class="card-title">{{$data_soal->pertanyaan}}</h4>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($pelaksanaan_ujian->jenis_tes == 1)
                                                @php
                                                    $pilihan = explode(";", $data_soal->pilihan);
                                                    $nomor_pilihan = 1;
                                                    $alfabet = "A";
                                                    $alfabet_modal = "A";
                                                @endphp
                                                @foreach ($pilihan as $pilihan_tersedia)
                                                <div class="row">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="form-group has-icon-left">
                                                            <ul class="list-group list-group-horizontal">
                                                                <li class="list-group-item">{{$alfabet++}}</li>
                                                                <li class="list-group-item">{{$pilihan_tersedia}}</li>
                                                            </ul>                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="form-group has-icon-left">
                                                            <h4 class="card-title">Jawaban : @if($data_soal->jawaban == 1) A @elseif ($data_soal->jawaban==2) B @elseif ($data_soal->jawaban==3)C @elseif ($data_soal->jawaban==4)D @endif</h4>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                                  
                                            @elseif ($pelaksanaan_ujian->jenis_tes == 2)
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="form-group has-icon-left">
                                                        <p class="card-title">Jawaban : {{$data_soal->jawaban}}</p>                                                    
                                                    </div>
                                                </div>
                                            </div>

                                            @elseif ($pelaksanaan_ujian->jenis_tes == 3)
                                            @endif
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                {{$soal->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <form action="{{route('asesi.SimpanJawabanAsesi')}}" method="POST" id="form-pengerjaan-soal">
                    @csrf
                    <div class="col-12 pernyataan">
                        <div class="col isi">
                            <p class="text-black fw-semibold">{{$soal->pertanyaan}}</p>
                            <div class="col row mt-4">
                                <input type="hidden" name="soal_id" value="{{$soal->id}}" hidden>
                                <input type="hidden" name="jadwal_id" value="{{$pelaksanaan_ujian->jadwal_uji_kompetensi_id}}" hidden>

                                @php
                                    $jawaban_asesi = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)->where('soal_id', $soal->id)->first() ?? new \App\Models\JawabanAsesi();
                                @endphp
                                
                                @if ($pelaksanaan_ujian->jenis_tes == 1)
                                    @php
                                        $pilihan = explode(";", $soal->pilihan);
                                        $nomor_pilihan = 1;
                                        $alfabet = "A";
                                    @endphp
                                    @foreach ($pilihan as $pilihan_tersedia)
                                        <div class="col-lg-6">
                                            <div class="col-lg-12 mb-4">
                                                <input class="form-check-input" type="radio" name="jawaban" value="{{$nomor_pilihan}}"
                                                    @if($jawaban_asesi->jawaban == $nomor_pilihan)
                                                        id="soal{{$nomor_pilihan}}" checked 
                                                    @else
                                                        id="soal{{$nomor_pilihan}}" 
                                                    @endif>
                                                <label class="form-check-label text-success" for="soal{{$nomor_pilihan}}" value="{{$nomor_pilihan++}}">
                                                    <span>
                                                        {{$alfabet++}}. {{$pilihan_tersedia}}
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @elseif ($pelaksanaan_ujian->jenis_tes == 2)
                                    <div class="col-lg-6">
                                        <div class="col-lg-12 mb-4">
                                            <textarea name="jawaban" cols="30" rows="10">{{$jawaban_asesi->jawaban}}</textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row gap-4 d-flex soal-next-btn mt-5 mx-0">
                        <a href="{{route('asesi.PengerjaanSoal',['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$sebelumnya ?? $soal_id, 'pelaksanaan_ujian_id'=>$pelaksanaan_ujian,'jenis_tes'=>$jenis_tes ])}}" 
                            class="btn btn-secondary tombol-primary-small col-6">< Sebelumnya</a>
                        <button type="submit" class="btn btn-secondary tombol-primary-small col-6">Selanjutnya >
                            <a href="{{route('asesi.PengerjaanSoal',
                                ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$selanjutnya ?? $soal_id, 'pelaksanaan_ujian_id'=>$pelaksanaan_ujian, 'jenis_tes'=>$jenis_tes ])}}"></a>
                        </button>
                    </div>
                </form> --}}
                </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        function hapusSoal(id){

            swal({
                title: "Yakin ?",
                text: "Menghapus Data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    $.ajax({
                url: "/asesor/hapus-soal/" + id,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 0) {
                        alert("Gagal Hapus")
                    } else if (response.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${response.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                        location.reload();
                    }
                }
            });
                } else {
                    //alert ('no');
                    return false;
                }
            });
        }
    </script>
@endsection