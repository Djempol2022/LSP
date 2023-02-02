<div class="modal fade" id="assesmentMandiri" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
  aria-labelledby="assesmentMandiriLabel" aria-hidden="true">
  <form action="{{ route('asesi.Assesment.Store') }}" method="POST" id="form-PengajuanAsesmenMandiri">
    @csrf
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="assesmentMandiriLabel">Formulir Asesmen Mandiri</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-black m-2">


          {{-- HEADER --}}
          <div class="col">
            <div class="assesment-mandiri-header">
              <p class="assesment-mandiri-title">Judul Skema Sertifikasi</p>
              <p>{{ $sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->judul_skema_sertifikasi }}</p>
            </div>
            <div class="assesment-mandiri-header">
              <p class="assesment-mandiri-title">Nomor Skema Sertifikasi</p>
              <p>{{ $sertifikasi->relasi_unit_kompetensi->relasi_skema_sertifikasi->nomor_skema_sertifikasi }}</p>
            </div>
            <div class="assesment-mandiri-header">
              <p class="assesment-mandiri-title">Skema Sertifikasi</p>
              <p>{{ $sertifikasi->relasi_unit_kompetensi->jenis_standar }}</p>
            </div>
          </div>
          {{-- TITLE --}}
        @foreach ($unit_kompetensi as $data_unit_kompetensi)
          <div class="col">
            <div class="row col unit-kompetensi">
              <span>Unit Kompetensi</span><br>
              <div class="col row fs-6">
                <div class="col-lg-auto unit-kode">{{ $data_unit_kompetensi->kode_unit }}</div>
                <div class="col-lg-auto unit-isi">{{ $data_unit_kompetensi->judul_unit }}
                </div>
              </div>
            </div>
          </div>
          
          <div class="my-4 fw-bold fs-6">Dapatkah Saya ?</div>
          <div class="col mb-5">
            <ol class="list-group list-group-numbered">
                @php
                $unit_kompetensi_sub = \App\Models\UnitKompetensiSub::with('relasi_unit_kompetensi.relasi_skema_sertifikasi')
                    ->whereRelation('relasi_unit_kompetensi', 'unit_kompetensi_id', $data_unit_kompetensi->id)->get();
                @endphp
              @foreach ($unit_kompetensi_sub as $data_unit_kompetensi_sub)
                @php
                $unit_kompetensi_isi = \App\Models\UnitKompetensiIsi::with('relasi_unit_kompetensi_sub')
                    ->whereRelation('relasi_unit_kompetensi_sub', 'unit_kompetensi_sub_id', $data_unit_kompetensi_sub->id)
                    ->get();
                @endphp

                <li class="list-group-item d-flex justify-content-between align-items-start border-0 fw-semibold">
                  <div class="ms-2 me-auto ">
                    Elemen: {{ $data_unit_kompetensi_sub->judul_unit_kompetensi_sub }}
                    <div class="py-1">Kriteria Kerja:</div>
                    <div class="row col mx-3">
                    @forelse ($unit_kompetensi_isi as $isi)
                      {{-- <div class="col mb-3">
                        <div class="row mt-3">
                          <div class="col-auto kriteria-nomor">{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                          </div>
                          <div class="col-auto kriteria-isi">{{ $isi->judul_unit_kompetensi_isi }}
                          </div>
                          <div class="col-auto kriteria-kompeten">
                            <input class="form-check-input me-1" type="radio"
                              name="status-{{ $isi->id }}-{{ $isi->unit_kompetensi_sub_id }}" value="kompeten"
                              id="kompeten-{{ $isi->id }}-{{ $isi->unit_kompetensi_sub_id }}"
                              {{ $isi->status === 'kompeten' ? 'checked' : '' }}>
                            <label class="form-check-label text-success"
                              for="kompeten-{{ $isi->id }}-{{ $isi->unit_kompetensi_sub_id }}">Kompeten</label>
                          </div>
                          <div class="col-auto kriteria-kompeten">
                            <input class="form-check-input me-1" type="radio"
                              name="status-{{ $isi->id }}-{{ $isi->unit_kompetensi_sub_id }}"
                              value="belum kompeten" id="belum_kompeten-{{ $isi->id }}"
                              {{ $isi->status === 'belum kompeten' ? 'checked' : '' }}>
                            <label class="form-check-label text-danger"
                              for="belum_kompeten-{{ $isi->id }}">Belum
                              Kompeten</label>
                          </div>
                        </div>
                      </div>
                      <hr> --}}
                      @php
                          $data_status_kompeten_asesi = \App\Models\StatusUnitKompetensiAsesi::where('unit_kompetensi_isi_id',$isi->id)
                                ->where('user_asesi_id', Auth::user()->id)->first();
                      @endphp
                      <div class="col mb-3">
                        <div class="row mt-3">
                          <div class="col-auto kriteria-nomor">{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                          </div>
                          <div class="col-auto kriteria-isi">{{ $isi->judul_unit_kompetensi_isi }}
                          </div>
                          <input type="hidden" name="unit_kompetensi_sub[]" value="{{$isi->unit_kompetensi_sub_id}}" hidden>
                          <input type="hidden" name="unit_kompetensi_isi[]" value="{{$isi->id}}" hidden>

                          <div class="col-auto kriteria-kompeten">
                            <input class="form-check-input me-1" type="radio"
                              name="status-{{ $isi->id }}" value="kompeten"
                              id="kompeten-{{ $isi->id }}"
                              {{ $data_status_kompeten_asesi->status === 'kompeten' ? 'checked' : '' }}>
                            <label class="form-check-label text-success"
                              for="kompeten-{{ $isi->id }}">Kompeten</label>
                          </div>
                          <div class="col-auto kriteria-kompeten">
                            <input class="form-check-input me-1" type="radio"
                              name="status-{{ $isi->id }}"
                              value="belum kompeten" id="belum_kompeten-{{ $isi->id }}"
                              {{ $data_status_kompeten_asesi->status === 'belum kompeten' ? 'checked' : '' }}>
                            <label class="form-check-label text-danger"
                              for="belum_kompeten-{{ $isi->id }}">Belum
                              Kompeten</label>
                          </div>
                        </div>
                      </div>
                      <hr>
                    @empty
                      Kosong
                    @endforelse
                    </div>
                    <div class="col mt-4">
                      <div class="mb-3 fw-semibold fs-6">
                        <label for="bukti_relevan-{{ $data_unit_kompetensi_sub->id }}"
                          class="form-label">Bukti yang relevan</label>
                        <textarea class="form-control border-tiernary" id="bukti_relevan-{{ $data_unit_kompetensi_sub->id }}"
                          rows="7" placeholder="Masukkan Bukti Disini. . ."
                          name="bukti_relevan-{{ $data_unit_kompetensi_sub->id }}">{{ $data_unit_kompetensi_sub->bukti_relevan ?? '' }}</textarea>
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
            </ol>
          </div>
        @endforeach
        
          {{-- TITLE --}}
          <div class="col profil-section">
            <div class="profil-section-title mb-5">
              Ditinjau oleh Asesor
            </div>
            <div class="row col">
              <div class="col-lg-6">
                <h5>Mengetahui Asesi</h5>
                <div class="col edit-profil-left">
                  <label for="namaAsesi" class="form-label fw-semibold">Nama Asesi</label>
                  <input type="text" id="namaAsesi" class="form-control input-text"
                    placeholder="Masukkan Nama Asesi. . ." value="{{ auth()->user()->nama_lengkap }}" readonly>
                </div>
                <div class="col edit-profil-left">
                  <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                  <input type="text" id="tanggal" name="tanggal" class="form-control input-text"
                    @isset($data_asesmen_mandiri->tanggal_asesi)
                    
                    value="{{ Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesi)->format('d F Y') }}"
                    
                    @endisset 
                    value="{{ $tanggal }}" 
                    
                    readonly>
                </div>
                {{-- TANDA TANGAN / TTD --}}
                <label for="signature-pad" class="form-label fw-semibold">Tanda Tangan</label>
                <div class="col edit-profil mb-2 signature-pad" id="signature-pad">
                  <canvas id="sig"></canvas>
                  <input type="hidden" name="ttd_asesi" value="" id="ttd" hidden>
                </div>
                <div class="mb-2">
                  @isset($data_asesmen_mandiri->ttd_asesi)
                    <img src="{{ $data_asesmen_mandiri->ttd_asesi }}" alt="ttd" width="180px">
                  @endisset
                </div>
                <div id="signature-clear">
                  <button type="button" class="button button-primary tombol-primary-small mb-4"
                    id="clear">Clear</button>
                </div>
              </div>
              <div class="col-lg-6">
                <h5>Mengetahui Asesor</h5>
                <div class="col edit-profil-left">
                  <label for="namaAsesi" class="form-label fw-semibold">Nama Asesor</label>
                  <p>{{$data_asesmen_mandiri->relasi_user_asesor->nama_lengkap}}</p>
                </div>
                <div class="col edit-profil-left">
                  <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                  <p>{{Carbon\Carbon::parse($data_asesmen_mandiri->tanggal_asesor)->format('d F Y')}}</p>
                </div>
                {{-- TANDA TANGAN / TTD --}}
                <label class="form-label fw-semibold">Tanda Tangan</label>
                <div class="mb-2">
                  @isset($data_asesmen_mandiri->ttd_asesor)
                    <img src="{{ $data_asesmen_mandiri->ttd_asesor }}" alt="ttd" width="180px">
                  @endisset
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary tombol-primary-small" id="simpan">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>
