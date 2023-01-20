@extends('layout.main-layout', ['title'=>"Materi Uji Kompetensi"])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <span class="badge bg-info rounded-pill">
                    <a class="text-white" href="#" data-bs-toggle="modal"
                        data-bs-target="#tambahMuk">Tambah Materi Uji Kompetensi
                    </a>
                </span>
            
                {{-- MODAL TAMBAH --}}
            <div class="modal fade text-left" id="tambahMuk" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Materi Uji Kompetensi</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.TambahMUK') }}" id="isi-muk" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Materi Uji Kompetensi</label>
                                <div class="form-group">
                                    <input type="text" name="muk" placeholder="Materi Uji Kompetensi" class="form-control rounded-5">
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text muk_error"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="js-example-basic-single" name="jurusan_id">
                                        <option value="" selected disabled>Pilih Jurusan</option>
                                        @foreach ($jurusan as $data_jurusan)
                                            <option value="{{ $data_jurusan->id }}">{{ $data_jurusan->jurusan }}</option>                                            
                                        @endforeach
                                    </select>
                                    <div class="input-group has-validation">
                                        <label class="text-danger error-text jurusan_id_error"></label>
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
                <table class="table table-striped" id="table-muk">
                    <thead>
                        <tr>
                            <th>Materi Uji Kompetensi</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade text-left" id="editMUK" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Materi Uji Kompetensi</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="formEditMUK" action="{{ route('admin.UbahMUK') }}" method="POST">
                        <input type="hidden" name="id" hidden>
                        @csrf
                        <div class="modal-body">
                            <label>Nama Materi Uji Kompetensi</label>
                            <div class="form-group field_wrapper">
                                <input type="text" name="muk" placeholder="Materi Uji Kompetensi" 
                                class="form-control rounded-5 muk">
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text muk_error"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <select class="js-example-basic-single" name="jurusan_id">
                                    @foreach ($jurusan as $data_jurusan)
                                        <option value="{{ $data_jurusan->id }}">{{ $data_jurusan->jurusan }}</option>                                            
                                    @endforeach
                                </select>
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text jurusan_id_error"></label>
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
    let list_muk = [];    
    const table_muk = $('#table-muk').DataTable({
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
            url: "{{ route('admin.DataMUK') }}",
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
					list_muk[row.id] = row;
                    return row.muk;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_muk[row.id] = row;
                    return row.relasi_jurusan.jurusan;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span onclick="editMUK(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Edit</a>
                                </span>
                                <span onclick="hapusMUK(${row.id})" class="badge bg-danger rounded-pill">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });

    function editMUK(id){
        const data_muk = list_muk[id]
            $("#editMUK").modal('show');
            $("#formEditMUK [name='id']").val(id)
            $("#formEditMUK .muk").val(data_muk.muk);
        
            $('#formEditMUK').on('submit', function (e) {
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
                        $("#editMUK").modal('hide');
                        swal({
                            title: "Berhasil",
                            text: `${data.msg}`,
                            icon: "success",
                            buttons: true,
                            successMode: true,
                        }),
                        table_muk.ajax.reload(null,false);
                    }
                }
            });
        });
    }

    function hapusMUK(id){
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-muk/" + id,
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
                    table_muk.ajax.reload(null, false)
                }
            }
        });
    }

    $('#isi-muk').on('submit', function (e) {
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
                    table_muk.ajax.reload(null,false)
                    $("#tambahMuk").modal('hide')
                    $('.submit-tambah-muk').removeClass('disabled')
                }
            }
        });
    });
</script>
@endsection
