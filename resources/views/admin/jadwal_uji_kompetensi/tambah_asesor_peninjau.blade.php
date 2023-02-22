@extends('layout.main-layout', ['title' => 'Rencana Jadwal Uji Kompetensi'])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="container mt-5 jalur-file">
            {{-- JALUR FOLDER --}}
            <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="text-black text-decoration-none"
                            href="{{ route('admin.Dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-black text-decoration-none"
                            href="{{route('admin.TampilanJadwalUjiKompetensi')}}">
                            Jadwal Uji Kompetensi
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
                        Rencana Jadwal Uji Kompetensi
                    </li>
                </ol>
            </nav>
            {{-- EDIT PROFIL --}}
            <div class="mt-5">

                {{-- JADWAL --}}
                <div class="mb-5 pb-5">
                    <div class="col profil-section-title">
                        Jadwal Uji Kompetensi Jurusan {{ $data_jurusan->jurusan }}
                    </div>
                    <a class="btn btn-primary btn-sm btn-rounded text-white"
                        href="#" data-bs-toggle="modal" data-bs-target="#modalTambahMukAsesorPeninjau">Tambah Data</a>
                    <div class="col profil-section">
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-striped" id="table-muk-asesor-peninjau">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Materi Uji Kompetensi</th>
                                                <th>Asesor</th>
                                                <th>Peninjau</th>
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

                {{-- MODAL TAMBAH MUK ASESOR PENINJAU--}}
                <div class="modal fade text-left" id="modalTambahMukAsesorPeninjau" tabindex="-1" role="dialog"
                    data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.TambahMukAsesorPeninjau') }}" id="formTambahMukAsesorPeninjau"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Materi Uji Kompetensi</label>
                                        <select class="form-control jurusan" name="muk_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Materi Uji Kompetensi --
                                            </option>
                                            @foreach ($muk as $data_muk)
                                            <option value="{{ $data_muk['id'] }}">{{ $data_muk['muk'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text muk_id_error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Asesor</label>
                                        <select class="form-control jurusan" name="user_asesor_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Asesor --</option>
                                            @foreach ($user_asesor as $data_user_asesor)
                                            <option value="{{ $data_user_asesor['id'] }}">{{ $data_user_asesor['nama_lengkap'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text user_asesor_id_error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peninjau</label>
                                        <select class="form-control jurusan" name="user_peninjau_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Peninjau --</option>
                                            @foreach ($user_peninjau as $data_user_peninjau)
                                            <option value="{{ $data_user_peninjau['id'] }}">
                                                {{ $data_user_peninjau['nama_lengkap'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text user_peninjau_id_error"></label>
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

                 {{-- MODAL TAMBAH MUK ASESOR PENINJAU--}}
                 <div class="modal fade text-left" id="modalEditMukAsesorPeninjau" tabindex="-1" role="dialog"
                    data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Ubah Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.UbahMukAsesorPeninjau') }}" id="formEditMukAsesorPeninjau"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Materi Uji Kompetensi</label>
                                        <input type="hidden" name="jadwal_uji_kompetensi_id" hidden>
                                        <select class="form-control" name="muk_id" id="muk_id" aria-hidden="true">
                                            
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text muk_id_error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Asesor</label>
                                        <select class="form-control" name="user_asesor_id" id="user_asesor_id" aria-hidden="true">
                                           
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text user_asesor_id_error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peninjau</label>
                                        <select class="form-control" name="user_peninjau_id" id="user_peninjau_id" aria-hidden="true">
                                           
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text user_peninjau_id_error"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
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

                {{-- ASESI --}}
                {{-- @include('admin.jadwal_uji_kompetensi.detail_bagian.asesi') --}}

                {{-- ASESOR --}}
                {{-- @include('admin.jadwal_uji_kompetensi.detail_bagian.asesor') --}}

                {{-- PENINJAU --}}
                {{-- @include('admin.jadwal_uji_kompetensi.detail_bagian.peninjau') --}}
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
    let id_jurusan = @json($data_jurusan);
    let data_muk = @json($muk);
    let data_asesor = @json($user_asesor);
    let data_peninjau = @json($user_peninjau);
    let list_muk_asesor_peninjau = [];
    let list_muk = [];

    function isset(accessor) {
      try {
        // Note we're seeing if the returned value of our function is not
        // undefined or null
        return accessor() !== undefined && accessor() !== null
      } catch (e) {
        // And we're able to catch the Error it would normally throw for
        // referencing a property of undefined
        return false
      }
    }

    // DATATABLE MUK ASESOR PENINJAU
    const table_muk_asesor_peninjau = $('#table-muk-asesor-peninjau').DataTable({
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
            url: "/admin/data-muk-asesor-peninjau/" + id_jurusan.id,
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
                    let i = 1;
                    list_muk_asesor_peninjau[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_muk_asesor_peninjau[row.id] = row;
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
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.acc == 0){
                        tampilan = `<span onclick="clickEditMukAsesorPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                        <a class="text-white" href="#!">Ubah</a>
                                    </span>
                                    <span id-jadwal-ukom="${row.id}" class="badge bg-danger rounded-pill hapus_jadwal_ukom">
                                        <a class="text-white" href="#!">Hapus</a>
                                    </span>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.acc == 1){
                        tampilan = `<span onclick="clickEditMukAsesorPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                        <a class="text-white" href="#!">Ubah</a>
                                    </span>
                                    <span id-jadwal-ukom="${row.id}" class="badge bg-danger rounded-pill hapus_jadwal_ukom">
                                        <a class="text-white" href="#!">Hapus</a>
                                    </span>
                                    <span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/admin/detail-jadwal-uji-kompetensi-acc/${row.id}/${row.relasi_muk.jurusan_id}">Detail</a>
                                    </span>`     
                    }          
                    return tampilan;
                }
            },
        ]
    });

    // FUNGSI MODAL TAMBAH MUK ASESOR PENINJAU

    $('#formTambahMukAsesorPeninjau').on('submit', function (e) {
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
                        table_muk_asesor_peninjau.ajax.reload(null, false)
                    $("#modalTambahMukAsesorPeninjau").modal('hide')
                    
                }
            }
        });
    });

    $('.close').on('click', function(){
        $("#muk_id").empty().append('');
        $("#user_asesor_id").empty().append('');
        $("#user_peninjau_id").empty().append('');
    })

    function clickEditMukAsesorPeninjau(id){
            const muk_asesor_peninjau = list_muk_asesor_peninjau[id]
            $("#modalEditMukAsesorPeninjau").modal('show');

            $("#formEditMukAsesorPeninjau [name='jadwal_uji_kompetensi_id']").val(id);

            $.each(data_muk, function(key, value) {
                $('#muk_id')
                .append(`<option value="${value.id}" ${value.id == muk_asesor_peninjau.muk_id ? 'selected' : ''}>${value.muk}</option>`)
            });
            $.each(data_asesor, function(key, value) {
                $('#user_asesor_id')
                .append(`<option value="${value.id}" ${value.id == muk_asesor_peninjau.relasi_user_asesor.user_asesor_id ? 'selected' : ''}>${value.nama_lengkap}</option>`)
            });
            $.each(data_peninjau, function(key, value) {
                $('#user_peninjau_id')
                .append(`<option value="${value.id}" ${value.id == muk_asesor_peninjau.relasi_user_asesor.user_peninjau_id ? 'selected' : ''}>${value.nama_lengkap}</option>`)
            });

            $("#formEditMukAsesorPeninjau [name='id']").val(id)
            $("#formEditMukAsesorPeninjau .jurusan").val(muk_asesor_peninjau.jurusan)

            $('#formEditMukAsesorPeninjau').on('submit', function (e) {
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
                        $("#modalEditMukAsesorPeninjau").modal('hide')
                    }
                }
            });
        });
    }

    $(document).on('click', '.hapus_jadwal_ukom', function (event) {
        const id = $(event.currentTarget).attr('id-jadwal-ukom');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
            url: "/admin/hapus-jadwal-uji-kompetensi/" + id,
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
                    table_muk_asesor_peninjau.ajax.reload()
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
