@extends('layout.main-layout', ['title' => 'Profile'])
@section('main-section')
    <div class="container mt-5 jalur-file">
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
                                <span>{{$profil_asesor->nama_lengkap}}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jabatan</p>
                                <span>{{$profil_asesor->jabatan}}</span>
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Jurusan</p>
                                <span>{{$profil_asesor->users->relasiJurusan->jurusan}}</span>
                            </div>
                    
                        </div>
                        <div class="col-md-6">
                        <div class="col pb-4">
                                <p class="fw-bold">Tempat Lahir</p>
                                @if($profil_asesor->tempat_lahir == NULL)
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @else
                                <span> {{$profil_asesor->tempat_lahir}}</span>
                                @endif
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Tanggal Lahir</p>
                                @if($profil_asesor->tanggal_lahir == NULL)
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @else
                                <span> {{$profil_asesor->tanggal_lahir}}</span>
                                    @endif
                        </div>
                            <div class="col pb-4">
                          
                                <p class="fw-bold">Jenis Kelamin</p>
                                @if($profil_asesor->jenis_kelamin == NULL)
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @else
                                <span >{{$profil_asesor->jenis_kelamin}}</span>
                                @endif
                            </div>
                            <div class="col pb-4">
                                <p class="fw-bold">Alamat Rumah</p>
                                @if($profil_asesor->alamat_rumah == NULL)
                                <span class="text-danger fw-semibold">Data Belum Lengkap!</span>
                                @else
                                <span>{{$profil_asesor->alamat_rumah}}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                {{-- DATA PEKERJAAN SEKARANG --}}
              
            </div>

            {{-- DATA SERTIFIKASI --}}
                    <div class="pt-">
                        <span>Berdasarkan ketentuan persyaratan dasar, maka pemohon:</span><br>
                        <p><span class="fw-bold">Diterima/Tidak Diterima</span> sebagai peserta sertifikasi</p>
                        <button type="button" class="btn btn-primary tombol-primary-medium mt-5" data-bs-toggle="modal"
                            data-bs-target="#editProfil">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL PROFIL --}}
    <div class="modal fade" id="editProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editProfilLabel" aria-hidden="true">
    
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editProfilLabel">Edit Profil-APL 01</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('asesor.EditProfil', $profil_asesor->id )}}" method="POST">
                            @csrf
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
                                                    <label for="namaLengkap" class="form-label fw-semibold">Nama
                                                        Lengkap</label>
                                                    <input type="text" id="namaLengkap"
                                                        class="form-control input-text" name="nama_lengkap" value="{{$profil_asesor->nama_lengkap}}"
                                                 >
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="namaLengkap" class="form-label fw-semibold">Jabatan</label>
                                                    <input type="text" name="jabatan" value = "{{$profil_asesor->jabatan}}"
                                                        class="form-control input-text"
                                                        >
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                                                    <select  class="form-select input-text"  name="jurusan_id" value =" {{$profil_asesor->users->relasiJurusan->jurusan}}">
                                                    <option value="" selected disabled>Pilih Jurusan</option>
                                                        @foreach ($jurusan as $jurusans)
                                                       
                                                        <option value="{{ $jurusans->id }}">{{$jurusans->jurusan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               
                                             
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="col edit-profil-left">
                                                    <label for="tempatLahir" class="form-label fw-semibold">Tempat
                                                        Lahir</label>
                                                    <input type="text" id="tempatLahir"
                                                        class="form-control input-text"
                                                        value = "{{$profil_asesor->tempat_lahir}}" name="tempat_lahir">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="tanggalLahir" class="form-label fw-semibold">Tanggal
                                                        Lahir</label>
                                                    <input type="date" id="tanggalLahir"
                                                        class="form-control input-text" name="tanggal_lahir" value = "{{$profil_asesor->tanggal_lahir}}">
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="jenisKelamin" class="form-label fw-semibold">Jenis
                                                        Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-select input-text" value = "{{$profil_asesor->jenis_kelamin}}"
                                                        id="jenisKelamin">
                                                        <option value="" selected disabled>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="Laki-laki">LAKI-LAKI</option>
                                                        <option value="Perempuan">PEREMPUAN</option>
                                                    </select>
                                                </div>
                                                <div class="col edit-profil-left">
                                                    <label for="alamatRumah" class="form-label fw-semibold">Alamat
                                                        Rumah</label >
                                                    <input type="text" name="alamat_rumah" id="alamatRumah" value = "{{$profil_asesor->alamat_rumah}}"
                                                        class="form-control input-text"
                                                        placeholder="Masukkan Alamat Rumah. . .">
                                                </div>
                                            
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- DATA PEKERJAAN SEKARANG --}}
                                    
                                </div>                 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tombol-primary-small">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
     
    </div>
@endsection
