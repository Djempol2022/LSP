@extends('layout.main-layout', ['title' => 'Detail Elemen Unit Kompetensi'])
@section('main-section')
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail Elemen Unit Kompetensi</li>
    </ol>
</nav>
<div class="container mt-5 jalur-file" id="profile-section">
    <div class="mt-5">

        {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
        <div class="mb-5 pb-5">
            <div class="col profil-section-title">
                Detail Elemen Unit Kompetensi Jurusan {{Auth::user()->relasi_jurusan->jurusan}}
            </div>
            {{-- UNIT KOMPETENSI --}}
            <div class="col profil-section" style="margin-bottom:0% !important">
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Kode Unit Kompetensi</p>
                            <span class="kode_unit_kompetensi"></span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Judul Unit Kompetensi</p>
                            <span class="judul_unit_kompetensi"></span>
                        </div>

                        <div class="col pb-4">
                            <p class="fw-bold">Jenis Standar(Standar Khusus/Standar Internasional/SKKNI)</p>
                            <span class="skkni"></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DAFTAR ELEMEN UNIT KOMPETENSI --}}
            <div class="col profil-section">
                <div class="row">
                    <div class="col-6 pb-4">
                <a class="text-white rounded-pill fw-semibold btn btn-sm bg-primary" href="#" data-bs-toggle="modal"
                    data-bs-target="#modalTambahElemen">Tambah Elemen
                </a>
                    </div>
                    <div class="col-md-12">
                        <div class="col mb-5">
                            {{-- <ol class="list-group list-group-numbered"> --}}
                                {{-- ELEMEN UNIT KOMPETENSI SUB --}}

                                @foreach ($data_unit_kompetensi_sub as $index1 => $data_sub_elemen)
                                {{-- <li class="d-flex justify-content-between align-items-start border-0 fw-semibold"> --}}
                                    <div class="card">
                                        <div class="card-body">
                                    <div class="ms-2 me-auto">
                                        <div class="row mt-3">
                                        <div class="col-auto "><h5>Elemen : {{ $index1+1 }}.</h5></div>
                                        <div class="col-auto kriteria-isi" style="width: 51.93222%">
                                            <a href="" class="ubah-judul-elemen" data-type="text"
                                                data-pk="{{ $data_sub_elemen->id }}" style="color:black;"
                                                data-title="Enter name">
                                                <h5>{{ $data_sub_elemen->judul_unit_kompetensi_sub ?? ''}}</h5>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                        <span class="badge bg-info rounded-pill">
                                            <a class="text-white fw-semibold tambah_isi_elemen"
                                                id-elemen="{{ $data_sub_elemen->id }}" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalTambahIsiElemenKonten">+ Sub Elemen
                                            </a>
                                        </span>
                                        <span id-elemen="{{ $data_sub_elemen->id }}"
                                            class="badge bg-danger rounded-pill click-hapus-elemen">
                                            <a class="text-white" href="#!">Hapus</a>
                                        </span>
                                        </div>
                                    </div>

                                        {{-- <span id-elemen="{{ $data_sub_elemen->id }}"
                                            judul-elemen="{{ $data_sub_elemen->judul_unit_kompetensi_sub }}"
                                            class="badge bg-warning rounded-pill click-ubah-elemen">
                                            <a class="text-white" href="#!">Ubah Elemen Konten</a>
                                        </span> --}}
                                        {{-- ELEMEN KONTEN UNIT KOMPETENSI SUB --}}
                                        @php
                                            $i= 1;
                                        @endphp

                                        @forelse ($data_unit_kompetensi_isi as $index2 => $data_isi_sub_elemen)
                                        @if ($data_isi_sub_elemen->unit_kompetensi_sub_id == $data_sub_elemen->id)
                                        <div class="row col mx-3" style="margin-left:0rem !important">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <div class="col-auto">{{ $index1+1 }}.{{ $i++ }}
                                                    </div>
                                                    <div class="col-auto" style="width: 60.83222%">
                                                        <a href="" class="ubah-judul-elemen-isi" data-type="text"
                                                            data-pk="{{ $data_isi_sub_elemen->id}}" style="color:black;"
                                                            data-title="Enter name">{{ $data_isi_sub_elemen->judul_unit_kompetensi_isi ?? ''}}
                                                        </a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <span class="badge bg-warning rounded-pill">
                                                            <a class="text-white fw-semibold tambah_isi_elemen"
                                                                id-elemen="{{ $data_sub_elemen->id }}" href="{{route('asesor.Dashboard.IsiSubElemen', $data_isi_sub_elemen->id)}}">Detail
                                                            </a>
                                                        </span>
                                                        <span id-elemen="{{ $data_sub_elemen->id }}"
                                                            class="badge bg-danger rounded-pill">
                                                            <a href="#!" class="click-hapus-isi-elemen" id-isi-elemen="{{ $data_isi_sub_elemen->id }}" style="color: rgb(255, 255, 255)">
                                                                Hapus
                                                            </a>
                                                        </span>
                                                        {{-- <a href="#!" class="click-hapus-isi-elemen" id-isi-elemen="{{ $data_isi_sub_elemen->id }}" style="color: rgba(255, 0, 0, 0.564)">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                        <a href="#!" class="click-hapus-isi-elemen" id-isi-elemen="{{ $data_isi_sub_elemen->id }}" style="color: rgba(255, 0, 0, 0.564)">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                {{-- </li> --}}
                            </div>
                        </div>
                                @endforeach
                            {{-- </ol> --}}
                </div>
                        {{-- <table class="table table-striped" id="table-elemen-unit-kompetensi">
                            <thead>
                                <tr>
                                    <th>Elemen Judul Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODAL TAMBAH ELEMEN --}}
<div class="modal fade text-left" id="modalTambahElemen" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Materi Uji Kompetensi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('asesor.TambahElemen') }}" id="formTambahElemen" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Elemen : Judul Elemen Unit Kompetensi</label>
                        <div class="input-group col-xs-12">
                            <input type="hidden" class="unit_kompetensi_id" name="unit_kompetensi_id" hidden>
                            <input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_sub[]">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary btn-tambah-elemen"
                                    type="button">+</button>
                            </span>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text judul_unit_kompetensi_sub_error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="input-elemen"></div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button id="simpan-elemen-btn" type="submit" class="btn btn-primary ml-1">
                        <i id="search-button"></i>
                        <span id="text-simpan" class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL EDIT ELEMEN --}}
{{-- <div class="modal fade text-left" id="modalUbahElemen" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Elemen Konten</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('asesor.UbahElemen') }}" id="formUbahElemen" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Elemen Konten : Judul Elemen Konten Unit Kompetensi</label>
                    <div class="form-group">
                        <input type="hidden" name="elemen_unit_kompetensi_id" class="elemen_unit_kompetensi_id" hidden>
                        <input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_sub">
                        <div class="input-group has-validation">
                            <label class="text-danger error-text judul_unit_kompetensi_sub_error"></label>
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
</div> --}}

