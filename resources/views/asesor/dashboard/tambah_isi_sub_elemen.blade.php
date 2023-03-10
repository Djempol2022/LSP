@extends('layout.main-layout', ['title' => 'Isi Elemen Unit Kompetensi'])
@section('main-section')
<div class="container mt-5 jalur-file" id="profile-section">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                href="{{ route('asesor.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Isi Elemen Unit Kompetensi</li>
        </ol>
    </nav>
    {{-- EDIT PROFIL --}}
    <div class="mt-5">

        {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
        <div class="mb-5 pb-5">
            {{-- UNIT KOMPETENSI --}}
            <div class="col profil-section" style="margin-bottom:0% !important">
                <h5>Tambah Isi Sub Elemen</h5>
                <form action="{{ route('asesor.TambahIsiSubElemen') }}" method="POST" id="formTambahIsiSubElemenKonten">
                    <div class="row my-4">
                        <div class="col-md-9">
                            @csrf
                            <input name="unit_kompetensi_isi_id" value="{{$id}}" type="hidden" hidden>
                            <textarea type="text" class="form-control" rows="3" name="judul_unit_kompetensi_isi_2" placeholder="Isikan Sub Elemen"></textarea>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text judul_unit_kompetensi_isi_2_error"></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="simpan-isi-2-elemen-btn" type="submit" class="btn btn-primary ml-1 icon icon-left text-white fw-semibold rounded-pill btn btn-sm bg-primary">
                                <i id="search-button-isi-2-elemen"></i>
                                <span id="text-simpan-isi-2-elemen"><i class="fa fa-plus fa-xs"></i> Tambah Elemen</span>
                            </button>

                            {{-- <button type="submit" class="icon icon-left text-white fw-semibold rounded-pill btn btn-sm bg-primary"><i class="fa fa-plus fa-xs"></i> Tambah Elemen</button> --}}
                    </div>
                </form>
                </div>
            </div>

            {{-- DAFTAR ELEMEN UNIT KOMPETENSI --}}
            <div class="col profil-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col mb-5">

                                {{-- ELEMEN UNIT KOMPETENSI SUB --}}
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="row col mx-3" style="margin-left:0rem !important">
                                            <div class="col mb-3">
                                                <div class="row mt-3">
                                                    <table class="table table-hover">
                                                        <thead>
                                                          <tr>
                                                            <th width="80%">Isi Sub Elemen</th>
                                                            <th>Aksi</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($isi_sub_elemen as $data_isi_sub_elemen)
                                                          <tr>
                                                            <td>
                                                                <a href="" class="ubah-judul-elemen-isi2" data-type="text"
                                                                    data-pk="{{ $data_isi_sub_elemen->id}}" style="color:black;"
                                                                    data-title="Masukkan Isi Elemen">{{ $data_isi_sub_elemen->judul_unit_kompetensi_isi_2 ?? ''}}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span id-elemen="{{ $data_isi_sub_elemen->id }}">
                                                                    <a class="btn btn-sm btn-danger rounded-pill text-white fw-semibold click-hapus-isi-2-sub-elemen" href="#!" id-isi2-elemen="{{ $data_isi_sub_elemen->id }}">
                                                                        <i class="fa fa-trash fa-xs"></i> Hapus
                                                                    </a>
                                                                </span>
                                                            </td>
                                                          </tr>
                                                            @empty
                                                            <p>Data Kosong</p>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODAL TAMBAH ELEMEN --}}
<div class="modal fade text-left" id="modalTambahElemen" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <button type="button" class="btn btn-light-secondary rounded-pill" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1 submit-tambah-muk rounded-pill">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    // TAMBAH ISI ELEMEN KONTEN
    $('#formTambahIsiSubElemenKonten').on('submit', function (e) {
        var $search = $("#search-button-isi-elemen")
            e.preventDefault();
            $("#simpan-isi-2-elemen-btn").attr('disabled','disabled');
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
                        $("#simpan-isi-2-elemen-btn").removeAttr('disabled');
                        $.each(data.error, function (prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        
                        $("#search-button-isi-2-elemen").addClass("fa fa-spinner fa-spin")
                        $("#text-simpan-isi-2-elemen").html('')

                        setTimeout(function() {
                            for (var i = 0; i < 10000; i++) {
                                $search.addClass("fa-search").removeClass("fa fa-spinner fa-spin")
                            }
                            swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                successMode: true,
                            }),
                            location.reload();
                        }, 2500);
                    }
                }
            });
        });

    // UBAH ELEMEN KONTEN DENGAN LIBRARY EDITABLE
    $('.ubah-judul-elemen-isi2').editable({
        url: "{{route('asesor.UbahIsiElemen2')}}",
        type: 'text',
    });

    $('.click-hapus-isi-2-sub-elemen').on('click', function(){
        var id_isi_2_elemen = $(this).attr('id-isi2-elemen')
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
                    url: "/asesor/hapus-isi-2-elemen/" + id_isi_2_elemen,
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
                            location.reload();
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
