@extends('layout.main-layout', ['title' => 'Skema Sertifikasi Kompetensi'])
@section('main-section')
<div class="container mt-5 jalur-file">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Profil</li>
        </ol>
    </nav>
    {{-- EDIT PROFIL --}}
    <div class="mt-5">
        <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
        <img src="/images/logo/favicon_lsp.png" width="180px" class="rounded-circle" alt="">
        {{-- DATA SERTIFIKASI --}}
        <div class="mb-5 pb-5">
            <div class="col profil-section-title">
                Bagian 2 : Data Sertifikasi
            </div>
            <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
                berikut.
                Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
                latar
                belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
            </p>
            <div class="col profil-section">
                <div class="col pb-45">
                    <p class="fw-bold">Judul Skema Sertifikasi</p>
                    <span>
                        <a href="" class="update-nama-sertifikasi" data-name="judul_skema_sertifikasi" data-type="text"
                            data-pk="{{ $sertifikasi_jurusan->id}}"
                            data-title="Enter name">{{ $sertifikasi_jurusan->judul_skema_sertifikasi ?? ''}}
                        </a>
                    </span>
                    {{-- <span>{{ $sertifikasi_jurusan->relasi_sertifikasi->judul_skema_sertifikasi ?? ''}}</span>
                    --}}
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Nomor Skema Sertifikasi</p>
                    <span>
                        <a href="" class="update-nomor-sertifikasi" data-name="nomor_skema_sertifikasi" data-type="text"
                            data-pk="{{ $sertifikasi_jurusan->id}}"
                            data-title="Enter name">{{ $sertifikasi_jurusan->nomor_skema_sertifikasi ?? ''}}
                        </a>
                    </span>
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Tujuan Asesmen</p>
                    <span>{{ $sertifikasi_jurusan->relasi_sertifikasi->tujuan_asesi ?? ''}}</span>
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Daftar Unit Kompetensi Sesuai Kemasan</p>
                    <a class="text-white fw-semibold btn btn-sm btn-info btn-info" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalTambahUnitKompetensi">+ Unit kompetensi
                    </a>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        </div>


                        <div class="card-body">
                            <table class="table table-striped" id="table-data-unit-kompetensi"
                                style="table-layout: fixed;">
                                <thead>
                                    <tr class="text-center">
                                        <th>Kode unit</th>
                                        <th>Judul Unit</th>
                                        <th style="word-wrap: break-word;">Jenis Standar(Standar khusus/Standar
                                            internasional/SKKNI)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
{{-- MODAL TAMBAH UNIT KOMPETENSI --}}
<div class="modal fade text-left" id="modalTambahUnitKompetensi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Unit Kompetensi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('admin.TambahUnitKompetensi') }}" id="formTambahUnitKompetensi" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Kode Unit Kompetensi</label>
                    <div class="form-group">
                        <input type="text" class="skema_sertifikasi_id" name="skema_sertifikasi_id"
                            value="{{ $sertifikasi_jurusan->id}}">
                        <input type="text" name="kode_unit" placeholder="Kode Unit Kompetensi"
                            class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text kode_unit_error"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Unit Kompetensi</label>
                        <input type="text" name="judul_unit" placeholder="Judul Unit Kompetensi"
                            class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text judul_unit_error"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</label>
                        <input type="text" name="jenis_standar"
                            placeholder="Jenis Standar(Standar khusus/Standar internasional/SKKNI)"
                            class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text jenis_standar_error"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL UBAH UNIT KOMPETENSI --}}
<div class="modal fade text-left" id="modalUbahUnitKompetensi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Unit Kompetensi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('admin.UbahUnitKompetensi') }}" id="formUbahUnitKompetensi" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Kode Unit Kompetensi</label>
                    <input type="hidden" name="id" hidden>
                    <div class="form-group">
                        <input type="text" name="kode_unit" placeholder="Kode Unit" class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text kode_unit_error"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Unit Kompetensi</label>
                        <input type="text" name="judul_unit" placeholder="Alamat" class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text judul-unit_error"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</label>
                        <input type="text" name="jenis_standar"
                            placeholder="Jenis Standar(Standar khusus/Standar internasional/SKKNI)"
                            class="form-control rounded-5">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text jenis_standar_error"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    var id_sertifikasi = $('.skema_sertifikasi_id').val();
    
    let list_unit_kompetensi = [];
    const table_data_unit_kompetensi = $('#table-data-unit-kompetensi').DataTable({
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
            url: "/admin/data-unit-kompetensi/" + id_sertifikasi,
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
                                <span onclick="clickUbahUnitKompetensi(${row.id})" class="badge bg-info rounded-pill">
                                    <a class="text-white" href="#!">Edit</a>
                                </span>
                                <span data-id-unit-kompetensi = "${row.id}" class="badge bg-danger rounded-pill 
                                hapus_unit_kompetensi">
                                    <a class="text-white" href="#!">Hapus</a>
                                </span>
                                `
                    return tampilan;
                }
            },
        ]
    });

    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    // UPDATE NAMA SERTIFIKASI
    $('.update-nama-sertifikasi').editable({
        url: "{{route('admin.UpdateJudulSertifikasi')}}",
        type: 'text',
    });
    
    // UPDATE NOMOR SERTIFIKASI
    $('.update-nomor-sertifikasi').editable({
        url: "{{route('admin.UpdateNomorSertifikasi')}}",
        type: 'text',
    });

    // TAMBAH UNIT KOMPETENSI
    $('#formTambahUnitKompetensi').on('submit', function (e) {
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
                } else if (data.status == 1) {
                    swal({
                            title: "Berhasil",
                            text: `${data.msg}`,
                            icon: "success",
                            buttons: true,
                            successMode: true,
                        }),
                        table_data_unit_kompetensi.ajax.reload(null, false)
                    $("#modalTambahUnitKompetensi").modal('hide')
                }
            }
        });
    });

    // UBAH UNIT KOMPETENSI
    function clickUbahUnitKompetensi(id) {
        const data_unit_kompetensi = list_unit_kompetensi[id]
        $("#modalUbahUnitKompetensi").modal('show');
        $("#formUbahUnitKompetensi [name='id']").val(id);
        $("#formUbahUnitKompetensi [name='kode_unit']").val(data_unit_kompetensi.kode_unit);
        $("#formUbahUnitKompetensi [name='judul_unit']").val(data_unit_kompetensi.judul_unit);
        $("#formUbahUnitKompetensi [name='jenis_standar']").val(data_unit_kompetensi.jenis_standar);

        $('#formUbahUnitKompetensi').on('submit', function (e) {
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
                    } else if (data.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            table_data_unit_kompetensi.ajax.reload(null, false)
                        $("#modalUbahUnitKompetensi").modal('hide')
                    }
                }
            });
        });
    }

    // HAPUS UNIT KOMPETENSI
    $(document).on('click', '.hapus_unit_kompetensi', function (event) {
        const data_id = $(event.currentTarget).attr('data-id-unit-kompetensi');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "/admin/hapus-unit-kompetensi/" + data_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            alert("Gagal Hapus")
                        } else if (response.status == 1) {
                            swal({
                                    title: "Berhasil",
                                    text: `${response.msg}`,
                                    icon: "success",
                                    buttons: true,
                                    successMode: true,
                                }),
                                table_data_unit_kompetensi.ajax.reload(null, false)
                        }
                    }
                });
            } else {
                //alert ('no');
                return false;
            }
        });
    });

</script>
@endsection
