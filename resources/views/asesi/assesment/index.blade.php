@extends('layout.main-layout', ['title' => 'Assesment'])
@section('main-section')
  <div class="container-fluid">
    {{-- JALUR FILE --}}
    <nav class="jalur-file mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
            href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item text-primary active">Assesment</li>
      </ol>
    </nav>

    {{-- ASSESMENT MANDIRI --}}
    <div class="col-auto card-assesment mb-5">
      <h5>Formulir Assesment Mandiri</h5>
      <p>Isi formulir assesment mandiri dengan menekan tombol di bawah, untuk melanjutkan assesment </p>
      @php
          $sertifikasis = \App\Models\Sertifikasi::where('user_id', Auth::user()->id)->first() ?? new \App\Models\Sertifikasi();
          $acc_admin = \App\Models\TandaTangan::with('relasi_sertifikasi')
                      ->where('sertifikasi_id', $sertifikasis->id)->where('status', 1)
                      ->count();
          $asesmen_mandiri = \App\Models\AsesmenMandiri::where('user_asesi_id', Auth::user()->id)->where('rekomendasi', 1)->count();
          $jawaban_asesi = \App\Models\JawabanAsesi::where('user_asesi_id', Auth::user()->id)->count();
      @endphp
      
      {{-- @if($acc_admin == 0)
      <button type="button" class="btn btn-primary tombol-primary-small" disabled>Assesment Mandiri</button>
      @else --}}
      <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal" data-bs-target="#assesmentMandiri">Assesment Mandiri</button>
      {{-- @endif --}}
    </div>

    {{-- TABEL MATERI UJI KOMPETENSI --}}
    <div class="col-auto card-assesment">
      <h5>Materi Uji Kompetensi</h5>
      <p>Daftar Materi Uji Kompetensi LSP {{Auth::user()->relasi_jurusan->jurusan}}</p>
      <table class="table" 
      @if ($asesmen_mandiri === 1)
      id="table-pelaksanaan-ujian">
      @elseif($asesmen_mandiri === 0) 
      @endif
        <thead>
          <tr>
            <th class="px-4" style="width: 70%" scope="col">Materi Uji Kompetensi</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    
    {{-- FORMULIR UMPAN BALIK --}}
    <div class="col-auto card-assesment my-5">
      <h5>Formulir Umpan Balik</h5>
      <p>Isi formulir umpan balik dengan menekan tombol di bawah, untuk memberi ulasan mengenai assesment </p>
      @if ($jawaban_asesi == 0)
      <button type="button" class="btn btn-primary tombol-primary-small" disabled>Umpan Balik</button>    
      @else
      <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal" data-bs-target="#umpanBalik">Umpan Balik</button>
      @endif
    </div>
  </div>

  {{-- MODAL ASSESMENT MANDIRI --}}
  @include('asesi.assesment._form-modal-assesment-mandiri')

  {{-- MODAL DETAIL UJIAN --}}
  @include('asesi.assesment._form-modal-detail-ujian')

  {{-- MODAL UMPAN BALIK --}}
  @include('asesi.assesment._form-modal-umpan-balik')



