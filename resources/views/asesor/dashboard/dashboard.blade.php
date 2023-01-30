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
        <div class="col profil-section">
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
                      <th>Aksi</th>
                  </tr>
              </thead>
          </table>
          </div>
        </div>
      </div>

      {{-- DAFTAR UNIT KOMPETENSI --}}
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Unit Kompetensi
        </div>
        <p class="py-3" style="font-size: 18px">Daftar Unit Kompetensi berdasarkan Asesor dan Jurusan sekarang
        </p>
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
@endsection
@section('script')
<script>
    let list_unit_kompetensi = [];
    let list_peserta_uji_kompetensi = [];
    const table_data_unit_kompetensi_jurusan_asesor = $('#table-data-unit-kompetensi-jurusan-asesor').DataTable({
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
                    list_unit_kompetensi[row.id] = row;
                    return row.kode_unit;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.judul_unit;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
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
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.relasi_jadwal_uji_kompetensi.relasi_user_asesi.relasi_user_asesi.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.tanggal;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.waktu_mulai;
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
                    return row.tempat;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.jenis_tes;
                }
            },
            {
                "targets": 6,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.kelas;
                }
            },
            {
                "targets": 7,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return row.sesi;
                }
            },
            {
                "targets": 8,
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
</script>
@endsection