{{-- MODAL TAMBAH ELEMEN KONTEN --}}
<div class="modal fade text-left" id="modalTambahIsiElemenKonten" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Elemen Konten</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('asesor.TambahIsiElemenKonten') }}" id="formTambahIsiElemenKonten" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Elemen Konten : Judul Elemen Unit Kompetensi</label>
                    <div class="form-group">
                        <div class="input-group col-xs-12">
                            <input type="hidden" name="unit_kompetensi_sub_id" class="elemen_unit_kompetensi_sub_id"
                                hidden>
                            <input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_isi[]">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary btn-tambah-isi-elemen"
                                    type="button">+</button>
                            </span>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text judul_unit_kompetensi_sub_error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="input-isi-elemen"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button id="simpan-isi-elemen-btn" type="submit" class="btn btn-primary ml-1">
                        <i id="search-button-isi-elemen"></i>
                        <span id="text-simpan-isi-elemen" class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    let data_unit_kompetensi = @json($unit_kompetensi);
    // let list_elemen_unit_kompetensi = [];

    $('.kode_unit_kompetensi').text(data_unit_kompetensi.kode_unit)
    $('.judul_unit_kompetensi').text(data_unit_kompetensi.judul_unit)
    $('.skkni').text(data_unit_kompetensi.jenis_standar)
    $('.unit_kompetensi_id').val(data_unit_kompetensi.id)
    $('.elemen_unit_kompetensi_sub_id').val(data_unit_kompetensi.id)

    // MULTIPLE TAMBAH ELEMEN
    $('.btn-tambah-elemen').on('click', function () {
        tambahElemen();
    });

    function tambahElemen() {
        var elemen =
            '<div class="form-group"><div class="input-group col-xs-12"><input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_sub[]"><span class="input-group-append"><button class="file-upload-browse btn btn-danger hapusElemen" type="button">-</button></span><div class="input-group has-validation"><label class="text-danger error-text judul_unit_kompetensi_isi_error"></label></div></div></div>';
        $('.input-elemen').append(elemen);
    };

    $('.input-elemen').on('click', '.hapusElemen', function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
    });

    // MULTIPLE TAMBAH ELEMEN KONTEN
    $('.btn-tambah-isi-elemen').on('click', function () {
        tambahIsiElemen();
    });

    function tambahIsiElemen() {
        var isi_elemen =
            '<div class="form-group"><div class="input-group col-xs-12"><input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_isi[]"><span class="input-group-append"><button class="file-upload-browse btn btn-danger hapusIsiElemen" type="button">-</button></span><div class="input-group has-validation"><label class="text-danger error-text judul_unit_kompetensi_isi_error"></label></div></div></div>';
        $('.input-isi-elemen').append(isi_elemen);
    };

    $('.input-isi-elemen').on('click', '.hapusIsiElemen', function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
    });

    // function tambahElemen() {
    //     var elemen ='<div class="form-group"><label>Konten Elemen : Konten Elemen Unit Kompetensi</label><div class="input-group col-xs-12"><input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_isi[]"><span class="input-group-append"><button class="file-upload-browse btn btn-danger hapusElemen" type="button">-</button></span><div class="input-group has-validation"><label class="text-danger error-text judul_unit_kompetensi_isi_error"></label></div></div></div>';
    //     $('.input-elemen').append(elemen);
    // };



    // TAMBAH ISI ELEMEN
    // $('.btnIsiElemen').on('click', function () {
    //     alert('tes');
    //     tambahIsiElemen();
    // });

    // function tambahIsiElemen() {
    //     var isiElemen ='<div class="form-group"><label>Konten Isi Elemen : Konten Isi Elemen Unit Kompetensi</label><div class="input-group col-xs-12"><input type="text" class="form-control rounded-5" name="judul_unit_kompetensi_sub[]"><span class="input-group-append"><button class="file-upload-browse btn btn-danger hapusElemen" type="button">-</button><button class="file-upload-browse btn btn-danger hapusElemen" type="button">+</button></span><div class="input-group has-validation"><label class="text-danger error-text judul_unit_kompetensi_sub_error"></label></div></div></div>';
    //     $('.input-isi-elemen').append(isiElemen);
    // };

    // $('.input-isi-elemen').on('click', '.hapusIsiElemen', function(e){
    //     e.preventDefault();
    //     $(this).parent().parent().parent().remove();
    // });

    // const table_elemen_unit_kompetensi = $('#table-elemen-unit-kompetensi').DataTable({
    //     "pageLength": 10,
    //     "lengthMenu": [
    //         [10, 25, 50, 100, -1],
    //         [10, 25, 50, 100, 'semua']
    //     ],
    //     "bLengthChange": true,
    //     "bFilter": true,
    //     "bInfo": true,
    //     "processing": true,
    //     "bServerSide": true,
    //     "responsive": true,
    //     ajax: {
    //         url: "/asesor/data-elemen-unit-kompetensi-jurusan-asesor/" + data_unit_kompetensi.id,
    //         type: "POST",
    //         // data:function(d){
    //         //     d.data_kabupaten = data_kabupaten;
    //         //     d.data_status_id = data_status_id;
    //         //     return d
    //         // }
    //     },
    //     columnDefs: [{
    //             targets: '_all',
    //             visible: true
    //         },
    //         {
    //             "targets": 0,
    //             "class": "text-wrap text-center",
    //             // "render" : function(data, type, row, meta){
    //             //     let cth;
    //             //         cth = `<div class="col mb-5">
    //             //                 <ol class="list-group list-group-numbered">
    //             //                     <li style="background-color: transparent;text-align: left;"
    //             //                         class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
    //             //                         <div class="ms-2 me-auto ">
    //             //                             Elemen: ${row.judul_unit_kompetensi_sub}
    //             //                             <div class="py-1">Kriteria Kerja:</div>
    //             //                             `+
    //             //                             data_unit_kompetensi_sub.judul_unit_kompetensi_sub
    //             //                             +`
    //             //                             <div class="row col mx-3">
    //             //                                 <div class="col mb-3">
    //             //                                     <div class="row mt-3">
    //             //                                         <div class="col-auto kriteria-nomor">1.1</div>
    //             //                                         <div class="col-auto kriteria-isi">Persyaratan fungsi
    //             //                                             yang akurat,
    //             //                                             komplit
    //             //                                             dan sesuai prioritas
    //             //                                             diidentifikasi sesuai keperluan dengan referensi semua tipe
    //             //                                             media.
    //             //                                         </div>
    //             //                                     </div>
    //             //                                 </div>
    //             //                                 <hr>
    //             //                             </div>
    //             //                         </div>
    //             //                     </li>
    //             //                 </ol>
    //             //             </div>`;
    //             //     return cth;
    //             // }
    //             "render": function (data, type, row, meta) {
    //                 list_elemen_unit_kompetensi[row.id] = row;
    //                 let tampil_table;
    //                 tampil_table = `Baris 1 ${row.judul_unit_kompetensi_sub.relasi_unit_kompetensi_isi} <br> Baris 2 ${row.judul_unit_kompetensi_sub}`
    //                 return tampil_table;
    //             }
    //         },
    //         {
    //             "targets": 1,
    //             "class": "text-nowrap text-center",
    //             "render": function (data, type, row, meta) {
    //                 let tampilan;
    //                 tampilan =
    //                     `<span onclick="clickUbahElemen(${row.id})" class="badge bg-warning rounded-pill">
    //                                 <a class="text-white" href="#!">Edit</a>
    //                             </span>
    //                             <span onclick="clikcHapusElemen(${row.id})" class="badge bg-danger rounded-pill">
    //                                 <a class="text-white" href="#!">Hapus</a>
    //                             </span>
    //                             <span onclick="clickUbahElemen(${row.id})" class="badge bg-warning rounded-pill">
    //                                 <a class="text-white" href="#">Tambah Isi Sub</a>
    //                             </span>
    //                             `
    //                 return tampilan;
    //             }
    //         },
    //     ]
    // });

    // UBAH ELEMEN
    // $('.click-ubah-elemen').on('click', function () {
    //     var judul_elemen = $(this).attr('judul-elemen')
    //     var id_elemen = $(this).attr('id-elemen')

    //     $("#modalUbahElemen").modal('show');
    //     $("#formUbahElemen [name='judul_unit_kompetensi_sub']").val(judul_elemen)
    //     $("#formUbahElemen [name='elemen_unit_kompetensi_id']").val(id_elemen)
    //     $('#formUbahElemen').on('submit', function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: $(this).attr('action'),
    //             method: $(this).attr('method'),
    //             data: new FormData(this),
    //             processData: false,
    //             dataType: 'json',
    //             contentType: false,
    //             beforeSend: function () {
    //                 $(document).find('label.error-text').text('');
    //             },
    //             success: function (data) {
    //                 if (data.status == 0) {
    //                     $.each(data.error, function (prefix, val) {
    //                         $('label.' + prefix + '_error').text(val[0]);
    //                         // $('span.'+prefix+'_error').text(val[0]);
    //                     });
    //                 } else if (data.status == 1) {
    //                     swal({
    //                             title: "Berhasil",
    //                             text: `${data.msg}`,
    //                             icon: "success",
    //                             buttons: true,
    //                             successMode: true,
    //                         }),
    //                         // table_elemen_unit_kompetensi.ajax.reload(null, false);
    //                         $("#modalUbahElemen").modal('hide')
    //                     location.reload();
    //                 }
    //             }
    //         });
    //     });
    // });

    // UBAH ELEMEN
    $('.ubah-judul-elemen').editable({
        url: "{{route('asesor.UbahElemen')}}",
        type: 'text',
    });
    

    // HAPUS ELEMEN
    $('.click-hapus-elemen').on('click', function () {
        var id_elemen = $(this).attr('id-elemen')
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "/asesor/hapus-elemen/" + id_elemen,
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
                                // table_elemen_unit_kompetensi.ajax.reload(null, false)
                            setTimeout(function() {location.reload()}, 800);
                            return false;
                        }
                    }
                });
            } else {
                return false;
            }
        });
    });

    // TAMBAH ELEMEN
    $('#formTambahElemen').on('submit', function (e) {
        e.preventDefault();

        var $search = $("#search-button")
        // $("#simpan-elemen-btn").attr('disabled','disabled');
        
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
                    $("#simpan-elemen-btn").removeAttr('disabled');
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
                    location.reload();
                }
            }
        });
    });

    // TAMBAH ELEMEN KONTEN
    $('.tambah_isi_elemen').click(function () {

        var id_elemen = $(this).attr('id-elemen')
        var $search = $("#search-button")
        $('.elemen_unit_kompetensi_sub_id').val(id_elemen);

        $('#formTambahIsiElemenKonten').on('submit', function (e) {
            e.preventDefault();
            $("#simpan-isi-elemen-btn").attr('disabled','disabled');
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
                        $("#simpan-isi-elemen-btn").removeAttr('disabled');
                        $.each(data.error, function (prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        
                        $("#search-button-isi-elemen").addClass("fa fa-spinner fa-spin")
                        $("#text-simpan-isi-elemen").html('')

                        setTimeout(function() {
                            for (var i = 0; i < 10000; i++) {
                                $("#modalTambahIsiElemenKonten").modal('hide')
                                $search.addClass("fa-search").removeClass("fa fa-spinner fa-spin")
                            }
                            swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            location.reload();
                        }, 2500);
                    }
                }
            });
        });
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    // UBAH ELEMEN KONTEN DENGAN LIBRARY EDITABLE
    $('.ubah-judul-elemen-isi').editable({
        url: "{{route('asesor.UbahKontenElemen')}}",
        type: 'text',
    });

    $('.click-hapus-isi-elemen').on('click', function(){
        var id_isi_elemen = $(this).attr('id-isi-elemen')
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "/asesor/hapus-isi-elemen/" + id_isi_elemen,
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
                                // table_elemen_unit_kompetensi.ajax.reload(null, false)
                            setTimeout(function() {location.reload()}, 800);
                            return false;
                        }
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
@endsection
