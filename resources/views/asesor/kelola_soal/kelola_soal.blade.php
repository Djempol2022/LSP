@extends('layout.main-layout', ['title'=>"Kelola Soal"])
@section('main-section')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table-kelola-soal">
                    <thead>
                        <tr>
                            <th>Materi Uji Kompetensi</th>
                            <th>Asesor</th>
                            <th>Peninjau</th>
                            <th>Aksi</th>
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
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    return row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					list_kelola_soal[row.id] = row;
                    return row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) 
                {
					let tampilan;
                    tampilan =  `<span class="badge bg-warning rounded-pill">
                                    <a class="text-white" href="/asesor/jenis-soal/${row.id}">Buat Soal</a>
                                </span>
                                <span onclick="hapusMUK(${row.id})" class="badge bg-danger rounded-pill">
                                    <a class="text-white" href="#">Hapus</a>
                                </span>`
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
                            buttons: true,
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
                            buttons: true,
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
