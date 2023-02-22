@extends('layout.main-layout', ['title' => 'Pengerjaan Soal'])
@section('soal-section')
    <div class="container-fluid" style="margin-top: 20px;" id="halaman-ujian">
        {{-- JALUR FILE --}}
        {{-- <nav class="jalur-file mb-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Assesment') }}">Assesment</a></li>
                <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Desain Grafis (Fotografi dan
                    Videografi) </li>
            </ol>
        </nav> --}}
        <h5>Materi Uji Kompetensi {{$pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->muk}}</h5>
        <div id="demo"> </div>
        {{-- <h3 class="mt-5" id="timer"></h3> --}}
        <div class="row col gap-5 ms-0 mt-2">
            
                <div class="col-lg-auto soal px-0">
                <form action="{{route('asesi.SimpanJawabanAsesi')}}" method="POST" id="form-pengerjaan-soal">
                    @csrf
                    <div class="col-12 pernyataan">
                        <div class="col isi">
                            {{-- <h5>Pertanyaan Nomor {{$i}}</h5> --}}
                            <p class="text-black fw-semibold">{{$soal->pertanyaan}}</p>
                            <div class="col row mt-4">
                                <input type="hidden" name="soal_id" value="{{$soal->id}}" hidden>
                                <input type="hidden" name="jadwal_id" value="{{$pelaksanaan_ujian->jadwal_uji_kompetensi_id}}" hidden>
                                <input type="hidden" name="jenis_tes" value="{{$pelaksanaan_ujian->jenis_tes}}" hidden>

                                @php
                                    $jawaban_asesi = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)->where('soal_id', $soal->id)->first() ?? new \App\Models\JawabanAsesi();
                                @endphp
                                
                                @if ($pelaksanaan_ujian->jenis_tes == 1)
                                    @php
                                        $pilihan = explode(";", $soal->pilihan);
                                        $nomor_pilihan = 1;
                                        $alfabet = "A";
                                        // $pertanyaan_ke = 1;
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
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 mb-4">
                                            <textarea name="jawaban" rows="2" class="form-control input-text rounded-3">{{$jawaban_asesi->jawaban}}</textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row gap-4 d-flex soal-next-btn mt-5 mx-0">
                        <a href="{{route('asesi.PengerjaanSoal',['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$sebelumnya ?? $soal_id])}}" 
                            class="btn btn-secondary tombol-primary-small col-6">< Sebelumnya</a>
                        <button type="submit" class="btn btn-secondary tombol-primary-small col-6">Selanjutnya >
                            <a href="{{route('asesi.PengerjaanSoal',
                                ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$selanjutnya ?? $soal_id ])}}"></a>
                        </button>
                    </div>
                </form>
                </div>

            <div class="col-lg-auto nomor d-flex">
                <div class="col-12 row justify-content-center mt-4 text-center">
                    <div class="col-12 gap-3 row mt-4 jarak-nomor-soal">
                        @foreach ($semua_soal as $index => $data_semua_soal)
                            @php
                                $jawaban_asesi_penomoran = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)
                                    ->where('soal_id', $data_semua_soal->id)->first() ?? new \App\Models\JawabanAsesi();
                                $i = $index+1;
                            @endphp
                                
                                <div class="col-md-auto 
                                @if($jawaban_asesi_penomoran->soal_id == $data_semua_soal->id && $jawaban_asesi_penomoran->jawaban != null) 
                                bg-success 
                                @else 
                                bg-secondary 
                                @endif 
                                text-white p-2 btn-number">
                                <a class="text-white" href="{{route('asesi.PengerjaanSoal',
                                        ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$data_semua_soal->id])}}">{{$i}}
                                    </a>
                                </div>
                        @endforeach
                    
                    </div>

                    <div class="col-12 row my-4 text-black gap-2" style="margin-left: 4%">
                        <div class="col-lg-auto p-0 mb-4 nomor-expl-terjawab">
                            <div class="col-lg-auto keterangan-warna-nomor-soal">
                                <span
                                    class="bg-success text-success nomor-text-expl rounded-2 me-1 col-lg-auto">-</span>Terjawab
                            </div>
                        </div>
                        <div class="col-lg-auto p-0 mb-4 nomor-expl-blm-terjawab">
                            <div class="col-lg-auto keterangan-warna-nomor-soal">
                                <span
                                    class="bg-secondary text-success nomor-text-expl rounded-2 me-1 col-lg-auto">-</span>Belum
                                Terjawab
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <a href="#" class="btn btn-primary tombol-primary-max ms-4 mb-5 click-selesai-mengerjakan-soal">Selesai</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
<script>
    // Set the date we're counting down to
    var url = "{{ route('asesi.Assesment') }}";
    var x = setInterval(function() {
    var countDownDate = new Date().getTime();
    var now = new Date("{{$pelaksanaan_ujian->waktu_selesai}}").getTime();
    
    // Find the distance between now and the count down date
    var distance = now - countDownDate;
    
    // Time calculations for days, hours, minutes and seconds
    //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = "<h6><b>" + hours + " Jam " + minutes + " Menit " + seconds + " Detik </b></h4>";
        
        let jadwal_id = @json($pelaksanaan_ujian);
    // If the count down is finished, write some text
        if (distance < 0) {
            swal({
                title: "Waktu Pengerjaan Soal Habis",
                icon: "info",
            }),
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Waktu Ujian Selesai";
            document.getElementById("halaman-ujian").innerHTML = "";
            setTimeout(function() {window.location.href = "/asesi/waktu-ujian-habis/"+ jadwal_id.jadwal_uji_kompetensi_id}, 2000);
            return false;
        }
    });
    
    let jadwal_id = @json($pelaksanaan_ujian);
    $('.click-selesai-mengerjakan-soal').on('click', function(){
        
        swal({
            title: "Yakin ?",
            text: "Selesai Mengerjakan Soal ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "/asesi/selesai-mengerjakan-soal/"+ jadwal_id.jadwal_uji_kompetensi_id,
                    type: "POST",
                    headers: 
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                                setTimeout(function() {window.location.href=url}, 2000);
                                return false;
                        }
                    }
                });
            } else {
                return false;
            }
        });
    });

    </script>
@endsection
