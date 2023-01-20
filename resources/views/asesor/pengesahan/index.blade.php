@extends('layout.main-layout', ['title' => 'Pengesahan'])
@section('main-section')
    <div class="container-fluid">
        {{-- JALUR FILE --}}
        <nav class="jalur-file mb-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none"
                        href="{{ route('asesi.Dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-primary active">Assesment</li>
            </ol>
        </nav>

        {{-- ASSESMENT MANDIRI --}}
        <div class="col-auto card-assesment mb-5">
            <h5>Halaman Pengesahan</h5>
            <p>Isi formulir assesment mandiri dengan menekan tombol di bawah, untuk melanjutkan assesment </p>
            <button type="button" class="btn btn-primary tombol-primary-small" data-bs-toggle="modal"
                data-bs-target="#assesmentMandiri">Assesment Mandiri</button>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 card-assesment mb-5  ">
                <h5>Assesmen Mandiri</h5>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Belum Direkomendasi</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Telah Direkomendasi</button>
  </li>

</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- yang belum diacc -->
    <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                         Nama Siswa
                          </th>
                          <th>
                          Status
                          </th>
                          <th>
                           Aksi
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                
                      @php
                   $i = 0
                  @endphp
                
                        @foreach($asesmen_mandiri as $key=>$asesmenmandiri )
                        @if($asesmenmandiri->status == NULL)        
                        <tr>
                          <td>
                          {{$key+1}}
                          </td>
                          <td>
                          {{$asesmenmandiri->sertifikasi->relasi_user->nama_lengkap}}
                          </td>
                          <td>
                            @if ($asesmenmandiri->status == NULL)
                            <p class="text-danger">Belum Direkomendasi</p>
                            @else

                            {{$asesmenmandiri->status}}
                            @endif
                          </td>
                          <td>
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#asesmenmandiri-{{$asesmenmandiri->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                          </button>

                          <!-- modal asesmen mandiri -->
                          <div class="modal fade" id="asesmenmandiri-{{$asesmenmandiri->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Nama Asesi</h5>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route('asesor.Mengesahkan',$asesmenmandiri->id)}}" method="POST">
                                    @csrf
                                  <div class="form-group mt-3">
                                  <label for="">Nama Siswa</label>
                                <p value="{{$asesmenmandiri->sertifikasi->relasi_user->nama_lengkap}}" > {{$asesmenmandiri->sertifikasi->relasi_user->nama_lengkap}}</p>
                                
                                  </div>
                                  <input type="hidden" value="{{$asesmenmandiri->sertifikasi_id}}" name="sertifikasi_id" >
                                  <div class="form-group mt-3">
                                  <label for="">Rekomendasi</label>
                                  <select class="custom-select custom-select-lg mb-3" name="status">
                                    <optnion selected>Pilih Rekomendasi</option>
                                    <option value="Assesmen dapat dilanjutkan">Assesmen dapat dilanjutkan</option>
                                    <option value="Tidak dapat dilanjutkan">Tidak dapat dilanjutkan</option>
                                  </select>
                                  </div>
                                  <div class="form-group mt-3">
                            
                                  
                                  <div class="form-group mt-3">
                                  <label for="">Tanda Tangan Asesi</label>
                                  <div class="col edit-profil mb-4 signature-pad" id="signature-pad">
                                            <canvas ></canvas>
                                            <input type="hidden" name="ttd_asesi" id="ttd_asesi">
                                  </div>
                                  </div>
                                  <div class="form-group mt-3">
                                  <label for="">Tanda Tangan Asesor</label>
                                  <div class="col edit-profil mb-4 signature-pad" id="signature-pad2">
                                            <canvas></canvas>
                                            <input type="hidden" name="ttd_asesor" id="ttd_asesor">
                                  </div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                </div>
                                </form>
                                </div>
                               
                              </div>
                            </div>
                          </div>
  
                          <!-- akhirmodal asesmen mandiri -->
                          </td>
                         
                        </tr>
                        @else
                        @endif
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
    <!-- akhir yang belum diacc -->

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- yang belum diacc -->
    <div class="table-responsive pt-3">
  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                         Nama Siswa
                          </th>
                          <th>
                          Status
                          </th>
                          <th>
                           Aksi
                          </th>
                          
                        </tr>
                      </thead>
  <tbody>
                
  @foreach($asesmen_mandiri as $key=>$asesmen_mandiri )
                      @if($asesmen_mandiri->status != NULL )        
                        <tr>
                          <td>
                          {{$key+1}}
                          </td>
                          <td>
                          {{$asesmen_mandiri->sertifikasi->relasi_user->nama_lengkap}}
                          </td>
                          <td>
                            {{$asesmen_mandiri->status}}
                          
                          </td>
                          <td>
                          </td>
 
                              </div>
                            </div>
                          </div>
  
                          <!-- akhirmodal asesmen mandiri -->
                          </td>
                         
                        </tr>
                        @else
                        @endif
                        @endforeach
                        </tbody>
                    </table>
        </div>
  </div>
 
</div>
            </div>
          
        </div>
    </div>  

@endsection
