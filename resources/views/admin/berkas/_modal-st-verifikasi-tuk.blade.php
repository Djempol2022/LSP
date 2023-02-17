<div class="modal fade" id="modalDetailSTVerifikasiTUK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">ST Verifikasi TUK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card px-5">
          @include('layout.header-bnsp-berkas')
          <div class="text-center d-flex flex-column">
            <h6 class="mb-0 text-decoration-underline font-extrabold">SURAT PERINTAH TUGAS VERIFIKASI TUK</h6>
            <h6 class="d-flex align-items-center justify-content-center gap-3 fw-light">Nomor : <span
                id="no_surat_st_verifikasi_tuk"></span></h6>
          </div>
          <div>
            <p class="mt-3"><span class="font-bold text-black">Dasar :</span> Peraturan Badan Nasional Sertifikasi
              Profesi (BNSP) 201
            </p>
            <div>
              <p class="text-black">Sehubungan dengan diperlukannya verifikasi untuk Tempat Uji Kompetensi
                (TUK)
                LSP <span class="tempat_uji_st_verifikasi_tuk"></span> untuk
                memenuhi
                persyaratan pelaksanaan Uji Kompetensi <span id="skema_sertifikasi_st_verifikasi_tuk"></span>, dengan
                ini Ketua Lembaga
                Sertifikasi Profesi (LSP) SMK Negeri 1 Sintang menugaskan kepada yang
                namanya tercantum di bawah ini :
              </p>
              <table class="table table-bordered" id="tableSTVerifikasiTUK">
                <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>Jabatan</th>
                  </tr>
                </thead>
                <tbody id="bodyTable">
                </tbody>
              </table>
            </div>
            <div>
              <table cellpadding=10>
                <tr>
                  <td>Untuk</td>
                  <td>Menjadi tim asesor lisensi untuk melakukan verifikasi terhadap</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <ol class="ps-3">
                      <li>Tempat Uji Kompetensi (TUK) <span class="tempat_uji_st_verifikasi_tuk"></span>.
                        <br>Melaksanakan tugas dengan
                        sebaik-baiknya dan penung tanggung jawab. <br> Tugas ini dilaksanakan dari <span
                          id="tanggal_dilaksanakan_st_verifikasi_tuk"></span>
                      </li>
                      <li>Melaporkan hasil verifikasi kepada Pimpinan LSP</li>
                    </ol>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <div style="position: relative;">
            <div style="position: absolute; right: 0;">
              <table>
                <tr>
                  <td style="text-align: center;"><span id="tempat_ditetapkan_st_verifikasi_tuk"></span>, <span
                      id="tanggal_ditetapkan_st_verifikasi_tuk"></span></td>
                </tr>
                <tr>
                  <td style="text-align: center;" id="jabatan_bttd_st_verifikasi_tuk"></td>
                </tr>
                <tr>
                  <td style="height: 30px; text-align: center;"><img src="" id="ttd_st_verifikasi_tuk"
                      width="180px"></td>
                </tr>
                <tr>
                  <td style="text-align: center; text-decoration: underline; font-weight: bold"
                    id="nama_bttd_st_verifikasi_tuk"></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="text-black" style="margin-top: 9.5rem;">
            <p class="mb-0" style="font-size: 12px">Tembusan :</p>
            <ol class="ps-3" style="font-size: 12px">
              <li>Ybs</li>
              <li>Arsip</li>
            </ol>
          </div>

          <div class="text-end mt-5">
            <p class="mb-0 fst-italic" style="font-size: 10px">Jalan Raya Sintang-Pontianak Km.8 Sintang</p>
            <p class="mb-0 fst-italic" style="font-size: 10px">Telp (0565)21377 e-mail : lspsmkn1stg@gmail.com</p>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
        <a id='pdfSTVerifikasiTUK' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
