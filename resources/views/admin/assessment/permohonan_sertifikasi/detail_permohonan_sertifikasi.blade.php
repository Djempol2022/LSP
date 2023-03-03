@extends('layout.main-layout', ['title' => 'Detail Permohonan Sertifikasi Kompetensi'])
@section('main-section')
<div class="container mt-5 jalur-file">

    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                    href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="{{route('admin.Assessment')}}">Asessment</a></li>
            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Detail Permohonan Sertifikasi Kompetensi</li>
        </ol>
    </nav>
</div>
    {{-- EDIT PROFIL --}}
    <div class="mt-5">
        <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
            <div class="col profil-section" style="margin-bottom:0% !important">
                <div class="thumb-profil thumb">
                    @isset($data_permohonan_user_sertifikasi->relasi_user_detail->foto)
                        <img src="{{ asset('storage/' . $data_permohonan_user_sertifikasi->relasi_user_detail->foto) }}"
                        class="img-thumbnail rounded-circle mb-3" style="width: 100px; height: 100px;object-fit: cover;" alt="image">
                    @else
                        <img src="/images/logo/favicon_lsp.png" class="img-thumbnail rounded-circle mb-3" alt="image">
                    @endisset
                </div>
            </div>

        {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
        <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Bagian 1 : Rincian Data Pemohon Sertifikasi
            </div>
            {{-- DATA PRIBADI --}}
            <div class="col profil-section" style="margin-bottom:0% !important">
                <h5>A. Data Pribadi</h5>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Nama Lengkap</p>
                            <span>{{ $data_permohonan_user_sertifikasi->nama_lengkap }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Nama Institusi / Perusahaan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_institusi->nama_institusi }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Jurusan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_jurusan->jurusan ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Nomor KTP/NIK/Paspor</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->ktp_nik_paspor  ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tempat Lahir</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->tempat_lahir  ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tanggal Lahir</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->tanggal_lahir  ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Jenis Kelamin</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->jenis_kelamin ?? '' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Kebangsaan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kebangsaan->kebangsaan ?? ''}}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Alamat Rumah</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->alamat_rumah ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Kode Pos</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->kode_pos  ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Nomor Telepon</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->nomor_hp ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Email</p>
                            <span>{{ $data_permohonan_user_sertifikasi->email ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Kualifikasi Pendidikan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_user_detail->relasi_kualifikasi_pendidikan->pendidikan ?? ''}}</span>
                        </div>
                        <div class="col pb-4" id="nomor_urut">
                            <p class="fw-bold">Nomor Urut Peserta</p>
                                @isset ($data_permohonan_user_sertifikasi->relasi_sertifikasi->nomor_urut)
                                    <p>{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->nomor_urut  ?? '' }}</p>
                                @endif
                            <a href="#!" class="btn btn-sm btn-primary mt-0" data-bs-toggle="modal"
                                data-bs-target="#modalNomorUrutAsesi" id="ubahOrTambahUbahOrTambahNomorUrut" style="font-size: 60%">
                                Setting Nomor Urut
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- DATA PEKERJAAN SEKARANG --}}
            <div class="col profil-section" style="margin-bottom:0% !important">
                <h5>B. Data Pekerjaan Sekarang</h5>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Nama Institusi / Perusahaan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nama_pekerjaan ?? ''}}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Jabatan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->jabatan ?? ''}}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Alamat Kantor</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->alamat_pekerjaan ?? ''}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col pb-4">
                            <p class="fw-bold">Kode Pos</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->kode_pos ?? ''}}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Nomor Telepon Institusi / Perusahaan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->nomor_hp_pekerjaan ?? ''}}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Email Institusi / Peerusahaan</p>
                            <span>{{ $data_permohonan_user_sertifikasi->relasi_pekerjaan->email_pekerjaan ?? ''}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DATA SERTIFIKASI --}}
        <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Bagian 2 : Data Sertifikasi
            </div>
            <div class="col profil-section" style="margin-bottom:0% !important">
                <div class="col pb-45">
                    <p class="fw-bold">Judul Skema Sertifikasi</p>
                    <span>{{ $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->judul_skema_sertifikasi ?? ''}}</span>
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Nomor Skema Sertifikasi</p>
                    <span>{{ $data_permohonan_user_sertifikasi->relasi_jurusan->relasi_skema_sertifikasi->nomor_skema_sertifikasi ?? ''}}</span>
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Tujuan Asesmen</p>
                    <span>{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->tujuan_asesi ?? ''}}</span>
                </div>
                <section class="section">
                            <table class="table table-striped" id="table-data-unit-kompetensi"
                                style="table-layout: fixed;">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode unit</th>
                                        <th>Judul Unit</th>
                                        <th style="word-wrap: break-word;">Jenis Standar(Standar khusus/Standar
                                            internasional/SKKNI)</th>
                                    </tr>
                                </thead>
                            </table>
                </section>
            </div>
        </div>


        {{-- BUKTI KELENGKAPAN PEMOHON --}}
        <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Bagian 3 : Bukti Kelengkapan Pemohon
            </div>
            <div class="col profil-section" style="margin-bottom:0% !important">
                <div class="col pb-45">
                    <p class="fw-bold">Kartu Keluarga</p>
                    @if (!empty($kartu_keluarga))
                    <p><a href="{{asset('storage/'. $data_permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_keluarga)}}" target="_blank">Kartu Keluarga.PDF</a></p>
                    @else
                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    @endif
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Kartu Pelajar</p>
                    @if (!empty($kartu_pelajar))
                    <p><a href="{{asset('storage/'. $data_permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->kartu_pelajar)}}" target="_blank">Kartu Pelajar.PDF</a></p>
                    @else
                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    @endif
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Pas Foto</p>
                    @if (!empty($pas_foto))
                    <p><a href="{{asset('storage/'. $data_permohonan_user_sertifikasi->relasi_user_detail->foto)}}" target="_blank">Foto.PNG</a></p>
                    @else
                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    @endif
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Sertifikat Prakerin atau Surat Keterangan Telah Melaksanakan Praktek Kerja
                        Industri</p>
                    @if (!empty($sertifikat_prakerin))
                    <p><a href="{{asset('storage/'. $data_permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->sertifikat_prakerin)}}" target="_blank">Sertifikat Prakerin.PDF</a></p>
                    @else
                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    @endif
                </div>
                <div class="col pb-45">
                    <p class="fw-bold">Nilai Raport</p>
                    @if (!empty($nilai_raport))
                    <p><a href="{{asset('storage/'. $data_permohonan_user_sertifikasi->relasi_kelengkapan_pemohon->nilai_raport)}}" target="_blank">Nilai Raport.PDF</a></p>
                    @else
                    <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                    @endif
                </div>
            </div>
        </div>


        {{-- ---HASIL PERSYARATAN --}}
        <div class="mb-5 pb-5" style="margin-bottom: 0% !important">
            <div class="col profil-section-title">
                Hasil Persyaratan
            </div>
            <div class="col profil-section" style="margin-bottom:0% !important">
                <div class="row my-4">

                    {{-- PEMOHON / KANDIDAT --}}
                    <div class="col-md-6">
                        <h5 class="pb-4">Pemohon / Kandidat :</h5>
                        <div class="col pb-4">
                            <p class="fw-bold">Nama Lengkap</p>
                            <span>{{ $data_permohonan_user_sertifikasi->nama_lengkap  ?? '' }}</span>
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tanda Tangan</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->ttd_asesi)
                            <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->ttd_asesi  ?? '' }}"
                                alt="ttd" width="180px">
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tanggal</p>
                            @isset($tanggal)
                            <span>{{ $tanggal  ?? '' }}</span>
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                    </div>

                    {{-- ---------------DATA PERSETUJUAN/TANDA TANGAN ADMIN LSP --}}
                    <div class="col-md-6" id="detail-permohonan-sertifikasi">
                        <h5 class="pb-4">Admin LSP :</h5>
                        <div class="col pb-4">
                            <p class="fw-bold">Nama Lengkap</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin)
                            <span class="fw-semibold">
                                {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->nama_admin }}
                            </span>
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">No. Reg</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg)
                            <span class="fw-semibold">
                                {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->no_reg }}
                            </span>
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tanda Tangan</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin)
                            <img src="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin }}"
                                alt="ttd_admin" width="180px">
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Tanggal</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal)
                            <span class="fw-semibold">
                                {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->tanggal }}
                            </span>
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        <div class="col pb-4">
                            <p class="fw-bold">Catatan</p>
                            @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan)
                            <span class="fw-semibold">
                                {{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->catatan }}
                            </span>
                            @else
                            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                            @endisset
                        </div>
                        @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->ttd_admin)
                        @else
                        <div class="pt-0">
                            <button type="button" class="btn btn-primary tombol-primary-medium mt-0"
                                data-bs-toggle="modal" data-bs-target="#modalPersetujuanAdmin">Setujui Admin
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-sm "></button>

    {{-- MODAL PERSETUJUAN/TANDA TANGAN ADMIN --}}
    <div class="modal fade text-left" id="modalPersetujuanAdmin" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Persetujuan Admin</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.TambahOrUbahPersetujuanAdmin') }}" id="formPersetujuanAdmin" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="hidden" name="sertifikasi_id"
                                value="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->id }}" hidden>

                            <label>Nama Admin</label>
                            <input value="{{Auth::user()->nama_lengkap}}" class="form-control rounded-4" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Reg</label>
                            <input type="text" name="no_reg" placeholder="Nomor Reg" class="form-control rounded-4">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text no_reg_error"></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control rounded-4">
                                @isset($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->status)
                                    @if($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->status == 0)
                                        <option value="0" selected>Ditolak</option>
                                        <option value="1">Diterima</option>
                                    @elseif($data_permohonan_user_sertifikasi->relasi_sertifikasi->relasi_tanda_tangan_admin->status == 1)
                                        <option value="0">Ditolak</option>
                                        <option value="1" selected>Diterima</option>
                                    @endif
                                @else
                                    <option value="" selected disabled>-- Pilih Status Peserta --</option>
                                    <option value="0">Ditolak</option>
                                    <option value="1">Diterima</option>
                                @endisset
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text catatatn_error"></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Catatan</label>
                            <textarea type="text" name="catatan" placeholder="Catatan"
                                class="form-control rounded-4"></textarea>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text catatatn_error"></label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                            <div class="col edit-profil mb-2 signature-pad" id="signature-pad">
                                <canvas id="sig" class="rounded-4"></canvas>
                                <input type="hidden" name="ttd_admin" id="ttd_admin">
                            </div>
                            <div class="col" id="signature-clear">
                                <button type="button" class="btn-sm btn btn-danger mb-2"
                                    id="clear"><i class="fa fa-eraser"></i>
                                </button>
                            </div>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text ttd_admin_error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" id="simpan">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- MODAL INPUT NOMOR URUT ASESI --}}
    <div class="modal fade text-left" id="modalNomorUrutAsesi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Persetujuan Admin</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.TambahOrUbahNomorUrutAsesi') }}" id="formNomorUrutAsesi" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="sertifikasi_id"
                            value="{{ $data_permohonan_user_sertifikasi->relasi_sertifikasi->id }}" hidden>
                        <div class="mb-3">
                            <label>Nomor Urut Asesi</label>
                            <input type="text" name="nomor_urut" placeholder="Masukkan Nomor Urut Asesi"
                                class="form-control rounded-4">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text nomor_urut_error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button id="simpan" type="submit" class="btn btn-primary ml-1">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    let data_permohonan_sertifikasi = @json($data_permohonan_user_sertifikasi);
    var id_skema_sertifikasi = data_permohonan_sertifikasi.relasi_jurusan.relasi_skema_sertifikasi.id;
    let list_unit_kompetensi = [];

    // TAMBAH/UBAH PERSETUJUAN ADMIN
    // $("#ubahOrTambahPersetujuanAdmin").on('click', function () {
    //     $("#modalPersetujuanAdmin").modal('show')

    //     $("#formPersetujuanAdmin [name='nama_admin']").val(data_permohonan_sertifikasi.relasi_sertifikasi
    //         .relasi_tanda_tangan_admin.nama_admin)
    //     $("#formPersetujuanAdmin [name='no_reg']").val(data_permohonan_sertifikasi.relasi_sertifikasi
    //         .relasi_tanda_tangan_admin.no_reg)
    //     $("#formPersetujuanAdmin [name='catatan']").val(data_permohonan_sertifikasi.relasi_sertifikasi
    //         .relasi_tanda_tangan_admin.catatan)
        
    //     $('#formPersetujuanAdmin').on('submit', function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: $(this).attr('action'),
    //             method: $(this).attr('method'),
    //             data: new FormData(this),
    //             processData: false,
    //             dataType: 'json',
    //             contentType: false,
    //             beforeSend: function () {
    //                 $(document).find('label.error-text').text('');
    //             },
    //             success: function (data) {
    //                 if (data.status == 0) {
    //                     $.each(data.error, function (prefix, val) {
    //                         $('label.' + prefix + '_error').text(val[0]);
    //                         // $('span.'+prefix+'_error').text(val[0]);
    //                     });
    //                 } else if (data.status == 1) {
    //                     swal({
    //                             title: "Berhasil",
    //                             text: `${data.msg}`,
    //                             icon: "success",
    //                             buttons: true,
    //                             successMode: true,
    //                         }),
    //                         $("#modalPersetujuanAdmin").modal('hide')
    //                     location.reload();
    //                 }
    //             }
    //         });
    //     });
    // })

        // $("#ubahOrTambahPersetujuanAdmin").on('click', function(){
        //     $("#formPersetujuanAdmin [name='nama_admin']").val(data_permohonan_sertifikasi.relasi_sertifikasi
        //         .relasi_tanda_tangan_admin.nama_admin)
        //     $("#formPersetujuanAdmin [name='no_reg']").val(data_permohonan_sertifikasi.relasi_sertifikasi
        //         .relasi_tanda_tangan_admin.no_reg)
        //     $("#formPersetujuanAdmin [name='catatan']").val(data_permohonan_sertifikasi.relasi_sertifikasi
        //         .relasi_tanda_tangan_admin.catatan)
            
        // })

    // TAMBAH/UBAH NOMOR URUT ASESI
    $("#ubahOrTambahUbahOrTambahNomorUrut").on('click', function () {
        $("#formNomorUrutAsesi [name='nomor_urut']").val(data_permohonan_sertifikasi.relasi_sertifikasi.nomor_urut)
        $('#formNomorUrutAsesi').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(document).find('label.error-text').text('');
                },
                success: function (data) {
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            $("#modalNomorUrutAsesi").modal('hide')
                            $("#nomor_urut").load(location.href + " #nomor_urut>*", "");
                    }
                }
            });
        });
    })

    // DATA UNIT KOMPETENSI BERDASARKAN JURUSAN
    const table_data_unit_kompetensi = $('#table-data-unit-kompetensi').DataTable({
        "pageLength": false,
        "lengthMenu": false,
        "bLengthChange": false,
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        "processing": true,
        "bServerSide": true,
        "responsive": false,
        "sScrollX": '100%',
        "sScrollXInner": "100%",
        ajax: {
            url: "/admin/data-unit-kompetensi/" + id_skema_sertifikasi,
            type: "POST",

        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    let i = 1;
                    list_unit_kompetensi[row.id] = row;
                    return meta.row + 1;
                }
            },
            {
                "targets": 1,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.kode_unit;
                }
            },
            {
                "targets": 2,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.judul_unit;
                }
            },
            {
                "targets": 3,
                "class": "text-wrap text-center",
                "render": function (data, type, row, meta) {
                    list_unit_kompetensi[row.id] = row;
                    return row.jenis_standar;
                }
            },
        ]
    });

    $('#formPersetujuanAdmin').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(document).find('label.error-text').text('');
                },
                success: function (data) {
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            table_data_unit_kompetensi.ajax.reload()
                            $("#modalPersetujuanAdmin").modal('hide')
                            $("#detail-permohonan-sertifikasi").load(location.href + " #detail-permohonan-sertifikasi>*", "");
                            // setTimeout(function() {location.reload()}, 800);
                            // return false;
                    }
                }
            });
        });

    // TANDA TANGAN ADMIN
    let canvas;
    let signaturePad;

    function setupSignatureBox() {
        canvas = document.getElementById('sig');
        signaturePad = new SignaturePad(canvas);

        var ratio = Math.max(window.devicePixelRatio || 1, 1);

        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        var w = window.innerWidth;
        if (canvas.width == 0 && canvas.height == 0) {
            if (w > 1200) {
                canvas.width = 496 * ratio;
                canvas.height = 200 * ratio;
            } else if (w < 1200 && w > 992) {
                canvas.width = 334 * ratio;
                canvas.height = 200 * ratio;
            } else if (w < 992) {
                canvas.width = 399 * ratio;
                canvas.height = 200 * ratio;
            }
        } else {
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
        }
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear();
    }

    function clear() {
        signaturePad.clear();
    }

    function sentToController() {
        if (signaturePad.isEmpty()) {
            let ttdData = data_permohonan_sertifikasi.relasi_sertifikasi.relasi_tanda_tangan_admin.ttd_admin;
            document.getElementById('ttd_admin').value = ttdData;
        } else {
            let ttdData = signaturePad.toDataURL();
            document.getElementById('ttd_admin').value = ttdData;
        }
    }

    document.getElementById('clear').addEventListener("click", clear);
    document.getElementById('simpan').addEventListener("click", sentToController);
    document.addEventListener("DOMContentLoaded", setupSignatureBox);
</script>
@endsection
