@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
  <div class="container mt-5 jalur-file" id="profile-section">
    <div class="mt-5">
      
      <div class="mb-5">
        <div class="col profil-section-title">
          Jadwal Materi Uji Kompetensi {{$muk->muk}}
        </div>
        {{-- JADWAL UJI KOMPETENSI --}}
        <div class="col profil-section" style="margin-bottom: 0% !important">
          <div class="col pb-45">
            <table class="table table-striped" id="table-peserta-pelaksanaan-uji-kompetensi">
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
                      <th>Status Soal</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
          </table>
          </div>
        </div>
      </div>

      {{-- DAFTAR UNIT KOMPETENSI --}}
      <div class="mb-5">
        <div class="col profil-section-title">
          Unit Kompetensi Jurusan {{$muk->relasi_jurusan->jurusan}}
        </div>
        <div class="col profil-section">
          <div class="col pb-45">
            <table class="table table-striped" id="table-data-unit-kompetensi-jurusan-asesor">
              <thead>
                  <tr>
                      <th>Kode Unit</th>
                      <th>Judul Unit</th>
                      <th style="word-wrap: break-word;">Jenis Standar(Standar Khusus/Standar
                        Internasional/SKKNI)</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>

   {{-- MODAL DAFTAR NAMA ASESI PESERTA UJI KOMPETENSI --}}
   <div class="modal fade" id="modalDaftarAsesiPesertaUkom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Daftar Asesi Mengikuti Uji Kompetensi</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <table class="table table-striped" id="table-data-asesi-peserta-uji-kompetensi">
                    <thead>
                        <tr>
                            <th>Nama Asesi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
    let list_peserta_selesai_ujian = [];
    let list_peserta_uji_kompetensi = [];
    const table_data_unit_kompetensi_jurusan_asesor = $('#table-data-unit-kompetensi-jurusan-asesor').DataTable({
        "destroy": true,
        // "pageLength": 10,
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'semua']
        // ],
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
            url: "/asesor/data-unit-kompetensi-jurusan-asesor",
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
                    list_peserta_selesai_ujian[row.id] = row;
                    return row.kode_unit;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_selesai_ujian[row.id] = row;
                    return row.judul_unit;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_selesai_ujian[row.id] = row;
                    return row.jenis_standar;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `
                                <span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/asesor/tambah-elemen-unit-kompetensi/${row.id}">Tambah Elemen</a>
                                </span>
                                `
                    return tampilan;
                }
            },
        ]
    });

    const table_peserta_pelaksanaan_ujian = $('#table-peserta-pelaksanaan-uji-kompetensi').DataTable({
        "destroy": true,  
        // "pageLength": 10,
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'semua']
        // ],
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
            url: "/asesor/data-peserta-pelaksanaan-uji-kompetensi",
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
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let data_asesi;
                    if(row.relasi_jadwal_uji_kompetensi.relasi_user_asesi == null){
                        data_asesi = `<p style="color:red">Asesi Belum ditentukan</p>`
                    }else{
                        data_asesi = `<a href="#!" onclick="lihatDaftarAsesi(${row.relasi_jadwal_uji_kompetensi.id})">Lihat Daftar Asesi</a>`;
                        // data_asesi = row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi.nama_lengkap;
                    }
                    return data_asesi;
                }
            },
            {
                "targets": 1,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let data_tanggal;
                    if(row.tanggal == null){
                        data_tanggal = `<p style="color:red">Tanggal Belum ditentukan</p>`
                    }else{
                        data_tanggal = moment(row.tanggal).format("dddd, D MMMM y");
                    }
                    return data_tanggal;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let data_waktu;
                    if(row.waktu_mulai == null){
                        data_waktu = `<p style="color:red">Waktu Belum ditentukan</p>`
                    }else{
                        data_waktu = moment(row.waktu_mulai).format("HH:mm:ss") +` s/d `+ moment(row.waktu_selesai).format("HH:mm:ss");
                    }
                    return data_waktu;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_muk.muk;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if(row.relasi_tuk == null){
                        data_tempat = `<p style="color:red">Tempat Belum ditentukan</p>`
                    }else{
                        data_tempat = row.relasi_tuk.nama_tuk;
                    }
                    return data_tempat;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if(row.jenis_tes == null){
                        data_jenis_tes = `<p style="color:red">Jenis Tes belum ditentukan</p>`
                    }else if(row.jenis_tes == 1){
                        data_jenis_tes = `<p style="color:green">Pilihan Ganda</p>`
                    }else if(row.jenis_tes == 2){
                        data_jenis_tes = `<p style="color:green">Essay</p>`
                    }else if(row.jenis_tes == 3){
                        data_jenis_tes = `<p style="color:green">Wawancara</p>`
                    }
                    return data_jenis_tes;
                }
            },
            {
                "targets": 6,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if(row.kelas == null){
                        data_kelas = `<p style="color:red">Kelas Belum ditentukan</p>`
                    }else{
                        data_kelas = row.kelas;
                    }
                    return data_kelas;
                }
            },
            {
                "targets": 7,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if(row.sesi == null){
                        data_sesi = `<p style="color:red">Sesi Belum ditentukan</p>`
                    }else{
                        data_sesi = row.sesi;
                    }
                    return data_sesi;
                }
            },
            {
                "targets": 8,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if(row.acc == 0){
                        data_status_soal = `<p style="color:red">Soal belum di acc peninjau</p>`
                    }else{
                        data_status_soal = `<p style="color:green">Acc</p>`;
                    }
                    return data_status_soal;
                }
            },
            {
                "targets": 9,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `
                                <span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/asesor/tambah-elemen-unit-kompetensi/${row.id}">Detail</a>
                                </span>
                                `
                    return tampilan;
                }
            },
        ]
    });

    function lihatDaftarAsesi(id){
    $('#modalDaftarAsesiPesertaUkom').modal('show');

    let list_asesi_peserta_uji_kompetensi = [];
        const asesi_peserta_uji_kompetensi = $('#table-data-asesi-peserta-uji-kompetensi').DataTable({
            "destroy": true,
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'semua']
            ],
            "searching":false,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            "responsive": true,
            ajax: {
                url: "/asesor/data-list-asesi-peserta-uji-kompetensi/"+id,
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
                        list_asesi_peserta_uji_kompetensi[row.id] = row;
                        return row.relasi_user_asesi.nama_lengkap;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-nowrap text-center",
                    "render": function (data, type, row, meta) {
                        list_asesi_peserta_uji_kompetensi[row.id] = row;
                        let status;
                        if(row.status_ujian_berlangsung == 0){
                            status = `<p>Belum Mengerjakan</p>`
                        }
                        else if(row.status_ujian_berlangsung == 1){
                            status = `<p>Sedang Berlangsung</p>`
                        }
                        else if(row.status_ujian_berlangsung == 2){
                            status = `<p class="text-success">Telah Selesai</p>`
                        } 
                        else if(row.status_ujian_berlangsung == 3){
                            status = `<p class="text-warning">Sesi Wawancara</p>`
                        }
                        return status;
                    }
                },
            ]
        });

    }
</script>
@endsection