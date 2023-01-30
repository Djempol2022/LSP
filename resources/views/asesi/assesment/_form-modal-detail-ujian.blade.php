<div class="modal fade" id="detailUjian" tabindex="-1" aria-labelledby="detailUjianLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="formDetailUjian" action="{{ route('asesi.Assesment.Soal') }}">
      <input type="hidden" name="id" hidden>
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="detailUjianLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row col justify-content-center d-flex text-black fw-semibold">
            <div class="col-11 my-1 sesi">Sesi : 1</div>
            <div class="col-11 my-1 jenis_tes">Jenis Tes : Tertulis</div>
            <div class="col-11 my-1 nama_asesor">Nama Asesor : Rika Eka Kembara, S.Kom</div>
            <div class="col-11 my-1 tanggal">Ujian dibuka pada Selasa, 08 Februari 2022, Pukul 07:00</div>
            <div class="col-11 my-1 tuk">TUK : Lab MULTIMEDIA</div>
            <div class="col-11 my-1 total_waktu">Waktu Pengerjaan: 120 Menit</div>
          </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="submit" class="btn btn-primary tombol-primary-max">Mulai Ujian</button> --}}
          <a href="{{ route('asesi.Assesment.Soal') }}" class="btn btn-primary tombol-primary-max">Mulai
            Ujian</a>
        </div>
      </div>
  </div>
  </form>
</div>
