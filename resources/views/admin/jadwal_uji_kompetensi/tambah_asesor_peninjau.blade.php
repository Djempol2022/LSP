@extends('layout.main-layout', ['title' => 'Tambah Pihak Terkait Uji Kompetensi'])
@section('main-section')
<div class="page-content">
    <section class="section">
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

                {{-- JADWAL --}}
                <div class="mb-5 pb-5">
                    <div class="col profil-section-title">
                        Jurusan : {{ $data_jurusan->jurusan }}
                    </div>
                    <p class="py-3" style="font-size: 18px">Pada bagian ini, cantumkan data pribadi, data pendidikan
                        formal
                        serta
                        data pekerjaan
                        anda saat
                        ini.
                    </p>
                    <a class="btn btn-primary btn-sm btn-rounded text-white"
                        href="#" data-bs-toggle="modal" data-bs-target="#modalTambahMukAsesorPeninjau">Tambah Data</a>
                    <div class="col profil-section">
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-striped" id="table-muk-asesor-peninjau">
                                        <thead>
                                            <tr>
                                                <th>Materi Uji Kompetensi</th>
                                                <th>Asesor</th>
                                                <th>Peninjau</th>
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
                    aria-labelledby="myModalLabel33" aria-hidden="true">
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
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.TambahMukAsesorPeninjau') }}" id="formEditMukAsesorPeninjau"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Materi Uji Kompetensi</label>
                                        <select class="form-control" name="muk_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Materi Uji Kompetensi --</option>
                                            {{-- @foreach ($muk as $data_muk)
                                            <option value="{{ $data_muk['id'] }}">{{ $data_muk['muk'] }}</option>
                                            @endforeach --}}
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text muk_id_error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Asesor</label>
                                        <select class="form-control" name="user_asesor_id" aria-hidden="true">
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
                                        <select class="form-control" name="user_peninjau_id" aria-hidden="true">
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
    let data_ukom = @json($data_jadwal_uji_kompetensi);
    let list_jurusan = [];
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
        "responsive": true,
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
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_jurusan[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_jurusan[row.id] = row;
                    return row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_jurusan[row.id] = row;
                    return row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.acc == 0){
                        tampilan = `<span onclick="clickEditMukAsesorPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                        <a class="text-white" href="#">Ubah</a>
                                    </span>
                                    <span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-danger rounded-pill">
                                        <a class="text-white" href="#">Hapus</a>
                                    </span>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.acc == 1){
                        tampilan = `<span onclick="clickEditMukAsesorPeninjau(${row.id})" class="badge bg-warning rounded-pill">
                                        <a class="text-white" href="#">Ubah</a>
                                    </span>
                                    <span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-danger rounded-pill">
                                        <a class="text-white" href="#">Hapus</a>
                                    </span>
                                    <span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/admin/detail-jadwal-uji-kompetensi-acc/${row.relasi_pelaksanaan_ujian.jadwal_uji_kompetensi_id}">Detail</a>
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

    function clickEditMukAsesorPeninjau(id){
            const data_jurusan = list_jurusan[id]
            $("#modalEditMukAsesorPeninjau").modal('show');

            $("#formEditMukAsesorPeninjau [name='muk_id']").append(data_muk.map(function(d) {
                return $(
                `<option value='${d.id}' ${d.id === data_ukom.muk_id ? 'selected' : ''}>${d.muk}</option>`
                )
            }))

            $("#formEditMukAsesorPeninjau [name='id']").val(id)
            $("#formEditMukAsesorPeninjau .jurusan").val(data_jurusan.jurusan)

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
