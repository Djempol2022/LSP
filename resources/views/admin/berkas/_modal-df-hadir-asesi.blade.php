<div class="modal fade" id="modalDFHadirAsesi" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Daftar Hadir Asesi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card px-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR ASESI</h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%" id="tgl_df_hadir_asesi">

                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td id="wkt_df_hadir_asesi">
                </td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td id="tempat_df_hadir_asesi">
                </td>
              </tr>
              <tr>
                <td>Skema</td>
                <td>:</td>
                <td id="skema_sertifikasi_df_hadir_asesi">
                </td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 30%;">No. Peserta</th>
                  <th style="width: 22%;">Nama Asesi</th>
                  <th style="width: 18%;">Asal Sekolah</th>
                  <th style="width: 25%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody id="bodyTableDFHadirAsesi">
              </tbody>
            </table>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%;">
              <tr>
                <td style="width: 50%; padding-left: 5%"></td>
                <td style="width: 50%; padding-left: 20%">Mengetahui,</td>
              </tr>
              <tr>
                <td style="padding-left: 10%;">Asesor</td>
                <td id="jabatan_bttd_df_hadir_asesi" style="padding-left: 20%"></td>
              </tr>
              <tr>
                <td style="height: 30px; padding-left: 5%"><img src="" id="ttd_asesor_df_hadir_asesi"
                    width="140px"></td>
                <td style="height: 30px; padding-left: 20%"><img src="" id="ttd_bttd_df_hadir_asesi"
                    width="140px"></td>
              </tr>
              <tr>
                <td style="padding-left: 5%" id="nama_asesor_df_hadir_asesi"></td>
                <td style="font-weight: bold; padding-left: 20%" id="nama_bttd_df_hadir_asesi"></td>
              </tr>
              <tr>
                <td style="padding-left: 5%">MET.<span id="no_met_asesor_df_hadir_asesi"></span></td>
                <td style="padding-left: 20%">
                  MET.<span id="no_met_bttd_df_hadir_asesi"></span></td>
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
        <a id='pdfDFHadirAsesi' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
