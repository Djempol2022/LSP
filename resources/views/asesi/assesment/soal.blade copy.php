@extends('layout.main-layout', ['title' => 'Assesment'])
@section('soal-section')
    <div class="container-fluid" style="margin-top: 60px;">

        {{$pelaksanaan_ujian->waktu_mulai}} - {{$pelaksanaan_ujian->waktu_selesai}}
        
        <div id="demo"> </div>
        <div id="countdown"> </div>
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
        <p>ID USER : {{Auth::user()->id}}</p>
        <p>ID SOAL : {{$soal->id}}</p>
        {{-- <h3 class="mt-5" id="timer"></h3> --}}
        <div class="row col gap-5 ms-0 mt-4">
            
                <div class="col-lg-auto soal px-0">
                {{-- <form action="{{route('asesi.SimpanJawabanAsesi')}}" method="POST" id="form-pengerjaan-soal"> --}}
                    @csrf
                    <div class="col-12 pernyataan">
                        <div class="col isi">
                            @php
                                $pilihan = explode(";", $soal->pilihan);
                                $nomor_pilihan = 1;
                                $alfabet = "A";
                                // $pertanyaan_ke = 1;
                                $jawaban_asesi = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)->where('soal_id', $soal->id)->first();
                            @endphp
                            {{-- <h5>Pertanyaan Nomor {{$pertanyaan_ke++}}</h5> --}}
                            <p class="text-black fw-semibold">{{$soal->pertanyaan}}</p>
                            <div class="col row mt-4">
                                <input type="text" name="soal_id" value="{{$soal->id}}">
                                <input type="text" name="jadwal_id" value="{{$pelaksanaan_ujian->jadwal_uji_kompetensi_id}}">
                                @foreach ($pilihan as $pilihan_tersedia)
                                    <div class="col-lg-6">
                                        <div class="col-lg-12 mb-4">
                                            <input class="form-check-input" type="radio" name="jawaban" value="{{$nomor_pilihan}}"
                                                @if($jawaban_asesi->jawaban ?? '' == $nomor_pilihan)
                                                    id="soal{{$nomor_pilihan}}" checked 
                                                @else
                                                    id="soal{{$nomor_pilihan}}" 
                                                @endif>
                                            <label class="form-check-label text-success" for="soal{{$nomor_pilihan}}" value="{{$nomor_pilihan++}}">
                                                <span>
                                                    {{$alfabet++}}.{{$pilihan_tersedia}}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row gap-4 d-flex soal-next-btn mt-5 mx-0">
                        <a href="{{route('asesi.PengerjaanSoal',['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$sebelumnya ?? $soal_id ])}}" 
                            class="btn btn-secondary tombol-primary-small col-6">< Sebelumnya</a>
                        <button type="submit" class="btn btn-secondary tombol-primary-small col-6">Selanjutnya >
                            <a href="{{route('asesi.PengerjaanSoal',
                                ['jadwal_id'=>$pelaksanaan_ujian->jadwal_uji_kompetensi_id, 'soal_id'=>$selanjutnya ?? $soal_id ])}}"></a>
                        </button>
                    </div>
                {{-- </form> --}}
                </div>

            <div class="col-lg-auto nomor d-flex">
                <div class="col-12 row justify-content-center mt-4 text-center">
                    <div class="col-12 gap-3 row mt-4 jarak-nomor-soal">
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">02</div>
                        <div class="col-lg-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-lg-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-success text-white p-2 btn-number">01</div>
                        <div class="col-md-auto bg-secondary text-white p-2 btn-number">02</div>
                        <div class="col-lg-auto bg-secondary text-white p-2 btn-number">01</div>
                        <div class="col-lg-auto bg-secondary text-white p-2 btn-number">01</div>
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
                        <button type="button" class="btn btn-primary tombol-primary-max ms-4 mb-5">Selesai</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Set the date we're counting down to
        var x = setInterval(function() {
        var countDownDate = new Date().getTime();
        // var countDownDate = new Date("{{$pelaksanaan_ujian->waktu_mulai}}").getTime();
        
        // Update the count down every 1 second
        
          // Get today's date and time
          var now = new Date("{{$selesai}}").getTime();
        
          // Find the distance between now and the count down date
          var distance = now - countDownDate;
        
          // Time calculations for days, hours, minutes and seconds
        //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          document.getElementById("demo").innerHTML = hours + " Jam " + minutes + " Menit " + seconds + " Detik ";
        
          // If the count down is finished, write some text
          if (distance < 0) {
            // location.reload();
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>
@endsection
@section('script')
<script>
    function submitForm(){
        $('#form-pengerjaan-soal').submit();
    }
</script>
<!-- <script>
        CountDownTimer('{{$pelaksanaan_ujian->updated_at}}', 'countdown');
        function CountDownTimer(dt, id)
        {
            var end = new Date();
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {
    
                    clearInterval(timer);
                    document.getElementById(id).innerHTML = '<b>TUGAS SUDAH BERAKHIR</b> ';
                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);
    
                document.getElementById(id).innerHTML = days + 'days ';
                document.getElementById(id).innerHTML += hours + 'hrs ';
                document.getElementById(id).innerHTML += minutes + 'mins ';
                document.getElementById(id).innerHTML += seconds + 'secs';
                document.getElementById(id).innerHTML +='<h2>TUGAS BELUM BERAKHIR</h2>';
            }
            timer = setInterval(showRemaining, 1000);
        }
    </script> -->
@endsection
