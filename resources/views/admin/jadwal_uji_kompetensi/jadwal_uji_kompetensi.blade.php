@extends('layout.main-layout', ['title'=>"Jadwal Uji Kompetensi"])
@section('main-section')

{{-- <div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="modal fade text-left w-100" id="modalDetailJadwalUjiKompetensi" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title nama_jurusan" id="myModalLabel16"></h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <table class="table table-striped" id="table-jadwal-uji-kompetensi">
                                        <thead>
                                            <tr>
                                                <th>Materi Uji Kompetensi</th>
                                                <th>Sesi</th>
                                                <th>Tanggal</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Kelas</th>
                                                <th>Tempat</th>
                                                <th>Jenis Tes</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn rounded-pill btn-sm btn-warning"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Keluar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade text-left" id="modalJadwalUjiKompetensi" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Jadwal Uji Kompetensi</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.TambahJadwalUjiKompetensi') }}" id="isi-uji-kompetensi"
                method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label>Materi Uji Kompetensi</label>
                            <select class="form-control jurusan" name="muk_id" aria-hidden="true">
                                <option value="" selected disabled>-- Pilih Materi Uji Kompetensi --</option>
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text muk_id_error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sesi</label>
                            <input type="text" name="sesi" placeholder="Sesi" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text sesi_error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" placeholder="Tanggal" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text tanggal_error"></label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-1">
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input type="time" name="waktu_mulai" placeholder="Waktu Mulai"
                                    class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text waktu_mulai_error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-1">
                            <div class="form-group">
                                <label>Waktu Selesai</label>
                                <input type="time" name="waktu_selesai" placeholder="Waktu Selesai"
                                    class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text waktu_selesai_error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" placeholder="Kelas" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text kelas_error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Uji Kompetensi</label>
                            <input type="text" name="tempat" placeholder="Tempat Uji Kompetensi"
                                class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text tempat_error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Tes</label>
                            <select class="form-control" name="jenis_tes" aria-hidden="true">
                                <option value="" selected disabled>-- Pilih Jenis Tes --</option>
                                <option value="1">Pilihan Ganda</option>
                                <option value="2">Essay</option>
                                <option value="3">Wawancara</option>
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text jenis_tes_error"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn rounded-pill btn-sm btn-warning" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-sm rounded-pill btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table-jurusan-jadwal-ukom">
                    <thead>
                        <tr>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
    let list_jurusan = [];
    // console.log(data_pelaksanaan_ujians.relasi_jadwal_uji_kompetensi)

    // DATATABLE JURUSAN
    const table_jurusan = $('#table-jurusan-jadwal-ukom').DataTable({
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
            url: "{{ route('admin.DataJurusan') }}",
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
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_jurusan[row.id] = row;
                    return row.jurusan;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="/admin/tambah-asesor-peninjau/${row.id}">Tambah Data</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    // // TAMBAH JADWAL UJI KOMPETENSI
    // function tambahJadwalUjiKompetensi(id) {
    //     const data_jurusan = list_jurusan[id]
    //     let jurusanId = data_jurusan.id
    //     $("#modalJadwalUjiKompetensi").modal('show');

    //     $('#isi-uji-kompetensi').on('submit', function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: $(this).attr('action'),
    //             method: $(this).attr('method'),
    //             data: new FormData(this),
    //             processData: false,
    //             dataType: 'json',
    //             contentType: false,
    //             beforeSend: function () {
    //                 $(document).find('label.error-text').text('');
    //             },
    //             success: function (data) {
    //                 if (data.status == 0) {
    //                     $.each(data.error, function (prefix, val) {
    //                         $('label.' + prefix + '_error').text(val[0]);
    //                         // $('span.'+prefix+'_error').text(val[0]);
    //                     });
    //                 } else if (data.status == 1) {
    //                     swal({
    //                             title: "Berhasil",
    //                             text: `${data.msg}`,
    //                             icon: "success",
    //                             buttons: true,
    //                             successMode: true,
    //                         }),
    //                         table_jurusan.ajax.reload(null, false)
    //                     $("#modalJadwalUjiKompetensi").modal('hide')
    //                 }
    //             }
    //         });
    //     });

    //     if (jurusanId) {
    //         jQuery.ajax({
    //             url: '/admin/jurusan-id/' + jurusanId,
    //             type: "GET",
    //             dataType: "json",
    //             success: function (response) {
    //                 $('select[name="muk_id"]').empty();
    //                 $('select[name="muk_id"]').append(
    //                     '<option value="">-- Pilih Materi Uji Kompetensi --</option>');
    //                 $.each(response, function (key, value) {
    //                     $('select[name="muk_id"]').append('<option value="' + key + '">' +
    //                         value + '</option>');
    //                 });
    //             },
    //         });
    //     } else {
    //         $('select[name="muk_id"]').append(
    //             '<option value="">-- Materi Uji Kompetensi belum diketahui--</option>');
    //     }
    // }

    // // DATATABLE DETAIL JADWAL UJI KOMPETENSI
    // function detailJadwalUjiKompetensi(id) {
    //     const id_jurusan = list_jurusan[id];
    //     let jurusanId = id_jurusan.id;
    //     $('.nama_jurusan').text("Jadwal Uji Materi Jurusan " + id_jurusan.jurusan)

    //     $("#modalDetailJadwalUjiKompetensi").modal('show');
    //     const table_jadwal_uji_kompetensi = $('#table-jadwal-uji-kompetensi').DataTable({
    //         "destroy": true,
    //         "pageLength": 10,
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, 'semua']
    //         ],
    //         "bLengthChange": true,
    //         "bFilter": true,
    //         "bInfo": true,
    //         "processing": true,
    //         "bServerSide": true,
    //         "paging": false,
    //         "searching": false,
    //         ajax: {
    //             url: "/admin/data-jadwal-uji-kompetensi/" + jurusanId,
    //             type: "POST",
    //             // data:function(d){
    //             //     d.data_kabupaten = data_kabupaten;
    //             //     d.data_status_id = data_status_id;
    //             //     return d
    //             // }
    //         },
    //         columnDefs: [{
    //                 targets: '_all',
    //                 visible: true
    //             },
    //             {
    //                 "targets": 0,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.relasi_muk.muk;
    //                 }
    //             },
    //             {
    //                 "targets": 1,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.sesi;
    //                 }
    //             },
    //             {
    //                 "targets": 2,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return moment(row.tanggal).format('DD MMMM YYYY');
    //                 }
    //             },
    //             {
    //                 "targets": 3,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.waktu_mulai;
    //                 }
    //             },
    //             {
    //                 "targets": 4,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.waktu_selesai;
    //                 }
    //             },
    //             {
    //                 "targets": 5,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.tempat;
    //                 }
    //             },
    //             {
    //                 "targets": 6,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     list_muk[row.id] = row;
    //                     return row.kelas;
    //                 }
    //             },
    //             {
    //                 "targets": 7,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     let tampilan;
    //                     list_muk[row.id] = row;
    //                     if (row.jenis_tes == 1)
    //                         tampilan = `<span class="badge bg-warning rounded-pill">
    //                                 <a class="text-white" href="#">Pilihan Ganda</a>
    //                             </span>`
    //                     else if (row.jenis_tes == 2)
    //                         tampilan = `<span class="badge bg-info rounded-pill">
    //                                 <a class="text-white" href="#">Essay</a>
    //                             </span>`
    //                     else if (row.jenis_tes == 3)
    //                         tampilan = `<span class="badge bg-secondary rounded-pill">
    //                                 <a class="text-white" href="#">Wawancara</a>
    //                             </span>`
    //                     return tampilan;
    //                 }
    //             },
    //             {
    //                 "targets": 8,
    //                 "class": "text-nowrap",
    //                 "render": function (data, type, row, meta) {
    //                     let tampilan;
    //                     list_muk[row.id] = row;
    //                     tampilan = `<span onclick="hapusMateriUjiKompetensi(${row.id})" class="badge bg-danger rounded-pill">
    //                                 <a class="text-white" href="#">Hapus</a>
    //                             </span> 
    //                             <span class="badge bg-primary rounded-pill">
    //                                 <a class="text-white" href="/admin/detail-jadwal-uji-kompetensi/${row.id}">Detail</a>
    //                             </span>`
    //                     return tampilan;
    //                 }
    //             },
    //         ]
    //     });
    // }

    // // HAPUS DATA JADWAL UJI KOMPETENSI
    // function hapusMateriUjiKompetensi(id) {
    //     const table_jadwal_uji_kompetensi = $('#table-jadwal-uji-kompetensi').DataTable();
    //     swal({
    //         title: "Yakin ?",
    //         text: "Menghapus Data ?",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     $.ajax({
    //         url: "/admin/hapus-jadwal-uji-kompetensi/" + id,
    //         dataType: 'json',
    //         success: function (response) {
    //             if (response.status == 0) {
    //                 alert("Gagal Hapus")
    //             } else if (response.status == 1) {
    //                 swal({
    //                         title: "Berhasil",
    //                         text: `${response.msg}`,
    //                         icon: "success",
    //                         buttons: true,
    //                         successMode: true,
    //                     }),
    //                     table_jadwal_uji_kompetensi.ajax.reload(null, false)
    //             }
    //         }
    //     });
    // }

</script>
@endsection
