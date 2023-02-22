@extends('layout.main-layout', ['title' => 'Jurusan'])
@section('main-section')
    <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('admin.Dashboard') }}">Dashboard</a></li>

            <li class="breadcrumb-item" aria-current="page">
                <a class="text-black text-decoration-none" href="{{ route('admin.Pengaturan') }}">Pengaturan
                </a>
            </li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Jurusan</li>
        </ol>
    </nav>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-info rounded-pill">
                        <a class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#tambahJurusan">Tambah
                            Jurusan
                        </a>
                    </span>

                    {{-- MODAL TAMBAH --}}
                    <div class="modal fade text-left" id="tambahJurusan" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Tambah Jurusan</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="{{ route('admin.TambahJurusan') }}" id="formJurusan" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <label>Nama Jurusan</label>
                                        <div class="form-group">
                                            <input type="text" name="jurusan" placeholder="Nama Jurusan"
                                                class="form-control rounded-5">
                                            <div class="input-group has-validation">
                                                <label class="text-danger error-text jurusan_error"></label>
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

                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table-jurusan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            {{-- MODAL EDIT --}}
            <div class="modal fade text-left" id="editJurusan" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Ubah Jurusan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form id="formEditJurusan" action="{{ route('admin.UbahJurusan') }}" method="POST">
                            <input type="hidden" name="id" hidden>
                            @csrf
                            <div class="modal-body">
                                <label>Nama Jurusan</label>
                                <div class="form-group">
                                    <input type="text" name="jurusan" placeholder="Nama Jurusan"
                                        class="form-control rounded-5 jurusan">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text jurusan_error"></label>
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

        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#table-jurusan').DataTable();
        });
        let list_jurusan = [];
        const table_jurusan = $('#table-jurusan').DataTable({
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
            "sScrollX": '100%',
            "sScrollXInner": "100%",
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
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        let i = 1;
                        list_jurusan[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        list_jurusan[row.id] = row;
                        return row.jurusan;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        let tampilan;
                        tampilan = `<span id-jurusan = "${row.id}" onclick="editJurusan(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span id-jurusan = "${row.id}" class="badge bg-danger rounded-pill hapus_jurusan">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                        return tampilan;
                    }
                },
            ]
        });

        $('#formJurusan').on('submit', function(e) {
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
                            table_jurusan.ajax.reload(null, false)
                        $("#tambahJurusan").modal('hide')
                    }
                }
            });
        });

        function editJurusan(id) {
            const data_jurusan = list_jurusan[id]
            $("#editJurusan").modal('show');
            $("#formEditJurusan [name='id']").val(id)
            $("#formEditJurusan .jurusan").val(data_jurusan.jurusan)

            $('#formEditJurusan').on('submit', function(e) {
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
                                table_jurusan.ajax.reload(null, false)
                            $("#editJurusan").modal('hide')
                        }
                    }
                });
            });
        }

        $(document).on('click', '.hapus_jurusan', function(event) {
            const id = $(event.currentTarget).attr('id-jurusan');

            swal({
                title: "Yakin ?",
                text: "Menghapus Data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    $.ajax({
                        url: "/admin/hapus-jurusan/" + id,
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
                                    table_jurusan.ajax.reload(null, false)
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
