<div class="modal fade" id="umpanBalik" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-labelledby="umpanBalikLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <form action="{{route('asesi.SimpanUmpanBalikAsesi')}}" method="POST">
      @csrf
      <input type="hidden" name="jadwal_uji_kompetensi_id" value="{{$asesi_ujian_selesai->jadwal_uji_kompetensi_id}}" hidden>
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
                <div class="mb-4">{{$asesi_ujian_selesai->relasi_user_asesi->nama_lengkap}}</div>
                <h6>Nama Asesor</h6>
                <div class="mb-5">{{$asesi_ujian_selesai->relasi_jadwal_uji_kompetensi->relasi_user_asesor->relasi_user_asesor_detail->nama_lengkap}}</div>
              </div>
              <div class="col-lg-3 text-black">
                <h6>Hari dan Tanggal</h6>
                <div class="mb-4">{{Carbon\Carbon::parse($asesi_ujian_selesai->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->tanggal)->format('d F Y')}}</div>
                <h6>Waktu</h6>
                <div class="mb-5">{{Carbon\Carbon::parse($asesi_ujian_selesai->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->waktu_mulai)->format('H:m:s')}} s/d {{Carbon\Carbon::parse($asesi_ujian_selesai->relasi_jadwal_uji_kompetensi->relasi_pelaksanaan_ujian->waktu_selesai)->format('H:m:s')}}</div>
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
                @foreach ($komponen_umpan_balik as $komponen)
                <tr>
                  <td>
                    <p>{{$komponen->komponen}}</p>
                  </td>
                  <td>
                    <div class="align-items-start">
                      <div class="row col">
                        <div class="col-lg-6 form-check">
                          <input type="hidden" name="umpan_balik_komponen_id[]" value="{{$komponen->id}}" hidden>
                          <input class="form-check-input" value="1" type="radio" name="hasil-{{$komponen->id}}" id="ya-{{$komponen->id}}">
                          <label class="form-check-label text-success" for="ya-{{$komponen->id}}">
                            Iya
                          </label>
                        </div>
                        <div class="col-lg-6 form-check">
                          <input class="form-check-input" value="0" type="radio" name="hasil-{{$komponen->id}}" id="tidak-{{$komponen->id}}">
                          <label class="form-check-label text-danger" for="tidak-{{$komponen->id}}">
                            Tidak
                          </label>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <textarea name="catatan[]" class="form-control border-tiernary my-4" cols="30" rows="5"
                      placeholder="Masukan Catatan / Komentar Disini. . ."></textarea>
                  </td>
                </tr>
                   
                @endforeach
              </tbody>
            </table>
            <div class="col mt-5">
              <label for="catatan/komentar" class="form-label">
                <h5>Catatan / komentar lainnya (apabila ada)
                  :</h5>
              </label>
              {{-- <textarea class="form-control border-tiernary" id="catatan/komentar" rows="7"
                placeholder="Masukan Catatan / Komentar Disini. . ."></textarea> --}}
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
