<div class="modal fade" id="modalDetailHasilVerifikasiTUK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Hasil Verifikasi TUK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- lembar 1 --}}
        <div class="card p-5">
          @include('layout.header-berkas')
          <div class="text-center">
            <h5 class="font-extrabold mb-0">HASIL VERIFIKASI TEMPAT UJI KOMPETENSI ( TUK )</h5>
            <h5 class="font-extrabold d-flex justify-content-center gap-2 my-2">
              "<span id="jurusan"></span>"
            </h5>
            <h6 class="font-extrabold mb-3 d-flex justify-content-center"><span id="skema_sertifikasi">/span></h6>
          </div>

          {{-- table 1 --}}
          <div>
            <h6 class="font-extrabold indent ms-4">A. SARANA DAN PRASARANA</h6>
            <table class="table table-bordered" id="tableHasilVerifikasiTUK">
              <thead class="text-center">
                <tr class="table-success">
                  <th rowspan="2">No.</th>
                  <th rowspan="2">Sarana dan Prasarana</th>
                  <th rowspan="2">Ada</th>
                  <th rowspan="2">Tidak</th>
                  <th colspan="2">Kondisi</th>
                </tr>
                <tr class="table-success">
                  <th>Sesuai</th>
                  <th>Tidak Sesuai</th>
                </tr>
              </thead>
              <tbody id="tbody-table-hasil-verifikasi-tuk">
              </tbody>
            </table>
          </div>
          {{-- table 2 --}}
          <div class="mt-5">
            <h6 class="font-extrabold indent ms-4">B. PENGUJI</h6>
            <table class="table table-bordered" id="tableHasilVerifikasiTUKPenguji">
              <thead>
                <tr class="table-success text-center">
                  <th rowspan="2">No.</th>
                  <th rowspan="2">Aspek Kompetensi</th>
                  <th rowspan="2">Standar</th>
                  <th colspan="2">Kondisi</th>
                </tr>
                <tr class="table-success text-center">
                  <th>Sesuai</th>
                  <th>Tidak Sesuai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1.</td>
                  <td>Pendidikan</td>
                  <td class="standar"></td>
                  <td class="text-center kondisi_sesuai"></td>
                  <td class="text-center kondisi_tidak_sesuai"></td>
                </tr>
                <tr>
                  <td class="text-center">2.</td>
                  <td>Pelatihan</td>
                  <td class="standar"></td>
                  <td class="text-center kondisi_sesuai"></td>
                  <td class="text-center kondisi_tidak_sesuai"></td>
                </tr>
                <tr>
                  <td class="text-center">3.</td>
                  <td>Pengalaman</td>
                  <td class="standar"></td>
                  <td class="text-center kondisi_sesuai"></td>
                  <td class="text-center kondisi_tidak_sesuai"></td>
                </tr>
                <tr>
                  <td class="text-center">4.</td>
                  <td>Ketrampilan</td>
                  <td class="standar"></td>
                  <td class="text-center kondisi_sesuai"></td>
                  <td class="text-center kondisi_tidak_sesuai"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div>
            <table>
              <tr>
                <td style="vertical-align: top;">
                  <h6>Catatan</h6>
                </td>
                <td style="vertical-align: top;">
                  <h6>:</h6>
                </td>
                <td style="padding-left: 10px; vertical-align: top;">
                  <h6 id="catatan"></h6>
                </td>
              </tr>
            </table>
            <h6 class="mt-2 mb-0">Kesimpulan Verifikasi : (* pilih salah satu )</h6>
            <p>* Sesuai / Belum sesuai dengan persyaratan tempat uji kompetensi</p>
          </div>

          <div style="position: relative;">
            <div style="position: absolute; right: 0;">
              <table>
                <tr>
                  <td style="text-align: center;"><span id="tempat_ditetapkan"></span>, <span
                      id="tanggal_ditetapkan"></span></td>
                </tr>
                <tr>
                  <td style="text-align: center;">Verifikator</td>
                </tr>
                <tr>
                  <td style="height: 30px; text-align: center;"><img src="" id="ttd" width="90px"></td>
                </tr>
                <tr>
                  <td style="text-align: center;" id="nama_bttd">Agus</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="margin-top: 5rem">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
        <a id='pdfSKPenetapan' href="#" class="btn btn-primary">Save as PDF</a>
      </div>
    </div>
  </div>
</div>
