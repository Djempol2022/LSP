@extends('layout.main-layout', ['title' => 'Pengesahan Materi Uji Kompetensi'])
@section('main-section')
<div class="page-content">
    <section class="row">
      <form action="{{ route('admin.Berkas.DaftarTUKTerverifikasi.Add') }}" method="POST">
        @csrf
        <div class="card p-5">
          @include('layout.header-berkas')
          <div>
            <h6 class="line-sp mb-2 text-center">MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</h6>

            {{-- TABLE 1 --}}
            <table class="table table-bordered text-wrap">
              <thead>
                <tr>
                  <th rowspan="2">Skema Sertifikasi(IKKNI/<s>Okupasi</s>/<s>Klaster</s>)</th>
                    <td>
                        Judul
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$skema_sertifikasi->judul_skema_sertifikasi}}
                    </td>
                </tr>
                <tr>
                      <td>
                          Nomor
                      </td>
                      <td>
                          :
                      </td>
                      <td>
                          {{$skema_sertifikasi->nomor_skema_sertifikasi}}
                      </td>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2" class="text-center font-extrabold h1 m-0 p-0">
                  </td>
                </tr>
              </tbody>
            </table>

             {{-- TABLE 2 --}}
             <table class="table table-bordered text-wrap">
                <thead>
                    <tr>
                        <th style="background-color: orange" colspan="7">1.  Menentukan Pendekatan Asesmen</th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered text-wrap">
                <tbody>
                    {{-- KANDIDAT --}}
                  <tr>
                    <td>
                        1.1
                        <td rowspan="3">Kandidat</td>
                        <td><input type="checkbox" name="kandidat-1"></td>
                        <td colspan="4"><b>Hasil pelatihan dan / atau pendidikan:</b></td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="kandidat-1"></td>
                        <td colspan="4">Pekerja berpengalaman</td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="kandidat-1"></td>
                        <td colspan="4">Pelatihan / belajar mandiri</td>
                    </td>
                  </tr>

                    {{-- TUJUAN ASESMEN --}}
                  <tr>
                    <td>
                        <td rowspan="5">Tujuan Asesmen</td>
                        <td><input type="checkbox" name="t_asesmen-1"></td>
                        <td colspan="4"><b>Sertifikasi</b></td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="t_asesmen-1"></td>
                        <td colspan="4">Sertifikasi Ulang</td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="t_asesmen-1"></td>
                        <td colspan="4">Pengakuan Kompetensi Terkini(PKT)</td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="t_asesmen-1"></td>
                        <td colspan="4">Rekognisi Pembelajaran Lampau</td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <td><input type="checkbox" name="t_asesmen-1"></td>
                        <td colspan="4">Lainnya</td>
                    </td>
                  </tr>

                   {{-- KONTEKS ASESMEN --}}
                   <tr>
                    <td>
                        <td rowspan="8">Konteks Asesmen</td>
                        <td>Lingkungan</td>
                        <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                        <td><b>Tempat kerja nyata</b></td>
                        <td><input type="checkbox" name="k_a_lingkungan-2"></td>
                        <td><b>Tempat kerja simulais</b></td>
                    </td>
                  </tr>
                  <tr>
                      <td>
                          <td>Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
                          <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                          <td><b>Tersedia</b></td>
                          <td><input type="checkbox" name="k_a_lingkungan-2"></td>
                          <td><b>Terbatas</b></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <td rowspan="3">Hubungan antara standar kompetensi dan:</td>
                            <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                            <td colspan="4"><b>Bukti untuk mendukung asesmen / RPL:  </b></td>
                        </td>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                                <td colspan="4"><b>Aktivitas kerja di tempat kerja Asesi: </b></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                                <td colspan="4"><b>Kegiatan Pembelajaran:</b></td>
                            </td>
                        </tr>
                    </tr>
                    <tr>
                        <td>
                            <td rowspan="3">Siapa yang melakukan asesmen / RPL</td>
                            <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                            <td colspan="4"><b>Lembaga Sertifikasi  </b></td>
                        </td>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                                <td colspan="4"><b>Organisasi Pelatihan </b></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="k_a_lingkungan-1"></td>
                                <td colspan="4"><b>Asesor Perusahaan</b></td>
                            </td>
                        </tr>
                    </tr>

                    {{-- KONFIRMASI DENGAN ORANG YANG RELEVAN --}}
                    <tr>
                        <td>
                            <td rowspan="4">Konfirmasi dengan orang yang relevan</td>
                            <td><input type="checkbox" name="t_asesmen-1"></td>
                            <td colspan="4"><b>Manajer sertifikasi LSP</b></td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <td><input type="checkbox" name="t_asesmen-1"></td>
                            <td colspan="4">Master Asesor / Master Trainer / Asesor Utama Kompetensi</td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <td><input type="checkbox" name="t_asesmen-1"></td>
                            <td colspan="4">Manajer Pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <td><input type="checkbox" name="t_asesmen-1"></td>
                            <td colspan="4">Lainnya: Kaprodi …. dan Ketua dan Teknisi TUK …….</td>
                        </td>
                      </tr>
                            
                      {{-- TOLAK UKUR --}}
                        <tr>
                            <td>
                                1.2
                                <td rowspan="5">Tolok Ukur Asesmen</td>
                                <td><input type="checkbox" name="kandidat-1"></td>
                                <td colspan="4"><b>Standar Kompetensi: SKKNI Nomor</b></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="kandidat-1"></td>
                                <td colspan="4">Kriteria asesmen dari kurikulum pelatihan</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="kandidat-1"></td>
                                <td colspan="4">Spesifikasi kinerja suatu perusahaan atau industri:</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="kandidat-1"></td>
                                <td colspan="4">Spesifikasi Produk:</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <td><input type="checkbox" name="kandidat-1"></td>
                                <td colspan="4">Pedoman khusus:</td>
                            </td>
                        </tr>
                </tbody>
            </table>

            {{-- TABLE 3 --}}
            <table class="table table-bordered text-wrap">
                <thead>
                    <tr>
                        <th style="background-color: orange" colspan="7">2.	Mempersiapkan Rencana Asesmen </th>
                    </tr>
                </thead>
            </table>
            @foreach ($unit_kompetensi as $data_unit_kompetensi)
            @php
                $unit_kompetensi_elemen = \App\Models\UnitKompetensiSub::where('unit_kompetensi_id', $data_unit_kompetensi->id)->get();
            @endphp
            <table class="table table-bordered text-wrap">
              <thead>
                <tr>
                  <th rowspan="2"><b>Unit Kompetensi</b></th>
                    <td>
                        Kode Unit
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$data_unit_kompetensi->kode_unit}}
                    </td>
                </tr>
                <tr>
                      <td>
                          Judul Unit
                      </td>
                      <td>
                          :
                      </td>
                      <td>
                          {{$data_unit_kompetensi->judul_unit}}
                      </td>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2" class="text-center font-extrabold h1 m-0 p-0">
                  </td>
                </tr>
              </tbody>
            </table>
            
            <table class="table table-bordered text-wrap">
                <thead>
                  <tr>
                    <th rowspan="2"><b>Kriteria Unjuk Kerja</b></th>

                    <th rowspan="2">
                        <b>Bukti-Bukti
                        (Kinerja, Produk, Portofolio, dan / atau Hafalan) diidentifikasi berdasarkan 
                        Kriteria Unjuk Kerja dan Pendekatan Asesmen.
                        </b>
                    </th>
                      
                    <td colspan="3">Jenis Bukti</td>
                      <td colspan="6">
                        Metode dan Perangkat Asesmen
                        CL (Ceklis Observasi/ Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan),
                         DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)
                      </td>

                      <tr>
                        <td height="40">L</td>
                        <td height="40">TL</td>
                        <td height="40">L</td>
                        <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:auto; font-size:10px;">
                            Obsevasi langsung
                            (kerja nyata/aktivitas waktu nyata di tempat kerja di kingkungan tempat kerja yang disimulasikan)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Kegiatan Terstruktur
                            (latihan simulasi dan bermain peran, proyek,  presentasi, lembar kegiatan)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Tanya Jawab (pertanyaan tertulis, wawancara, asesmen diri, tanya jawab lisan, angket, ujian lisan atau tertulis)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Verifikasi  Portfolio (sampel pekerjaaan yang disusun oleh Asesi, produk dengan dokumentasi pendukung, bukti sejarah, jurnal atau buku catatan, informasi tentang pengalaman hidup)
                         </td>
                         <td height="200" class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Review produk
                            (testimoni dan laporan dari atasan,  bukti pelatihan, otentikasi pencapaian sebelumnya, wawancara dengan atasan,
                            atau rekan kerja)
                         </td>
                         <td class="text-wrap" style="vertical-align: bottom; writing-mode: sideways-lr; width:10%; font-size:10px;">
                            Lainnya ....
                         </td>
                    </tr>
                  </tr>
                </thead>
                @foreach ($elemen as $index => $data_unit_kompetensi_elemen_get)
                @if ($data_unit_kompetensi_elemen_get->unit_kompetensi_id == $data_unit_kompetensi->id)
                <tbody>
                    <td colspan="11">Elemen {{$index+1}}. {{$data_unit_kompetensi_elemen_get->judul_unit_kompetensi_sub}}</td>
                    @foreach ($elemen_isi as $index => $data_elemen_isi)
                    @if ($data_elemen_isi->unit_kompetensi_sub_id == $data_unit_kompetensi_elemen_get->id)
                    <tr>

                        @php
                            
                        @endphp
                        
                        <th rowspan="5">{{$index+1}}.{{$data_elemen_isi->judul_unit_kompetensi_isi}}</th>
                        @foreach ($elemen_isi_isi as $data_elemen_isi_isi)
                        
                            @if ($data_elemen_isi_isi->unit_kompetensi_isi_id == $data_elemen_isi->id)
                            @php
                                $data = \App\Models\UnitKompetensiIsi2::where('unit_kompetensi_isi_id', $data_elemen_isi->id)->count();
                            @endphp
                            {{$data}}
                                <th rowspan="2">
                                    {{$data_elemen_isi_isi->judul_unit_kompetensi_isi_2}}
                                </th>
                                <tr>
                                    <td height="200">L</td>
                                    <td height="200">TL</td>
                                    <td height="200">L</td>
                                    <td height="200">L</td>
                                    <td height="200">TL</td>
                                    <td height="200">L</td>
                                    <td height="200">L</td>
                                    <td height="200">TL</td>
                                    <td height="200">L</td>
                                </tr>
                            @endif
                        @endforeach
                      </tr>
                      @endif
                    @endforeach
                </tbody>
                @endif
                @endforeach
            </table>

            @endforeach


        </div>
      </form>
    </section>
  </div>

