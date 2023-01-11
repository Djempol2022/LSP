{{-- MODAL PROFIL --}}
<div class="modal fade" id="editProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editProfilLabel" aria-hidden="true">
  <form id="form-update" action="{{ route('asesi.Dashboard.Update') }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editProfilLabel">Edit Profil-APL 01</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mx-3">

            <div class="col my-3">
              {{-- JUDUL --}}
              <div class="profil-section-title" style="font-size: 20px">
                Bagian 1 : Rincian Data Pemohon Sertifikasi
              </div>
              {{-- FORM --}}
              <div class="col profil-section">
                {{-- DATA PRIBADI --}}
                <div class="mt-5">
                  <h5>A. Data Pribadi</h5>
                  <div class="row mt-4">
                    <div class="col-lg-6">
                      <div class="col edit-profil-left">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama
                          Lengkap</label>
                        <input type="text" id="nama_lengkap" class="form-control input-text"
                          placeholder="Masukkan Nama Lengkap. . ." name="nama_lengkap"
                          value="{{ $data->relasi_user_detail->nama_lengkap ?? '' }}" required>
                        <label class="text-danger error-text nama_lengkap_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="instansi" class="form-label fw-semibold">Nama Sekolah /
                          Institusi /
                          Perusahaan</label>
                        <select class="form-select input-text" id="institusi" name="institusi" required>
                          <option value="" selected disabled>Pilih Nama Sekolah /
                            Institusi
                            /
                            Perusahaan</option>
                          @foreach ($institusis as $institusi)
                            <option value="{{ $institusi->id }}"
                              {{ $institusi->id === $data->relasi_institusi->id ? 'selected' : '' }}>
                              {{ $institusi->nama_institusi }}</option>
                          @endforeach
                        </select>
                        <label class="text-danger error-text institusi_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                        <select class="form-select input-text" id="jurusan" name="jurusan" required>
                          <option value="" selected disabled>Pilih Jurusan</option>
                          @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}"
                              {{ $jurusan->id === $data->relasi_jurusan->id ? 'selected' : '' }}>{{ $jurusan->jurusan }}
                            </option>
                          @endforeach
                        </select>
                        <label class="text-danger error-text jurusan_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="ktp_nik_paspor" class="form-label fw-semibold">Nomor
                          KTP/NIK/Paspor</label>
                        <input type="text" id="ktp_nik_paspor" class="form-control input-text"
                          placeholder="Masukkan Nomor KTP/NIK/Paspor. . ."
                          value="{{ $data->relasi_user_detail->ktp_nik_paspor ?? '' }}" name="ktp_nik_paspor">
                        <label class="text-danger error-text ktp_nik_paspor_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="tempat_lahir" class="form-label fw-semibold">Tempat
                          Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control input-text"
                          placeholder="Masukkan Tempat Lahir. . ."
                          value="{{ $data->relasi_user_detail->tempat_lahir ?? '' }}">
                        <label class="text-danger error-text tempat_lahir_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal
                          Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control input-text"
                          value="{{ $data->relasi_user_detail->tanggal_lahir ?? '' }}">
                        <label class="text-danger error-text tanggal_lahir_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-left">
                        <label for="jenis_kelamin" class="form-label fw-semibold">Jenis
                          Kelamin</label>
                        <select class="form-select input-text" id="jenis_kelamin" name="jenis_kelamin">
                          <option value="" selected disabled>Pilih Jenis Kelamin
                          </option>
                          <option value="laki-laki"
                            {{ $data->relasi_user_detail->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>LAKI-LAKI
                          </option>
                          <option value="perempuan"
                            {{ $data->relasi_user_detail->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>PEREMPUAN
                          </option>
                        </select>
                        <label class="text-danger error-text jenis_kelamin_error mt-1"></label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="col edit-profil-right">
                        <label for="kebangsaan" class="form-label fw-semibold">Kebangsaan</label>
                        <select name="kebangsaan" class="form-select input-text" id="kebangsaan">
                          <option value="" selected disabled>Pilih Kebangsaan
                          </option>
                          <option value="indonesia"
                            {{ $data->relasi_user_detail->kebangsaan === 'indonesia' ? 'selected' : '' }}>Indonesia
                          </option>
                          <option value="malaysia"
                            {{ $data->relasi_user_detail->kebangsaan === 'malaysia' ? 'selected' : '' }}>Malaysia
                          </option>
                        </select>
                        <label class="text-danger error-text kebangsaan_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="alamat_rumah" class="form-label fw-semibold">Alamat
                          Rumah</label>
                        <input type="text" id="alamat_rumah" class="form-control input-text"
                          placeholder="Masukkan Alamat Rumah. . ." name="alamat_rumah"
                          value="{{ $data->relasi_user_detail->alamat_rumah ?? '' }}">
                        <label class="text-danger error-text alamat_rumah_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="kode_pos" class="form-label fw-semibold">Kode Pos</label>
                        <input type="text" id="kode_pos" class="form-control input-text"
                          placeholder="Masukkan Kode Pos. . ." name="kode_pos"
                          value="{{ $data->relasi_institusi->kode_pos ?? '' }}">
                        <label class="text-danger error-text kode_pos_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="nomor_hp" class="form-label fw-semibold">Nomor
                          Telepon</label>
                        <input type="number" id="nomor_hp" class="form-control input-text"
                          placeholder="Masukkan Nomor Telepon. . ." name="nomor_hp"
                          value="{{ $data->relasi_user_detail->nomor_hp ?? '' }}">
                        <label class="text-danger error-text nomor_hp_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="text" id="email" class="form-control input-text"
                          placeholder="Masukkan Email. . ." name="email" value="{{ $data->email ?? '' }}">
                        <label class="text-danger error-text email_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="kualifikasi_pendidikan" class="form-label fw-semibold">Kualifikasi
                          Pendidikan</label>
                        <select class="form-select input-text" id="kualifikasi_pendidikan"
                          name="kualifikasi_pendidikan" required>
                          <option value="" selected disabled>Pilih Kualifikasi
                            Pendidikan
                          </option>
                          <option value="sd"
                            {{ $data->relasi_user_detail->kualifikasi_pendidikan === 'sd' ? 'selected' : '' }}>SD
                          </option>
                          <option value="smp"
                            {{ $data->relasi_user_detail->kualifikasi_pendidikan === 'smp' ? 'selected' : '' }}>SMP
                          </option>
                          <option value="smk"
                            {{ $data->relasi_user_detail->kualifikasi_pendidikan === 'smk' ? 'selected' : '' }}>SMK
                          </option>
                        </select>
                        <label class="text-danger error-text kualifikasi_pendidikan_error mt-1"></label>
                      </div>
                      <div class="col edit-profil-right">
                        <label for="foto_profil" class="form-label fw-semibold">Foto
                          Profil</label>
                        <input type="file" class="form-control form-control-lg input-file"
                          accept=".png, .jpg, .jpeg" name="foto_profil">
                        <input type="hidden" name="foto_profil_old" value="{{ $data->relasi_user_detail->foto }}">
                        <label class="text-danger error-text foto_profil_error mt-1"></label>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- DATA PEKERJAAN SEKARANG --}}
                <div class="row" style="margin-top: 65px">
                  <h5>B. Data Pekerjaan Sekarang</h5>
                  <div class="col-lg-6">
                    <div class="col edit-profil-left">
                      <label for="nama_institusi_pekerjaan" class="form-label fw-semibold">Nama Institusi /
                        Perusahaan</label>
                      @isset($data->relasi_pekerjaan->nama_institusi)
                        <input type="text" id="nama_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Nama Institusi / Perusahaan" name="nama_institusi_pekerjaan"
                          value="{{ $data->relasi_pekerjaan->nama_institusi }}">
                      @else
                        <input type="text" id="nama_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Nama Institusi / Perusahaan" name="nama_institusi_pekerjaan">
                      @endisset
                    </div>
                    <div class="col edit-profil-left">
                      <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                      @isset($data->relasi_pekerjaan->jabatan)
                        <input type="text" id="jabatan" class="form-control input-text"
                          placeholder="Masukkan Jabatan. . ." name="jabatan"
                          value="{{ $data->relasi_pekerjaan->jabatan }}">
                      @else
                        <input type="text" id="jabatan" class="form-control input-text"
                          placeholder="Masukkan Jabatan. . ." name="jabatan">
                      @endisset
                    </div>
                    <div class="col edit-profil-left">
                      <label for="alamat_kantor_pekerjaan" class="form-label fw-semibold">Alamat
                        Kantor</label>
                      @isset($data->relasi_pekerjaan->alamat_institusi)
                        <input type="text" id="alamat_kantor_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Alamat Kantor. . ." name="alamat_kantor_pekerjaan"
                          value="{{ $data->relasi_pekerjaan->alamat_institusi }}">
                      @else
                        <input type="text" id="alamat_kantor_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Alamat Kantor. . ." name="alamat_kantor_pekerjaan">
                      @endisset
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="col edit-profil-right">
                      <label for="kode_pos_pekerjaan" class="form-label fw-semibold">Kode Pos</label>
                      @isset($data->relasi_pekerjaan->kode_pos)
                        <input type="text" id="kode_pos_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Kode Pos. . ." name="kode_pos_pekerjaan"
                          value="{{ $data->relasi_pekerjaan->kode_pos }}">
                      @else
                        <input type="text" id="kode_pos_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Kode Pos. . ." name="kode_pos_pekerjaan">
                      @endisset
                    </div>
                    <div class="col edit-profil-right">
                      <label for="nomor_hp_institusi_pekerjaan" class="form-label fw-semibold">Nomor
                        Telepon Institusi / Perusahaan</label>
                      @isset($data->relasi_pekerjaan->nomor_hp_institusi)
                        <input type="number" id="nomor_hp_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Nomor Telepon Institusi / Perusahaan. . ."
                          name="nomor_hp_institusi_pekerjaan"
                          value="{{ $data->relasi_pekerjaan->nomor_hp_institusi }}">
                      @else
                        <input type="number" id="nomor_hp_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Nomor Telepon Institusi / Perusahaan. . ."
                          name="nomor_hp_institusi_pekerjaan">
                      @endisset
                    </div>
                    <div class="col edit-profil-right">
                      <label for="email_institusi_pekerjaan" class="form-label fw-semibold">Email Institusi
                        /
                        Perusahaan</label>
                      @isset($data->relasi_pekerjaan->email_institusi)
                        <input type="email" id="email_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Email Institusi / Perusahaan.." name="email_institusi_pekerjaan"
                          value="{{ $data->relasi_pekerjaan->email_institusi }}">
                      @else
                        <input type="email" id="email_institusi_pekerjaan" class="form-control input-text"
                          placeholder="Masukkan Email Institusi / Perusahaan.." name="email_institusi_pekerjaan">
                      @endisset
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col my-3">
              {{-- JUDUL --}}
              <div class="profil-section-title mb-5" style="font-size: 20px">
                Bagian 2 : Data Sertifikasi
              </div>
              {{-- FORM --}}
              <div class="col profil-section">
                <p>Tujuan Assesment</p>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="data_sertifikasi" id="sertifikasi"
                    value="sertifikasi"
                    {{ $data->relasi_sertifikasi->tujuan_asesmen === 'sertifikasi' ? 'checked' : '' }}>
                  <label class="form-check-label" for="sertifikasi">
                    Sertifikasi
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="data_sertifikasi" id="sertifikasiUlang"
                    value="sertifikasi ulang"
                    {{ $data->relasi_sertifikasi->tujuan_asesmen === 'sertifikasi ulang' ? 'checked' : '' }}>
                  <label class="form-check-label" for="sertifikasiUlang">
                    Sertifikasi Ulang
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="data_sertifikasi"
                    id="pengakuanKompetensiTerkini" value="pengakuan komptetensi terkini"
                    {{ $data->relasi_sertifikasi->tujuan_asesmen === 'pengakuan komptetensi terkini' ? 'checked' : '' }}>
                  <label class="form-check-label" for="pengakuanKompetensiTerkini">
                    Pengakuan Kompetensi Terkini (PKT)
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="data_sertifikasi"
                    id="rekognisiPembelajaranLampau" value="rekognisi pembelajaran lampau"
                    {{ $data->relasi_sertifikasi->tujuan_asesmen === 'rekognisi pembelajaran lampau' ? 'checked' : '' }}>
                  <label class="form-check-label" for="rekognisiPembelajaranLampau">
                    Rekognisi Pembelajaran Lampau
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="data_sertifikasi" id="lainnya"
                    value="lainnya" {{ $data->relasi_sertifikasi->tujuan_asesmen === 'lainnya' ? 'checked' : '' }}>
                  <label class="form-check-label" for="lainnya">
                    Lainnya
                  </label>
                </div>
              </div>
            </div>
            <div class="col my-3">
              {{-- JUDUL --}}
              <div class="profil-section-title mb-5" style="font-size: 20px">
                Bagian 3 : Bukti Kelengkapan Pemohon
              </div>
              <div class="col profil-section text-black">
                <div class="col mb-5">
                  <label for="kartuKeluarga" class="form-label fw-semibold">Kartu Keluarga</label>
                  <input type="file" id="kartuKeluarga" class="form-control form-control-lg input-file-col">
                </div>
                <div class="col mb-5">
                  <label for="kartuPelajar" class="form-label fw-semibold">Kartu Pelajar</label>
                  <input type="file" id="kartuPelajar" class="form-control form-control-lg input-file-col">
                </div>
                <div class="col mb-5">
                  <label for="pasFoto" class="form-label fw-semibold">Pas Foto</label>
                  <input type="file" id="pasFoto" class="form-control form-control-lg input-file-col">
                  <p class="text-danger mt-2">*Masukkan foto berlatar belakang merah</p>
                </div>
                <div class="col mb-5">
                  <label for="sertifikatPrakerin" class="form-label fw-semibold">Sertifikat Prakerin
                    atau Surat Keterangan Telah Melaksanakan Praktek Kerja Industri</label>
                  <input type="file" id="sertifikatPrakerin" class="form-control form-control-lg input-file-col">
                </div>
                <div class="col mb-5">
                  <label for="nilaiRaport" class="form-label fw-semibold">Nilai Raport (Semester 1
                    sd Semester 5)</label>
                  <input type="file" id="nilaiRaport" class="form-control form-control-lg input-file-col">
                </div>

              </div>
            </div>
            <div class="col my-3">
              {{-- JUDUL --}}
              <div class="profil-section-title mb-5" style="font-size: 20px">
                Hasil Persyaratan
              </div>
              <div class="row" style="margin: 3px 0">
                <div class="col-lg-6 profil-section text-black">
                  <h4>Pemohon / Kandidat</h4>
                  <div class="col edit-profil-left mb-4">
                    <label for="namaLengkapPemohon" class="form-label fw-semibold">Nama
                      Lengkap</label>
                    <input type="text" id="namaLengkapPemohon" class="form-control input-text"
                      placeholder="Masukkan Nama Lengkap. . .">
                  </div>
                  {{-- TANDA TANGAN / TTD --}}
                  <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                  <div class="col edit-profil mb-4 signature-pad" id="signature-pad">
                    <canvas></canvas>
                  </div>
                  {{-- <div id="signature-clear">
                                        <button type="button" class="button button-primary tombol-primary-small mb-4"
                                            data-action="clear">Clear</button>
                                    </div> --}}
                  <div class="col edit-profil-left">
                    <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                    <input type="date" id="tanggal" class="form-control input-text"
                      placeholder="Masukkan Nama Lengkap">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary tombol-primary-small">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>

@section('script')
  <script>
    // let data = @json($data);
    // let institusis = @json($institusis);

    // $("#edit-btn").on('click', function() {
    //   $("#editProfil").modal('show')

    //   $("#form-update input:not([name='_token'])").val('')

    //   $("#form-update [name='nama_lengkap']").val(data.relasi_user_detail.nama_lengkap)
    //   $("#form-update [name='institusi']").val(institusi(institusis))
    // })

    // function institusi($institusi) {
    //   console.log($institusi)
    // }

    // $("#form-update").on('submit', function(e) {
    //   e.preventDefault()
    //   $.ajax({
    //     url: $(this).attr('action'),
    //     method: $(this).attr('method'),
    //     data: new FormData(this),
    //     processData: false,
    //     dataType: 'json',
    //     contentType: false,
    //     beforeSend: function() {
    //       $(document).find('label.error-text').text('');
    //     },
    //     success: function(data) {
    //       if (data.status == 0) {
    //         $.each(data.error, function(prefix, val) {
    //           $('label.' + prefix + '_error').text(val[0]);
    //           $('#editProfil').animate({
    //             scrollTop: 0
    //           }, 'fast');
    //         });
    //       } else {
    //         $("#profile-section").load(location.href + " #profile-section>*", "");
    //         $("#editProfil").modal('hide')
    //         $('html, body').animate({
    //           scrollTop: 0
    //         }, 'fast');
    //       }
    //     }
    //   })
    //   //   $("#form-update").ajaxSubmit({
    //   //     success: function(res) {
    //   //       $("#profile-section").load(location.href + " #profile-section>*", "");
    //   //       $("#editProfil").modal('hide')
    //   //       $('html, body').animate({
    //   //         scrollTop: 0
    //   //       }, 'fast');
    //   //     }
    //   //   })
    // })
  </script>
@endsection
