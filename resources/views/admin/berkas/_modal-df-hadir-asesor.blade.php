<div class="modal fade" id="modalDetailDFHadirAsesor" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Daftar Hadir Asesor</h1>
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
                <td style="width: 85%">
                  ....................................................................................................
                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>
                  ....................................................................................................
                </td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>
                  ....................................................................................................
                </td>
              </tr>
              <tr>
                <td>Kegiatan</td>
                <td>:</td>
                <td>
                  ....................................................................................................
                </td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px; margin-left: 30px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 40%;">Nama Asesi</th>
                  <th style="width: 25%;">Kompetensi Keahlian</th>
                  <th style="width: 30%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align: center;">1</td>
                  <td></td>
                  <td></td>
                  <td>1</td>
                </tr>
                <tr>
                  <td style="text-align: center;">2</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">2</td>
                </tr>
                <tr>
                  <td style="text-align: center;">3</td>
                  <td></td>
                  <td></td>
                  <td>3</td>
                </tr>
                <tr>
                  <td style="text-align: center;">4</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">4</td>
                </tr>
                <tr>
                  <td style="text-align: center;">5</td>
                  <td></td>
                  <td></td>
                  <td>5</td>
                </tr>
                <tr>
                  <td style="text-align: center;">6</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">6</td>
                </tr>
                <tr>
                  <td style="text-align: center;">7</td>
                  <td></td>
                  <td></td>
                  <td>7</td>
                </tr>
                <tr>
                  <td style="text-align: center;">8</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">8</td>
                </tr>
                <tr>
                  <td style="text-align: center;">9</td>
                  <td></td>
                  <td></td>
                  <td>9</td>
                </tr>
                <tr>
                  <td style="text-align: center;">10</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">10</td>
                </tr>
                <tr>
                  <td style="text-align: center;">11</td>
                  <td></td>
                  <td></td>
                  <td>11</td>
                </tr>
                <tr>
                  <td style="text-align: center;">12</td>
                  <td></td>
                  <td></td>
                  <td style="padding-left: 80px">12</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang
            </p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        {{-- lembar 2 --}}
        <div class="card px-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR PANITIA</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">UJI KOMPETENSI LSP-P1 SMKN 1 SINTANG</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">TAHUN PELAJARAN <span
                id="thn_ajaran_df_hadir_asesor_1"></span> / <span id="thn_ajaran_df_hadir_asesor_2"></span></h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Hari/Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%">
                  ....................................................................................................
                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>....................................................................................................
                </td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>....................................................................................................
                </td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px; margin-left: 30px">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 45%;">Nama</th>
                  <th style="width: 30%;">Jabatan</th>
                  <th style="width: 20%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody id="tbody_table_panitia_df_hadir_asesor">
              </tbody>
            </table>
          </div>

          <div style="text-align: right; margin-top: 3rem">
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Jalan Raya Sintang-Pontianak Km.8 Sintang
            </p>
            <p style="font-size: 10px; margin-bottom: 0; font-style: italic">Telp (0565)21377 e-mail :
              lspsmkn1stg@gmail.com</p>
          </div>

        </div>

        {{-- lembar 3 --}}
        <div class="card px-5">
          @include('layout.header-bnsp-berkas')
          <div style="text-align: center;">
            <h6 style="margin-bottom: 0; font-weight: bolder">DAFTAR HADIR ASESOR</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">UJI KOMPETENSI LSP-P1 SMKN 1 SINTANG</h6>
            <h6 style="margin-bottom: 0; font-weight: bolder">TAHUN PELAJARAN <span
                id="thn_ajaran_df_hadir_asesor_3"></span> / <span id="thn_ajaran_df_hadir_asesor_4"></span></h6>
          </div>
          <div style="margin-top: 20px; margin-left: 30px">
            <table style="width: 100%">
              <tr>
                <td style="width: 12%">Hari/Tanggal</td>
                <td style="width: 3%">:</td>
                <td style="width: 85%"><span id="hari_df_hadir_asesor"></span> / <span id="tgl_df_hadir_asesor"></span>
                </td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><span id="wkt_mulai_df_hadir_asesor"></span> s/d <span id="wkt_selesai_df_hadir_asesor"></span> WIB
                </td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td id="tempat_df_hadir_asesor"></td>
              </tr>
            </table>
          </div>

          <div style="margin-top: 20px;">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center">
                  <th style="width: 5%;">No</th>
                  <th style="width: 25%;">Nama</th>
                  <th style="width: 20%;">No.Reg.MET</th>
                  <th style="width: 20%;">Jabatan</th>
                  <th style="width: 30%;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody id="tbody_table_df_hadir_asesor">
              </tbody>
            </table>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td></td>
                <td id="jabatan_bttd_df_hadir_asesor" style="width: 35%"></td>
              </tr>
              <tr>
                <td></td>
                <td style="height: 30px;"><img src="" id="ttd_df_hadir_asesor" width="140px"></td>
              </tr>
              <tr>
                <td></td>
                <td style="font-weight: bold;" id="nama_bttd_df_hadir_asesor"></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  MET.<span id="no_met_bttd_df_hadir_asesor"></span></td>
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
        <a id='pdfDFHadirAsesor' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
