<div class="mb-5 pb-5">
    <div class="col profil-section-title">
        Bagian 2 : Asesi
    </div>
    <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
        berikut.
        Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
        latar
        belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
    </p>
    <div class="col profil-section">
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <span class="badge bg-info rounded-pill">
                            <a class="text-white" href="#" data-bs-toggle="modal"
                                data-bs-target="#modalTambahAsesi">Tambah Asesi
                            </a>
                        </span>
                    
                        {{-- MODAL TAMBAH --}}
                    <div class="modal fade text-left" id="modalTambahAsesi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Tambah Asesi</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="{{ route('admin.TambahAsesi') }}" id="formTambahAsesi" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Asesi</label>
                                            <select class="form-control jurusan" name="user_asesi_id" aria-hidden="true">
                                                <option value="" selected disabled>-- Pilih Asesi --</option>
                                                @foreach ($user_asesi as $data_user_asesi)
                                                <option value="{{ $data_user_asesi['id'] }}">{{ $data_user_asesi['nama_lengkap'] }}</option>                                                    
                                                @endforeach
                                            </select>
                                            <div class="input-group has-validation">
                                                <label class="text-danger error-text email_institusi_error"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
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
        
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped display" id="table-asesi">
                            <thead>
                                <tr>
                                    <th>Nama Asesi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
        
                {{-- MODAL EDIT --}}
                <div class="modal fade text-left" id="modalEditAsesi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Ubah Asesi</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form id="formEditAsesi" action="{{ route('admin.UbahAsesi') }}" method="POST">
                                <input type="hidden" name="id" hidden>
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Asesi</label>
                                        <select class="form-control jurusan" name="user_asesi_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Asesi --</option>
                                            @foreach ($user_asesi as $data_user_asesi)
                                            <option value="{{ $data_user_asesi['id'] }}">{{ $data_user_asesi['nama_lengkap'] }}</option>                                                    
                                            @endforeach                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text email_institusi_error"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
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
        
            </section>
        </div>
        
        
    </div>
</div>
@section('script')
<script>
    var id_jadwal = $('.data_id_jadwal').text();
    let list_asesi = [];
    let list_asesor = [];
    let list_peninjau = [];

    // ASESI
    var table_asesi = $('#table-asesi').DataTable({
        // "destroy": true,
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
        "paging": false,
        "searching": false,
        ajax: {
            url: "/admin/data-asesi/" + id_jadwal,
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
        }, {
            "targets": 0,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
                list_asesi[row.id] = row;
                return row.relasi_user_asesi.nama_lengkap;
            }
        }, {
            "targets": 1,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
                let tampilan;
                tampilan = `<span id-jurusan = "${row.id}" onclick="clickEditAsesi(${row.id})" class="badge bg-warning rounded-pill">
                                            <a class="text-white" href="#">Edit</a>
                                        </span>
                                        <span id-jurusan = "${row.id}" onclick="clickHapusAsesi(${row.id})" class="badge bg-danger rounded-pill">
                                            <a class="text-white" href="#">Hapus</a>
                                        </span>`
                return tampilan;
            }
        }, ]
    });

    function clickEditAsesi(id) {
        const data_asesi = list_asesi[id]
        $("#modalEditAsesi").modal('show');
        $("#formEditAsesi [name='id']").val(id);
        $("#formEditAsesi [name='nama_lengkap']").val(data_asesi.nama_lengkap);
        $('#formEditAsesi').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
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
                            table_asesi.ajax.reload(null, false)
                        $("#modalEditAsesi").modal('hide')
                    }
                }
            });
        });
    }

    function clickHapusAsesi(id) {
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-asesi/" + id,
            dataType: 'json',
            success: function(response) {
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
                        table_asesi.ajax.reload(null, false)
                }
            }
        });
    }

    $('#formTambahAsesi').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(document).find('label.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    $.each(data.error, function(prefix, val) {
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
                        table_asesi.ajax.reload(null, false)
                    $("#modalTambahAsesi").modal('hide')
                }
            }
        });
    });

    //ASESOR
    const table_asesor = $('#table-asesor').DataTable({
        // "destroy": true,
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
        "paging": false,
        "searching": false,
        ajax: {
            url: "/admin/data-asesor/" + id_jadwal,
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
                    list_asesor[row.id] = row;
                    return row.relasi_user_asesor.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span id-jurusan = "${row.id}" onclick="clickEditAsesor(${row.id})" class="badge bg-warning rounded-pill">
                                            <a class="text-white" href="#">Edit</a>
                                        </span>
                                        <span id-jurusan = "${row.id}" onclick="clickHapusAsesor(${row.id})" class="badge bg-danger rounded-pill">
                                            <a class="text-white" href="#">Hapus</a>
                                        </span>`
                    return tampilan;
                }
            },
        ]
    });

    function clickEditAsesor(id) {
        const data_asesor = list_asesor[id]
        $("#modalEditAsesor").modal('show');
        $("#formEditAsesor [name='id']").val(id);
        $("#formEditAsesor [name='nama_lengkap']").val(data_asesor.nama_lengkap);
        $('#formEditAsesor').on('submit', function (e) {
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
                            table_asesor.ajax.reload(null, false)
                        $("#modalEditAsesor").modal('hide')
                    }
                }
            });
        });
    }

    function clickHapusAsesor(id) {
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-asesor/" + id,
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
                        table_asesor.ajax.reload(null, false)
                }
            }
        });
    }

    $('#formTambahAsesor').on('submit', function (e) {
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
                        table_asesor.ajax.reload(null, false)
                    $("#modalTambahAsesor").modal('hide')
                }
            }
        });
    });

    // PENINJAU
    const table_peninjau = $('#table-peninjau').DataTable({
        // "destroy": true,
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
        "paging": false,
        "searching": false,
        ajax: {
            url: "/admin/data-peninjau/" + id_jadwal,
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
                    list_peninjau[row.id] = row;
                    return row.relasi_user_peninjau.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span id-jurusan = "${row.id}" onclick="clickEditPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                            <a class="text-white" href="#">Edit</a>
                                        </span>
                                        <span id-jurusan = "${row.id}" onclick="clickHapusPeninjau(${row.id})" class="badge bg-danger rounded-pill">
                                            <a class="text-white" href="#">Hapus</a>
                                        </span>`
                    return tampilan;
                }
            },
        ]
    });

    function clickEditPeninjau(id) {
        const data_peninjau = list_peninjau[id]
        $("#modalEditPeninjau").modal('show');
        $("#formEditPeninjau [name='id']").val(id);
        $("#formEditPeninjau [name='nama_lengkap']").val(data_peninjau.nama_lengkap);
        $('#formEditPeninjau').on('submit', function (e) {
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
                            table_peninjau.ajax.reload(null, false)
                        $("#modalEditPeninjau").modal('hide')
                    }
                }
            });
        });
    }

    function clickHapusPeninjau(id) {
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-peninjau/" + id,
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
                        table_peninjau.ajax.reload(null, false)
                }
            }
        });
    }

    $('#formTambahPeninjau').on('submit', function (e) {
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
                        table_peninjau.ajax.reload(null, false)
                    $("#modalTambahPeninjau").modal('hide')
                }
            }
        });
    });
</script>
@endsection