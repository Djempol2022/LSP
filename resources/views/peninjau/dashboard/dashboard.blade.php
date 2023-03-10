@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
  <div class="container mt-2 jalur-file" id="profile-section">
    <div class="mt-2">
      
      <div class="mb-3">
        
        {{-- JADWAL UJI KOMPETENSI --}}
        <div class="col profil-section" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Jadwal Materi Uji Kompetensi
            </div>
            <div class="col pb-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table-peserta-pelaksanaan-uji-kompetensi">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>MUK</th>
                                    <th>Nama Asesor</th>
                                    <th>Nama Peninjau</th>
                                    <th>Jenis Tes</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> 
            </div>
        </div>

        <div class="col profil-section" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Review Soal
            </div>
            <div class="col pb-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table-tampil-muk-asesor-peninjau">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>MUK</th>
                                    <th>Nama Asesor</th>
                                    <th>Nama Peninjau</th>
                                    <th>Jenis Tes</th>
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
                                    <th>No</th>
                                    <th>Nama Asesi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL JADWAL UJI KOMPETENSI --}}
    <div class="modal fade" id="detailUjiKompetensi" tabindex="-1" aria-labelledby="detailUjiKompetensiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailUjiKompetensiLabel"></h1>
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
                <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Kembali</button>
            </div>
            </div>
        </div>
    </div>
      

