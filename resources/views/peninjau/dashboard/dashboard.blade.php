@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
  <div class="container mt-5 jalur-file" id="profile-section">
    <div class="mt-5">
      
      <div class="mb-5">
        <div class="col profil-section-title">
            <p>Data 
        </div>
        {{-- JADWAL UJI KOMPETENSI --}}
        <div class="col profil-section" style="margin-bottom: 0% !important">
          <div class="col pb-45">
            <table class="table table-striped" id="table-peserta-pelaksanaan-uji-kompetensi">
              <thead>
                  <tr>
                      <th>MUK</th>
                      <th>Nama Asesor</th>
                      <th>Nama Peninjau</th>
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
      // DATATABLE MUK ASESOR PENINJAU
      const table_muk_asesor_peninjau = $('#table-muk-asesor-peninjau').DataTable({
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
            url: "/peninjau/data-muk-asesor-peninjau/" + id_jurusan.id,
            type: "POST",
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.jenis_tes == null){
                        jenis_tes = `<p class="text-danger">Jenis soal belum ditentukan</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 1){
                        jenis_tes = `<p>Pilihan Ganda</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 2){
                        jenis_tes = `<p>Essay</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 3){
                        jenis_tes = `<p>Wawancara</p>`
                    }
                    return jenis_tes;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span onclick="clickEditMukAsesorPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                        <a class="text-white" href="#!">Ubah</a>
                                    </span>
                                    <span id-jadwal-ukom="${row.id}" class="badge bg-danger rounded-pill hapus_jadwal_ukom">
                                        <a class="text-white" href="#!">Hapus</a>
                                    </span>`
                }
            },
        ]
    });
</script>
@endsection