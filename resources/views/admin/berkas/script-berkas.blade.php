<script>
  $(document).ready(function() {

    skPenetapanTUKTerverifikasi();
    $('#tambah').attr('href', '/admin/berkas/sk-penetapan-tuk-terverifikasi');


    // value berkas dropdown
    $('#berkas').change(function() {
      let berkasValue = $(this).val();

      if (berkasValue === '#') {
        $('#tambah').attr('href', berkasValue);
      } else {
        $('#tambah').attr('href', '/admin/berkas/' + berkasValue);
      }

      if (berkasValue === 'sk-penetapan-tuk-terverifikasi') {
        skPenetapanTUKTerverifikasi();
      } else if (berkasValue === 'daftar-tuk-terverifikasi') {
        daftarHasilVerifikasi();
      } else if (berkasValue === 'hasil-verifikasi-tuk') {
        hasilVerifikasiTUK();
      } else if (berkasValue === 'st-verifikasi-tuk') {
        stVerifikasiTUK();
      } else if (berkasValue === 'x03-st-verifikasi-tuk') {
        x03STVerifikasiTUK();
      } else if (berkasValue === 'x04-berita-acara') {
        x04BeritaAcara();
      } else if (berkasValue === 'z-ba-pecah-rp') {
        zBAPecahRP();
      } else {
        $('#table-surat').DataTable();
      }
    });

    // surat table
    function skPenetapanTUKTerverifikasi() {
      let list_sk_penetapan = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratSKPenetapan') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nomor SK'
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_sk_penetapan[row.id] = row;
              return row.no_sk;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_sk_penetapan[row.id] = row;
              return row.tempat_ditetapkan;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_sk_penetapan[row.id] = row;
              const date = new Date(row.tanggal_ditetapkan);
              let tanggal = new Intl.DateTimeFormat('id', {
                year: "numeric",
                month: "long",
                day: "2-digit"
              }).format(date).split(" ").join(" ");
              return tanggal;
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailSKPenetapan(${row.id})" id="detailSKPenetapan">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function daftarHasilVerifikasi() {
      let list_daftar_tuk = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratDaftarTUK') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nama Surat',
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_daftar_tuk[row.id] = row;
              return 'Surat Daftar TUK Terverifikasi';
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_daftar_tuk[row.id] = row;
              return row.tempat_ditetapkan;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_daftar_tuk[row.id] = row;
              const date = new Date(row.tanggal_ditetapkan);
              let tanggal = new Intl.DateTimeFormat('id', {
                year: "numeric",
                month: "long",
                day: "2-digit"
              }).format(date).split(" ").join(" ");
              return tanggal;
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detail(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function hasilVerifikasiTUK() {
      let list_hasil_verifikasi_tuk = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratHasilVerifikasiTUK') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nama Surat',
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_hasil_verifikasi_tuk[row.id] = row;
              return 'Surat Hasil Verifikasi TUK';
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_hasil_verifikasi_tuk[row.id] = row;
              return row.tempat_ditetapkan;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_hasil_verifikasi_tuk[row.id] = row;
              const date = new Date(row.tanggal_ditetapkan);
              let tanggal = new Intl.DateTimeFormat('id', {
                year: "numeric",
                month: "long",
                day: "2-digit"
              }).format(date).split(" ").join(" ");
              return tanggal;
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailHasilVerifikasiTUK(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function stVerifikasiTUK() {
      let list_st_verifikasi_tuk = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratSTVerifikasiTUK') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nomor Surat'
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_st_verifikasi_tuk[row.id] = row;
              return row.no_surat;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_st_verifikasi_tuk[row.id] = row;
              return row.tempat_ditetapkan;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_st_verifikasi_tuk[row.id] = row;
              const date = new Date(row.tanggal_ditetapkan);
              let tanggal = new Intl.DateTimeFormat('id', {
                year: "numeric",
                month: "long",
                day: "2-digit"
              }).format(date).split(" ").join(" ");
              return tanggal;
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailSTVerifikasiTUK(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function x03STVerifikasiTUK() {
      let list_x03_st_verifikasi_tuk = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratX03STVerifikasiTUK') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nomor Surat'
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x03_st_verifikasi_tuk[row.id] = row;
              return row.no_surat;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x03_st_verifikasi_tuk[row.id] = row;
              return row.tempat_ditetapkan;
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x03_st_verifikasi_tuk[row.id] = row;
              const date = new Date(row.tanggal_ditetapkan);
              let tanggal = new Intl.DateTimeFormat('id', {
                year: "numeric",
                month: "long",
                day: "2-digit"
              }).format(date).split(" ").join(" ");
              return tanggal;
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailX03STVerifikasiTUK(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function x04BeritaAcara() {
      let list_x04_berita_acara = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratX04BeritaAcara') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nama Surat'
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x04_berita_acara[row.id] = row;
              return 'Surat X 04 Berita Acara';
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x04_berita_acara[row.id] = row;
              return 'Surat X 04 Berita Acara';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x04_berita_acara[row.id] = row;
              return 'Surat X 04 Berita Acara';
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailX04BeritaAcara(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

    function zBAPecahRP() {
      let list_z_ba_pecah_rp = [];
      $('#table-surat').DataTable({
        destroy: true,
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
          url: "{{ route('admin.SuratZBAPecahRP') }}",
          type: "POST",
        },
        'columns': [{
            title: 'Nama Surat'
          },
          {
            title: 'Tempat Ditetapkan'
          },
          {
            title: 'Tanggal Ditetapkan'
          },
          {
            title: 'Aksi'
          },
        ],
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_z_ba_pecah_rp[row.id] = row;
              return 'Surat Z Berita Acara Pecah Rapat Pleno';
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_z_ba_pecah_rp[row.id] = row;
              return 'Surat Z Berita Acara Pecah Rapat Pleno';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_z_ba_pecah_rp[row.id] = row;
              return 'Surat Z Berita Acara Pecah Rapat Pleno';
            }
          },
          {
            "targets": 3,
            "class": "text-nowrap text-center",
            "render": function(data, type, row, meta) {
              let tampilan;
              tampilan =
                `<button class="btn btn-warning my-1 text-black" data-bs-toggle="modal" onclick="detailZBAPecahRP(${row.id})">Detail</button>`
              return tampilan;
            }
          },
        ]
      });
    }

  })

  function detailSKPenetapan(id) {
    let url = "table-surat-sk-penetapan/" + id;
    $.get(url, function(data) {
      const date = new Date(data.tanggal_ditetapkan);
      let tanggal = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
      $('#modalDetailSKPenetapan').modal('show');
      $(".no_sk").text(data.no_sk);
      $(".tempat_ditetapkan").text(data.tempat_ditetapkan);
      $(".tanggal").text(tanggal);
      $(".jabatan_bttd").text(data.jabatan_bttd);
      $(".nama_bttd").text(data.nama_bttd);
      $(".ttd").attr('src', data.ttd);
      $("#tbody-table").html(data.relasi_sk_penetapan_tuk_child.map(function(d, i) {
        return $(
          `<tr>
                    <td>${i + 1}.</td>
                    <td>${d.relasi_nama_tuk.nama_tuk}</td>
                    <td>${d.relasi_skema_sertifikasi.judul_skema_sertifikasi}</td>
                    <td>${d.tempat}</td>
                </tr>`
        )
      }))
      $("#pdfSKPenetapan").attr('href', 'cetak-sk-penetapan-tuk/' + data.id);
    })
  }

  function detailHasilVerifikasiTUK(id) {
    let url = "table-hasil-verifikasi-tuk/" + id;
    let check_mark = `@include('layout.image-base64.img-check-mark')`;
    $.get(url, function(data) {
      const date = new Date(data.tanggal_ditetapkan);
      let tanggal = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
      $('#modalDetailHasilVerifikasiTUK').modal('show');
      $('#jurusan').text(data.relasi_skema_sertifikasi.relasi_jurusan.jurusan);
      $('#skema_sertifikasi').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $('#tbody-table-hasil-verifikasi-tuk').html(data.relasi_sarana_prasarana.map(function(d, i) {
        function saranaPrasaranaSub() {
          let html = '';
          let alphabet = 97;
          d.relasi_sarana_prasarana_sub.forEach(element => {

            function saranaPrasaranaSub2() {
              let html = '';
              element.relasi_sarana_prasarana_sub2.forEach(element => {
                if (element.sarana_prasarana_sub_2 != null) {
                  html += `
                            <ol style="list-style: disc; margin: 0;">
                                <li>${element.sarana_prasarana_sub_2}</li>
                            </ol>
                        `;
                }
              })

              return html;
            }

            if (element.sarana_prasarana_sub != null) {
              html += `
                <tr>
                    <td></td>
                    <td>
                        ${String.fromCharCode(alphabet)}. ${element.sarana_prasarana_sub}
                        ${element.relasi_sarana_prasarana_sub2.length != 0 ? saranaPrasaranaSub2() : ''}
                    </td>
                    <td class="text-center">${element.status == 1 ? check_mark : ''}</td>
                    <td class="text-center">${element.status == 0 ? check_mark : ''}</td>
                    <td class="text-center">${element.kondisi == 1 ? check_mark : ''}</td>
                    <td class="text-center">${element.kondisi == 0 ? check_mark : ''}</td>
                    </tr>
            `;
            }
            alphabet++;
          });
          return html
        }

        let text = `
            <tr>
                <td class="text-center">${i + 1}</td>
                <td>${d.sarana_prasarana}</td>
                <td class="text-center">${d.status == 1 ? check_mark : ''}</td>
                <td class="text-center">${d.status == 0 ? check_mark : ''}</td>
                <td class="text-center">${d.kondisi == 1 ? check_mark : ''}</td>
                <td class="text-center">${d.kondisi == 0 ? check_mark : ''}</td>
            </tr>
            ${d.relasi_sarana_prasarana_sub.length != 0 ? saranaPrasaranaSub() : ''}
        `;

        return text;

      }));
      let index_standar = 0;
      $('.standar').each(function() {
        $(this).html(data.relasi_penguji_hasil_verifikasi[index_standar].standar);
        index_standar++;
      });
      index_standar = 0;
      $('.kondisi_sesuai').each(function() {
        $(this).html(data.relasi_penguji_hasil_verifikasi[index_standar].kondisi === 1 ? check_mark : '');
        index_standar++;
      })
      index_standar = 0;
      $('.kondisi_tidak_sesuai').each(function() {
        $(this).html(data.relasi_penguji_hasil_verifikasi[index_standar].kondisi === 0 ? check_mark : '');
        index_standar++;
      })
      $('#catatan').text(data.catatan);
      $('#tempat_ditetapkan').text(data.tempat_ditetapkan);
      const date_hasil_verifikasi_tuk = new Date(data.tanggal_ditetapkan);
      let tanggal_hasil_verifikasi_tuk = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date_hasil_verifikasi_tuk).split(" ").join(" ");
      $('#tanggal_ditetapkan').text(tanggal_hasil_verifikasi_tuk);
      $('#ttd').attr('src', data.ttd);
      $('#nama_bttd').text(data.nama_bttd);
    })
  }

  function detailSTVerifikasiTUK(id) {
    let url = "table-surat-st-verifikasi-tuk/" + id;
    $.get(url, function(data) {
      const date_ditetapkan = new Date(data.tanggal_ditetapkan);
      let tanggal_ditetapkan = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date_ditetapkan).split(" ").join(" ");
      const date_dilaksanakan = new Date(data.tanggal_dilaksanakan);
      let tanggal_dilaksanakan = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date_dilaksanakan).split(" ").join(" ");
      $('#modalDetailSTVerifikasiTUK').modal('show');
      $('#no_surat_st_verifikasi_tuk').text(data.no_surat);
      $('.tempat_uji_st_verifikasi_tuk').each(function() {
        $(this).text(data.tempat_uji);
      });
      $('#skema_sertifikasi_st_verifikasi_tuk').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $("#bodyTable").html(data.relasi_nama_jabatan.map(function(d, i) {
        return $(
          `<tr>
                    <td class="text-center" style="width: 10px;">${i + 1}.</td>
                    <td>${d.nama}</td>
                    <td>${d.jabatan}</td>
                </tr>`
        )
      }));
      $('#tanggal_dilaksanakan_st_verifikasi_tuk').text(tanggal_dilaksanakan);
      $('#tempat_ditetapkan_st_verifikasi_tuk').text(data.tempat_ditetapkan);
      $('#tanggal_ditetapkan_st_verifikasi_tuk').text(tanggal_ditetapkan);
      $('#jabatan_bttd_st_verifikasi_tuk').text(data.jabatan_bttd);
      $('#ttd_st_verifikasi_tuk').attr('src', data.ttd);
      $('#nama_bttd_st_verifikasi_tuk').text(data.nama_bttd);
    })
  }

  function detailX03STVerifikasiTUK(id) {
    let url = "table-surat-x03-st-verifikasi-tuk/" + id;
    $.get(url, function(data) {
      $('#modalDetailX03STVerifikasiTUK').modal('show');
      $('#no_surat_x03_st_verifikasi_tuk').text(data.no_surat);

      $("#bodyTable_x03_st_verifikasi_tuk").html(data.relasi_nama_jabatan.map(function(d, i) {
        return $(
          `<tr>
                      <td class="text-center" style="width: 10px;">${i + 1}.</td>
                      <td>${d.nama}</td>
                      <td>${d.jabatan}</td>
                  </tr>`
        )
      }));
      const date_hari_x03_st_verifikasi_tuk = new Date(data.tanggal_mulai);
      let hari_x03_st_verifikasi_tuk = date_hari_x03_st_verifikasi_tuk.getDay();
      $('#hari_x03_st_verifikasi_tuk').text(hari(hari_x03_st_verifikasi_tuk));
      const date_tanggal_mulai_x03_st_verifikasi_tuk = new Date(data.tanggal_mulai);
      let tanggal_mulai = new Intl.DateTimeFormat('id', {
        month: "long",
        day: "2-digit"
      }).format(date_tanggal_mulai_x03_st_verifikasi_tuk).split(" ").join(" ");
      $('#tanggal_mulai_x03_st_verifikasi_tuk').text(tanggal_mulai);
      const date_tanggal_selesai_x03_st_verifikasi_tuk = new Date(data.tanggal_selesai);
      let tanggal_selesai = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date_tanggal_selesai_x03_st_verifikasi_tuk).split(" ").join(" ");
      $('#tanggal_selesai_x03_st_verifikasi_tuk').text(tanggal_selesai);
      let hour = data.waktu.split(':');
      waktu = hour[0] + ':' + hour[1];
      $('#waktu_x03_st_verifikasi_tuk').text(waktu);
      $('#nama_tuk_x03_st_verifikasi_tuk').text(data.relasi_nama_tuk.nama_tuk)
      $('#tempat_ditetapkan_x03_st_verifikasi_tuk').text(data.tempat_ditetapkan);
      const date_ditetapkan = new Date(data.tanggal_ditetapkan);
      let tanggal_ditetapkan = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date_ditetapkan).split(" ").join(" ");
      $('#tanggal_ditetapkan_x03_st_verifikasi_tuk').text(tanggal_ditetapkan);
      $('#jabatan_bttd_x03_st_verifikasi_tuk').text(data.jabatan_bttd);
      $('#ttd_x03_st_verifikasi_tuk').attr('src', data.ttd);
      $('#nama_bttd_x03_st_verifikasi_tuk').text(data.nama_bttd);
      $('#no_met_bttd_x03_st_verifikasi_tuk').text('MET.' + data.no_met_bttd);
    })
  }

  function detailX04BeritaAcara(id) {
    let url = "table-surat-x04-berita-acara/" + id;
    $.get(url, function(data) {
      console.log(data);
      $('#modalDetailX04BeritaAcara').modal('show');
      $('#jurusan_x04_berita_acara').text(data.relasi_skema_sertifikasi.relasi_jurusan.jurusan);
      $('#skema_sertifikasi_x04_berita_acara').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $('#jabatan_bttd_x04_berita_acara').text(data.jabatan_bttd);
      $('#jabatan_bttd_x04_berita_acara').text(data.jabatan_bttd);
      $('#ttd_x04_berita_acara').attr('src', data.ttd);
      $('#nama_bttd_x04_berita_acara').text(data.nama_bttd);
      $('#nip_bttd_x04_berita_acara').text(data.nip_bttd);
    })
  }

  function detailZBAPecahRP(id) {
    let url = "table-surat-z-ba-pecah-rp/" + id;
    $.get(url, function(data) {

      $('#modalDetailZBAPecahRP').modal('show');
      $('#institusi_z_ba_pecah_rp').text(data.relasi_institusi.nama_institusi);
      $('#skema_sertifikasi_z_ba_pecah_rp').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $('#tgl_tes_tertulis_z_ba_pecah_rp').text(date_format(data.tgl_tes_tertulis));
      $('#tgl_tes_praktek_z_ba_pecah_rp').text(date_format(data.tgl_tes_praktek));
      $('#jumlah_asesi_z_ba_pecah_rp').text(data.jml_asesi);
      $('#wkt_mulai_uk_z_ba_pecah_rp').text(time_format(data.wkt_mulai_uk));
      $('#wkt_selesai_uk_z_ba_pecah_rp').text(time_format(data.wkt_selesai_uk));
      $('#nama_tuk_z_ba_pecah_rp').text(data.relasi_nama_tuk.nama_tuk);
      $('#nama_bttd_z_ba_pecah_rp').text(data.nama_bttd);
      $('#jabatan_bttd_z_ba_pecah_rp').text(data.jabatan_bttd);
      $('#no_met_bttd_z_ba_pecah_rp').text(data.no_met_bttd);
      $('#tempat_rapat_z_ba_pecah_rp').text(data.tempat_rapat);
      $('#topik_z_ba_pecah_rp').text(data.topik);
      $('#ketua_rapat_z_ba_pecah_rp').text(data.ketua_rapat);
      $('#notulis_z_ba_pecah_rp').text(data.notulis);
      $("#tbody_z_ba_pecah_rp").html(data.relasi_nama_jabatan.map(function(d, i) {
        return $(
          `<tr>
            <td class="text-center" style="width: 10px;">${i + 1}.</td>
                      <td>${d.nama}</td>
                      <td>${d.jabatan}</td>
                      <td ${(i + 1) % 2 === 0 ? 'style="padding-left: 8%;"' : ''}>${i + 1}</td>
                  </tr>`
        )
      }));
      $('#tgl_tes_tertulis_2_z_ba_pecah_rp').text(date_format(data.tgl_tes_tertulis, false));
      $('#tgl_tes_praktek_2_z_ba_pecah_rp').text(date_format(data.tgl_tes_praktek));
      $("#bahasan_diskusi_z_ba_pecah_rp").html(data.relasi_bahasan_diskusi.map(function(d, i) {
        return $(
          `<li>${d.bahasan_diskusi}</li>`
        )
      }));
      $('#nama_bttd_2_z_ba_pecah_rp').text(data.nama_bttd);
      $('#jabatan_bttd_2_z_ba_pecah_rp').text(data.jabatan_bttd);
      $('#no_met_bttd_2_z_ba_pecah_rp').text(data.no_met_bttd);
      $('#notulis_2_z_ba_pecah_rp').text(data.notulis);
      $('#no_met_notulis_2_z_ba_pecah_rp').text(data.no_met_notulis);
    })
  }

  function hari(hari) {
    switch (hari) {
      case 0:
        hari = "Minggu";
        break;
      case 1:
        hari = "Senin";
        break;
      case 2:
        hari = "Selasa";
        break;
      case 3:
        hari = "Rabu";
        break;
      case 4:
        hari = "Kamis";
        break;
      case 5:
        hari = "Jum'at";
        break;
      case 6:
        hari = "Sabtu";
        break;
    }
    return hari;
  }

  function date_format(value, format = true) {
    const date = new Date(value);
    let result;
    if (format === true) {
      result = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
    } else {
      result = new Intl.DateTimeFormat('id', {
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
    }

    return result;
  }

  function time_format(value) {
    let hour = value.split(':');
    waktu = hour[0] + ':' + hour[1];

    return waktu;
  }
</script>
