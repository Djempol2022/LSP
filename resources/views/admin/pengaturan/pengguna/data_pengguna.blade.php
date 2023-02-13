@extends('layout.main-layout', ['title'=>"Pengguna"])
@section('main-section')
<div class="page-content">
    <section class="section">
        <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-black text-decoration-none"
                        href="{{ route('admin.Dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
                    Pengguna
                </li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">
                <span class="badge bg-info rounded-pill">
                    <a class="text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalTambahPengguna">Tambah Pengguna
                    </a>
                </span>
            
                {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="modalTambahPengguna" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Pengguna</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.TambahPengguna') }}" id="formTambahPengguna" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Nama Lengkap</label>
                                <div class="form-group">
                                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text nama_lengkap_error"></label>
                                    </div>
                                </div>
                                <label>Email</label>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text email_error"></label>
                                    </div>
                                </div>
                                <label>Institusi/Perusahaan</label>
                                <div class="form-group">
                                    <select class="js-example-basic-single" name="institusi_id">
                                        <option value="" selected disabled>Pilih Instansi/Perusahaan</option>
                                        @foreach ($institusi as $data_institusi)
                                        <option value="{{ $data_institusi['id'] }}">{{ $data_institusi['nama_institusi'] }}</option>    
                                        @endforeach
                                    </select>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text institusi_id_error"></label>
                                    </div>
                                </div>

                                <label>Jurusan</label>
                                <div class="form-group">
                                    <select class="js-example-basic-single" name="jurusan_id">
                                        <option value="" selected disabled>Pilih Jurusan</option>
                                        @foreach ($jurusan as $data_jurusan)
                                        <option value="{{ $data_jurusan['id'] }}">{{ $data_jurusan['jurusan'] }}</option>    
                                        @endforeach
                                    </select>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text jurusan_id_error"></label>
                                    </div>
                                </div>

                                <label>Password</label>
                                <div class="form-group">
                                    <div class="input-group has-validation">
                                        <input name="password" type="password" class="form-control" id="password" />
                                        <span class="input-group-text" onclick="password_show_hide1();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text password_error"></label>
                                        </div>
                                    </div>
                                </div>

                                <label>Role</label>
                                <div class="form-group">
                                    <select class="js-example-basic-single" name="role_id">
                                        <option value="" selected disabled>Pilih Role</option>
                                        <option value="1">Admin</option>
                                        {{-- <option value="2">Peninjau</option> --}}
                                        <option value="3">Asesor</option>
                                        <option value="4">Asesi</option>
                                    </select>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text role_id_error"></label>
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
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <fieldset class="form-group">
                            <select class="form-select filter-role-pengguna" id="role-id">
                                <option value="" disabled selected>Filter berdasarkan role</option>
                                <option value="2">Peninjau</option>
                                <option value="3">Asesor</option>
                                <option value="4">Asesi</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <table class="table table-striped" id="table-pengguna">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Institusi</th>
                            <th>Jurusan</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade text-left" id="modalEditPengguna" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Pengguna</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="formEditPengguna" action="{{ route('admin.UbahPengguna') }}" method="POST">
                        <input type="hidden" name="id" hidden>
                        @csrf
                        <div class="modal-body">
                            <label>Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text nama_lengkap_error"></label>
                                </div>
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text email_error"></label>
                                </div>
                            </div>
                            <label>Institusi/Perusahaan</label>
                            <div class="form-group">
                                <select class="js-example-basic-single" name="institusi_id">
                                    <option value="" selected disabled>Pilih Instansi/Perusahaan</option>
                                    @foreach ($institusi as $data_institusi)
                                    <option value="{{ $data_institusi['id'] }}">{{ $data_institusi['nama_institusi'] }}</option>    
                                    @endforeach
                                </select>
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text institusi_id_error"></label>
                                </div>
                            </div>

                            <label>Jurusan</label>
                            <div class="form-group">
                                <select class="js-example-basic-single" name="jurusan_id">
                                    <option value="" selected disabled>Pilih Jurusan</option>
                                    @foreach ($jurusan as $data_jurusan)
                                    <option value="{{ $data_jurusan['id'] }}">{{ $data_jurusan['jurusan'] }}</option>    
                                    @endforeach
                                </select>
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text jurusan_id_error"></label>
                                </div>
                            </div>

                            <label>Password</label>
                            <div class="form-group">
                                <div class="input-group has-validation">
                                    <input name="password" type="password" class="form-control" id="password" />
                                    <span class="input-group-text" onclick="password_show_hide1();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text password_error"></label>
                                    </div>
                                </div>
                            </div>

                            <label>Role</label>
                            <div class="form-group">
                                <select class="js-example-basic-single" name="role_id">
                                    <option value="" selected disabled>Pilih Role</option>
                                    <option value="1">Admin</option>
                                    {{-- <option value="2">Peninjau</option> --}}
                                    <option value="3">Asesor</option>
                                    <option value="4">Asesi</option>
                                </select>
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text role_id_error"></label>
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
@endsection
@section('script')
<script>
    let list_pengguna = [];    
    let data_role_pengguna = $('#role-id').val();
    const table_pengguna = $('#table-pengguna').DataTable({
        "destroy":true,
        "pageLength": 10,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        
        ajax: {
            url: "{{ route('admin.DataPengguna') }}",
            type: "POST",
            data:function(d){
                d.role_pengguna = data_role_pengguna;
                return d
            }
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					list_pengguna[row.id] = row;
                    return row.nama_lengkap;
                }
            },
            {
                "targets": 1,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					list_pengguna[row.id] = row;
                    return row.email;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					list_pengguna[row.id] = row;
                    let institusi;
                    if(row.relasi_institusi == null || row.relasi_institusi.nama_institusi == null){
                        institusi = `<p>Institusi Belum di Tentukan</p>`
                    }else{
                        institusi = row.relasi_institusi.nama_institusi
                    }
                    return institusi;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					list_pengguna[row.id] = row;
                    return row.relasi_jurusan.jurusan;
                }
            },
            {
                "targets": 4,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					list_pengguna[row.id] = row;
                    return row.relasi_role.role;
                }
            },
            {
                "targets": 5,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span onclick="clickEditPengguna(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span onclick="hapusPengguna(${row.id})" class="badge bg-danger rounded-pill">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    function clickEditPengguna(id){
        const data_pengguna = list_pengguna[id]
            $("#modalEditPengguna").modal('show');
            $("#formEditPengguna [name='id']").val(id)
            $("#formEditPengguna .muk").val(data_pengguna.muk);
        
            $('#formEditPengguna').on('submit', function (e) {
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
                    } 
                    else if(data.status == 1){
                        $("#modalEditPengguna").modal('hide');
                        swal({
                            title: "Berhasil",
                            text: `${data.msg}`,
                            icon: "success",
                            buttons: true,
                            successMode: true,
                        }),
                        table_pengguna.ajax.reload(null,false);
                    }
                }
            });
        });
    }

    function password_show_hide1() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function hapusPengguna(id){
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-pengguna/" + id,
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
                    table_pengguna.ajax.reload(null, false)
                }
            }
        });
    }

    $('#formTambahPengguna').on('submit', function (e) {
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
                } 
                else if(data.status == 1){
                    swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        buttons: true,
                        successMode: true,
                    }),
                    table_pengguna.ajax.reload(null,false)
                    $("#modalTambahPengguna").modal('hide')
                }
            }
        });
    });

    $(".filter-role-pengguna").on('change', function(){
        data_role_pengguna = $('#role-id').val();
        table_pengguna.ajax.reload(null, false);
    })
</script>
@endsection
