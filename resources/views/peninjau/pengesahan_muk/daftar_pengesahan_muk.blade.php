@extends('layout.main-layout', ['title' => 'Daftar Materi Uji Kompetensi'])
@section('main-section')
  <div class="container mt-5 jalur-file" id="profile-section">
    <div class="mt-5">
      
      <div class="mb-5">
        
        {{-- JADWAL UJI KOMPETENSI --}}
        <div class="col profil-section" style="margin-bottom: 0% !important">
          <div class="col pb-45">
            <div class="card">
              <div class="card-body">
                <table class="table table-striped"  id="table-tampil-pengesahan-muk">
                  <thead>
                      <tr> 
                        <th>No.</th>
                        <th>Materi Uji Kompetensi</th>
                        <th>Nama Asesor</th>
                        <th>Jenis Tes</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
  
      // DATATABLE MUK ASESOR PENINJAU
      list_daftar_pengesahan_muk = []
      const table_tampil_pengesahan_muk = $('#table-tampil-pengesahan-muk').DataTable({
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
        "responsive": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "{{route('peninjau.DataDaftarPengesahanMuk')}}",
            type: "POST",
            headers: 
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta, id) {
                    let i = 1;
                    console.log(id);
                    list_daftar_pengesahan_muk[row.id] = row;
                    return `<p class="font-semibold">${meta.row + 1}</p>`;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_daftar_pengesahan_muk[row.id] = row;
                    return `<p class="font-semibold">${row.relasi_muk.muk}</p>`
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_daftar_pengesahan_muk[row.id] = row;
                    let nama_asesor;
                    if(row.relasi_user_asesor == null || row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap == null){
                        nama_asesor = `<p class="font-semibold">Asesor belum ditentukan</p>`
                    }else{
                        nama_asesor = `<p class="font-semibold">${row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap}</p>`
                    }
                    return nama_asesor;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_daftar_pengesahan_muk[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.jenis_tes == null){
                        jenis_tes = '<p class="font-semibold">Jenis Tes belum ditentukan</p>'
                    }else{
                        if(row.relasi_pelaksanaan_ujian.jenis_tes == 1){
                            jenis_tes = `<p class="font-semibold">Pilihan Ganda</p>`
                        }else if(row.relasi_pelaksanaan_ujian.jenis_tes == 2){
                            jenis_tes = `<p class="font-semibold">Essay</p>`

                        }else if(row.relasi_pelaksanaan_ujian.jenis_tes == 3){
                            jenis_tes = `<p class="font-semibold">Wawancara</p>`
                        }
                    }
                    return jenis_tes;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_daftar_pengesahan_muk[row.id] = row;
                    let status_acc;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.acc == 0){
                        status_acc = '<p class="font-semibold" style="color:#bb0101">Belum disahkan</p>'
                    }else{
                        status_acc = '<p class="font-semibold" style="color:#3b7e13">Telah disahkan</p>';
                    }
                    return status_acc;
                }
            },
            {
                "targets": 5,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `
                                <div class="buttons">
                                    <a class="btn btn-sm icon icon-left btn-warning text-black rounded-pill fw-semibold"
                                    href="/peninjau/pengesahan-muk/${row.id}">
                                        <i class="fa fa-eye fa-sm"></i> Detail
                                    </a>
                                </div>
                                `
                    return tampilan;
                }
            },
        ]
    });
</script>
@endsection