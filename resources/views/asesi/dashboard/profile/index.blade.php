@extends('layout.main-layout', ['title' => 'Profile'])
@section('main-section')
  <div class="container mt-5 jalur-file" id="profile-section">
    {{-- JALUR FOLDER --}}
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black text-decoration-none"
            href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Profil</li>
      </ol>
    </nav>
    {{-- EDIT PROFIL --}}
    <div class="mt-5">
      <div class="alert fs-6" role="alert" style="background-color: #F8D7DA">
        Lengkapi Profil untuk Melengkapi Formulir Permohonan Sertifikasi Kompetensi, sebagai Syarat untuk
        Melakukan
        Ujian Sertifikasi!
      </div>
      <h5 class="text-black my-4">Permohonan Sertifikasi Kompetensi</h5>
      <img src="/images/logo/favicon_lsp.png" width="180px" class="rounded-circle" alt="">

      {{-- RINCIAN DATA PEMOHON SERTIFIKASI --}}
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Bagian 1 : Rincian Data Pemohon Sertifikasi
        </div>
        <p class="py-3" style="font-size: 18px">Pada bagian ini, cantumkan data pribadi, data pendidikan formal
          serta
          data pekerjaan
          anda saat
          ini.
        </p>

        {{-- DATA PRIBADI --}}
        <div class="col profil-section">
          <h5>A. Data Pribadi</h5>
          <div class="row my-4">
            <div class="col-md-6">
              <div class="col pb-4">
                <p class="fw-bold">Nama Lengkap</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->nama_lengkap ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->nama_lengkap ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                <span
                  class="
                  {{ $data->relasi_institusi->nama_institusi ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_institusi->nama_institusi ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Jurusan</p>
                <span
                  class="
                  {{ $data->relasi_jurusan->jurusan ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_jurusan->jurusan ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Nomor KTP/NIK/Paspor</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->ktp_nik_paspor ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->ktp_nik_paspor ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tempat Lahir</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->tempat_lahir ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->tempat_lahir ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tanggal Lahir</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->tanggal_lahir ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->tanggal_lahir ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Jenis Kelamin</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->jenis_kelamin ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->jenis_kelamin ?? 'Data Belum Lengkap!' }}</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col pb-4">
                <p class="fw-bold">Kebangsaan</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->kebangsaan ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->kebangsaan ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Alamat Rumah</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->alamat_rumah ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->alamat_rumah ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Kode Pos</p>
                <span
                  class="
                  {{ $data->relasi_institusi->kode_pos ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_institusi->kode_pos ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Nomor Telepon</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->nomor_hp ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->nomor_hp ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Email</p>
                <span
                  class="
                  {{ $data->email ? '' : 'text-danger fw-semibold' }}">{{ $data->email ?? 'Data Belum Lengkap!' }}</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Kualifikasi Pendidikan</p>
                <span
                  class="
                  {{ $data->relasi_user_detail->kualifikasi_pendidikan ? '' : 'text-danger fw-semibold' }}">{{ $data->relasi_user_detail->kualifikasi_pendidikan ?? 'Data Belum Lengkap!' }}</span>
              </div>
            </div>
          </div>
        </div>
        {{-- DATA PEKERJAAN SEKARANG --}}
        <div class="col profil-section">
          <h5>B. Data Pekerjaan Sekarang</h5>
          <div class="row my-4">
            <div class="col-md-6">
              <div class="col pb-4">
                <p class="fw-bold">Nama Institusi / Perusahaan</p>
                @isset($data->relasi_pekerjaan->nama_institusi)
                  <span>{{ $data->relasi_pekerjaan->nama_institusi }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Jabatan</p>
                @isset($data->relasi_pekerjaan->jabatan)
                  <span>{{ $data->relasi_pekerjaan->jabatan }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Alamat Kantor</p>
                @isset($data->relasi_pekerjaan->alamat_institusi)
                  <span>{{ $data->relasi_pekerjaan->alamat_institusi }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
            </div>
            <div class="col-md-6">
              <div class="col pb-4">
                <p class="fw-bold">Kode Pos</p>
                @isset($data->relasi_pekerjaan->kode_pos)
                  <span>{{ $data->relasi_pekerjaan->kode_pos }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Nomor Telepon Institusi / Perusahaan</p>
                @isset($data->relasi_pekerjaan->nomor_hp_institusi)
                  <span>{{ $data->relasi_pekerjaan->nomor_hp_institusi }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Email Institusi / Peerusahaan</p>
                @isset($data->relasi_pekerjaan->email_institusi)
                  <span>{{ $data->relasi_pekerjaan->email_institusi }}</span>
                @else
                  <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                @endisset
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- DATA SERTIFIKASI --}}
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Bagian 2 : Data Sertifikasi
        </div>
        <p class="py-3" style="font-size: 18px">Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan
          berikut.
          Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan
          latar
          belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
        </p>
        <div class="col profil-section">
          <div class="col pb-45">
            <p class="fw-bold">Judul Skema Sertifikasi</p>
            @isset($data->relasi_sertifikasi->judul_skema_sertifikasi)
              <span>{{ $data->relasi_sertifikasi->judul_skema_sertifikasi }}</span>
            @else
              <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
            @endisset
          </div>
          <div class="col pb-45">
            <p class="fw-bold">Nomor Skema Sertifikasi</p>
            @isset($data->relasi_sertifikasi->nomor_skema_sertifikasi)
              <span>{{ $data->relasi_sertifikasi->nomor_skema_sertifikasi }}</span>
            @else
              <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
            @endisset
          </div>
          <div class="col pb-45">
            <p class="fw-bold">Tujuan Asesmen</p>
            @isset($data->relasi_sertifikasi->tujuan_asesmen)
              <span class="text-capitalize">{{ $data->relasi_sertifikasi->tujuan_asesmen }}</span>
            @else
              <span class="text-danger fw-semibold text-capitalize">Data Belum Lengkap!</span>
            @endisset
          </div>
          <div class="col pb-45">
            <p class="fw-bold">Daftar Unit Kompetensi Sesuai Kemasan</p>
            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
          </div>
        </div>
      </div>

      {{-- BUKTI KELENGKAPAN PEMOHON --}}
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Bagian 3 : Bukti Kelengkapan Pemohon
        </div>
        <p class="py-3" style="font-size: 18px">Bukti Persyaratan Dasar Pemohon.</p>
        <div class="col profil-section">
          <div class="col pb-45">
            <p class="fw-bold">Nilai Mata Pelajaran Kompetensi Keahlian Multimedia</p>
            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
          </div>
          <div class="col pb-45">
            <p class="fw-bold">Sertifikat Prakerin atau Surat Keterangan Telah Melaksanakan Praktek Kerja
              Industri</p>
            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
          </div>
          <div class="col pb-45">
            <p class="fw-bold">Nilai Raport</p>
            <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
          </div>
        </div>
      </div>

      {{-- HASIL PERSYARATAN --}}
      <div class="mb-5 pb-5">
        <div class="col profil-section-title">
          Hasil Persyaratan
        </div>
        <div class="col profil-section">
          <div class="row my-4">
            {{-- PEMOHON / KANDIDAT --}}
            <div class="col-md-6">
              <h5 class="pb-4">Pemohon / Kandidat :</h5>
              <div class="col pb-4">
                <p class="fw-bold">Nama Lengkap</p>
                <span>Muhammad Agung</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tanda Tangan</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tanggal</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
            </div>
            {{-- ADMIN LSP --}}
            <div class="col-md-6">
              <h5 class="pb-4">Admin LSP :</h5>
              <div class="col pb-4">
                <p class="fw-bold">Nama Lengkap</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">No. Reg</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tanda Tangan</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Tanggal</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
              <div class="col pb-4">
                <p class="fw-bold">Catatan</p>
                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
              </div>
            </div>
          </div>
          <div class="pt-5">
            <span>Berdasarkan ketentuan persyaratan dasar, maka pemohon:</span><br>
            <p><span class="fw-bold">Diterima/Tidak Diterima</span> sebagai peserta sertifikasi</p>
            <button type="button" class="btn btn-primary tombol-primary-medium mt-5" id="edit-btn"
              data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('asesi.dashboard.profile._form-modal')
@endsection
