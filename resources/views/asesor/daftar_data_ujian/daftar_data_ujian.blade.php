@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
  <div class="container mt-5 jalur-file" id="profile-section">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
            href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Profil</li>
      </ol>
    </nav>

    <div class="mt-5">
      
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Jadwal Uji Kompetensi {{Auth::user()->nama_lengkap}}
        </div>
        <p class="py-3" style="font-size: 18px">Pada bagian ini, merupakan daftar jadwal Uji Kompetensi berdasarkan 
            Asesor dan Jurusan sekarang
        </p>

        {{-- JADWAL UJI KOMPETENSI --}}
        <div class="col profil-section" style="margin-bottom: 0% !important">
          <div class="col pb-45">
            <table class="table table-striped" id="table-peserta-selesai-ujian">
              <thead>
                  <tr>
                      <th>Nama Asesi</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>MUK</th>
                      <th>TUK</th>
                      <th>Jenis Tes</th>
                      <th>Kelas</th>
                      <th>Sesi</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="detailUjianWawancara" tabindex="-1" aria-labelledby="detailUjianWawancaraLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        {{-- <input type="hidden" name="id" hidden>
        @csrf --}}
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="detailUjianWawancaraLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row col justify-content-center d-flex text-black fw-semibold">
              <div class="col-11 my-1 sesi">Sesi : 1</div>
              <div class="col-11 my-1 jenis_tes">Jenis Tes : Tertulis</div>
              <div class="col-11 my-1 nama_asesor">Nama Asesor : Rika Eka Kembara, S.Kom</div>
              <div class="col-11 my-1 tanggal">Ujian dibuka pada Selasa, 08 Februari 2022, Pukul 07:00</div>
              <div class="col-11 my-1 tuk">TUK : Lab MULTIMEDIA</div>
              <div class="col-11 my-1 total_waktu">Waktu Pengerjaan : 120 Menit</div>
            </div>
          </div>
          <div class="modal-footer">
            {{-- <button type="submit" class="btn btn-primary tombol-primary-max">Mulai Ujian</button> --}}
            <a class="btn-block mulai_ujian"></a>
          </div>
        </div>
    </div>
  </div>
  

@endsection
@section('script')
<script>
    let list_unit_kompetensi = [];
    let list_peserta_uji_kompetensi = [];
    const table_peserta_selesai_ujian = $('#table-peserta-selesai-ujian').DataTable({
        "destroy": true,
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
        "responsive": true,
        ajax: {
            url: "/asesor/data-asesi-telah-selesai-ujian",
            type: "POST",
            // data:function(d){
            //     d.data_kabupaten = data_kabupaten;
            //     d.data_status_id = data_status_id;
            //     return d
            // }
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_user_asesi.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.tanggal;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_mulai;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_muk.muk;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.tempat;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 1){
                        jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
                                        <a class="text-black" href="#!">Pilihan Ganda</a>
                                    </span>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 2){
                        jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
                                        <a class="text-black" href="#!">Essay</a>
                                    </span>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
                        jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
                                        <a class="text-black" href="#!">Wawancara</a>
                                    </span>`
                    }
                    return jenis_tes;
                }
            },
            {
                "targets": 6,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.kelas;
                }
            },
            {
                "targets": 7,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.sesi;
                }
            },
            {
                "targets": 8,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 1){
                        jenis_tes = `<span class="badge btn-sm bg-info rounded-pill">
                                        <a class="text-white" href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}">Review Soal</a>
                                    </span>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 2){
                        jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
                                        <a href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}" class="text-white">
                                            Koreksi
                                        </a>
                                    </span>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
                        jenis_tes = `<span class="badge btn-sm bg-danger rounded-pill">
                                        <a class="text-white" href="#!" onclick=detailUjianWawancara(${row.id})>Mulai</a>
                                    </span>`
                    }
                    return jenis_tes;
                }
            },
        ]
    });

    function detailUjianWawancara(id) {
      const data_ujian_asesi = list_ujian_asesi[id];
      $("#detailUjianWawancara").modal('show');
    //   $("#detailUjianWawancaraLabel").text(data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_muk.muk);

    //   $(".sesi").text('Sesi : ' + data_ujian_asesi.sesi);
    //   $(".nama_asesor").text('Nama Asesor : ' + data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap);
    //   $(".tanggal").text('Tanggal : ' + data_ujian_asesi.tanggal);
    //   $(".tuk").text('TUK : ' + data_ujian_asesi.tempat);

    //   if(data_ujian_asesi.jenis_tes == 1){
    //     $(".jenis_tes").text('Jenis Tes : Pilihan Ganda');
    //   }else if(data_ujian_asesi.jenis_tes == 2){
    //     $(".jenis_tes").text('Jenis Tes : Essay');
    //   }
    //   var url ="/asesi/soal/";
      
    //   $(".total_waktu").text('Waktu Pengerjaan : ' + data_ujian_asesi.total_waktu + ' Menit');
    //   if(jenis_tes == 3){
    //   }else{
    //     $('.mulai_ujian').html('<a href='+url+data_ujian_asesi.jadwal_uji_kompetensi_id+'/'+data_ujian_asesi.relasi_jadwal_uji_kompetensi.relasi_soal.id+' class="btn btn-primary tombol-primary-max btn-block">Mulai Ujian</a>');
    //   }
    }

</script>
@endsection