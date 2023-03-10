<div class="mb-5 pb-5">
    <div class="col profil-section-title">
        Bagian 4 : Peninjau
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
                                data-bs-target="#modalTambahPeninjau">Tambah Peninjau
                            </a>
                        </span>

                        {{-- MODAL TAMBAH --}}
                        <div class="modal fade text-left" id="modalTambahPeninjau" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Peninjau</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.TambahPeninjau') }}" id="formTambahPeninjau"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Peninjau</label>
                                                <select class="form-control jurusan" name="user_peninjau_id"
                                                    aria-hidden="true">
                                                    <option value="" selected disabled>-- Pilih Peninjau --</option>
                                                    @foreach ($user_peninjau as $data_user_peninjau)
                                                    <option value="{{ $data_user_peninjau['id'] }}">
                                                        {{ $data_user_peninjau['nama_lengkap'] }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group has-validation">
                                                    <label
                                                        class="text-danger error-text user_peninjau_id_error"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary rounded-pill"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Batal</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1 rounded-pill">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table table-striped display" id="table-peninjau">
                            <thead>
                                <tr>
                                    <th>Nama Peninjau</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                {{-- MODAL EDIT --}}
                <div class="modal fade text-left" id="modalEditPeninjau" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Ubah Peninjau</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form id="formEditPeninjau" action="{{ route('admin.UbahPeninjau') }}" method="POST">
                                <input type="hidden" name="id" hidden>
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Peninjau</label>
                                        <select class="form-control jurusan" name="user_peninjau_id" aria-hidden="true">
                                            <option value="" selected disabled>-- Pilih Peninjau --</option>
                                            @foreach ($user_peninjau as $data_user_peninjau)
                                            <option value="{{ $data_user_peninjau['id'] }}">
                                                {{ $data_user_peninjau['nama_lengkap'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group has-validation">
                                            <label class="text-danger error-text user_peninjau_id_error"></label>
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