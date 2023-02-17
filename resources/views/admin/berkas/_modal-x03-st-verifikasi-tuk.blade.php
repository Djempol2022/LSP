<div class="modal fade" id="modalDetailX03STVerifikasiTUK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">ST Verifikasi TUK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card pt-5 px-5">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 text-decoration-underline font-extrabold">SURAT TUGAS</h6>
            <h6 class="d-flex align-items-center justify-content-center gap-3 fw-light">Nomor : <span
                id="no_surat_x03_st_verifikasi_tuk"></span>
            </h6>
          </div>
          <div style="margin-top: 20px">
            <table>
              <tr>
                <td style="width: 30%; vertical-align: top;">Dasar</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%; vertical-align: top;">
                  <ol style="padding-left: 15px;">
                    <li>Peraturan BNSP Nomor : 12/BNSP.214/XII/2013 Tentang Pedoman Verifikasi TUK oleh TUK</li>
                    <li>Berdasarkan Surat Keputusan Ketua LSP-P1 SMKN 1 Sintang Nomor: SK 004/LSP.SMKN1-STG/VIII/2021
                      Tanggal 19 Agustus 2021 Tentang Penetapan Struktur Organisasi LSP</li>
                  </ol>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Maksud</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Diperlukan Tim untuk memverifikasi Tempat Uji Kompetensi untuk memenuhi
                  ketentuan Peraturan BNSP.</td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Luaran</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Dokumen verifikasi sesuai format, daftar hadir, foto dokumentasi</td>
              </tr>
              <tr>
                <td style="vertical-align: top;">MENUGASKAN</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">Nama yang tertera dibawah ini dianggap cakap menjadi tim untuk
                  memverifikasi Tempat Uji Kompetensi (sewaktu).</td>
              </tr>
              <tr>
                <td style="vertical-align: top;"></td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">
                  <table cellspacing=0 cellpadding=5 class="table table-bordered">
                    <thead>
                      <tr>
                        <td style="width: 5%">No</td>
                        <td style="width: 55%">Nama</td>
                        <td style="width: 40%">Jabatan</td>
                      </tr>
                    </thead>
                    <tbody id="bodyTable_x03_st_verifikasi_tuk">

                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;">Untuk</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">
                  <ol style="padding-left: 15px;">
                    <li>Melaksanakan tugas sebaik-baiknya dan penuh tanggung jawab yang akan diselenggarakan pada :
                      <br />
                      <table>
                        <tr>
                          <td style="width: 25%; vertical-align: top;">Hari/Tanggal</td>
                          <td style="width: 5%; vertical-align: top;">:</td>
                          <td style="width: 70%; vertical-align: top;"><span id="hari_x03_st_verifikasi_tuk"></span>,
                            <span id="tanggal_mulai_x03_st_verifikasi_tuk"></span> s.d <span
                              id="tanggal_selesai_x03_st_verifikasi_tuk"></span>
                          </td>
                        </tr>
                        <tr>
                          <td style="vertical-align: top;">Waktu</td>
                          <td style="vertical-align: top;">:</td>
                          <td style="vertical-align: top;" class="d-flex align-items-center"><span
                              id="waktu_x03_st_verifikasi_tuk"></span>
                            <span> {!! '&nbsp;' !!} WIB
                              - selesai</span>
                          </td>
                        </tr>
                        <tr>
                          <td style="vertical-align: top;">Nama TUK</td>
                          <td style="vertical-align: top;">:</td>
                          <td style="vertical-align: top;" id="nama_tuk_x03_st_verifikasi_tuk">
                          </td>
                        </tr>
                      </table>
                    </li>
                    <li>Melaporkan hasil verifikasi secara tertulis kepada Ketua LSP</li>
                  </ol>
                </td>
              </tr>
              <tr>
                <td colspan=3>Demikian Surat Tugas ini dibuat untuk melaksanakan sebagaimana mestinya.</td>
              </tr>
            </table>
          </div>

          <div style="position: relative;">
            <div style="position: absolute; right: 0;">
              <table>
                <tr>
                  <td style="text-align: center;"><span id="tempat_ditetapkan_x03_st_verifikasi_tuk"></span>, <span
                      id="tanggal_ditetapkan_x03_st_verifikasi_tuk"></span></td>
                </tr>
                <tr>
                  <td style="text-align: center;" id="jabatan_bttd_x03_st_verifikasi_tuk"></td>
                </tr>
                <tr>
                  <td style="height: 30px; text-align: center;"><img src="" id="ttd_x03_st_verifikasi_tuk"
                      width="90px"></td>
                </tr>
                <tr>
                  <td style="text-align: center; text-decoration: underline; font-weight: bold"
                    id="nama_bttd_x03_st_verifikasi_tuk"></td>
                </tr>
                <tr>
                  <td style="text-align: center;" id="no_met_bttd_x03_st_verifikasi_tuk"></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="text-black fst-italic" style="margin-top: 12rem;">
            <p class="mb-0" style="font-size: 12px">Tembusan :</p>
            <ol class="ps-3" style="font-size: 12px">
              <li>Dewan Pengarah</li>
              <li>Yang Bersangkutan</li>
            </ol>
          </div>

          <div class="text-end">
            <p class="mb-0 fst-italic" style="font-size: 10px">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p class="mb-0 fst-italic" style="font-size: 10px">Telp (0565)21377 e-mail : lspsmkn1stg@gmail.com</p>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
        <a id='pdfX03STVerifikasiTUK' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