@endsection
@section('script')
<script>
    // DATATABLE MUK ASESOR PENINJAU
    let list_tampil_muk_asesor_peninjau = []
    const table_tampil_muk_asesor_peninjau = $('#table-tampil-muk-asesor-peninjau').DataTable({
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
        "responsive": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "/peninjau/tampil-data-muk-asesor-peninjau/"+{!! json_encode(Auth::user()->jurusan_id) !!},
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
                "render": function (data, type, row, meta) {
                    let i = 1;
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    let cek_asesor;
                    if(row.relasi_user_asesor == null || row.relasi_user_asesor.relasi_user_asesor_detail == null){
                        cek_asesor = `Asesor belum ditentukan`
                    }else{
                        cek_asesor = row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                    }
                    return cek_asesor;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    let cek_peninjau;
                    if(row.relasi_user_peninjau == null || row.relasi_user_peninjau.relasi_user_peninjau_detail == null){
                        cek_peninjau = `Peninjau belum ditentukan`
                    }else{
                        cek_peninjau = row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                    }
                    return cek_peninjau;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
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
                "targets": 5,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `
                                <div class="buttons">
                                    <a class="btn btn-sm btn-warning text-black rounded-pill fw-semibold"
                                        href="/peninjau/peninjau-review-soal/${row.id}/${row.relasi_pelaksanaan_ujian.jenis_tes}">
                                        <i class="fa fa-eye fa-xs"></i> Review Soal
                                    </a>
                                </div>
                                `
                    return tampilan;
                }
            },
        ]
    });

    //DATATABEL JADWAL UJI KOMPETENSI
    let list_peserta_uji_kompetensi = [];
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
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "/peninjau/data-peserta-pelaksanaan-uji-kompetensi",
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap text-center",
                "render": function(data, type, row, meta) {
                    let i = 1;
                    list_peserta_uji_kompetensi[row.id] = row;
                    return `<p class="font-semibold">${meta.row + 1}</p>`;
                }
            },
            {
                "targets": 1,
                "class": "text-wrap text-center",
                "render": function(data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    return `<p class="font-semibold">${row.relasi_jadwal_uji_kompetensi.relasi_muk.muk}</p>`;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function(data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let cek_asesor;
                    if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesor == null || row.relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail == null) {
                        cek_asesor = `<p style="color:red;" class="font-semibold">Asesor belum ditentukan</p>`
                    } else {
                        cek_asesor = `<p class="font-semibold">${row.relasi_jadwal_uji_kompetensi.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap}</p>`;
                    }
                    return cek_asesor;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function(data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let cek_peninjau;
                    if (row.relasi_jadwal_uji_kompetensi.relasi_user_peninjau == null || row.relasi_jadwal_uji_kompetensi.relasi_user_peninjau.relasi_user_peninjau_detail == null) {
                        cek_peninjau = `<p style="color:red;" class="font-semibold">Peninjau belum ditentukan</p>`
                    } else {
                        cek_peninjau = `<p class="font-semibold">${row.relasi_jadwal_uji_kompetensi.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap}</p>`;
                    }
                    return cek_peninjau;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap text-center",
                "render": function(data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    if (row.jenis_tes == null) {
                        data_jenis_tes = `<p style="color:red" class="font-semibold">Jenis Tes belum ditentukan</p>`
                    } else if (row.jenis_tes == 1) {
                        data_jenis_tes = `<p class="font-semibold">Pilihan Ganda</p>`
                    } else if (row.jenis_tes == 2) {
                        data_jenis_tes = `<p class="font-semibold">Essay</p>`
                    } else if (row.jenis_tes == 3) {
                        data_jenis_tes = `<p class="font-semibold">Wawancara</p>`
                    }
                    return data_jenis_tes;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap text-center",
                "render": function(data, type, row, meta) {
                    list_peserta_uji_kompetensi[row.id] = row;
                    let data_asesi;
                    if (row.relasi_jadwal_uji_kompetensi.relasi_user_asesi == null) {
                        data_asesi = `<p style="color:red" class="font-semibold">Asesi Belum ditentukan</p>`
                    } else {
                        data_asesi =
                        `
                            <div class="buttons">
                                <a class="btn btn-sm btn-primary rounded-pill text-white fw-semibold"
                                    href="#!" onclick="lihatDaftarAsesi(${row.relasi_jadwal_uji_kompetensi.id})">
                                    List Asesi
                                </a>
                                <a class="btn btn-sm btn-warning text-black rounded-pill fw-semibold"
                                    href="#!" onclick="detailUjiKompetensi(${row.id}, ${row.jenis_tes})">
                                    <i class="fa fa-eye fa-xs"></i> Detail Jadwal
                                </a>
                            </div>
                        `
                    }
                    return data_asesi;
                }
            },
        ]
    });

    function lihatDaftarAsesi(id) {
        $('#modalDaftarAsesiPesertaUkom').modal('show');

            let list_asesi_peserta_uji_kompetensi = [];
            const asesi_peserta_uji_kompetensi = $('#table-data-asesi-peserta-uji-kompetensi').DataTable({
                "destroy": true,
                "pageLength": 10,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'semua']
                ],
                "searching": false,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "processing": true,
                "bServerSide": true,
                "responsive": false,
                "sScrollX": '100%',
                "sScrollXInner": "100%",
                ajax: {
                    url: "/peninjau/data-list-asesi-peserta-uji-kompetensi/" + id,
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                },
                columnDefs: [{
                        targets: '_all',
                        visible: true
                    },
                    {
                        "targets": 0,
                        "class": "text-nowrap text-center",
                        "render": function(data, type, row, meta) {
                            let i = 1;
                            list_asesi_peserta_uji_kompetensi[row.id] = row;
                            return meta.row + 1;
                        }
                    },
                    {
                        "targets": 1,
                        "class": "text-nowrap text-center",
                        "render": function(data, type, row, meta) {
                            list_asesi_peserta_uji_kompetensi[row.id] = row;
                            return row.relasi_user_asesi.nama_lengkap;
                        }
                    },
                    {
                        "targets": 2,
                        "class": "text-nowrap text-center",
                        "render": function(data, type, row, meta) {
                            list_asesi_peserta_uji_kompetensi[row.id] = row;
                            let status;
                            if (row.status_ujian_berlangsung == 0) {
                                status = `<p>Belum Mengerjakan</p>`
                            } else if (row.status_ujian_berlangsung == 1) {
                                status = `<p>Sedang Berlangsung</p>`
                            } else if (row.status_ujian_berlangsung == 2) {
                                status = `<p class="text-success">Telah Selesai</p>`
                            } else if (row.status_ujian_berlangsung == 3) {
                                status = `<p class="text-warning">Sesi Wawancara</p>`
                            }
                            return status;
                        }
                    },
                ]
            });
        }

        // DETAIL UJI KOMPETENSI
    function detailUjiKompetensi(id, jenis_tes) {
        const detail_uji_kompetensi = list_peserta_uji_kompetensi[id];
        $("#detailUjiKompetensi").modal('show');
        $("#detailUjiKompetensiLabel").text(detail_uji_kompetensi.relasi_jadwal_uji_kompetensi.relasi_muk.muk);

        $(".sesi").text('Sesi : ' + detail_uji_kompetensi.sesi);
        $(".nama_asesor").text('Nama Asesor : ' + detail_uji_kompetensi.relasi_jadwal_uji_kompetensi.relasi_user_asesor
            .relasi_user_asesor_detail.nama_lengkap);
        $(".tanggal").text('Ujian dibuka : ' + moment(detail_uji_kompetensi.tanggal).format('dddd, d MMMM Y') +', Pukul '+ moment(detail_uji_kompetensi.waktu_mulai).format('HH:mm'));
        $(".tuk").text('TUK : ' + detail_uji_kompetensi.relasi_tuk.nama_tuk);

        if (detail_uji_kompetensi.jenis_tes == 1) {
            $(".jenis_tes").text('Jenis Tes : Pilihan Ganda');
        } else if (detail_uji_kompetensi.jenis_tes == 2) {
            $(".jenis_tes").text('Jenis Tes : Essay');
        } else if (detail_uji_kompetensi.jenis_tes == 3) {
            $(".jenis_tes").text('Jenis Tes : Wawancara');
        }
        var url = "/asesi/soal/";

        $(".total_waktu").text('Waktu Pengerjaan : ' + detail_uji_kompetensi.total_waktu + ' Menit');
    }
</script>
@endsection