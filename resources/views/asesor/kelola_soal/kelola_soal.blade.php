@extends('layout.main-layout', ['title'=>"Kelola Soal"])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table table-striped text-center" id="table-kelola-soal">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Materi Uji Kompetensi</th>
                            <th class="text-center">Asesor</th>
                            <th class="text-center">Peninjau</th>
                            <th class="text-center">Jenis Soal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
    let list_kelola_soal = [];    
    const table_muk = $('#table-kelola-soal').DataTable({
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
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "{{ route('asesor.DataKelolaSoal') }}",
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
                "class": "text-nowrap text-center",
                "render": function (data, type, row, meta) {
                    let i = 1;
                    list_kelola_soal[row.id] = row;
                    return `<p class="font-semibold">${meta.row + 1}</p>`;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    return `<p class="font-semibold">${row.relasi_muk.muk}</p>`;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    let cek_asesor;
                    if(row.relasi_user_asesor == null || row.relasi_user_asesor.relasi_user_asesor_detail == null){
                        cek_asesor = `<p class="font-semibold">Asesor belum ditentukan</p>`
                    }else{
                        cek_asesor = `<p class="font-semibold">${row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap}`;
                    }
                    return cek_asesor;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    let cek_peninjau;
                    if(row.relasi_user_peninjau == null || row.relasi_user_peninjau.relasi_user_peninjau_detail == null){
                        cek_peninjau = `<p class="font-semibold">Peninjau belum ditentukan</p>`
                    }else{
                        cek_peninjau = `<p class="font-semibold">${row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap}</p>`;
                    }
                    return cek_peninjau;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.jenis_tes == null){
                        jenis_tes = `<p>Belum di tentukan</p>`;
                    }else if(row.relasi_pelaksanaan_ujian.jenis_tes){
                        if(row.relasi_pelaksanaan_ujian.jenis_tes == 1){
                            jenis_tes = `<p class="font-semibold">Pilihan Ganda</p>`
                        }else if(row.relasi_pelaksanaan_ujian.jenis_tes == 2){
                            jenis_tes = `<p class="font-semibold">Essay</p>`
                        }else if(row.relasi_pelaksanaan_ujian.jenis_tes == 3){
                            jenis_tes = `<p class="font-semibold">Wawancara</p>`
                        }
                    }
                    return jenis_tes;
                }
            },
            {
                "targets": 5,
                "class": "text-wrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    if (row.relasi_pelaksanaan_ujian == null ){
                        tampilan =  `
                        <div class="buttons">
                          <a class="btn btn-sm btn-primary rounded-pill text-white fw-semibold"
                            href="/asesor/jenis-soal/${row.id}">
                              <i class="fa fa-plus fa-xs"></i> Buat Soal
                          </a>
                        </div>`
                    }
                    else if (row.relasi_pelaksanaan_ujian.jadwal_uji_kompetensi_id == row.id ) {
                        if(row.relasi_pelaksanaan_ujian.jenis_tes == null){
                            tampilan = `
                                        <div class="buttons">
                                            <a class="btn btn-sm btn-warning text-black rounded-pill fw-semibold"
                                                href="/asesor/review-soal/${row.id}">
                                                <i class="fa fa-eye fa-xs"></i> Buat Soal
                                            </a>
                                        </div>
                                        `
                        }else if(row.relasi_pelaksanaan_ujian.jenis_tes != null){
                            tampilan = `
                                        <div class="buttons">
                                            <a class="btn btn-sm btn-warning text-black rounded-pill fw-semibold"
                                                href="/asesor/review-soal/${row.id}/${row.relasi_pelaksanaan_ujian.jenis_tes}">
                                                <i class="fa fa-eye fa-xs"></i> Review Soal
                                            </a>
                                        </div>
                                        `
                        }
                    }
                        // tampilan += `<div class="buttons"><span onclick="hapusMUK(${row.id})" class="badge bg-danger rounded-pill">
                        //                 <a class="text-white" href="#">Hapus</a>
                        //             </span></div>`
                    return tampilan;
                }
            },
        ]
    });

    function editMUK(id){
        const data_muk = list_kelola_soal[id]
            $("#editMUK").modal('show');
            $("#formEditMUK [name='id']").val(id)
            $("#formEditMUK .muk").val(data_muk.muk);
        
            $('#formEditMUK').on('submit', function (e) {
            e.preventDefault();
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
                        $.each(data.error, function (prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } 
                    else if(data.status == 1){
                        $("#editMUK").modal('hide');
                        swal({
                            title: "Berhasil",
                            text: `${data.msg}`,
                            icon: "success",
                            successMode: true,
                        }),
                        table_muk.ajax.reload(null,false);
                    }
                }
            });
        });
    }

    function hapusMUK(id){
        swal({
            title: "Yakin ?",
            text: "Menghapus Data ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        $.ajax({
            url: "/admin/hapus-muk/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 0) {
                    alert("Gagal Hapus")
                } else if (response.status == 1) {
                    swal({
                            title: "Berhasil",
                            text: `${response.msg}`,
                            icon: "success",
                            successMode: true,
                        }),
                    table_muk.ajax.reload(null, false)
                }
            }
        });
    }

    $('#isi-muk').on('submit', function (e) {
        e.preventDefault();
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
                    $.each(data.error, function (prefix, val) {
                        $('label.' + prefix + '_error').text(val[0]);
                        // $('span.'+prefix+'_error').text(val[0]);
                    });
                }
                else if(data.status == 1){
                    swal({
                        title: "Berhasil",
                        text: `${data.msg}`,
                        icon: "success",
                        buttons: true,
                        successMode: true,
                    }),
                    table_muk.ajax.reload(null,false)
                    $("#tambahMuk").modal('hide')
                    $('.submit-tambah-muk').removeClass('disabled')
                }
            }
        });
    });
    
</script>
@endsection
