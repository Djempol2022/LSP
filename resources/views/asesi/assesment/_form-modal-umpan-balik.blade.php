<div class="modal fade" id="umpanBalik" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-labelledby="umpanBalikLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <form action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="umpanBalikLabel">Formulir Umpan Balik</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col p-4">
            {{-- HEADER --}}
            <div class="row col text-black">
              <div class="col-lg-3">
                <h6>Nama Asesi</h6>
                <div class="mb-4">Muhammad Agung</div>
                <h6>Nama Asesor</h6>
                <div class="mb-5">Wawan Sukmawadi, S.Pd.,</div>
              </div>
              <div class="col-lg-3 text-black">
                <h6>Hari dan Tanggal</h6>
                <div class="mb-4">Senin, 25-12-2022</div>
                <h6>Waktu</h6>
                <div class="mb-5">09:00</div>
              </div>
              <div class="fst-italic my-2">Umpan balik dari Asesi (diisi oleh Asesi setelah
                pengambilan
                keputusan) :
              </div>
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th class="border-0 col-5 gap-3" scope="col">
                    <h5>Komponen</h5>
                  </th>
                  <th class="border-0 col-2" scope="col">
                    <h5>Hasil</h5>
                  </th>
                  <th class="border-0 col-4" scope="col">
                    <h5>Catatan / Komentar Asesi</h5>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>Saya mendapatkan penjelasan yang cukup memadai mengenai proses
                      asesmen/uji
                      kompetensi</p>
                  </td>
                  <td>
                    <div class="align-items-start">
                      <div class="row col">
                        <div class="col-lg-6 form-check">
                          <input class="form-check-input" type="radio" name="hasil1" id="ya1">
                          <label class="form-check-label text-success" for="ya1">
                            Iya
                          </label>
                        </div>
                        <div class="col-lg-6 form-check">
                          <input class="form-check-input" type="radio" name="hasil1" id="tidak1">
                          <label class="form-check-label text-danger" for="tidak1">
                            Tidak
                          </label>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <textarea class="form-control border-tiernary my-4" id="" cols="30" rows="5"
                      placeholder="Masukan Catatan / Komentar Disini. . ."></textarea>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Saya diberikan kesempatan untuk mempelajari standar kompetensi yang akan
                      diujikan dan menilai diri sendiri terhadap pencapaiannya</p>
                  </td>
                  <td>
                    <div class="align-items-start">
                      <div class="row col">
                        <div class="col-lg-6 form-check">
                          <input class="form-check-input" type="radio" name="hasil2" id="ya1">
                          <label class="form-check-label text-success" for="ya1">
                            Iya
                          </label>
                        </div>
                        <div class="col-lg-6 form-check">
                          <input class="form-check-input" type="radio" name="hasil2" id="tidak1">
                          <label class="form-check-label text-danger" for="tidak1">
                            Tidak
                          </label>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <textarea class="form-control border-tiernary my-4" id="" cols="30" rows="5"
                      placeholder="Masukan Catatan / Komentar Disini. . ."></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="col mt-5">
              <label for="catatan/komentar" class="form-label">
                <h5>Catatan / komentar lainnya (apabila ada)
                  :</h5>
              </label>
              <textarea class="form-control border-tiernary" id="catatan/komentar" rows="7"
                placeholder="Masukan Catatan / Komentar Disini. . ."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary tombol-primary-small">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
