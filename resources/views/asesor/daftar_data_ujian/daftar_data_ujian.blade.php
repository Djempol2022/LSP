@extends('layout.main-layout', ['title' => 'Data Ujian'])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="col profil-section-title">
                Daftar Nama Asesi Selesai Mengikuti Ujian
              </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped" id="table-peserta-selesai-ujian">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Asesi</th>
                          <th>MUK</th>
                          <th>Jenis Tes</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="col profil-section-title">
                Sesi Wawancara
              </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped" id="table-peserta-ujian-wawancara">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Asesi</th>
                          <th>Tanggal</th>
                          <th>Waktu</th>
                          <th>MUK</th>
                          <th>Jenis Tes</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

  <div class="modal fade" id="modal-DetailUjianWawancara" tabindex="-1" aria-labelledby="detailUjianWawancaraLabel" aria-hidden="true">
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
              <div class="col-11 my-1 sesi"></div>
              <div class="col-11 my-1 jenis_tes"></div>
              <div class="col-11 my-1 nama_asesor"></div>
              <div class="col-11 my-1 tanggal"></div>
              <div class="col-11 my-1 tuk"></div>
              <div class="col-11 my-1 total_waktu"></div>
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
    $("#table-peserta-selesai-ujian").rowspanizer({vertical_align: 'middle'});
    let list_unit_kompetensi = [];
    const table_peserta_selesai_ujian = $('#table-peserta-selesai-ujian').DataTable({
        
        "destroy": true,
        // "pageLength": 10,
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'semua']
        // ],
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
            url: "/asesor/data-asesi-telah-selesai-ujian",
            type: "POST",
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
                    list_unit_kompetensi[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_user_asesi.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_muk.muk;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 1){
                        jenis_tes = `<a class="text-black" href="#!">Pilihan Ganda</a>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 2){
                        jenis_tes = `<a class="text-black" href="#!">Essay</a>`
                    }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
                        jenis_tes = `<a class="text-black" href="#!">Wawancara</a>`
                    }
                    return jenis_tes;
                }
            },
            // {
            //     "targets": 4,
            //     "class": "text-wrap text-center",
            //     "render": function (data, type, row, meta) {
            //         list_unit_kompetensi[row.id] = row;
            //          let status_koreksi;
            //         if(row.relasi_jadwal_uji_kompetensi.relasi_status_koreksi == null){
            //             status_koreksi = `<a class="text-danger" href="#!">Belum Dikoreksi</a>`
            //         }else if(row.relasi_jadwal_uji_kompetensi.relasi_status_koreksi != null){
            //             status_koreksi = `<a class="text-success" href="#!">Telah Dikoreksi</a>`
            //         }
            //         return status_koreksi;
            //     }
            // },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    let status_koreksi;
                    if(row.status_kompeten == 0 ){
                        status_koreksi = `<a class="text-danger" href="#!">Belum Dikoreksi</a>`
                    }else if(row.status_kompeten == 1){
                        status_koreksi = `<a class="text-success" href="#!">Telah Dikoreksi</a>`
                    }
                    return status_koreksi;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    let jenis_tes;
                    if(row.status_kompeten == 0){
                        if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 1){
                            jenis_tes = `<span class="badge btn-sm bg-info rounded-pill">
                                        <a class="text-black" href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}">Review</a>
                                    </span>`
                        }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 2 || row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
                            jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
                                            <a href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}" class="text-black">
                                                Koreksi
                                            </a>
                                        </span>`
                        }
                    }else if(row.status_kompeten == 1){
                        jenis_tes = `<span class="badge btn-sm bg-info rounded-pill">
                                            <a href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}" class="text-black">
                                                Hasil Koreksi
                                            </a>
                                        </span>`
                    }
                    return jenis_tes;
                }
            },
            // {
            //     "targets": 5,
            //     "class": "text-wrap text-center",
            //     "render": function (data, type, row, meta) {
            //         list_unit_kompetensi[row.id] = row;
            //         let jenis_tes;
            //         if(row.relasi_jadwal_uji_kompetensi.relasi_status_koreksi == null){
            //             if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 1){
            //                 jenis_tes = `<span class="badge btn-sm bg-info rounded-pill">
            //                             <a class="text-black" href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}">Review</a>
            //                         </span>`
            //             }else if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 2 || row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
            //                 jenis_tes = `<span class="badge btn-sm bg-warning rounded-pill">
            //                                 <a href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}" class="text-black">
            //                                     Koreksi
            //                                 </a>
            //                             </span>`
            //             }
            //         }else if(row.relasi_jadwal_uji_kompetensi.relasi_status_koreksi != null){
            //             jenis_tes = `<span class="badge btn-sm bg-info rounded-pill">
            //                                 <a href="/asesor/koreksi-jawaban/${row.jadwal_uji_kompetensi_id}/${row.relasi_user_asesi.id}" class="text-black">
            //                                     Hasil Koreksi
            //                                 </a>
            //                             </span>`
            //         }
            //         return jenis_tes;
            //     }
            // },
        ]
    });

    let list_pelaksanaan_ujian_wawancara = [];
    const table_peserta_ujian_wawancara = $('#table-peserta-ujian-wawancara').DataTable({
        "destroy": true,
        // "pageLength": 10,
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'semua']
        // ],
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
            url: "/asesor/data-asesi-ujian-wawancara",
            type: "POST",
            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
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
                    let i = 1;
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    return meta.row + 1;
                }
            }, 
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    return row.relasi_user_asesi.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    let tanggal;
                    return moment(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.tanggal).format('dddd, D MMMM Y');
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    return moment(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_mulai).format('HH:mm:ss') +' s/d '+ moment(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_selesai).format('HH:mm:ss');
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_muk.muk;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
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
                    list_pelaksanaan_ujian_wawancara[row.id] = row;
                    let jenis_tes;
                          if(row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_mulai < moment().format('YYYY-MM-DD HH:mm:ss') && row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_selesai > moment().format('YYYY-MM-DD HH:mm:ss')){
                              if (
                                row.status_ujian_berlangsung == 3){
                                jenis_tes = `<button class="btn btn-warning my-1 text-black btn-sm rounded-4" data-bs-toggle="modal" onclick="detailUjianWawancara(${row.id})">
                                              Detail
                                            </button>`
                              }
                          }
                          else if(
                            row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_mulai > moment().format('YYYY-MM-DD HH:mm:ss') && row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_selesai > moment().format('YYYY-MM-DD HH:mm:ss')){
                            jenis_tes = `<span class="btn btn-sm bg-info text-white rounded-4">Belum di Mulai</span>`
                          }
                          else if(
                            row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_mulai < moment().format('YYYY-MM-DD HH:mm:ss') && 
                            row.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.waktu_selesai < moment().format('YYYY-MM-DD HH:mm:ss')){
                            jenis_tes = `<a href="#!" class="btn btn-warning my-1 text-black btn-sm rounded-4">
                                              Sesi Berakhir
                                          </a>`
                          }
                            return jenis_tes;
                        }
                    },
            ]
    });

    function detailUjianWawancara(id) {
      const data_ujian_wawancara_asesi = list_pelaksanaan_ujian_wawancara[id];
      $("#modal-DetailUjianWawancara").modal('show');
      $("#detailUjianWawancaraLabel").text(data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_muk.muk);

      $(".sesi").text('Sesi : ' + data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.sesi);
      $(".nama_asesor").text('Nama Asesor : ' + data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap);
      $(".tanggal").text('Tanggal : ' + moment(data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.tanggal).format('dddd, D MMMM Y'));
      $(".tuk").text('Tempat Uji Kompetensi : ' + data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.relasi_tuk.nama_tuk);

      if(data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.jenis_tes == 3){
        $(".jenis_tes").text('Jenis Tes : Wawancara');
      }
      var url ="/asesor/soal-wawancara/";
      
      $(".total_waktu").text('Waktu Pengerjaan : ' + data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_pelaksanaan_ujian.total_waktu + ' Menit');
      
      $('.mulai_ujian').html('<a href='+url+data_ujian_wawancara_asesi.jadwal_uji_kompetensi_id+'/'+data_ujian_wawancara_asesi.relasi_jadwal_uji_kompetensi.relasi_soal.id+'/'+data_ujian_wawancara_asesi.user_asesi_id+' class="btn btn-primary tombol-primary-max btn-block">Mulai Ujian Wawancara</a>');
    }

</script>
@endsection