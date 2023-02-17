@extends('layout.main-layout', ['title' => 'Komponen Umpan Balik'])
@section('main-section')
<nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a class="text-black text-decoration-none" href="{{ route('admin.Dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-black text-decoration-none" href="{{route('admin.Assessment')}}">
            Asessment
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-black text-decoration-none" href="{{ route('admin.HalamanUmpanBalik') }}">
            Umpan Balik
        </a>
    </li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
        Komponen Umpan Balik
    </li>  
  </ol>
</nav>
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-header">
          <span class="badge bg-info rounded-pill">
            <a class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#tambahKomponenUmpanBalik" onclick="functionTambahUmpanBalik();">+ Komponen Umpan Balik
            </a>
          </span>

          {{-- MODAL TAMBAH KOMPONEN UMPAN BALIK--}}
          <div class="modal fade text-left" id="tambahKomponenUmpanBalik" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Tambah Komponen Umpan Balik</h4>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                  </button>
                </div>

                <form action="{{ route('admin.TambahKomponenUmpanBalik') }}" id="form-tambahUmpanBalik" method="POST">
                  @csrf

                    <div class="modal-body">
                        <label>Komponen Umpan Balik</label>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <textarea name="komponen[]" class="form-control rounded-4" cols="5" rows="5"></textarea>
                                <span class="input-group-append d-flex align-items-center" style="padding: 8px;">
                                    <button class="file-upload-browse btn btn-primary btn-tambah-komponen" type="button">
                                        +
                                    </button>
                                </span> 
                                <div class="input-group has-validation">
                                    <label class="text-danger error-text komponen_0_error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="input-komponen"></div>
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
          <table class="table table-striped" id="table-komponen-umpan-balik">
            <thead>
              <tr>
                <th>Komponen</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      {{-- MODAL EDIT KOMPONEN UMPAN BALIK--}}
      <div class="modal fade text-left" id="modal-EditKomponenUmpanBalik" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel33">Ubah Komponen Umpan Balik</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form id="form-EditKomponenUmpanBalik" action="{{ route('admin.UbahKomponenUmpanBalik') }}" method="POST">
              <input type="hidden" name="id" hidden>
              @csrf
              <div class="modal-body">
                <label>Nama Komponen Umpan Balik</label>
                <div class="form-group field_wrapper">
                    <textarea name="komponen" class="form-control rounded-4" cols="5" rows="5"></textarea>
                  <div class="input-group has-validation">
                    <label class="text-danger error-text komponen_error"></label>
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
 $('.btn-tambah-komponen').on('click', function () {
        tambahKomponenUmpanBalik();
    });

    total = 1;
    function tambahKomponenUmpanBalik() {
        $(".input-komponen").addClass('input-komponen')
        var komponen =
            `<div class="form-group"><div class="input-group col-xs-12"><textarea name="komponen[]" class="form-control rounded-4" cols="5" rows="5"></textarea><span class="input-group-append d-flex align-items-center" style="padding: 8px;"><button class="file-upload-browse btn btn-danger hapusKomponen" type="button">-</button></span><div class="input-group has-validation"><label class="text-danger error-text komponen_${total++}_error"></label></div></div></div>`;
        $('.input-komponen').append(komponen);
    };

    $('.input-komponen').on('click', '.hapusKomponen', function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
    });


    let list_umpan_balik_komponen = [];
    const table_umpan_balik_komponen = $('#table-komponen-umpan-balik').DataTable({
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
      ajax: {
        url: "{{ route('admin.DaftarKomponenUmpanBalik') }}",
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      },
      columnDefs: [{
          targets: '_all',
          visible: true
        },
        {
          "targets": 0,
          "class": "text-wrap",
          "render": function(data, type, row, meta) {
            list_umpan_balik_komponen[row.id] = row;
            return row.komponen;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap",
          "render": function(data, type, row, meta) {
            let tampilan;
            tampilan = `<span onclick="editKomponenUmpanBalik(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#!">Edit</a>
                                </span>
                                <span id-komponen-umpan-balik = "${row.id}" class="badge bg-danger rounded-pill hapus_komponen_umpan_balik">
                                    <a class="text-white" href="#!">Hapus</a>
                                </span>`
            return tampilan;
          }
        },
      ]
    });

    function editKomponenUmpanBalik(id) {
      const data_komponen = list_umpan_balik_komponen[id]
      $("#modal-EditKomponenUmpanBalik").modal('show');
      $("#form-EditKomponenUmpanBalik [name='id']").val(id);
      $("#form-EditKomponenUmpanBalik [name='komponen']").val(data_komponen.komponen);
      // $("#form-EditKomponenUmpanBalik [name='jurusan_id']").val("jurusan")
      
      $('#form-EditKomponenUmpanBalik').on('submit', function(e) {
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
              $("#modal-EditKomponenUmpanBalik").modal('hide');
              swal({
                  title: "Berhasil",
                  text: `${data.msg}`,
                  icon: "success",
                  buttons: true,
                  successMode: true,
                }),
                table_umpan_balik_komponen.ajax.reload();

            }
          }
        });
      });
    }

    $(document).on('click', '.hapus_komponen_umpan_balik', function (event) {
        const id = $(event.currentTarget).attr('id-komponen-umpan-balik');

        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                $.ajax({
            url: "/admin/hapus-umpan-balik/" + id,
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
                    table_umpan_balik_komponen.ajax.reload()
                }
            }
        });
            } else {
                //alert ('no');
                return false;
            }
        });
    });

    function functionTambahUmpanBalik(){
        $("#form-tambahUmpanBalik")[0].reset();
        $(".input-komponen").html('');
    }

    $('#form-tambahUmpanBalik').on('submit', function(e) {
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
              table_umpan_balik_komponen.ajax.reload()
            $("#tambahKomponenUmpanBalik").modal('hide')
          }
        }
      });
    });
    
</script>
@endsection