@section('script')
  <script>
    //   TTD
    let canvas;
    let signaturePad;

    function setupSignatureBox() {
      canvas = document.getElementById('sig');
      signaturePad = new SignaturePad(canvas);

      var ratio = Math.max(window.devicePixelRatio || 1, 1);

      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      var w = window.innerWidth;
      if (canvas.width == 0 && canvas.height == 0) {
        if (w > 1200) {
          canvas.width = 496 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 1200 && w > 992) {
          canvas.width = 334 * ratio;
          canvas.height = 200 * ratio;
        } else if (w < 992) {
          canvas.width = 399 * ratio;
          canvas.height = 200 * ratio;
        }
      } else {
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
      }
      canvas.getContext("2d").scale(ratio, ratio);
      signaturePad.clear();
    }

    function clear() {
      signaturePad.clear();
    }

    function sentToController() {
      if (signaturePad.isEmpty()) {
        let ttdData = data.relasi_sertifikasi.ttd_asesi;
        document.getElementById('ttd').value = ttdData;
      } else {
        let ttdData = signaturePad.toDataURL();
        document.getElementById('ttd').value = ttdData;
      }
    }

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);


    let list_ujian_asesi = [];
    const table_pelaksanaan_ujian = $('#table-pelaksanaan-ujian').DataTable({
      //   "pageLength": 10,
      //   "lengthMenu": [
      //     [10, 25, 50, 100, -1],
      //     [10, 25, 50, 100, 'semua']
      //   ],
      "bLengthChange": false,
      "bFilter": false,
      "bInfo": true,
      "processing": true,
      "bServerSide": true,
      "responsive": true,
      ajax: {
        url: "{{ route('asesi.AsesiMateriUjiKompetensi') }}",
        type: "POST",
      },
      columnDefs: [{
          targets: '_all',
          visible: true
        },
        {
          "targets": 0,
          "class": "text-nowrap my-1 px-4",
          "render": function(data, type, row, meta) {
            list_ujian_asesi[row.id] = row;
            let tampilan;
            // if(row.jenis_tes == 1){
            //   tampilan = `${row.relasi_jadwal_uji_kompetensi.relasi_muk.muk}<span class="badge btn-sm bg-warning rounded-pill">
            //                   <a class="text-white" href="#!">Pilihan Ganda</a>
            //               </span>`
            // }else if(row.jenis_tes == 2){
            //   tampilan = `${row.relasi_jadwal_uji_kompetensi.relasi_muk.muk}<span class="badge btn-sm bg-warning rounded-pill">
            //                   <a class="text-white" href="#!">Essay</a>
            //               </span>`
            // }else if(row.jenis_tes == 3){
            //   tampilan = `${row.relasi_jadwal_uji_kompetensi.relasi_muk.muk}<span class="badge btn-sm bg-warning rounded-pill">
            //                   <a class="text-white" href="#!">Wawancara</a>
            //               </span>`
            // }
            return row.relasi_jadwal_uji_kompetensi.relasi_muk.muk;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap text-center",
          "render": function(data, type, row, meta) {
            let tampilan;
            if(row.waktu_mulai < moment().format('YYYY-MM-DD HH:mm:ss') && row.waktu_selesai > moment().format('YYYY-MM-DD HH:mm:ss')){
                  if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.user_asesi_id == {!! json_encode(Auth::user()->id) !!} && 
                      row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.jadwal_uji_kompetensi_id == row.jadwal_uji_kompetensi_id && 
                      row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.status_ujian_berlangsung == 0) {
                    tampilan = `<button class="btn btn-warning my-1 text-black btn-sm rounded-4" data-bs-toggle="modal" onclick="detailUjian(${row.id})">
                                  Detail Ujian
                                </button>`  
                  }
                  else if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.user_asesi_id == {!! json_encode(Auth::user()->id) !!} && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.jadwal_uji_kompetensi_id == row.jadwal_uji_kompetensi_id && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.status_ujian_berlangsung == 1){
                    tampilan = `<button class="btn btn-warning my-1 text-black btn-sm rounded-4" data-bs-toggle="modal" onclick="detailUjian(${row.id})">
                                  Ujian Berlangsung
                                </button>`
                  }
                  else if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.user_asesi_id == {!! json_encode(Auth::user()->id) !!} && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.jadwal_uji_kompetensi_id == row.jadwal_uji_kompetensi_id && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.status_ujian_berlangsung == 2){
                    tampilan = `<span class="btn btn-sm bg-danger text-white rounded-4">Selesai</span> 
                                <a href="/asesi/review-jawaban/${row.jadwal_uji_kompetensi_id}" class="btn btn-warning my-1 text-black btn-sm rounded-4">
                                  Review Jawaban
                                </a>`
                  }else if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.user_asesi_id == {!! json_encode(Auth::user()->id) !!} && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.jadwal_uji_kompetensi_id == row.jadwal_uji_kompetensi_id && 
                          row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.status_ujian_berlangsung == 3){
                    tampilan = `<button class="btn btn-warning my-1 text-black btn-sm rounded-4" data-bs-toggle="modal" onclick="detailUjian(${row.id}, ${row.jenis_tes})">
                                  Wawancara
                                </button>`
                  }
              }
              else if(row.waktu_mulai > moment().format('YYYY-MM-DD HH:mm:ss') && row.waktu_selesai > moment().format('YYYY-MM-DD HH:mm:ss')){
                  tampilan = `<span class="btn btn-sm bg-info text-white rounded-4">Belum di Mulai</span>`
              }
              else if(row.waktu_mulai < moment().format('YYYY-MM-DD HH:mm:ss') && row.waktu_selesai < moment().format('YYYY-MM-DD HH:mm:ss')){
                  tampilan = `<span class="btn btn-sm bg-danger text-white rounded-4">Selesai</span> 
                              <a href="/asesi/review-jawaban/${row.jadwal_uji_kompetensi_id}" class="btn btn-warning my-1 text-black btn-sm rounded-4">
                                  Waktu Lewat
                              </a>`
              }
            
            return tampilan;
          }
        },
      ]
    });

    // DETAIL UJIAN ASESI
    function detailUjian(id, jenis_tes) {
      const data_ujian_asesi = list_ujian_asesi[id];
      $("#detailUjian").modal('show');
      $("#detailUjianLabel").text(data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_muk.muk);

      $(".sesi").text('Sesi : ' + data_ujian_asesi.sesi);
      $(".nama_asesor").text('Nama Asesor : ' + data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap);
      $(".tanggal").text('Tanggal : ' + data_ujian_asesi.tanggal);
      $(".tuk").text('TUK : ' + data_ujian_asesi.tempat);

      if(data_ujian_asesi.jenis_tes == 1){
        $(".jenis_tes").text('Jenis Tes : Pilihan Ganda');
      }else if(data_ujian_asesi.jenis_tes == 2){
        $(".jenis_tes").text('Jenis Tes : Essay');
      }
      var url ="/asesi/soal/";
      
      $(".total_waktu").text('Waktu Pengerjaan : ' + data_ujian_asesi.total_waktu + ' Menit');
      if(jenis_tes == 3){
      }else{
        $('.mulai_ujian').html('<a href='+url+data_ujian_asesi.jadwal_uji_kompetensi_id+'/'+data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_soal.id+' class="btn btn-primary tombol-primary-max btn-block">Mulai Ujian</a>');
      }
    }

    // FORM PENGAJUAN ASESMEN MANDIRI
    $('#form-PengajuanAsesmenMandiri').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('label.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('label.' + prefix + '_error').text(val[0]);
                        // $('span.'+prefix+'_error').text(val[0]);
                    });
                } 
                else if(data.status == 1){
                    swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        buttons: true,
                        successMode: true,
                    }),
                  location.reload();
                }
            }
        });
    });

  </script>
@endsection
@endsection
 