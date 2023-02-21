@extends('layout.main-layout', ['title' => 'Detail Jadwal Uji Kompetensi'])
@section('main-section')
  <p class="data_id_jadwal">{{ $jadwal_uji_kompetensi['id'] }}</p>
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
              Bagian 1 : Jadwal Uji Kompetensi
            </div>
            <p class="py-3" style="font-size: 18px">Pada bagian ini, cantumkan data pribadi, data pendidikan formal
              serta
              data pekerjaan
              anda saat
              ini.
            </p>

            <div class="col profil-section">
              <div class="row my-4">
                <div class="col-md-6">
                  <div class="col pb-4">
                    <p class="fw-bold">Jurusan</p>
                    <span>{{ $jadwal_uji_kompetensi['relasi_muk']['relasi_jurusan']['jurusan'] }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Materi Uji Kompetensi</p>
                    <span>{{ $jadwal_uji_kompetensi['relasi_muk']['muk'] }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Tanggal</p>
                    <span>{{ Carbon\Carbon::parse($jadwal_uji_kompetensi['tanggal'])->format('d F Y') }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Waktu Mulai</p>
                    <span>{{ Carbon\Carbon::parse($jadwal_uji_kompetensi['waktu_mulai'])->format('H:i') }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Waktu Selesai</p>
                    <span>{{ Carbon\Carbon::parse($jadwal_uji_kompetensi['waktu_selesai'])->format('H:i') }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col pb-4">
                    <p class="fw-bold">Kelas</p>
                    <span>{{ $jadwal_uji_kompetensi['kelas'] }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Tempat</p>
                    <span>{{ $jadwal_uji_kompetensi['tempat'] }}</span>
                  </div>
                  <div class="col pb-4">
                    <p class="fw-bold">Jenis Tes</p>
                    @if ($jadwal_uji_kompetensi['jenis_tes'] == 1)
                      <span>Pilihan Ganda</span>
                    @elseif($jadwal_uji_kompetensi['jenis_tes'] == 2)
                      <span>Essay</span>
                    @elseif($jadwal_uji_kompetensi['jenis_tes'] == 3)
                      <span>Wawancara</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- ASESI --}}
          @include('admin.jadwal_uji_kompetensi.detail_bagian.asesi')

          {{-- ASESOR --}}
          @include('admin.jadwal_uji_kompetensi.detail_bagian.asesor')

          {{-- PENINJAU --}}
          @include('admin.jadwal_uji_kompetensi.detail_bagian.peninjau')
        </div>
      </div>
    </section>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('#table-jurusan').DataTable();
    });
    let list_jurusan = [];
    let list_muk = []
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
      "responsive": true,
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
          "render": function(data, type, row, meta) {
            list_jurusan[row.id] = row;
            return row.jurusan;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap",
          "render": function(data, type, row, meta) {
            let tampilan;
            tampilan = `<span onclick="tambahJadwalUjiKompetensi(${row.id})" class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Tambah Jadwal</a>
                                </span>
                                <span onclick="detailJadwalUjiKompetensi(${row.id})" class="badge bg-info rounded-pill">
                                    <a class="text-white" href="#">Lihat Jadwal</a>
                                </span>`
            return tampilan;
          }
        },
      ]
    });

    function tambahJadwalUjiKompetensi(id) {
      const data_jurusan = list_jurusan[id]
      let jurusanId = data_jurusan.id
      $("#modalJadwalUjiKompetensi").modal('show');

      $('#isi-uji-kompetensi').on('submit', function(e) {
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
                table_jurusan.ajax.reload(null, false)
              $("#modalJadwalUjiKompetensi").modal('hide')
            }
          }
        });
      });

      if (jurusanId) {
        jQuery.ajax({
          url: '/admin/jurusan-id/' + jurusanId,
          type: "GET",
          dataType: "json",
          success: function(response) {
            $('select[name="muk_id"]').empty();
            $('select[name="muk_id"]').append(
              '<option value="">-- Pilih Materi Uji Kompetensi --</option>');
            $.each(response, function(key, value) {
              $('select[name="muk_id"]').append('<option value="' + key + '">' +
                value + '</option>');
            });
          },
        });
      } else {
        $('select[name="muk_id"]').append(
          '<option value="">-- Materi Uji Kompetensi belum diketahui--</option>');
      }
    }

    function hapusJurusan(id) {
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
            table_jurusan.ajax.reload(null, false)
          }
        });
    }


    $('#isi-jurusan').on('submit', function(e) {
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
              table_jurusan.ajax.reload(null, false)
            $("#tambahJadwalPenilaian").modal('hide')
          }
        }
      });
    });


    function detailJadwalUjiKompetensi(id) {
      const id_jurusan = list_jurusan[id];
      let jurusanId = id_jurusan.id;
      $('.nama_jurusan').text("Jadwal Uji Materi Jurusan " + id_jurusan.jurusan)

      $("#modalDetailJadwalUjiKompetensi").modal('show');
      const table_jadwal_uji_kompetensi = $('#table-jadwal-uji-kompetensi').DataTable({
        "destroy": true,
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
        "paging": false,
        "searching": false,
        ajax: {
          url: "/admin/data-jadwal-uji-kompetensi/" + jurusanId,
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
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.relasi_muk.muk;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.sesi;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return moment(row.tanggal).format('DD MMMM YYYY');
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.waktu_mulai;
            }
          },
          {
            "targets": 4,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.waktu_selesai;
            }
          },
          {
            "targets": 5,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.tempat;
            }
          },
          {
            "targets": 6,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              list_muk[row.id] = row;
              return row.kelas;
            }
          },
          {
            "targets": 7,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              let tampilan;
              list_muk[row.id] = row;
              if (row.jenis_tes == 1)
                tampilan = `<span class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="#">Pilihan Ganda</a>
                                </span>`
              else if (row.jenis_tes == 2)
                tampilan = `<span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="#">Essay</a>
                                </span>`
              else if (row.jenis_tes == 3)
                tampilan = `<span class="badge bg-secondary rounded-pill">
                                    <a class="text-white" href="#">Wawancara</a>
                                </span>`
              return tampilan;
            }
          },
          {
            "targets": 8,
            "class": "text-nowrap",
            "render": function(data, type, row, meta) {
              let tampilan;
              list_muk[row.id] = row;
              tampilan = `<span onclick="hapusNateriUjiKompetensi(${row.id})" class="badge bg-danger rounded-pill">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>
                                <span class="badge bg-primary rounded-pill">
                                    <a class="text-white" href="/admin/detail-jadwal-uji-kompetensi/${row.id}">Detail</a>
                                </span>`
              return tampilan;
            }
          },
        ]
      });
    }

    function hapusNateriUjiKompetensi(id) {
      const table_jadwal_uji_kompetensi = $('#table-jadwal-uji-kompetensi').DataTable();
      swal({
        title: "Yakin ?",
        text: "Menghapus Data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      $.ajax({
        url: "/admin/hapus-jadwal-uji-kompetensi/" + id,
        dataType: 'json',
        success: function(response) {
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
              table_jadwal_uji_kompetensi.ajax.reload(null, false)
          }
        }
      });
    }
  </script>
@endsection
