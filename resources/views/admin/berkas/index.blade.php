@extends('layout.main-layout', ['title' => 'Berkas'])
@section('main-section')
  {{-- JALUR FILE --}}
  <nav class="jalur-file mb-5" style="padding-left: 6px" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black text-decoration-none"
          href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Berkas Admin</li>
    </ol>
  </nav>
  <div class="page-content">
    <section class="row">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div>
            <select class="form-select" id="berkas">
              {{-- <option value="#" selected>Pilih Berkas</option> --}}
              <option value="sk-penetapan-tuk-terverifikasi">001 - SK Penetapan TUK Terverifikasi</option>
              <option value="daftar-tuk-terverifikasi">002 - Daftar TUK Terverifikasi</option>
              <option value="hasil-verifikasi-tuk">Hasil Verifikasi TUK</option>
              <option value="st-verifikasi-tuk">005 - ST Verifikasi TUK</option>
              <option value="x03-st-verifikasi-tuk">X 03 ST Verifikasi TUK</option>
              <option value="x04-berita-acara">X 04 Berita Acara</option>
              <option value="z-ba-pecah-rp">Z Berita Acara Pecah Rapat Pleno</option>
              <option value="z-ba-rp">Z Berita Acara Rapat Pleno</option>
            </select>
          </div>
          <div>
            <a href="#" class="btn btn-primary" id="tambah" disabled>Tambah</a>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table class="table table-striped" id="table-surat">
          </table>
        </div>
      </div>
    </section>
  </div>

  {{-- modal sk ketetapan tuk terverifikasi --}}
  @include('admin.berkas._modal-sk-penetapan-tuk-terverifikasi')

  {{-- modal hasil verifikasi tuk --}}
  @include('admin.berkas._modal-hasil-verifikasi-tuk')

  {{-- modal st verifikasi tuk --}}
  @include('admin.berkas._modal-st-verifikasi-tuk')

  {{-- modal x03 st verifikasi tuk --}}
  @include('admin.berkas._modal-x03-st-verifikasi-tuk')

  {{-- modal x04 berita acara --}}
  @include('admin.berkas._modal-x04-berita-acara')

  {{-- modal z ba pecah rp --}}
  @include('admin.berkas._modal-z-ba-pecah-rp')

  {{-- modal z ba rp --}}
  @include('admin.berkas._modal-z-ba-rp')

@section('script')
  @include('admin.berkas.script-berkas')
@endsection

@endsection
