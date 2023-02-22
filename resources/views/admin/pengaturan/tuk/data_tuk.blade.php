@extends('layout.main-layout', ['title' => 'Tempat Uji Kompetensi'])
@section('main-section')
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
        href="{{ route('admin.Dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a class="text-black text-decoration-none"
            href="{{ route('admin.Pengaturan') }}">Pengaturan
        </a>
      </li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
        Tempat Uji Kompetensi
    </li>  
  </ol>
</nav>
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-header">
          <span class="badge bg-info rounded-pill">
            <a class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#modal-TambahNamaTUK" onclick="functionTambahTUK();">+ Tempat Uji Kompetensi
            </a>
          </span>

          {{-- MODAL TAMBAH Tempat Uji Kompetensi--}}
          <div class="modal fade text-left" id="modal-TambahNamaTUK" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Tambah Tempat Uji Kompetensi</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                  </button>
                </div>

                <form action="{{ route('admin.TambahDataNamaTUK') }}" id="form-TambahNamaTUK" method="POST">
                  @csrf

                    <div class="modal-body">
                        <label>Tempat Uji Kompetensi</label>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <input name="nama_tuk[]" class="form-control rounded-4">
                                <span class="input-group-append d-flex align-items-center" style="padding: 8px;">
                                    <button class="file-upload-browse btn btn-primary btn-tambah-tuk" type="button">
                                        +
                                    </button>
                                </span> 
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text komponen_0_error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="input-tuk"></div>
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
          <table class="table table-striped" id="table-nama-tuk">
            <thead>
              <tr>
                <th>No</th>
                <th>Komponen</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      {{-- MODAL EDIT KOMPONEN UMPAN BALIK--}}
      <div class="modal fade text-left" id="modal-EditNamaTUK" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel33">Ubah Tempat Uji Kompetensi</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form id="form-EditNamaTUK" action="{{ route('admin.UbahDataNamaTUK') }}" method="POST">
              <input type="hidden" name="id" hidden>
              @csrf
              <div class="modal-body">
                <label>Nama Tempat Uji Kompetensi</label>
                <div class="form-group field_wrapper">
                    <input name="nama_tuk" class="form-control rounded-4">
                  <div class="input-group has-validation">
                    <label class="text-danger error-text nama_tuk_error"></label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary close" data-bs-dismiss="modal">
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

     // MULTIPLE TAMBAH ELEMEN
 $('.btn-tambah-tuk').on('click', function () {
        tambahNamaTUK();
    });

    total = 1;
    function tambahNamaTUK() {
        $(".input-tuk").addClass('input-tuk')
        var komponen =
            `<div class="form-group"><div class="input-group col-xs-12"><input name="nama_tuk[]" class="form-control rounded-4"><span class="input-group-append d-flex align-items-center" style="padding: 8px;"><button class="file-upload-browse btn btn-danger hapusKomponen" type="button">-</button></span><div class="input-group has-validation"><label class="text-danger error-text komponen_${total++}_error"></label></div></div></div>`;
        $('.input-tuk').append(komponen);
    };

    $('.input-tuk').on('click', '.hapusKomponen', function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
    });


    let list_nama_tuk = [];
    const table_nama_tuk = $('#table-nama-tuk').DataTable({
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
        url: "{{ route('admin.DaftarDataNamaTUK') }}",
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
                list_unit_kompetensi[row.id] = row;
                return meta.row + 1;
            }
        },
        {
          "targets": 0,
          "class": "text-wrap",
          "render": function(data, type, row, meta) {
            list_nama_tuk[row.id] = row;
            return row.nama_tuk;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap",
          "render": function(data, type, row, meta) {
            let tampilan;
            tampilan = `<span onclick="editNamaTUK(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#!">Edit</a>
                                </span>
                                <span id-nama-tuk = "${row.id}" class="badge bg-danger rounded-pill hapus_nama_tuk">
                                    <a class="text-white" href="#!">Hapus</a>
                                </span>`
            return tampilan;
          }
        },
      ]
    });

    function editNamaTUK(id) {
      const data_nama_tuk = list_nama_tuk[id]
      $("#modal-EditNamaTUK").modal('show');
      $("#form-EditNamaTUK [name='id']").val(id);
      $("#form-EditNamaTUK [name='nama_tuk']").val(data_nama_tuk.nama_tuk);
      // $("#form-EditNamaTUK [name='jurusan_id']").val("jurusan")
      
      $('#form-EditNamaTUK').on('submit', function(e) {
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
              });
            } else if (data.status == 1) {
              $("#modal-EditNamaTUK").modal('hide');
              swal({
                  title: "Berhasil",
                  text: `${data.msg}`,
                  icon: "success",
                  buttons: true,
                  successMode: true,
                }),
                table_nama_tuk.ajax.reload();
            }
          }
        });
      });
    }

    $(document).on('click', '.hapus_nama_tuk', function (event) {
        const id = $(event.currentTarget).attr('id-nama-tuk');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
            $.ajax({
            url: "/admin/hapus-nama-tuk/" + id,
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
                    table_nama_tuk.ajax.reload()
                }
            }
        });
            } else {
                //alert ('no');
                return false;
            }
        });
    });

    function functionTambahTUK(){
        $("#form-TambahNamaTUK")[0].reset();
        $(".input-tuk").html('');
    }

    $('#form-TambahNamaTUK').on('submit', function(e) {
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
                console.log(prefix);
            //   $('.komponen_error'+1).text(val[0]);
                $('.komponen_'+[]+'_error').text(val[0]);              
            });
          } else if (data.status == 1) {
            swal({
                title: "Berhasil",
                text: `${data.msg}`,
                icon: "success",
                buttons: true,
                successMode: true,
              }),
              table_nama_tuk.ajax.reload()
            $("#modal-TambahNamaTUK").modal('hide')
          }
        }
      });
    });
    
</script>
@endsection
