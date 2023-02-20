<div class="mb-5 pb-5">
    <div class="col profil-section-title">
        Bagian 3 : Asesor
    </div>
    <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
        berikut.
        Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
        latar
        belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
    </p>
    <div class="col profil-section">
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <span class="badge bg-info rounded-pill">
                            <a class="text-white" href="#" data-bs-toggle="modal"
                                data-bs-target="#modalTambahAsesor">Tambah Asesor
                            </a>
                        </span>

                        {{-- MODAL TAMBAH --}}
                        <div class="modal fade text-left" id="modalTambahAsesor" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Asesor</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.TambahAsesor') }}" id="formTambahAsesor"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Asesor</label>
                                                <select class="form-control jurusan" name="user_asesor_id"
                                                    aria-hidden="true">
                                                    <option value="" selected disabled>-- Pilih Asesor --</option>
                                                    @foreach ($user_asesor as $data_user_asesor)
                                                    <option value="{{ $data_user_asesor['id'] }}">
                                                        {{ $data_user_asesor['nama_lengkap'] }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group has-validation">
                                                    <label class="text-danger error-text email_institusi_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Batal</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan</span>
                                            </button>
                                        </div>
                                        <input type="number" name="id_jadwal"
                                            value="{{ $jadwal_uji_kompetensi['id'] }}">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table table-striped display" id="table-asesor">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                    <p class="jadwal_id" hidden>{{ $jadwal_uji_kompetensi['id'] }}</p>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                {{-- MODAL EDIT --}}
                <div class="modal fade text-left" id="modalEditAsesor" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Ubah Asesor</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form id="formEditAsesor" action="{{ route('admin.UbahAsesor') }}" method="POST">
                                <input type="hidden" name="id" hidden>
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Asesor</label>
                                        <select class="form-control jurusan" name="user_asesor_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Asesor --</option>
                                            @foreach ($user_asesor as $data_user_asesor)
                                            <option value="{{ $data_user_asesor['id'] }}">
                                                {{ $data_user_asesor['nama_lengkap'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text email_institusi_error"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Batal</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>







    </div>
</div>