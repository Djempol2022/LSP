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

  })

  function detailSKPenetapan(id) {
    let url = "table-surat-daftar-tuk/" + id;
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
</script>
