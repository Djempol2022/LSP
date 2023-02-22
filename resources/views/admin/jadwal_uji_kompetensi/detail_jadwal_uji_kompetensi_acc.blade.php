@extends('layout.main-layout', ['title' => 'Detail Jadwal Uji Kompetensi'])
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
                        <a class="text-black text-decoration-none"
                        href="/admin/tambah-asesor-peninjau/{{ $data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->relasi_jurusan->id }}">
                        Rencana Jadwal Uji Kompetensi
                        </a>
                  </li>
                  <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">
                        Detail Jadwal Uji Kompetensi
                  </li>
              </ol>
            </nav>
        </div>
            {{-- EDIT PROFIL --}}
            <div class="mt-5">

              <div class="card">
                <div class="card-header">
                  <div class="col profil-section-title">
                    Uji Kompetensi
                  </div>
                </div>
                <div class="card-body">
                {{-- JADWAL --}}
                
                <div class="col profil-section" style="margin-bottom: 0% !important">
                    <div class="row my-4">
                        <div class="col-md-6">
                            <div class="col pb-4">
                              <p class="fw-bold">Jurusan</p>
                              <span>{{ $data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->relasi_jurusan->jurusan }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Materi Uji Kompetensi</p>
                                <span>{{ $data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_muk->muk }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Asesor</p>
                                <span>{{ $data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_user_asesor->relasi_user_asesor_detail->nama_lengkap }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Peninjau</p>
                                <span>{{ $data_pelaksanaan_ujian->relasi_jadwal_uji_kompetensi->relasi_user_peninjau->relasi_user_peninjau_detail->nama_lengkap }}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jenis Soal</p>
                                @if($data_pelaksanaan_ujian->jenis_tes == 1)
                                    <span>Pilihan Ganda</span>
                                @elseif($data_pelaksanaan_ujian->jenis_tes == 2)
                                    <span>Essay</span>
                                @elseif($data_pelaksanaan_ujian->jenis_tes == 3)
                                    <span>Wawancara</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            </div>

            <div class="card">
              <div class="card-header">
                <div class="col profil-section-title">
                  Detail Jadwal Uji Kompetensi
                </div>
              </div>
              <div class="card-body">
            <div class="col profil-section" style="margin-bottom: 0% !important">
              <form action="{{route('admin.UbahJadwalPelaksanaanUjian', $data_pelaksanaan_ujian->id)}}" method="POST" id="form-ubahJadwalPelaksanaanUjian">
                <div class="row my-4">
                    @csrf
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <label for="sesi" class="form-label fw-semibold">Sesi</label>
                            <input type="text" id="sesi" class="form-control rounded-4"
                                placeholder="Masukkan Sesi" name="sesi" 
                                @isset($data_pelaksanaan_ujian->sesi)
                                  value="{{$data_pelaksanaan_ujian->sesi}}"
                                @endisset>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text sesi_error"></label>
                            </div>
                        </div>
                        <div class="col pb-4">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                            <input type="date" id="tanggal" class="form-control rounded-4"
                                placeholder="Masukkan Tanggal" name="tanggal" 
                                @isset($data_pelaksanaan_ujian->tanggal)
                                value="{{\Carbon\Carbon::parse($data_pelaksanaan_ujian->tanggal)->format('Y-m-d')}}"
                                @endisset>
                            <div class="input-group has-validation">
                                  <label class="text-danger error-text tanggal_error"></label>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <label for="waktu_mulai" class="form-label fw-semibold">Waktu Mulai</label>
                            <input type="datetime" id="waktu_mulai" class="form-control rounded-4"
                                placeholder="Masukkan Waktu Mulai" name="waktu_mulai"
                                @isset($data_pelaksanaan_ujian->waktu_mulai)
                                value="{{\Carbon\Carbon::parse($data_pelaksanaan_ujian->waktu_mulai)->format('H:i')}}"
                                @endisset>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text waktu_mulai_error"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="waktu_selesai" class="form-label fw-semibold">Waktu Selesai</label>
                            <input type="datetime" id="waktu_selesai" class="form-control rounded-4"
                                placeholder="Masukkan Waktu Selesai" name="waktu_selesai"
                                @isset($data_pelaksanaan_ujian->waktu_selesai)
                                value="{{\Carbon\Carbon::parse($data_pelaksanaan_ujian->waktu_selesai)->format('H:i')}}"
                                @endisset>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text waktu_selesai_error"></label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col pb-4">
                          <label for="kelas" class="form-label fw-semibold">Kelas</label>
                          <input type="text" id="kelas" class="form-control rounded-4"
                              placeholder="Masukkan Kelas" name="kelas"
                              @isset($data_pelaksanaan_ujian->kelas)
                              value="{{$data_pelaksanaan_ujian->kelas}}"
                              @endisset>
                          <div class="input-group has-validation">
                              <label class="text-danger error-text kelas_error"></label>
                          </div>
                      </div>
                      <div class="col pb-4">
                          <label for="tempat" class="form-label fw-semibold">Tempat Uji Kompetensi</label>
                          <select name="tuk_id" class="form-select form-select-sm">
                              <option value="">-- Pilih Tempat Uji Kompetensi --</option>
                            @foreach ($tuk  as $data_tuk)
                              <option value="{{$data_tuk->id}}" @selected($data_tuk->id == $data_pelaksanaan_ujian->tuk_id)>{{$data_tuk->nama_tuk}}</option>
                            @endforeach
                          </select>
                          <div class="input-group has-validation">
                              <label class="text-danger error-text tempat_error"></label>
                          </div>
                      </div>
                    </div>
                    <div class="col pb-12" id="tambahAsesiKeUjiKompetensi">
                      <p class="fw-bold">Asesi</p>
                      <span class="btn btn-primary btn-sm btn-rounded text-white"
                        href="#" data-bs-toggle="modal" data-bs-target="#modalTambahAsesiKeJadwalUkom">Tambah Asesi
                      </span>
                      <br>
                      {{-- @isset($relasi_jadwal_uji_kompetensi->relasi_user_asesi) --}}
                      @php
                        $count_data_asesi = \App\Models\AsesiUjiKompetensi::where('jadwal_uji_kompetensi_id', $data_pelaksanaan_ujian->jadwal_uji_kompetensi_id)->count();
                      @endphp

                      @if(!empty($count_data_asesi))
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Nama Asesi</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($user_asesi_kompetensi as $data_user_asesi_kompetensi)
                          <tr>
                            <td>{{$data_user_asesi_kompetensi->relasi_user_asesi->nama_lengkap}}</td>
                            <th><span class="btn bg-danger text-white btn-sm" 
                              onclick="hapusAsesiUjiKompetensi({{$data_user_asesi_kompetensi->user_asesi_id}}, {{$data_user_asesi_kompetensi->jadwal_uji_kompetensi_id}})">Hapus</span></th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @else
                        <span class="text-danger fw-semibold">Asesi Belum di tentukan</span>
                      @endif
                    </div>
                    <button type="submit" class="bg-primary btn-sm btn rounded-3 text-white">Simpan</button>
                </div>
                </form>
                <div class="modal fade" id="modalTambahAsesiKeJadwalUkom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Asesi</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('admin.TambahDataAsesiKeJadwalUkom')}}" method="POST" id="form-tambahDataAsesiKeJadwalUkom">
                      @csrf
                      <div class="modal-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Pilih</th>
                              <th scope="col">Nama Asesi</th>
                            </tr>
                          </thead>
                          <tbody>
                              <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{$data_pelaksanaan_ujian->jadwal_uji_kompetensi_id}}" hidden>
                              <input type="hidden" name="pelaksanaan_ujian_id" value="{{$data_pelaksanaan_ujian->id}}" hidden>
                              <input type="hidden" name="jenis_tes" value="{{$data_pelaksanaan_ujian->jenis_tes}}" hidden>              
                            @foreach ($user_asesi as $data_user_asesi)
                            <tr>
                              <th><input type="checkbox" name="user_asesi_id[]" class="cek" value="{{$data_user_asesi->id}}"></th>
                              <td>{{$data_user_asesi->nama_lengkap}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary button-asesi" disabled>Tambah Asesi</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </section>
</div>
@endsection
@section('script')
<script>

    $(function() {
        $(".cek").click(function(){
            $('.button-asesi').prop('disabled',$('input.cek:checked').length == 0);
        });
    });
    
      $('#form-ubahJadwalPelaksanaanUjian').on('submit', function(e) {
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
                location.reload();
                // table_jurusan.ajax.reload(null, false)
              // $("#modalJadwalUjiKompetensi").modal('hide')
            }
          }
        });
      });


    $('#form-tambahDataAsesiKeJadwalUkom').on('submit', function(e) {
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
              // table_daftar_asesi.ajax.reload(null, false)

              // location.reload();
            $("#modalTambahAsesiKeJadwalUkom").modal('hide')
            $("#tambahAsesiKeUjiKompetensi").load(location.href + " #tambahAsesiKeUjiKompetensi>*", "");
            $("#modalTambahAsesiKeJadwalUkom").load(location.href + " #modalTambahAsesiKeJadwalUkom>*", "");
          }
        }
      });
    });


    function hapusAsesiUjiKompetensi(asesi_id, jadwal_id) {
      swal({
          title: "Yakin ?",
          text: "Menghapus Data ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      }).then((willDelete) => {

          if (willDelete) {
              $.ajax({
          url: "/admin/hapus-asesi-uji-kompetensi/" + asesi_id + "/" + jadwal_id,
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
                      location.reload();
              }
          }
      });
          } else {
              //alert ('no');
              return false;
          }
      });
    }

    // function detailJadwalUjiKompetensi(id) {
    //   const id_jurusan = list_jurusan[id];
    //   let jurusanId = id_jurusan.id;
    //   $('.nama_jurusan').text("Jadwal Uji Materi Jurusan " + id_jurusan.jurusan)

    //   $("#modalDetailJadwalUjiKompetensi").modal('show');
    //   const table_jadwal_uji_kompetensi = $('#table-jadwal-uji-kompetensi').DataTable({
    //     "destroy": true,
    //     "pageLength": 10,
    //     "lengthMenu": [
    //       [10, 25, 50, 100, -1],
    //       [10, 25, 50, 100, 'semua']
    //     ],
    //     "bLengthChange": true,
    //     "bFilter": true,
    //     "bInfo": true,
    //     "processing": true,
    //     "bServerSide": true,
    //     "paging": false,
    //     "searching": false,
    //     ajax: {
    //       url: "/admin/data-jadwal-uji-kompetensi/" + jurusanId,
    //       type: "POST",
    //       // data:function(d){
    //       //     d.data_kabupaten = data_kabupaten;
    //       //     d.data_status_id = data_status_id;
    //       //     return d
    //       // }
    //     },
    //     columnDefs: [{
    //         targets: '_all',
    //         visible: true
    //       },
    //       {
    //         "targets": 0,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.relasi_muk.muk;
    //         }
    //       },
    //       {
    //         "targets": 1,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.sesi;
    //         }
    //       },
    //       {
    //         "targets": 2,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return moment(row.tanggal).format('DD MMMM YYYY');
    //         }
    //       },
    //       {
    //         "targets": 3,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.waktu_mulai;
    //         }
    //       },
    //       {
    //         "targets": 4,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.waktu_selesai;
    //         }
    //       },
    //       {
    //         "targets": 5,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.tempat;
    //         }
    //       },
    //       {
    //         "targets": 6,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           list_muk[row.id] = row;
    //           return row.kelas;
    //         }
    //       },
    //       {
    //         "targets": 7,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           let tampilan;
    //           list_muk[row.id] = row;
    //           if (row.jenis_tes == 1)
    //             tampilan = `<span class="badge bg-warning rounded-pill">
    //                                 <a class="text-white" href="#">Pilihan Ganda</a>
    //                             </span>`
    //           else if (row.jenis_tes == 2)
    //             tampilan = `<span class="badge bg-info rounded-pill">
    //                                 <a class="text-white" href="#">Essay</a>
    //                             </span>`
    //           else if (row.jenis_tes == 3)
    //             tampilan = `<span class="badge bg-secondary rounded-pill">
    //                                 <a class="text-white" href="#">Wawancara</a>
    //                             </span>`
    //           return tampilan;
    //         }
    //       },
    //       {
    //         "targets": 8,
    //         "class": "text-nowrap",
    //         "render": function(data, type, row, meta) {
    //           let tampilan;
    //           list_muk[row.id] = row;
    //           tampilan = `<span onclick="hapusNateriUjiKompetensi(${row.id})" class="badge bg-danger rounded-pill">
    //                                 <a class="text-white" href="#">Hapus</a>
    //                             </span>
    //                             <span class="badge bg-primary rounded-pill">
    //                                 <a class="text-white" href="/admin/detail-jadwal-uji-kompetensi/${row.id}">Detail</a>
    //                             </span>`
    //           return tampilan;
    //         }
    //       },
    //     ]
    //   });
    // }

</script>
@endsection