@endsection
@section('script')
{{-- <script>
      // DATATABLE MUK ASESOR PENINJAU
      list_tampil_muk_asesor_peninjau = []
      const table_tampil_muk_asesor_peninjau = $('#table-tampil-muk-asesor-peninjau').DataTable({
        "pageLength": 10,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'semua']
        ],
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "processing": true,
        "bServerSide": true,
        "responsive": true,
        ajax: {
            url: "/peninjau/tampil-data-muk-asesor-peninjau/",
            type: "POST",
            headers: 
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        },
        columnDefs: [{
                targets: '_all',
                visible: true
            },
            {
                "targets": 0,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_muk.muk;
                }
            },
            {
                "targets": 1,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_asesor.relasi_user_asesor_detail.nama_lengkap;
                }
            },
            {
                "targets": 2,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    return row.relasi_user_peninjau.relasi_user_peninjau_detail.nama_lengkap;
                }
            },
            {
                "targets": 3,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    list_tampil_muk_asesor_peninjau[row.id] = row;
                    let jenis_tes;
                    if(row.relasi_pelaksanaan_ujian == null || row.relasi_pelaksanaan_ujian.jenis_tes == null){
                        jenis_tes = `<p class="text-danger">Jenis soal belum ditentukan</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 1){
                        jenis_tes = `<p>Pilihan Ganda</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 2){
                        jenis_tes = `<p>Essay</p>`
                    }
                    else if(row.relasi_pelaksanaan_ujian.jenis_tes == 3){
                        jenis_tes = `<p>Wawancara</p>`
                    }
                    return jenis_tes;
                }
            },
            {
                "targets": 4,
                "class": "text-nowrap",
                "render": function (data, type, row, meta) {
                    let tampilan;
                    tampilan = `<span class="badge bg-info rounded-pill">
                                    <a class="text-white" href="/peninjau/peninjau-review-soal/${row.id}/${row.relasi_pelaksanaan_ujian.jenis_tes}">Review Soal</a>
                                </span>`
                    return tampilan;
                }
            },
        ]
    });
</script> --}}
@endsection