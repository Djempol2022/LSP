<div class="modal fade" id="modalDetailX04BeritaAcara" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">X 04 Berita Acara</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 font-extrabold">SURAT TUGAS</h6>
            <h6 class="mb-0 font-extrabold">VERIFIKASI TEMPAT UJI KOMPETENSI</h6>
          </div>
          <div style="margin-top: 20px">
            <p>Pada hari ini ............................................. tanggal
              ..................................................
              Bulan ................................................. tahun
              ............................................. di SMK
              ..............................................................................................................
            </p>
          </div>

          <div style="margin-top: 20px">
            <ol style="list-style: lower-alpha">
              <li>Telah dilaksanakan verifikasi calon Tempat Uji Kompetensi untuk pelaksanaan Uji Kompetensi. <br />
                <table>
                  <tr>
                    <td style="width: 42%; vertical-align: top;">Kompetensi/Paket Keahlian</td>
                    <td style="width: 3%; vertical-align: top;">:</td>
                    <td style="width: 55%; vertical-align: top;" id="jurusan_x04_berita_acara"></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Paket Ujian</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;" id="skema_sertifikasi_x04_berita_acara"></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Rencana Pelaksanaan</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;">
                      .....................................................................................
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Rekomendasi</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="font-weight: bold; vertical-align: top;">Sangat layak/layak/belum layak *</td>
                  </tr>
                </table>
              </li>
              <li>
                Catatan selama pelaksanaan verifikasi <br />
                _________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
                <br />
                Berita acara ini dibuat sesungguhnya dengan instrument verifikasi terlampir.
              </li>
            </ol>
          </div>

          <div style="margin-top: 20px">
            <table style="width: 100%; margin-left: 28px">
              <tr>
                <td colspan="2">Yang melakukan verifikasi</td>
              </tr>
              <tr>
                <td id="jabatan_bttd_x04_berita_acara"></td>
                <td style="text-align: right">Perwakilan Tempat Uji Kompetensi</td>
              </tr>
              <tr>
                <td style="height: 30px; padding-left: 20px;"><img src="" id="ttd_x04_berita_acara"
                    width="90px"></td>
                <td style="height: 30px; text-align: right"></td>
              </tr>
              <tr>
                <td>(<span id="nama_bttd_x04_berita_acara"></span>)</td>
                <td style="text-align: right">
                  (...................................................................)</td>
              </tr>
              <tr>
                <td>NIP.<span id="nip_bttd_x04_berita_acara"></span></td>
                <td style="text-align: right">
                  NIP..............................................................</td>
              </tr>
            </table>
          </div>

          <div class="mt-5" style="margin-left: 28px">
            <p>* coret yang tidak perlu</p>
          </div>

          <div class="text-end mt-5">
            <p class="mb-0 fst-italic" style="font-size: 10px">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p class="mb-0 fst-italic" style="font-size: 10px">Telp (0565)21377 e-mail : lspsmkn1stg@gmail.com</p>
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
