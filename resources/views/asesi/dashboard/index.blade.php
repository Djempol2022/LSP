@extends('layout.main-layout', ['title' => 'Dashboard'])
@section('main-section')
  <div class="container-fluid">
    <div class="row">
      {{-- FOTO PEMBUKA --}}
      <div class="col-auto foto-dashboard">
        <img src="/images/dashboard.png" style="width: 100%" alt="">
        <div class="col-auto bg-profile" style="margin: 0 2%">
          <div class="col p-3">
            <h5 class="text-black">Jadwal Assesment</h5>
            <span class="text-black">Jadwal ujian berdasarkan SK pelaksanaan</span>
          </div>
          <table class="table tabel-jadwal text-black">
            <thead>
              <tr class="teks-tabel">
                <th class="text-end" style="width: 8%" scope="col">No</th>
                <th class="text-center" style="width: 19.5%" scope="col">MUK</th>
                <th class="text-center" style="width: 30%" scope="col">Hari/Tanggal</th>
                <th class="text-center" style="width: 17.5%" scope="col">TUK</th>
                <th class="text-center" style="width: 30%" scope="col">Nama Asesor</th>
              </tr>
            </thead>
          </table>
          <div class="text-center pb-3 text-black">
            <small>Data Not Found.</small>
          </div>
        </div>
      </div>
      {{-- TOMBOL MENU PROFIL --}}
      <div class="col-auto foto-profile">
        <a href="{{ route('asesi.Dashboard.Profile') }}">
          <div class="row bg-profile px-4 py-4 align-items-center">
            <div class="col-auto col-foto-profile">
              @if ($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" style="width: 85%" class="rounded-circle" alt="image">
              @else
                <img src="{{ asset('images/logo/favicon.png') }}" style="width: 85%" class="rounded-circle"
                  alt="image">
              @endif
            </div>
            <div class="col-9 row p-0">
              <div class="col-auto col-tulisan-profile">
                <span class="tulisan-profile">Profil</span>
              </div>
              <div class="col-12">
                <span class="tulisan-nama">{{ $user->nama_lengkap }}</span>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
@endsection
