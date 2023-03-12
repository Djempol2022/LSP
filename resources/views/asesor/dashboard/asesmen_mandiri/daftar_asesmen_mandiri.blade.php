@extends('layout.main-layout', ['title' => 'Daftar Asesmen Mandiri'])
@section('main-section')
  <div class="page-content">
    <section class="section">
      <div class="card">

        <div class="card-body">
          <table class="table table-striped" id="table-asesmen-mandiri">
            <thead>
              <tr>
                <th>Nama Asesi</th>
                <th>Status</th>
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
    let list_asesmen_mandiri = [];
    const table_asesmen_mandiri = $('#table-asesmen-mandiri').DataTable({
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
        url: "{{ route('asesor.DataAsesmenMandiri') }}",
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
            list_asesmen_mandiri[row.id] = row;
            return row.relasi_user_asesi.nama_lengkap;
          }
        },
        {
          "targets": 1,
          "class": "text-nowrap",
          "render": function(data, type, row, meta) {
            list_asesmen_mandiri[row.id] = row;
            let status;
            if(row.rekomendasi == 1){
                status = `<p class="text-success">Telah di ACC</p>`
            }else{
                status = `<p class="text-danger">Belum di ACC</p>`
            }
            return status;
          }
        },
        {
          "targets": 2,
          "class": "text-nowrap",
          "render": function(data, type, row, meta) {
            let tampilan;
            tampilan = `
                      <div class="buttons">
                        <a class="btn btn-sm icon icon-left btn-warning rounded-pill fw-semibold text-black"
                        href="detail-pengesahan-asesmen-mandiri/${row.user_asesi_id}">
                            <i class="fa fa-eye fa-sm"></i> Detail
                        </a>
                      </div>
                      `
            return tampilan;
          }
        },
      ]
    });
</script>
@endsection
