<script>
  $(document).ready(function() {

    $('#berkas').select2();

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
      } else if (berkasValue === 'z-ba-rp') {
        zBARP();
      } else if (berkasValue === 'df-hadir-asesor-pleno') {
        dfHadirAsesorPleno();
      } else if (berkasValue === 'df-hadir-asesor') {
        dfHadirAsesor();
      } else {
        $('#table-surat').DataTable();
      }
    });

    // lightbulb
    // Get the modal
    var modal = document.getElementById("myModalLightbulb");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImgLightbulb");
    var modalImg = document.getElementById("img01-lightbulb");
    var captionText = document.getElementById("caption-lightbulb");

    img.onclick = function() {
      modal.style.display = "block";
      modalImg.src = '/images/berkas/sk-penetapan-tuk-terverifikasi.png';
      captionText.innerHTML = 'Contoh Berkas SK Penetapan TUK Terverifikasi';
    }

    // value berkas dropdown
    $('#berkas').change(function() {
      let berkasValue = $(this).val();

      if (berkasValue === '#') {
        img.onclick = function() {
          modal.style.display = "block";
          modalImg.src = '/images/berkas/sk-penetapan-tuk-terverifikasi.png';
          captionText.innerHTML = 'Contoh Berkas SK Penetapan TUK Terverifikasi';
        }
      } else {
        img.onclick = function() {
          modal.style.display = "block";
          modalImg.src = '/images/berkas/' + berkasValue + '.png';
          captionText.innerHTML = 'Contoh Berkas ' + berkasValue.replace(/-/g, ' ');
        }

      }
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-lightbulb")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'SK Penetapan TUK Terverifikasi';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_sk_penetapan[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailSKPenetapan(${row.id})" id="detailSKPenetapan">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'sk-penetapan-tuk-terverifikasi')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Daftar TUK Terverifikasi';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_daftar_tuk[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailDaftarTUK(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'daftar-tuk-terverifikasi')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Hasil Verifikasi TUK';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_hasil_verifikasi_tuk[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailHasilVerifikasiTUK(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'hasil-verifikasi-tuk')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'ST Verifikasi TUK';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_st_verifikasi_tuk[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailSTVerifikasiTUK(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'st-verifikasi-tuk')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'X03 ST Verifikasi TUK';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x03_st_verifikasi_tuk[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailX03STVerifikasiTUK(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'x03-st-verifikasi-tuk')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'X04 Berita Acara';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_x04_berita_acara[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailX04BeritaAcara(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'x04-berita-acara')">Hapus</button>
                `
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
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Z Berita Acara Pecah Rapat Pleno';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_z_ba_pecah_rp[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailZBAPecahRP(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'z-ba-pecah-rp')">Hapus</button>
                `
              return tampilan;
            }
          },
        ]
      });
    }

    function zBARP() {
      let list_z_ba_rp = [];
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
          url: "{{ route('admin.SuratZBARP') }}",
          type: "POST",
        },
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Z Berita Acara Rapat Pleno';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_z_ba_rp[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailZBARP(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'z-ba-pecah-rp')">Hapus</button>
                `
              return tampilan;
            }
          },
        ]
      });
    }

    function dfHadirAsesorPleno() {
      let list_df_hadir_asesor_pleno = [];
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
          url: "{{ route('admin.SuratDFHadirAsesorPleno') }}",
          type: "POST",
        },
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Daftar Hadir Asesor Pleno';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_df_hadir_asesor_pleno[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailDFHadirAsesorPleno(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'df-hadir-asesor-pleno')">Hapus</button>
                `
              return tampilan;
            }
          },
        ]
      });
    }

    function dfHadirAsesor() {
      let list_df_hadir_asesor = [];
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
          url: "{{ route('admin.SuratDFHadirAsesor') }}",
          type: "POST",
        },
        columnDefs: [{
            targets: '_all',
            visible: true
          },
          {
            "targets": 0,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 1,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              return 'Daftar Hadir Asesor';
            }
          },
          {
            "targets": 2,
            "class": "text-nowrap my-1 px-4",
            "render": function(data, type, row, meta) {
              list_df_hadir_asesor[row.id] = row;
              const date = new Date(row.created_at);
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
                `<button class="btn btn-warning my-1 text-white" data-bs-toggle="modal" onclick="detailDFHadirAsesor(${row.id})">Detail</button>
                <button class="btn btn-danger my-1 text-white" onclick="hapusBerkas(${row.id}, 'df-hadir-asesor-pleno')">Hapus</button>
                `
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

  function detailDaftarTUK(id) {
    let url = "table-surat-daftar-tuk/" + id;
    $.get(url, function(data) {
      $('#modalDetailDaftarTUK').modal('show');
      $("#tbody_daftar_tuk_terverifikasi").html(data.relasi_daftar_tuk_terverifikasi_child.map(function(d,
        i) {
        return $(
          `<tr>
                    <td>${i + 1}.</td>
                    <td>${d.relasi_nama_tuk.nama_tuk}</td>
                    <td>${d.relasi_skema_sertifikasi.judul_skema_sertifikasi}</td>
                    <td>${d.penanggung_jawab}</td>
                </tr>`
        )
      }));
      $('#ditetapkan_di_df_tuk_terverifikasi').text(data.tempat_ditetapkan);
      $('#tanggal_ditetapkan_df_tuk_terverifikasi').text(date_format(data.tanggal_ditetapkan));
      $('#jabatan_bttd_df_tuk_terverifikasi').text(data.jabatan_bttd);
      $('#nama_bttd_df_tuk_terverifikasi').text(data.nama_bttd);
      $('#ttd_df_tuk_terverifikasi').attr('src', data.ttd);

      $("#pdfDaftarTUKTerverifikasi").attr('href', 'cetak-daftar-tuk-terverifikasi/' + data.id);
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

      $("#pdfSTVerifikasiTUK").attr('href', 'cetak-st-verifikasi-tuk/' + data.id);
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

      $("#pdfX03STVerifikasiTUK").attr('href', 'cetak-x03-st-verifikasi-tuk/' + data.id);
    })
  }

  function detailX04BeritaAcara(id) {
    let url = "table-surat-x04-berita-acara/" + id;
    $.get(url, function(data) {
      $('#modalDetailX04BeritaAcara').modal('show');
      $('#jurusan_x04_berita_acara').text(data.relasi_skema_sertifikasi.relasi_jurusan.jurusan);
      $('#skema_sertifikasi_x04_berita_acara').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $('#jabatan_bttd_x04_berita_acara').text(data.jabatan_bttd);
      $('#jabatan_bttd_x04_berita_acara').text(data.jabatan_bttd);
      $('#ttd_x04_berita_acara').attr('src', data.ttd);
      $('#nama_bttd_x04_berita_acara').text(data.nama_bttd);
      $('#nip_bttd_x04_berita_acara').text(data.nip_bttd);

      $("#pdfX04BeritaAcara").attr('href', 'cetak-x04-berita-acara/' + data.id);
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
      $('#ttd_z_ba_pecah_rp_1').attr('src', data.ttd);
      $('#ttd_z_ba_pecah_rp_2').attr('src', data.ttd);
      $('#jabatan_bttd_2_z_ba_pecah_rp').text(data.jabatan_bttd);
      $('#no_met_bttd_2_z_ba_pecah_rp').text(data.no_met_bttd);
      $('#notulis_2_z_ba_pecah_rp').text(data.notulis);
      $('#no_met_notulis_2_z_ba_pecah_rp').text(data.no_met_notulis);

      $("#pdfZBAPecahRP").attr('href', 'cetak-z-ba-pecah-rp/' + data.id);
    })
  }

  function detailZBARP(id) {
    let url = "table-surat-z-ba-rp/" + id;
    $.get(url, function(data) {

      $('#modalDetailZBARP').modal('show');
      $('#institusi_z_ba_rp').text(data.relasi_institusi.nama_institusi);
      $('#skema_sertifikasi_z_ba_rp').text(data.relasi_skema_sertifikasi.judul_skema_sertifikasi);
      $('#tgl_tes_tertulis_z_ba_rp').text(date_format(data.tgl_tes_tertulis));
      $('#tgl_tes_praktek_z_ba_rp').text(date_format(data.tgl_tes_praktek));
      $('#jumlah_asesi_z_ba_rp').text(data.jml_asesi);
      $('#wkt_mulai_uk_z_ba_rp').text(time_format(data.wkt_mulai_uk));
      $('#wkt_selesai_uk_z_ba_rp').text(time_format(data.wkt_selesai_uk));
      $('#nama_tuk_z_ba_rp').text(data.relasi_nama_tuk.nama_tuk);
      $('#nama_bttd_z_ba_rp').text(data.nama_bttd);
      $('#jabatan_bttd_z_ba_rp').text(data.jabatan_bttd);
      $('#no_met_bttd_z_ba_rp').text(data.no_met_bttd);
      $('#tgl_rapat_z_ba_rp').text(date_format(data.tgl_rapat));
      $('#wkt_rapat_z_ba_rp').text(time_format(data.wkt_rapat) + ' WIB - Selesai');
      $('#tempat_rapat_z_ba_rp').text(data.tempat_rapat);
      $('#topik_z_ba_rp').text(data.topik);
      $('#ketua_rapat_z_ba_rp').text(data.ketua_rapat);
      $('#notulis_z_ba_rp').text(data.notulis);
      //   $("#tbody_z_ba_rp").html(data.relasi_nama_jabatan.map(function(d, i) {
      //     return $(
      //       `<tr>
      //         <td class="text-center" style="width: 10px;">${i + 1}.</td>
      //                   <td>${d.nama}</td>
      //                   <td>${d.jabatan}</td>
      //                   <td ${(i + 1) % 2 === 0 ? 'style="padding-left: 8%;"' : ''}>${i + 1}</td>
      //               </tr>`
      //     )
      //   }));
      $('#tgl_tes_tertulis_2_z_ba_rp').text(date_format(data.tgl_tes_tertulis, false));
      $('#tgl_tes_praktek_2_z_ba_rp').text(date_format(data.tgl_tes_praktek));
      $("#bahasan_diskusi_z_ba_rp").html(data.relasi_bahasan_diskusi.map(function(d, i) {
        return $(
          `<li>${d.bahasan_diskusi}</li>`
        )
      }));
      $('#nama_bttd_2_z_ba_rp').text(data.nama_bttd);
      $('#jabatan_bttd_2_z_ba_rp').text(data.jabatan_bttd);
      $('#no_met_bttd_2_z_ba_rp').text(data.no_met_bttd);
      $('#notulis_2_z_ba_rp').text(data.notulis);
      $('#no_met_notulis_2_z_ba_rp').text(data.no_met_notulis);
    })
  }

  function detailDFHadirAsesorPleno(id) {
    let url = "table-surat-df-hadir-asesor-pleno/" + id;
    $.get(url, function(data) {
      $('#modalDetailDFHadirAsesorPleno').modal('show');
      const date_hari_df_hadir_asesor_pleno = new Date(data.tgl);
      let hari_df_hadir_asesor_pleno = date_hari_df_hadir_asesor_pleno.getDay();
      $('#hari_df_hadir_asesor_pleno').text(hari(hari_df_hadir_asesor_pleno));
      $('#tgl_df_hadir_asesor_pleno').text(date_format(data.tgl));
      $('#wkt_df_hadir_asesor_pleno').text(time_format(data.wkt_mulai));
      $('#tempat_df_hadir_asesor_pleno').text(data.tempat);
      $('#tbody_df_hadir_asesor_pleno').html(data.relasi_nama_jabatan.map(function(d, i) {
        return $(
          `<tr>
                    <td class="text-center" style="width: 10px;">${i + 1}.</td>
                    <td>${d.nama}</td>
                    <td>${d.no_reg_met}</td>
                    <td>${d.jabatan}</td>
                    <td ${(i + 1) % 2 === 0 ? 'style="padding-left: 8%;"' : ''}>${i + 1}</td>
                </tr>`
        )
      }));
      $('#nama_bttd_df_hadir_asesor_pleno').text(data.nama_bttd);
      $('#jabatan_bttd_df_hadir_asesor_pleno').text(data.jabatan_bttd);
      $('#no_met_bttd_df_hadir_asesor_pleno').text(data.no_met_bttd);
      $('#ttd_df_hadir_asesor_pleno').attr('src', data.ttd);

      $("#pdfDFHadirAsesorPleno").attr('href', 'cetak-df-hadir-asesor-pleno/' + data.id);
    })
  }

  function detailDFHadirAsesor(id) {
    let url = "table-surat-df-hadir-asesor/" + id;
    $.get(url, function(data) {
      console.log(data);
      $('#modalDetailDFHadirAsesor').modal('show');
      const thn_df_hadir_asesor = new Date(data.thn_ajaran);
      let thn_df_hadir_asesor_1 = thn_df_hadir_asesor.getFullYear();
      let thn_df_hadir_asesor_2 = thn_df_hadir_asesor_1 + 1;
      $('#thn_ajaran_df_hadir_asesor_1').text(thn_df_hadir_asesor_1);
      $('#thn_ajaran_df_hadir_asesor_2').text(thn_df_hadir_asesor_2);
      let nama_nip = data.relasi_nama_jabatan.filter(function(d) {
        return d.is_nip === 1;
      });
      $('#tbody_table_panitia_df_hadir_asesor').html(nama_nip.map(function(d, i) {
        return $(
          `<tr>
                      <td class="text-center">${i + 1}.</td>
                      <td>
                        <span>${d.nama}</span> <br/>
                        <span>${d.nip}</span>
                        </td>
                      <td>${d.jabatan}</td>
                      <td ${(i + 1) % 2 === 0 ? 'style="padding-left: 7%;"' : ''}>${i + 1}</td>
                  </tr>`
        )
      }));
      $('#thn_ajaran_df_hadir_asesor_3').text(thn_df_hadir_asesor_1);
      $('#thn_ajaran_df_hadir_asesor_4').text(thn_df_hadir_asesor_2);
      const date_hari_df_hadir_asesor = new Date(data.tgl);
      let hari_df_hadir_asesor = date_hari_df_hadir_asesor.getDay();
      $('#hari_df_hadir_asesor').text(hari(hari_df_hadir_asesor));
      $('#tgl_df_hadir_asesor').text(date_format(data.tgl));
      const time_wkt_mulai_df_hadir_asesor = new Date(data.wkt_mulai);
      let wkt_mulai_df_hadir_asesor = ('0' + time_wkt_mulai_df_hadir_asesor.getHours()).substr(-2);
      let menit_mulai_df_hadir_asesor = time_wkt_mulai_df_hadir_asesor.getMinutes();

      const time_wkt_selesai_df_hadir_asesor = new Date(data.wkt_selesai);
      let wkt_selesai_df_hadir_asesor = ('0' + time_wkt_selesai_df_hadir_asesor.getHours()).substr(-2);
      let menit_selesai_df_hadir_asesor = time_wkt_selesai_df_hadir_asesor.getMinutes();

      $('#wkt_mulai_df_hadir_asesor').text('' + wkt_mulai_df_hadir_asesor + ':' + menit_mulai_df_hadir_asesor);
      $('#wkt_selesai_df_hadir_asesor').text('' + wkt_selesai_df_hadir_asesor + ':' +
        menit_selesai_df_hadir_asesor);
      $('#tempat_df_hadir_asesor').text(data.tempat);
      let nama = data.relasi_nama_jabatan.filter(function(d) {
        return d.is_nip === 0;
      });
      $('#tbody_table_df_hadir_asesor').html(nama.map(function(d, i) {
        return $(
          `<tr>
                    <td class="text-center" style="width: 10px;">${i + 1}.</td>
                    <td>${d.nama}</td>
                    <td>${d.no_reg_met}</td>
                    <td>${d.jabatan}</td>
                    <td ${(i + 1) % 2 === 0 ? 'style="padding-left: 8%;"' : ''}>${i + 1}</td>
                </tr>`
        )
      }));
      $('#nama_bttd_df_hadir_asesor').text(data.nama_bttd);
      $('#jabatan_bttd_df_hadir_asesor').text(data.jabatan_bttd);
      $('#no_met_bttd_df_hadir_asesor').text(data.no_met_bttd);
      $('#ttd_df_hadir_asesor').attr('src', data.ttd);

      $("#pdfDFHadirAsesor").attr('href', 'cetak-df-hadir-asesor/' + data.id);
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

  function hapusBerkas(id, type) {
    swal({
      title: "Yakin ?",
      text: "Menghapus Data ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "/admin/hapus-" + type + "/" + id,
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
                $('#table-surat').DataTable().ajax.reload(null, false)
            }
          }
        });
      }
    });
  }
</script>
