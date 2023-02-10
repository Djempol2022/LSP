<div class="modal fade" id="modalDetailDaftarTUK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Daftar TUK Terverifikasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card p-5">
          @include('layout.header-berkas')
          <div>
            <h6 class="line-sp mb-0 text-center">DAFTAR TEMPAT UJI KOMPETENSI (TUK) TERVERIFIKASI</h6>
            <h6 class="text-center">LSP SMK NEGERI 1 SINTANG</h6>
            {{--  --}}
            <table class="table table-bordered" id="tableTUK">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA TUK</th>
                  <th>NAMA SKEMA SERTIFIKASI</th>
                  <th>PENANGGUNG JAWAB TUK</th>
                </tr>
              </thead>
              <tbody id="tbody_daftar_tuk_terverifikasi">
              </tbody>
            </table>
            <div class="d-flex justify-content-end text-black">
              <div class="text-start" style="width: 45%">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span style="width: 47%">Ditetapkan di</span>
                  <span style="width: 3%">:</span>
                  <span style="width: 50%" id="ditetapkan_di_df_tuk_terverifikasi"></span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span style="width: 47%">Pada tanggal</span>
                  <span style="width: 3%">:</span>
                  <span style="width: 50%" id="tanggal_ditetapkan_df_tuk_terverifikasi"></span>
                </div>
                <div class="mb-2">
                  <span id="jabatan_bttd_df_tuk_terverifikasi"></span>
                </div>
                <div>
                  <img src="" id="ttd_df_tuk_terverifikasi" width="90px">
                </div>
                <div>
                  <span id="nama_bttd_df_tuk_terverifikasi"></span>
                </div>
              </div>
            </div>
            {{--  --}}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
        <a id='pdfSKPenetapan' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
