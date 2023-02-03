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
      //   $('#user-id').text(data.id);
      //   $('#user-name').text(data.name);
      //   $('#user-email').text(data.email);
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
      console.log(data);
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
</script>
