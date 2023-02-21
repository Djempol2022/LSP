@extends('layout.main-layout', ['title'=>"Kualifikasi Pendidikan"])
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
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Kualifikasi Pendidikan</li>
    </ol>
</nav>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <span class="badge bg-info rounded-pill">
                    <a class="text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalTambahKualifikasiPendidikan">Tambah Kualifikasi Pendidikan
                    </a>
                </span>
            
                {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="modalTambahKualifikasiPendidikan" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Kualifikasi Pendidikan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.TambahKualifikasiPendidikan') }}" id="form-TambahKualifikasiPendidikan" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Kualifikasi Pendidikan</label>
                                <div class="form-group">
                                    <input type="text" name="pendidikan" placeholder="Kualifikasi Pendidikan" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text pendidikan_error"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Batal</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1 submit-tambah-muk">
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
                <table class="table table-striped" id="table-kualifikasi-pendidikan">
                    <thead>
                        <tr>
                            <th>Pendidikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade text-left" id="editKualifikasiPendidikan" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Kualifikasi Pendidikan</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="formeditKualifikasiPendidikan" action="{{ route('admin.UbahKualifikasiPendidikan') }}" method="POST">
                        <input type="hidden" name="id" hidden>
                        @csrf
                        <div class="modal-body">
                            <label>Kualifikasi Pendidikan</label>
                            <div class="form-group field_wrapper">
                                <input type="text" name="pendidikan" placeholder="Kualifikasi Pendidikan" 
                                class="form-control rounded-5 muk">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text pendidikan_error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1 submit-ubah-muk">
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
    let list_kualifikasi_pendidikan = [];    
    const table_kualifikasi_pendidikan = $('#table-kualifikasi-pendidikan').DataTable({
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
        "searching": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "{{ route('admin.DataKualifikasiPendidikan') }}",
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
					list_kualifikasi_pendidikan[row.id] = row;
                    return row.pendidikan;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span onclick="editKualifikasiPendidikan(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span id-kualifikasi-pendidikan="${row.id}" class="badge bg-danger rounded-pill hapus_kualifikasi_pendidikan">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    function editKualifikasiPendidikan(id){
        const data_muk = list_kualifikasi_pendidikan[id]
            $("#editKualifikasiPendidikan").modal('show');
            $("#formeditKualifikasiPendidikan [name='id']").val(id)
            $("#formeditKualifikasiPendidikan .muk").val(data_muk.muk);
        
            $('#formeditKualifikasiPendidikan').on('submit', function (e) {
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
                        $("#editKualifikasiPendidikan").modal('hide');
                        swal({
                            title: "Berhasil",
                            text: `${data.msg}`,
                            icon: "success",
                            buttons: true,
                            successMode: true,
                        }),
                        table_kualifikasi_pendidikan.ajax.reload(null,false);
                    }
                }
            });
        });
    }

    $(document).on('click', '.hapus_kualifikasi_pendidikan', function (event) {
        const id = $(event.currentTarget).attr('id-kualifikasi-pendidikan');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
            url: "/admin/hapus-kualifikasi-pendidikan/" + id,
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
                    table_kualifikasi_pendidikan.ajax.reload(null, false)
                }
            }
        });
            } else {
                //alert ('no');
                return false;
            }
        });
    });

    $('#form-TambahKualifikasiPendidikan').on('submit', function (e) {
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
                    table_kualifikasi_pendidikan.ajax.reload(null,false)
                    $("#modalTambahKualifikasiPendidikan").modal('hide')
                }
            }
        });
    });
</script>
@endsection
