@extends('layout.main-layout', ['title'=>"Insitusi"])
@section('main-section')
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{ route('admin.Dashboard') }}">Dashboard</a></li>

        <li class="breadcrumb-item" aria-current="page">
            <a class="text-black text-decoration-none"
                href="{{ route('admin.Pengaturan') }}">Pengaturan
            </a>
        </li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Institusi</li>
    </ol>
</nav>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <span class="badge bg-info rounded-pill">
                    <a class="text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalTambahInstitusi">Tambah Institusi
                    </a>
                </span>
            
                {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="modalTambahInstitusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Institusi</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.TambahInstitusi') }}" id="formInstitusi" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Nama Institusi</label>
                                <div class="form-group">
                                    <input type="text" name="nama_institusi" placeholder="Nama Institusi" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text nama_institusi_error"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Institusi</label>
                                    <input type="text" name="alamat_institusi" placeholder="Alamat" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text alamat_institusi_error"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" placeholder="Kode Pos" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text kode_pos_error"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Hp Institusi</label>
                                    <input type="text" name="nomor_hp_institusi" placeholder="Nomor Hp Institusi" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text nomor_hp_institusi_error"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Institusi</label>
                                    <input type="text" name="email_institusi" placeholder="Email Institusi" class="form-control rounded-5">
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
                <table class="table table-striped" id="table-institusi">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Nomor Hp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade text-left" id="modalEditInstitusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Institusi</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="formEditInstitusi" action="{{ route('admin.UbahInstitusi') }}" method="POST">
                        <input type="hidden" name="id" hidden>
                        @csrf
                        <div class="modal-body">
                            <label>Nama Institusi</label>
                            <div class="form-group">
                                <input type="text" name="nama_institusi" placeholder="Nama Institusi" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text nama_institusi_error"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Institusi</label>
                                <input type="text" name="alamat_institusi" placeholder="Alamat" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text alamat_institusi_error"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" placeholder="Kode Pos" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text kode_pos_error"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Hp Institusi</label>
                                <input type="text" name="nomor_hp_institusi" placeholder="Nomor Hp Institusi" class="form-control rounded-5">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text nomor_hp_institusi_error"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Institusi</label>
                                <input type="text" name="email_institusi" placeholder="Email Institusi" class="form-control rounded-5">
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
@endsection
@section('script')
<script>
    $(document).ready( function () {
        $('#table-institusi').DataTable();
    } );
    let list_institusi = [];    
    const table_institusi = $('#table-institusi').DataTable({
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
        ajax: {
            url: "{{ route('admin.DataInstitusi') }}",
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
                "render": function (data, type, row, meta) 
                {
					list_institusi[row.id] = row;
                    return row.nama_institusi;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_institusi[row.id] = row;
                    return row.alamat_institusi;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_institusi[row.id] = row;
                    return row.kode_pos;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_institusi[row.id] = row;
                    return row.nomor_hp_institusi;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_institusi[row.id] = row;
                    return row.email_institusi;
                }
            },
            {
                "targets": 5,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span id-jurusan = "${row.id}" onclick="clickEditInstitusi(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span id-institusi = "${row.id}" class="badge bg-danger rounded-pill hapus_institusi">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    function clickEditInstitusi(id){
            const data_institusi = list_institusi[id]
            $("#modalEditInstitusi").modal('show');
            $("#formEditInstitusi [name='id']").val(id);
            $("#formEditInstitusi [name='nama_institusi']").val(data_institusi.nama_institusi);
            $("#formEditInstitusi [name='email_institusi']").val(data_institusi.email_institusi);
            $("#formEditInstitusi [name='nomor_hp_institusi']").val(data_institusi.nomor_hp_institusi);
            $("#formEditInstitusi [name='kode_pos']").val(data_institusi.kode_pos);
            $("#formEditInstitusi [name='alamat_institusi']").val(data_institusi.alamat_institusi);

            $('#formEditInstitusi').on('submit', function (e) {
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
                        table_institusi.ajax.reload(null,false)
                        $("#modalEditInstitusi").modal('hide')
                    }
                }
            });
        });
    }

    $(document).on('click', '.hapus_institusi', function (event) {
        const id = $(event.currentTarget).attr('id-institusi');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
            url: "/admin/hapus-institusi/" + id,
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
                    table_institusi.ajax.reload(null, false)
                }
            }
        });
            } else {
                //alert ('no');
                return false;
            }
        });
    });

    $('#formInstitusi').on('submit', function (e) {
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
                    table_institusi.ajax.reload(null,false)
                    $("#modalTambahInstitusi").modal('hide')
                }
            }
        });
    });
</script>
@endsection
