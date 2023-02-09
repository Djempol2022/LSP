<div class="modal fade" id="modalDetailDFHadirAsesorPleno" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Daftar Hadir Asesor Pleno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR ASESOR</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">RAPAT PLENO PELAKSANAAN UJI KOMPETENSI</h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Hari/Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%"><span id="hari_df_hadir_asesor_pleno"></span> / <span
                    id="tgl_df_hadir_asesor_pleno"></span>
                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><span id="wkt_df_hadir_asesor_pleno"></span> WIB - Selesai</td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td id="tempat_df_hadir_asesor_pleno"></td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 29%;">Nama</th>
                  <th style="width: 20%;">No.Reg.MET</th>
                  <th style="width: 23%;">Jabatan</th>
                  <th style="width: 23%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody id="tbody_df_hadir_asesor_pleno">

              </tbody>
            </table>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td></td>
                <td id="jabatan_bttd_df_hadir_asesor_pleno" style="width: 35%"></td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 30px; text-align: center;"><img src="" id="ttd_df_hadir_asesor_pleno"
                    width="90px"></td>
              </tr>
              <tr>
                <td></td>
                <td style="font-weight: bold;" id="nama_bttd_df_hadir_asesor_pleno"></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  MET.<span id="no_met_bttd_df_hadir_asesor_pleno"></span></td>
              </tr>
            </table>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang
            </p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
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
