@extends('layout.main-layout', ['title'=>"Jurusan"])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <span class="badge bg-info rounded-pill">
                    <a class="text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#tambahJurusan">Tambah Jurusan
                    </a>
                </span>
            
                {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="tambahJurusan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Jurusan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.TambahJurusan') }}" id="isi-jurusan" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Nama Jurusan</label>
                                <div class="form-group">
                                    <input type="text" name="jurusan" placeholder="Nama Jurusan" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text jurusan_error"></label>
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
                <table class="table table-striped" id="table-jurusan">
                    <thead>
                        <tr>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade text-left" id="editJurusan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Jurusan</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
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
        $('#table-jurusan').DataTable();
    } );
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
                "render": function (data, type, row, meta) 
                {
					list_jurusan[row.id] = row;
                    return row.jurusan;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span id-jurusan = "${row.id}" onclick="editJurusan(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span id-jurusan = "${row.id}" onclick="hapusJurusan(${row.id})" class="badge bg-danger rounded-pill">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    function editJurusan(id){
            const data_jurusan = list_jurusan[id]
            $("#editJurusan").modal('show');
            $("#formEditJurusan [name='id']").val(id)
            $("#formEditJurusan .jurusan").val(data_jurusan.jurusan)

            $('#formEditJurusan').on('submit', function (e) {
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
                        table_jurusan.ajax.reload(null,false)
                        $("#editJurusan").modal('hide')
                    }
                }
            });
        });
    }

    function hapusJurusan(id){
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/hapus-jurusan/" + id;
                table_jurusan.ajax.reload(null,false)
            }
        });
    }


    $('#isi-jurusan').on('submit', function (e) {
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
                    table_jurusan.ajax.reload(null,false)
                    $("#tambahJurusan").modal('hide')
                }
            }
        });
    });
</script>
@endsection
