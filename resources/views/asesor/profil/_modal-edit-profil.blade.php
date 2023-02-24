<div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="form-update" action="{{ route('asesor.Profil.update') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profil Asesor / Peninjau</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="col my-3">
                        {{-- FORM --}}
                        <div class="col profil-section">
                            {{-- DATA PRIBADI --}}
                            <h5>A. Data Pribadi</h5>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="col edit-profil-left">
                                        <label for="nama_lengkap" class="form-label fw-semibold">Nama
                                            Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control input-text"
                                            placeholder="Masukkan Nama Lengkap. . ." name="nama_lengkap" required>
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
                                        </select>
                                        <label class="text-danger error-text institusi_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                                        <select class="form-select input-text" id="jurusan" name="jurusan" required>
                                            <option value="" selected disabled>Pilih Jurusan</option>
                                        </select>
                                        <label class="text-danger error-text jurusan_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="ktp_nik_paspor" class="form-label fw-semibold">Nomor
                                            KTP/NIK/Paspor</label>
                                        <input type="text" id="ktp_nik_paspor" class="form-control input-text"
                                            placeholder="Masukkan Nomor KTP/NIK/Paspor. . ." name="ktp_nik_paspor">
                                        <label class="text-danger error-text ktp_nik_paspor_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="tempat_lahir" class="form-label fw-semibold">Tempat
                                            Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                                            class="form-control input-text" placeholder="Masukkan Tempat Lahir. . .">
                                        <label class="text-danger error-text tempat_lahir_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal
                                            Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                            class="form-control input-text">
                                        <label class="text-danger error-text tanggal_lahir_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="jenis_kelamin" class="form-label fw-semibold">Jenis
                                            Kelamin</label>
                                        <select class="form-select input-text" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="" selected disabled>Pilih Jenis Kelamin
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
                                        </select>
                                        <label class="text-danger error-text kebangsaan_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="alamat_rumah" class="form-label fw-semibold">Alamat
                                            Rumah</label>
                                        <input type="text" id="alamat_rumah" class="form-control input-text"
                                            placeholder="Masukkan Alamat Rumah. . ." name="alamat_rumah">
                                        <label class="text-danger error-text alamat_rumah_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="kode_pos" class="form-label fw-semibold">Kode Pos</label>
                                        <input type="text" id="kode_pos" class="form-control input-text"
                                            placeholder="Masukkan Kode Pos. . ." name="kode_pos">
                                        <label class="text-danger error-text kode_pos_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="nomor_hp" class="form-label fw-semibold">Nomor
                                            Telepon</label>
                                        <input type="number" id="nomor_hp" class="form-control input-text"
                                            placeholder="Masukkan Nomor Telepon. . ." name="nomor_hp">
                                        <label class="text-danger error-text nomor_hp_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="text" id="email" class="form-control input-text"
                                            placeholder="Masukkan Email. . ." name="email">
                                        <label class="text-danger error-text email_error mt-1"></label>
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="kualifikasi_pendidikan" class="form-label fw-semibold">Kualifikasi
                                            Pendidikan</label>
                                        <select class="form-select input-text" id="kualifikasi_pendidikan"
                                            name="kualifikasi_pendidikan">
                                            <option value="" selected disabled>Pilih Kualifikasi
                                                Pendidikan
                                            </option>
                                        </select>
                                        <label
                                            class="text-danger error-text kualifikasi_pendidikan_error mt-1"></label>
                                    </div>
                                </div>
                            </div>

                            {{-- DATA PEKERJAAN SEKARANG --}}
                            <div class="row" style="margin-top: 65px">
                                <h5>B. Data Pekerjaan Sekarang</h5>
                                <div class="col-lg-6">
                                    <div class="col edit-profil-left">
                                        <label for="nama_pekerjaan" class="form-label fw-semibold">Nama Institusi
                                            /
                                            Perusahaan</label>
                                        <input type="text" id="nama_pekerjaan" class="form-control input-text"
                                            placeholder="Masukkan Nama Institusi / Perusahaan" name="nama_pekerjaan">
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                                        <input type="text" id="jabatan" class="form-control input-text"
                                            placeholder="Masukkan Jabatan. . ." name="jabatan">
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="alamat_kantor_pekerjaan" class="form-label fw-semibold">Alamat
                                            Kantor</label>
                                        <input type="text" id="alamat_kantor_pekerjaan"
                                            class="form-control input-text" placeholder="Masukkan Alamat Kantor. . ."
                                            name="alamat_kantor_pekerjaan">
                                    </div>
                                    <div class="col edit-profil-left">
                                        <label for="pas_foto" class="form-label fw-semibold">Pas Foto</label>
                                        @if (!empty($pas_foto))
                                            <p>{{ $pas_foto }}</p>
                                        @endif
                                        <input type="file" class="form-control form-control-lg input-file-col"
                                            accept=".png, .jpg, .jpeg" name="pas_foto" id="pas_foto"
                                            onchange=ValidateFileUploadFoto()>
                                        <input type="hidden" name="pas_foto_old"
                                            value="{{ $data->relasi_user_detail->foto }}">
                                        {{-- <p class="text-danger mt-2">*Masukkan foto berlatar belakang merah</p> --}}
                                        <label class="text-danger mt-1">
                                            <small class="error-text pas_foto_error">*maksimal 2mb</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col edit-profil-right">
                                        <label for="kode_pos_pekerjaan" class="form-label fw-semibold">Kode
                                            Pos</label>
                                        <input type="text" id="kode_pos_pekerjaan" class="form-control input-text"
                                            placeholder="Masukkan Kode Pos. . ." name="kode_pos_pekerjaan">
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="nomor_hp_institusi_pekerjaan" class="form-label fw-semibold">Nomor
                                            Telepon Institusi / Perusahaan</label>
                                        <input type="number" id="nomor_hp_institusi_pekerjaan"
                                            class="form-control input-text"
                                            placeholder="Masukkan Nomor Telepon Institusi / Perusahaan. . ."
                                            name="nomor_hp_institusi_pekerjaan">
                                    </div>
                                    <div class="col edit-profil-right">
                                        <label for="email_institusi_pekerjaan" class="form-label fw-semibold">Email
                                            Institusi
                                            /
                                            Perusahaan</label>
                                        <input type="email" id="email_institusi_pekerjaan"
                                            class="form-control input-text"
                                            placeholder="Masukkan Email Institusi / Perusahaan.."
                                            name="email_institusi_pekerjaan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary tombol-primary-small"
                        id="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@section('script')
    <script>
        let data = @json($data);
        let institusis = @json($institusis);
        let jurusans = @json($jurusans);
        let kebangsaan = @json($kebangsaan);
        let kualifikasi_pendidikan = @json($kualifikasi_pendidikan);

        function isset(accessor) {
            try {
                // Note we're seeing if the returned value of our function is not
                // undefined or null
                return accessor() !== undefined && accessor() !== null
            } catch (e) {
                // And we're able to catch the Error it would normally throw for
                // referencing a property of undefined
                return false
            }
        }

        $("#edit-btn").on('click', function() {
            $("#editProfil").modal('show')

            $("#nama_lengkap").val(data.nama_lengkap)

            $("#form-update [name='institusi']").append(institusis.map(function(d) {
                return $(
                    `<option value='${d.id}' ${d.id === data.institusi_id ? 'selected' : ''}>${d.nama_institusi}</option>`
                )
            }))

            $("#form-update [name='jurusan']").append(jurusans.map(function(d) {
                return $(
                    `<option value='${d.id}' ${d.id === data.jurusan_id ? 'selected' : ''}>${d.jurusan}</option>`
                )
            }))

            $("#form-update [name='ktp_nik_paspor']").val(data.relasi_user_detail.ktp_nik_paspor)

            $("#form-update [name='tempat_lahir']").val(data.relasi_user_detail.tempat_lahir)

            $("#form-update [name='tanggal_lahir']").val(data.relasi_user_detail.tanggal_lahir)

            $("#form-update [name='jenis_kelamin']").append(
                $(
                    `<option value='laki-laki' ${'laki-laki' === data.relasi_user_detail.jenis_kelamin ? 'selected' : ''}>Laki-laki</option>
          <option value='perempuan' ${'perempuan' === data.relasi_user_detail.jenis_kelamin ? 'selected' : ''}>Perempuan</option>`
                ))
            $("#form-update [name='kebangsaan']").append(kebangsaan.map(function(d) {
                if (isset(data.relasi_user_detail.kebangsaan_id)) {
                    return $(
                        `<option value='${d.id}'>${d.kebangsaan}</option>`)
                } else {
                    return $(
                        `<option value='${d.id}' ${d.id === data.relasi_user_detail.kebangsaan_id ? 'selected' : ''}>${d.kebangsaan}</option>`
                    )
                }
            }))

            $("#form-update [name='alamat_rumah']").val(data.relasi_user_detail.alamat_rumah)

            $("#form-update [name='kode_pos']").val(data.relasi_user_detail.kode_pos)

            $("#form-update [name='nomor_hp']").val(data.relasi_user_detail.nomor_hp)

            $("#form-update [name='email']").val(data.email)

            $("#form-update [name='kualifikasi_pendidikan']").append(kualifikasi_pendidikan.map(function(d) {
                if (isset(data.relasi_user_detail.kualifikasi_pendidikan_id)) {
                    return $(
                        `<option value='${d.id}'>${d.pendidikan}</option>`)
                } else {
                    return $(
                        `<option value='${d.id}' ${d.id === data.relasi_user_detail.kualifikasi_pendidikan_id ? 'selected' : ''}>${d.pendidikan}</option>`
                    )
                }
            }))

            if (isset(data.relasi_pekerjaan.nama_pekerjaan)) {
                $("#form-update [name='nama_pekerjaan']").val('')
            } else {
                $("#form-update [name='nama_pekerjaan']").val(data.relasi_pekerjaan.nama_pekerjaan)
            }

            if (isset(data.relasi_pekerjaan.jabatan)) {
                $("#form-update [name='jabatan']").val('')
            } else {
                $("#form-update [name='jabatan']").val(data.relasi_pekerjaan.jabatan)
            }

            if (isset(data.relasi_pekerjaan.alamat_pekerjaan)) {
                $("#form-update [name='alamat_kantor_pekerjaan']").val('')
            } else {
                $("#form-update [name='alamat_kantor_pekerjaan']").val(data.relasi_pekerjaan.alamat_pekerjaan)
            }

            if (isset(data.relasi_pekerjaan.kode_pos)) {
                $("#form-update [name='kode_pos_pekerjaan']").val('')
            } else {
                $("#form-update [name='kode_pos_pekerjaan']").val(data.relasi_pekerjaan.kode_pos)
            }

            if (isset(data.relasi_pekerjaan.nomor_hp_pekerjaan)) {
                $("#form-update [name='nomor_hp_institusi_pekerjaan']").val('')
            } else {
                $("#form-update [name='nomor_hp_institusi_pekerjaan']").val(data.relasi_pekerjaan
                    .nomor_hp_pekerjaan)
            }

            if (isset(data.relasi_pekerjaan.email_pekerjaan)) {
                $("#form-update [name='email_institusi_pekerjaan']").val('')
            } else {
                $("#form-update [name='email_institusi_pekerjaan']").val(data.relasi_pekerjaan.email_pekerjaan)
            }
        });
        $("#form-update").on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                cache: false,
                contentType: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            $('#editProfil').animate({
                                scrollTop: 0
                            }, 'fast');
                        });
                    } else {
                        $("#editProfil").modal('hide')
                        $("#form-update [name='pas_foto']").val('');
                        $('html, body').animate({
                            scrollTop: 0
                        }, 'fast');
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                successMode: true,
                            }),
                            $("#detail-profil").load(location.href + " #detail-profil>*", "");
                    }
                }
            })
        })

        function ValidateFileUploadFoto() {
            var fuData = document.getElementById('pas_foto');
            var FileUploadPath = fuData.value;
            var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
                $('small.pas_foto_error').text('');
                if (fuData.files && fuData.files[0]) {
                    var size = fuData.files[0].size;
                    if (size > 2048372) {
                        $('small.pas_foto_error').text('Ukuran foto maksimal 2mb');
                        $('#pas_foto').val('')
                        return;
                    } else {
                        $('small.pas_foto_error').text('');
                    }
                }
            } else {
                $('small.pas_foto_error').text('Foto hanya boleh berformat PNG, JPG, dan JPEG');
            }
        }
    </script>
@endsection
