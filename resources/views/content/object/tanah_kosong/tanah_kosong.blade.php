@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
  'resources/assets/vendor/libs/select2/select2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')
<h4>Bangunan</h4>
  <!-- Default -->
  <div class="row">  
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-account.svg#wizardAccount')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 1</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#personal-info">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 58 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-personal.svg#wizardPersonal')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 2</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#address">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-address.svg#wizardAddress')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 3</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#social-links">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-social-link.svg#wizardSocialLink')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 4</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#review-submit">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-submit.svg#wizardSubmit')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Review & Submit</span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <form method="POST" action="{{ route('add_tanah_kosong') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 1</h6>
                <small>Enter Step 1.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="nama_bangunan">Nama Bangunan</label>
                  <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control" placeholder="Bangunan Rumah Tinggal –  PT LPP Agro Nusantara i – Jalan Cendrawasih" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_depan">Upload Foto Tampak Depan</label>
                  <input type="file" id="foto_tampak_depan" name="foto_tampak_depan" class="form-control" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_sisi_kiri">Upload Foto Tampak Sisi Kiri</label>
                  <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri" class="form-control"/>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_sisi_kanan">Upload Foto Tampak Sisi Kanan</label>
                  <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan" class="form-control" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_lainnya">Foto Lainnya (tabel)</label>
                  <input type="file" id="foto_lainnya" name="foto_lainnya" class="form-control" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                  <input type="text" id="jumlah_lantai" name="jumlah_lantai" class="form-control" placeholder="2 lantai" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_bangunan">Konstruksi Bangunan</label>
                  <input type="text" id="kontruksi_bangunan" name="kontruksi_bangunan" class="form-control" placeholder="Permanen" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_lantai">Konstruksi Lantai</label>
                  <input type="text" id="kontruksi_lantai" name="kontruksi_lantai" class="form-control" placeholder="Rabat Beton" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_dinding">Konstruksi Dinding</label>
                  <input type="text" id="kontruksi_dinding" name="kontruksi_dinding" class="form-control" placeholder="Bata" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_atap">Kontruksi Atap</label>
                  <input type="text" id="kontruksi_atap" name="kontruksi_atap" class="form-control" placeholder="Galvium" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_pondasi">Kontruksi Pondasi</label>
                  <input type="text" id="kontruksi_pondasi" name="kontruksi_pondasi" class="form-control" placeholder="Beton Bertulang" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="versi_btb">Versi BTB</label>
                  <input type="number" id="versi_btb" name="versi_btb" class="form-control" placeholder="2023" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="tbssb_mappi">Tipikal Bangunan Sesuai Spek BTB MAPPI</label>
                  <input type="text" id="tbssb_mappi" name="tbssb_mappi" class="form-control" placeholder="Rumah Tinggal Sederhana" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="jenis_bangunan_uk">Jenis Bangunan (Umur Ekonomis)</label>
                  <input type="text" id="jenis_bangunan_uk" name="jenis_bangunan_uk" class="form-control" placeholder="Bangunan Rumah Tinggal" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tipe_rumah_tinggal">Tipe Rumah Tinggal (Umur Ekonomis)</label>
                    <input type="text" id="tipe_rumah_tinggal" name="tipe_rumah_tinggal" class="form-control" placeholder="Bangunan Kelas Menengah" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="jenis_bangunan_il">Jenis Bangunan (Indeks lantai)</label>
                    <input type="text" id="jenis_bangunan_il" name="jenis_bangunan_il" class="form-control" placeholder="Rumah Tinggal Sederhana" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="tahun_dibangun">Tahun Dibangun</label>
                    <input type="number" id="tahun_dibangun" name="tahun_dibangun" class="form-control" placeholder="2022" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="tahun_renovasi">Tahun Renovasi</label>
                    <input type="number" id="tahun_renovasi" name="tahun_renovasi" class="form-control" placeholder="2023" />
                  </div>
                  <hr>
                  <div>
                      <h5>Sumber Informasi Tahun Dibangun</h5>
                  </div>
                  <div class="col-sm-6">
                    <div>
                      <label class="form-label" for="kpl_pemilik">Keterangan pendamping lokasi / pemilik</label>
                    </div>
                      <select class="form-select" name="kpl_pemilik" id="kpl_pemilik" aria-label="Default select example">
                        <option selected disabled>Pilih...</option>
                        <option value="True">True</option>
                        <option value="False">False</option>
                      </select>
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_imb">IMB</label>
                    </div>
                      <select class="form-select" name="kpl_imb" id="kpl_imb" aria-label="Default select example">
                        <option selected disabled>Pilih...</option>
                        <option value="True">True</option>
                        <option value="False">False</option>
                      </select>
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_pengamatan_visual">Pengamatan visual</label>
                    </div>
                    <select class="form-select" name="kpl_pengamatan_visual" id="kpl_pengamatan_visual" aria-label="Default select example">
                      <option selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>                   
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_keterangan_lingkungan">Keterangan lingkungan</label>
                    </div>
                    <select class="form-select" name="kpl_keterangan_lingkungan" id="kpl_keterangan_lingkungan" aria-label="Default select example">
                      <option selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>     
                  </div>
                  <hr>
                  <div class="col-sm-6">
                    <label class="form-label" for="kondisi_bangunan_scr_visual">Kondisi Bangunan Secara Visual</label>
                    <input type="text" id="kondisi_bangunan_scr_visual" name="kondisi_bangunan_scr_visual" class="form-control" placeholder="Baik" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="catatan_khusus_bangunan">Catatan Khusus Bangunan</label>
                    <input type="text" id="catatan_khusus_bangunan" name="catatan_khusus_bangunan" class="form-control" placeholder="Plafon rusak" />
                  </div>
                  <hr>
                  <div>
                      <h5>Luas Bangunan Fisik</h5>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_no_or_nama_lantai">Nomor/Nama Lantai (Area)</label>
                    <input type="text" id="lbf_no_or_nama_lantai" name="lbf_no_or_nama_lantai" class="form-control" placeholder="Bangunan Rumah Tinggal 1" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_faktor_pengali_luas">Faktor Pengali Luas</label>
                    <input type="number" id="lbf_faktor_pengali_luas" name="lbf_faktor_pengali_luas" class="form-control" placeholder="1" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_luas_lantai">Luas Lantai (m2)</label>
                    <input type="number" id="lbf_luas_lantai" name="lbf_luas_lantai" class="form-control" placeholder="323" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="luas_bangunan_menurut_imb">Luas Bangunan Menurut IMB</label>
                    <input type="number" id="luas_bangunan_menurut_imb" name="luas_bangunan_menurut_imb" class="form-control" placeholder="333" />
                  </div>
                  <hr>
                  <div>
                    <h5>Luas Pintu dan Jendela</h5>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lpj_nama_area">Nama Area</label>
                    <input type="text" id="lpj_nama_area" name="lpj_nama_area" class="form-control" placeholder="Pintu Kayu" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lpj_luas">Luas (m2)</label>
                    <input type="number" id="lpj_luas" name="lpj_luas" class="form-control" placeholder="44" />
                  </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 2</h6>
                <small>Enter Step 2.</small>
              </div>
              <div class="row g-3">
                <hr>
                <div>
                  <h5>Luas Dinding</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="ld_nama_area">Nama Area</label>
                  <input type="text" id="ld_nama_area" name="ld_nama_area" class="form-control" placeholder="Luas Dinding Pasang Bata" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="ld_luas">Luas (m2)</label>
                  <input type="number" id="ld_luas" name="ld_luas" class="form-control" placeholder="44" />
                </div>
                <hr>
                <div>
                  <h5>Luas Rangka Atap Datar</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lrad_nama_area">Nama Area</label>
                  <input type="text" id="lrad_nama_area" name="lrad_nama_area" class="form-control" placeholder="Luas Rangka Atap Datar" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lrad_luas">Luas (m2)</label>
                  <input type="number" id="lrad_luas" name="lrad_luas" class="form-control" placeholder="44" />
                </div>
                <hr>
                <div>
                  <h5>Luas Atap Datar</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lad_nama_area">Nama Area</label>
                  <input type="text" id="lad_nama_area" name="lad_nama_area" class="form-control" placeholder="Luas Atap Datar" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lad_luas">Luas (m2)</label>
                  <input type="number" id="lad_luas" name="lad_luas" class="form-control" placeholder="44" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Pondasi Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tpe_batu_kali">Batu Kali</label>
                    <input type="text" id="tpe_batu_kali" name="tpe_batu_kali" class="form-control" placeholder="Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tpe_bobot_pondasi">Bobot Pondasi Batu Kali (%)</label>
                    <input type="number" id="tpe_bobot_pondasi" name="tpe_bobot_pondasi" class="form-control" placeholder="44" />
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Pondasi Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttpe_tipe_material">Tipe Material</label>
                    <input type="text" id="ttpe_tipe_material" name="ttpe_tipe_material" class="form-control" placeholder="Batu Kali" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttpe_bobot">Bobot(%)</label>
                    <input type="number" id="ttpe_bobot" name="ttpe_bobot" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Struktur Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tse_beton_bertulang">Beton Bertulang</label>
                    <input type="text" id="tse_beton_bertulang" name="tse_beton_bertulang" class="form-control" placeholder="Bobot Struktur Beton Bertulang" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tse_bobot_struktur_beton_bertulng">Bobot Struktur Beton Bertulang(%)</label>
                    <input type="number" id="tse_bobot_struktur_beton_bertulng" name="tse_bobot_struktur_beton_bertulng" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Struktur Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttse_tipe_material">Tipe Material</label>
                    <input type="text" id="ttse_tipe_material" name="ttse_tipe_material" class="form-control" placeholder="Baja Profil" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttse_bobot">Bobot(%)</label>
                    <input type="number" id="ttse_bobot" name="ttse_bobot" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Rangka Atap Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_dak_beton">Dak Beton (Jika Pakai Balok)</label>
                    </div>
                    <select class="form-select" name="trae_dak_beton" id="trae_dak_beton" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_atap_genteng">Kayu (Atap Genteng)</label>
                    </div>
                    <select class="form-select" name="trae_atap_genteng" id="trae_atap_genteng" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_atap_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
                    </div>
                    <select class="form-select" name="trae_atap_asbes" id="trae_atap_asbes" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_br_atap_genteng">Baja Ringan (Atap Genteng)</label>
                    </div>
                    <select class="form-select" name="trae_br_atap_genteng" id="trae_br_atap_genteng" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_br_atap_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
                    </div>
                    <select class="form-select" name="trae_br_atap_asbes" id="trae_br_atap_asbes" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Rangka Atap Existing</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttrae_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttrae_tipe_material" id="ttrae_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttrae_bobot">Bobot(%)</label>
                    <input type="number" id="ttrae_bobot" name="ttrae_bobot" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Penutup Atap Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_asbes">Asbes</label>
                    </div>
                    <select class="form-select" name="tpae_asbes" id="tpae_asbes" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_dak_beton">Dak Beton</label>
                    </div>
                    <select class="form-select" name="tpae_dak_beton" id="tpae_dak_beton" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_fibreglass">Fibreglass</label>
                    </div>
                    <select class="form-select" name="tpae_fibreglass" id="tpae_fibreglass" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_tanah_liat">Genteng Tanah Liat</label>
                    </div>
                    <select class="form-select" name="tpae_genteng_tanah_liat" id="tpae_genteng_tanah_liat" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_beton">Genteng Beton</label>
                    </div>
                    <select class="form-select" name="tpae_genteng_beton" id="tpae_genteng_beton" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_metal">Genteng Metal</label>
                    </div>
                    <select class="form-select" name="tpae_genteng_metal" id="tpae_genteng_metal" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_seng_gelombang">Seng Gelombang</label>
                    </div>
                    <select class="form-select" name="tpae_seng_gelombang" id="tpae_seng_gelombang" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_spandek">Spandek</label>
                    </div>
                    <select class="form-select" name="tpae_spandek" id="tpae_spandek" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_pvc">PVC</label>
                    </div>
                    <select class="form-select" name="tpae_pvc" id="tpae_pvc" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Address -->
            <div id="address" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 3</h6>
                <small>Enter Step 3.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="bobot_penutup_atap">Bobot Penutup Atap(%)</label>
                  <input type="number" class="form-control" id="bobot_penutup_atap" name="bobot_penutup_atap" placeholder="73">
                </div>
                <hr>    
                <div>
                    <h5>Tipe Plafon Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_asbes">Asbes</label>
                    </div>
                    <select class="form-select" name="tpe_asbes" id="tpe_asbes" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_beton_ekspose">Beton Ekspose</label>
                    </div>
                    <select class="form-select" name="tpe_beton_ekspose" id="tpe_beton_ekspose" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_grc">GRC</label>
                    </div>
                    <select class="form-select" name="tpe_grc" id="tpe_grc" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_gypsum">Gypsum</label>
                    </div>
                    <select class="form-select" name="tpe_gypsum" id="tpe_gypsum" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_triplek">Triplek</label>
                    </div>
                    <select class="form-select" name="tpe_triplek" id="tpe_triplek" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <hr>    
                <div>
                    <h5>Tambah Plafon Eksisting</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tampe_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="tampe_tipe_material" id="tampe_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="tampe_bobot">Bobot(%)</label>
                    <input type="number" id="tampe_bobot" name="tampe_bobot" class="form-control" placeholder="73" />
                </div>   
                <hr>    
                <div>
                    <h5>Tipe Dinding Existing</h5>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_batako">Batako</label>
                    </div>
                    <select class="form-select" name="tde_batako" id="tde_batako" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_bata_merah">Bata Merah</label>
                    </div>
                    <select class="form-select" name="tde_bata_merah" id="tde_bata_merah" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_bata_ringan">Bata Ringan</label>
                    </div>
                    <select class="form-select" name="tde_bata_ringan" id="tde_bata_ringan" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_gypsumboard">Partisi Gypsumboard 2 Muka</label>
                    </div>
                    <select class="form-select" name="tde_gypsumboard" id="tde_gypsumboard" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_roaster_bata">Rooster Bata</label>
                    </div>
                    <select class="form-select" name="tde_roaster_bata" id="tde_roaster_bata" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>   
                <div class="col-sm-6">
                  <label class="form-label" for="tde_bobot">Bobot Dinding(%)</label>
                  <input type="number" id="tde_bobot" name="tde_bobot" class="form-control" placeholder="73" />
                </div>  
                <hr>    
                <div>
                    <h5>Tambah Tipe Dinding Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttde_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttde_tipe_material" id="ttde_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttde_bobot">Bobot(%)</label>
                    <input type="number" id="ttde_bobot" name="ttde_bobot" class="form-control" placeholder="73" />
                </div> 
                <hr>    
                <div>
                    <h5>Tipe Pelapis Dinding Eksisting</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_cat">Dilapis Cat (Diplester dan Diaci)</label>
                    </div>
                    <select class="form-select" name="tpde_dilapisi_cat" id="tpde_dilapisi_cat" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_keramik">Dilapis Keramik</label>
                    </div>
                    <select class="form-select" name="tpde_dilapisi_keramik" id="tpde_dilapisi_keramik" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_walpaper">Dilapis Wallpaper</label>
                    </div>
                    <select class="form-select" name="tpde_dilapisi_walpaper" id="tpde_dilapisi_walpaper" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_mozaik">Dilapis Mozaik</label>
                    </div>
                    <select class="form-select" name="tpde_dilapisi_mozaik" id="tpde_dilapisi_mozaik" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_batu_alam">Dilapis Batu Alam</label>
                    </div>
                    <select class="form-select" name="tpde_dilapisi_batu_alam" id="tpde_dilapisi_batu_alam" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttde_bobot_pdc">Bobot Pelapis Dinding Cat (Diplester dan Diaci)</label>
                    <input type="number" id="ttde_bobot_pdc" name="ttde_bobot_pdc" class="form-control" placeholder="73" />
                </div>   
                <hr>    
                <div>
                    <h5>Tambah Tipe Pelapis Dinding Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttpde_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttpde_tipe_material" id="ttpde_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttpde_bobot">Bobot(%)</label>
                    <input type="number" id="ttpde_bobot" name="ttpde_bobot" class="form-control" placeholder="73" />
                </div>               
                <hr>    
                <div>
                    <h5>Tipe Pintu & Jendela Eksisting</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_kayu_panil">Pintu Kayu Panil</label>
                    </div>
                    <select class="form-select" name="tpdje_pintu_kayu_panil" id="tpdje_pintu_kayu_panil" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_kayu_dobel_triplek">Pintu Kayu Dobel Triplek/ HPL</label>
                    </div>
                    <select class="form-select" name="tpdje_pintu_kayu_dobel_triplek" id="tpdje_pintu_kayu_dobel_triplek" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_kaca_rk">Pintu Kaca Rk Aluminium</label>
                    </div>
                    <select class="form-select" name="tpdje_pintu_kaca_rk" id="tpdje_pintu_kaca_rk" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_jendela_kaca_kayu">Jendela Kaca Rk Kayu</label>
                    </div>
                    <select class="form-select" name="tpdje_jendela_kaca_kayu" id="tpdje_jendela_kaca_kayu" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_km">Pintu KM UPVC/PVC</label>
                    </div>
                    <select class="form-select" name="tpdje_pintu_km" id="tpdje_pintu_km" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>               
                               
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Social Links -->
            <div id="social-links" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 4</h6>
                <small>Enter Step 4.</small>
              </div>
              <div class="row g-3">
                <hr>    
                <div>
                    <h5>Tambah Tipe Pintu & Jendela Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttpdje_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttpdje_tipe_material" id="ttpdje_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttpdje_bobot">Bobot(%)</label>
                    <input type="number" id="ttpdje_bobot" name="ttpdje_bobot" class="form-control" placeholder="73" />
                </div> 
                <hr>    
                <div>
                    <h5>Tipe Lantai Eksisting </h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_granit">Granit/Homogenous Tile</label>
                    </div>
                    <select class="form-select" name="tle_granit" id="tle_granit" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_karpet">Karpet</label>
                    </div>
                    <select class="form-select" name="tle_karpet" id="tle_karpet" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_keramik">Keramik</label>
                    </div>
                    <select class="form-select" name="tle_keramik" id="tle_keramik" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_rabat_beton">Rabat Beton (Semen Ekspose)</label>
                    </div>
                    <select class="form-select" name="tle_rabat_beton" id="tle_rabat_beton" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_teraso">Teraso</label>
                    </div>
                    <select class="form-select" name="tle_teraso" id="tle_teraso" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_vynil">Vynil</label>
                    </div>
                    <select class="form-select" name="tle_vynil" id="tle_vynil" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_papan_kayu">Papan Kayu</label>
                    </div>
                    <select class="form-select" name="tle_papan_kayu" id="tle_papan_kayu" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="tle_bobot_lantai">Bobot Lantai(%)</label>
                    <input type="number" id="tle_bobot_lantai" name="tle_bobot_lantai" class="form-control" placeholder="73" />
                </div> 
                <hr>    
                <div>
                    <h5>Tambah Tipe Lantai Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttle_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttle_tipe_material" id="ttle_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttle_bobot">Bobot(%)</label>
                    <input type="number" id="ttle_bobot" name="ttle_bobot" class="form-control" placeholder="73" />
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="penggunaan_bangunan_saat_ini">Penggunaan Bangunan Saat Ini</label>
                    <input type="text" id="penggunaan_bangunan_saat_ini" name="penggunaan_bangunan_saat_ini" class="form-control" placeholder="Disewakan" />
                </div> 
                <div>
                  <h5>Perlengkapan Bangunan</h5>
              </div>  
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_listrik">Listrik</label>
                  </div>
                  <select class="form-select" name="pb_listrik" id="pb_listrik" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_telepon">Telepon</label>
                  </div>
                  <select class="form-select" name="pb_telepon" id="pb_telepon" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_pdam">PDAM</label>
                  </div>
                  <select class="form-select" name="pb_pdam" id="pb_pdam" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_gas">Gas</label>
                  </div>
                  <select class="form-select" name="pb_gas" id="pb_gas" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_ac">AC</label>
                  </div>
                  <select class="form-select" name="pb_ac" id="pb_ac" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_sumur_gali">Sumur Gali/Pompa</label>
                  </div>
                  <select class="form-select" name="pb_sumur_gali" id="pb_sumur_gali" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                <label class="form-label" for="penggunaan_bangunan">Penggunaan Bangunan</label>
                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control" placeholder="Rumah Tinggal" />
              </div> 
              <div class="col-sm-6">
                  <label class="form-label" for="progress_pembangunan">Progres Pembangunan jika aset dalam proses (dalam persen)</label>
                  <input type="number" id="progress_pembangunan" name="progress_pembangunan" class="form-control" placeholder="73" />
              </div> 
              <div class="col-sm-6">
                  <label class="form-label" for="status_data_obyek">Status Data Obyek</label>
                  <select name="status_data_obyek" id="status_data_obyek" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                  </select>
              </div>             
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button type="button" class="btn btn-primary btn-next" id="btn-review"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Review -->
            <div id="review-submit" class="content">
  
              <p class="fw-medium mb-2">Step 1</p>
              <table class="table table-borderless">
                  <tr>
                    <td style="font-weight: 800">Nama Bangunan</td>
                    <td>:</td>
                    <td><span id="review-nama-bangunan"></span></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Foto Tampak Depan</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_depan" src="" height="150" width="150" alt="Foto Tampak Depan" style="max-width: 100%; height: auto;"/></td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Foto Tampak Sisi Kiri</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_sisi_kiri" src="" height="150" width="150" alt="Foto Sisi Kiri" style="max-width: 100%; height: auto;"/></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Foto Tampak Sisi Kanan</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_sisi_kanan" src="" height="150" width="150" alt="Foto Sisi Kanan" style="max-width: 100%; height: auto;"/></td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Foto Lainnya</td>
                    <td>:</td>
                    <td><img id="review-foto_lainnya" src="" height="150" width="150" alt="Foto Lainnya" style="max-width: 100%; height: auto;"/></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Jumlah Lantai</td>
                    <td>:</td>
                    <td><span id="review-jumlah_lantai"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Konstruksi Bangunan</td>
                    <td>:</td>
                    <td><span id="review-kontruksi_bangunan"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Konstruksi Lantai</td>
                    <td>:</td>
                    <td><span id="review-kontruksi_lantai"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Konstruksi Dinding</td>
                    <td>:</td>
                    <td><span id="review-kontruksi_dinding"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Kontruksi Atap</td>
                    <td>:</td>
                    <td><span id="review-kontruksi_atap"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Kontruksi Pondasi</td>
                    <td>:</td>
                    <td><span id="review-kontruksi_pondasi"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Versi BTB</td>
                    <td>:</td>
                    <td><span id="review-versi_btb"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Tipikal Bangunan Sesuai Spek BTB MAPPI</td>
                    <td>:</td>
                    <td><span id="review-tbssb_mappi"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Jenis Bangunan (Umur Ekonomis)</td>
                    <td>:</td>
                    <td><span id="review-jenis_bangunan_uk"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Tipe Rumah Tinggal (Umur Ekonomis)</td>
                    <td>:</td>
                    <td><span id="review-tipe_rumah_tinggal"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Jenis Bangunan (Indeks lantai)</td>
                    <td>:</td>
                    <td><span id="review-jenis_bangunan_il"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Tahun Dibangun</td>
                    <td>:</td>
                    <td><span id="review-tahun_dibangun"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Tahun Renovasi</td>
                    <td>:</td>
                    <td><span id="review-tahun_renovasi"></span></td>                    
                  </tr>
                  <tr>
                    <td colspan="8" class="text-danger">Sumber Informasi Tahun Dibangun</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Keterangan pendamping lokasi / pemilik</td>
                    <td>:</td>
                    <td><span id="review-kpl_pemilik"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">IMB</td>
                    <td>:</td>
                    <td><span id="review-kpl_imb"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Pengamatan visual</td>
                    <td>:</td>
                    <td><span id="review-kpl_pengamatan_visual"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Keterangan lingkungan</td>
                    <td>:</td>
                    <td><span id="review-kpl_keterangan_lingkungan"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Kondisi Bangunan Secara Visual</td>
                    <td>:</td>
                    <td><span id="review-kondisi_bangunan_scr_visual"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Catatan Khusus Bangunan</td>
                    <td>:</td>
                    <td><span id="review-catatan_khusus_bangunan"></span></td>                    
                  </tr>
                  <tr>
                    <td colspan="8" class="text-danger">Luas Bangunan Fisik</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Nomor/Nama Lantai (Area)</td>
                    <td>:</td>
                    <td><span id="review-lbf_no_or_nama_lantai"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Faktor Pengali Luas</td>
                    <td>:</td>
                    <td><span id="review-lbf_faktor_pengali_luas"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Luas Lantai (m2)</td>
                    <td>:</td>
                    <td><span id="review-lbf_luas_lantai"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Luas Bangunan Menurut IMB</td>
                    <td>:</td>
                    <td><span id="review-luas_bangunan_menurut_imb"></span></td>                    
                  </tr>
                  <tr>
                    <td colspan="8" class="text-danger">Luas Pintu dan Jendela</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Nama Area</td>
                    <td>:</td>
                    <td><span id="review-lpj_nama_area"></span></td>                    
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Luas (m2)</td>
                    <td>:</td>
                    <td><span id="review-lpj_luas"></span></td>                    
                  </tr>
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 2</p>
              <table class="table table-borderless">
                <tr>
                  <td colspan="8" class="text-danger">Luas Dinding</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-ld_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-ld_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Luas Rangka Atap Datar</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-lrad_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-lrad_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Luas Atap Datar</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-lad_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-lad_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Pondasi Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Batu Kali</td>
                  <td>:</td>
                  <td><span id="review-tpe_batu_kali"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Pondasi Batu Kali (%)</td>
                  <td>:</td>
                  <td><span id="review-tpe_bobot_pondasi"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Pondasi Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpe_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpe_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Struktur Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Beton Bertulang</td>
                  <td>:</td>
                  <td><span id="review-tse_beton_bertulang"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Struktur Beton Bertulang(%)</td>
                  <td>:</td>
                  <td><span id="review-tse_bobot_struktur_beton_bertulng"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Struktur Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttse_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttse_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Rangka Atap Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Dak Beton (Jika Pakai Balok)</td>
                  <td>:</td>
                  <td><span id="review-trae_dak_beton"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Kayu (Atap Genteng)</td>
                  <td>:</td>
                  <td><span id="review-trae_atap_genteng"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</td>
                  <td>:</td>
                  <td><span id="review-trae_atap_asbes"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Baja Ringan (Atap Genteng)</td>
                  <td>:</td>
                  <td><span id="review-trae_br_atap_genteng"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Baja Ringan (Atap Asbes, Seng dll)</td>
                  <td>:</td>
                  <td><span id="review-trae_br_atap_asbes"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Rangka Atap Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttrae_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttrae_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Penutup Atap Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Asbes</td>
                  <td>:</td>
                  <td><span id="review-tpae_asbes"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Dak Beton</td>
                  <td>:</td>
                  <td><span id="review-tpae_dak_beton"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Fibreglass</td>
                  <td>:</td>
                  <td><span id="review-tpae_fibreglass"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Genteng Tanah Liat</td>
                  <td>:</td>
                  <td><span id="review-tpae_genteng_tanah_liat"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Genteng Beton</td>
                  <td>:</td>
                  <td><span id="review-tpae_genteng_beton"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Genteng Metal</td>
                  <td>:</td>
                  <td><span id="review-tpae_genteng_metal"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Seng Gelombang</td>
                  <td>:</td>
                  <td><span id="review-tpae_seng_gelombang"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Spandek</td>
                  <td>:</td>
                  <td><span id="review-tpae_spandek"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">PVC</td>
                  <td>:</td>
                  <td><span id="review-tpae_pvc"></span></td>                                
                </tr>                
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 3</p>
              <table class="table table-borderless">
                <tr>
                  <td style="font-weight: 800">Bobot Penutup Atap(%)</td>
                  <td>:</td>
                  <td><span id="review-bobot_penutup_atap"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Asbes</td>
                  <td>:</td>
                  <td><span id="review-tpe_asbes"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Beton Ekspose</td>
                  <td>:</td>
                  <td><span id="review-tpe_beton_ekspose"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">GRC</td>
                  <td>:</td>
                  <td><span id="review-tpe_grc"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Gypsum</td>
                  <td>:</td>
                  <td><span id="review-tpe_gypsum"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Triplek</td>
                  <td>:</td>
                  <td><span id="review-tpe_triplek"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Plafon Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-tampe_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-tampe_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Dinding Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Batako</td>
                  <td>:</td>
                  <td><span id="review-tde_batako"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bata Merah</td>
                  <td>:</td>
                  <td><span id="review-tde_bata_merah"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Bata Ringan</td>
                  <td>:</td>
                  <td><span id="review-tde_bata_ringan"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Partisi Gypsumboard 2 Muka</td>
                  <td>:</td>
                  <td><span id="review-tde_gypsumboard"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Rooster Bata</td>
                  <td>:</td>
                  <td><span id="review-tde_roaster_bata"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Dinding(%)</td>
                  <td>:</td>
                  <td><span id="review-tde_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Dinding Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttde_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttde_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Pelapis Dinding Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Dilapis Cat (Diplester dan Diaci)</td>
                  <td>:</td>
                  <td><span id="review-tpde_dilapisi_cat"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Dilapis Keramik</td>
                  <td>:</td>
                  <td><span id="review-tpde_dilapisi_keramik"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Dilapis Wallpaper</td>
                  <td>:</td>
                  <td><span id="review-tpde_dilapisi_walpaper"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Dilapis Mozaik</td>
                  <td>:</td>
                  <td><span id="review-tpde_dilapisi_mozaik"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Dilapis Batu Alam</td>
                  <td>:</td>
                  <td><span id="review-tpde_dilapisi_batu_alam"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Pelapis Dinding Cat (Diplester dan Diaci)</td>
                  <td>:</td>
                  <td><span id="review-ttde_bobot_pdc"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Pelapis Dinding Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpde_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpde_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Pintu & Jendela Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Pintu Kayu Panil</td>
                  <td>:</td>
                  <td><span id="review-tpdje_pintu_kayu_panil"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Pintu Kayu Dobel Triplek/ HPL</td>
                  <td>:</td>
                  <td><span id="review-tpdje_pintu_kayu_dobel_triplek"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Pintu Kaca Rk Aluminium</td>
                  <td>:</td>
                  <td><span id="review-tpdje_pintu_kaca_rk"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Jendela Kaca Rk Kayu</td>
                  <td>:</td>
                  <td><span id="review-tpdje_jendela_kaca_kayu"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Pintu KM UPVC/PVC</td>
                  <td>:</td>
                  <td><span id="review-tpdje_pintu_km"></span></td>                   
                </tr>
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 4</p>
              <table class="table table-borderless">
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Pintu & Jendela Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpdje_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpdje_bobot"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tipe Lantai Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Granit/Homogenous Tile</td>
                  <td>:</td>
                  <td><span id="review-tle_granit"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Karpet</td>
                  <td>:</td>
                  <td><span id="review-tle_karpet"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Keramik</td>
                  <td>:</td>
                  <td><span id="review-tle_keramik"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Rabat Beton (Semen Ekspose)</td>
                  <td>:</td>
                  <td><span id="review-tle_rabat_beton"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Teraso</td>
                  <td>:</td>
                  <td><span id="review-tle_teraso"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Vynil</td>
                  <td>:</td>
                  <td><span id="review-tle_vynil"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Papan Kayu</td>
                  <td>:</td>
                  <td><span id="review-tle_papan_kayu"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Lantai(%)</td>
                  <td>:</td>
                  <td><span id="review-tle_bobot_lantai"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Tambah Tipe Lantai Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttle_tipe_material"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttle_bobot"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Penggunaan Bangunan Saat Ini</td>
                  <td>:</td>
                  <td><span id="review-penggunaan_bangunan_saat_ini"></span></td>                              
                </tr>
                <tr>
                  <td colspan="8" class="text-danger">Perlengkapan Bangunan</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Listrik</td>
                  <td>:</td>
                  <td><span id="review-pb_listrik"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Telepon</td>
                  <td>:</td>
                  <td><span id="review-pb_telepon"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">PDAM</td>
                  <td>:</td>
                  <td><span id="review-pb_pdam"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Gas</td>
                  <td>:</td>
                  <td><span id="review-pb_gas"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">AC</td>
                  <td>:</td>
                  <td><span id="review-pb_ac"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Sumur Gali/Pompa</td>
                  <td>:</td>
                  <td><span id="review-pb_sumur_gali"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Penggunaan Bangunan</td>
                  <td>:</td>
                  <td><span id="review-penggunaan_bangunan"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Progres Pembangunan jika aset dalam proses (dalam persen)</td>
                  <td>:</td>
                  <td><span id="review-progress_pembangunan"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Status Data Obyek</td>
                  <td>:</td>
                  <td><span id="review-status_data_obyek"></span></td>                   
                </tr>

              </table>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Default Icons Wizard -->
  </div>
  
<script>
  document.querySelector('#btn-review').addEventListener('click', function() {
    // Step 1
    document.getElementById('review-nama-bangunan').innerHTML = document.getElementById('nama_bangunan').value    
    const foto_tampak_depan = document.getElementById('foto_tampak_depan');
        if (foto_tampak_depan.files && foto_tampak_depan.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_depan').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_depan.files[0]);
        } else {
          document.getElementById('review-foto_tampak_depan').src = '';
        }

    const foto_tampak_sisi_kiri = document.getElementById('foto_tampak_sisi_kiri');
        if (foto_tampak_sisi_kiri.files && foto_tampak_sisi_kiri.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_sisi_kiri').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_sisi_kiri.files[0]);
        } else {
          document.getElementById('review-foto_tampak_sisi_kiri').src = '';
        }
    const foto_tampak_sisi_kanan = document.getElementById('foto_tampak_sisi_kanan');
        if (foto_tampak_sisi_kanan.files && foto_tampak_sisi_kanan.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_sisi_kanan').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_sisi_kanan.files[0]);
        } else {
          document.getElementById('review-foto_tampak_sisi_kanan').src = '';
        }
    const foto_lainnya = document.getElementById('foto_lainnya');
        if (foto_lainnya.files && foto_lainnya.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_lainnya').src = e.target.result;
          }
          reader.readAsDataURL(foto_lainnya.files[0]);
        } else {
          document.getElementById('review-foto_lainnya').src = '';
        }
    document.getElementById('review-jumlah_lantai').innerHTML = document.getElementById('jumlah_lantai').value
    document.getElementById('review-kontruksi_bangunan').innerHTML = document.getElementById('kontruksi_bangunan').value
    document.getElementById('review-kontruksi_lantai').innerHTML = document.getElementById('kontruksi_lantai').value
    document.getElementById('review-kontruksi_dinding').innerHTML = document.getElementById('kontruksi_dinding').value
    document.getElementById('review-kontruksi_atap').innerHTML = document.getElementById('kontruksi_atap').value
    document.getElementById('review-kontruksi_pondasi').innerHTML = document.getElementById('kontruksi_pondasi').value
    document.getElementById('review-versi_btb').innerHTML = document.getElementById('versi_btb').value
    document.getElementById('review-tbssb_mappi').innerHTML = document.getElementById('tbssb_mappi').value
    document.getElementById('review-jenis_bangunan_uk').innerHTML = document.getElementById('jenis_bangunan_uk').value
    document.getElementById('review-tipe_rumah_tinggal').innerHTML = document.getElementById('tipe_rumah_tinggal').value
    document.getElementById('review-jenis_bangunan_il').innerHTML = document.getElementById('jenis_bangunan_il').value
    document.getElementById('review-tahun_dibangun').innerHTML = document.getElementById('tahun_dibangun').value
    document.getElementById('review-tahun_renovasi').innerHTML = document.getElementById('tahun_renovasi').value
    document.getElementById('review-kpl_pemilik').innerHTML = document.getElementById('kpl_pemilik').value
    document.getElementById('review-kpl_imb').innerHTML = document.getElementById('kpl_imb').value
    document.getElementById('review-kpl_pengamatan_visual').innerHTML = document.getElementById('kpl_pengamatan_visual').value
    document.getElementById('review-kpl_keterangan_lingkungan').innerHTML = document.getElementById('kpl_keterangan_lingkungan').value
    document.getElementById('review-kondisi_bangunan_scr_visual').innerHTML = document.getElementById('kondisi_bangunan_scr_visual').value
    document.getElementById('review-catatan_khusus_bangunan').innerHTML = document.getElementById('catatan_khusus_bangunan').value
    document.getElementById('review-lbf_no_or_nama_lantai').innerHTML = document.getElementById('lbf_no_or_nama_lantai').value
    document.getElementById('review-lbf_faktor_pengali_luas').innerHTML = document.getElementById('lbf_faktor_pengali_luas').value
    document.getElementById('review-lbf_luas_lantai').innerHTML = document.getElementById('lbf_luas_lantai').value
    document.getElementById('review-luas_bangunan_menurut_imb').innerHTML = document.getElementById('luas_bangunan_menurut_imb').value
    document.getElementById('review-lpj_nama_area').innerHTML = document.getElementById('lpj_nama_area').value
    document.getElementById('review-lpj_luas').innerHTML = document.getElementById('lpj_luas').value
    // Step 2
    document.getElementById('review-ld_nama_area').innerHTML = document.getElementById('ld_nama_area').value
    document.getElementById('review-ld_luas').innerHTML = document.getElementById('ld_luas').value
    document.getElementById('review-lrad_nama_area').innerHTML = document.getElementById('lrad_nama_area').value 
    document.getElementById('review-lrad_luas').innerHTML = document.getElementById('lrad_luas').value
    document.getElementById('review-lad_nama_area').innerHTML = document.getElementById('lad_nama_area').value
    document.getElementById('review-lad_luas').innerHTML = document.getElementById('lad_luas').value
    document.getElementById('review-tpe_batu_kali').innerHTML = document.getElementById('tpe_batu_kali').value
    document.getElementById('review-tpe_bobot_pondasi').innerHTML = document.getElementById('tpe_bobot_pondasi').value
    document.getElementById('review-ttpe_tipe_material').innerHTML = document.getElementById('ttpe_tipe_material').value
    document.getElementById('review-ttpe_bobot').innerHTML = document.getElementById('ttpe_bobot').value
    document.getElementById('review-tse_beton_bertulang').innerHTML = document.getElementById('tse_beton_bertulang').value
    document.getElementById('review-tse_bobot_struktur_beton_bertulng').innerHTML = document.getElementById('tse_bobot_struktur_beton_bertulng').value
    document.getElementById('review-ttse_tipe_material').innerHTML = document.getElementById('ttse_tipe_material').value
    document.getElementById('review-ttse_bobot').innerHTML = document.getElementById('ttse_bobot').value
    document.getElementById('review-trae_dak_beton').innerHTML = document.getElementById('trae_dak_beton').value
    document.getElementById('review-trae_atap_genteng').innerHTML = document.getElementById('trae_atap_genteng').value
    document.getElementById('review-trae_atap_asbes').innerHTML = document.getElementById('trae_atap_asbes').value
    document.getElementById('review-trae_br_atap_genteng').innerHTML = document.getElementById('trae_br_atap_genteng').value
    document.getElementById('review-trae_br_atap_asbes').innerHTML = document.getElementById('trae_br_atap_asbes').value
    document.getElementById('review-ttrae_tipe_material').innerHTML = document.getElementById('ttrae_tipe_material').value
    document.getElementById('review-ttrae_bobot').innerHTML = document.getElementById('ttrae_bobot').value
    document.getElementById('review-tpae_asbes').innerHTML = document.getElementById('tpae_asbes').value
    document.getElementById('review-tpae_dak_beton').innerHTML = document.getElementById('tpae_dak_beton').value
    document.getElementById('review-tpae_fibreglass').innerHTML = document.getElementById('tpae_fibreglass').value
    document.getElementById('review-tpae_genteng_tanah_liat').innerHTML = document.getElementById('tpae_genteng_tanah_liat').value
    document.getElementById('review-tpae_genteng_beton').innerHTML = document.getElementById('tpae_genteng_beton').value
    document.getElementById('review-tpae_genteng_metal').innerHTML = document.getElementById('tpae_genteng_metal').value
    document.getElementById('review-tpae_seng_gelombang').innerHTML = document.getElementById('tpae_seng_gelombang').value
    document.getElementById('review-tpae_spandek').innerHTML = document.getElementById('tpae_spandek').value
    document.getElementById('review-tpae_pvc').innerHTML = document.getElementById('tpae_pvc').value
    // Step 3
    document.getElementById('review-bobot_penutup_atap').innerHTML = document.getElementById('bobot_penutup_atap').value
    document.getElementById('review-tpe_asbes').innerHTML = document.getElementById('tpe_asbes').value
    document.getElementById('review-tpe_beton_ekspose').innerHTML = document.getElementById('tpe_beton_ekspose').value
    document.getElementById('review-tpe_grc').innerHTML = document.getElementById('tpe_grc').value
    document.getElementById('review-tpe_gypsum').innerHTML = document.getElementById('tpe_gypsum').value
    document.getElementById('review-tpe_triplek').innerHTML = document.getElementById('tpe_triplek').value
    document.getElementById('review-tampe_tipe_material').innerHTML = document.getElementById('tampe_tipe_material').value
    document.getElementById('review-tampe_bobot').innerHTML = document.getElementById('tampe_bobot').value
    document.getElementById('review-tde_batako').innerHTML = document.getElementById('tde_batako').value
    document.getElementById('review-tde_bata_merah').innerHTML = document.getElementById('tde_bata_merah').value
    document.getElementById('review-tde_bata_ringan').innerHTML = document.getElementById('tde_bata_ringan').value
    document.getElementById('review-tde_gypsumboard').innerHTML = document.getElementById('tde_gypsumboard').value
    document.getElementById('review-tde_roaster_bata').innerHTML = document.getElementById('tde_roaster_bata').value
    document.getElementById('review-tde_bobot').innerHTML = document.getElementById('tde_bobot').value
    document.getElementById('review-ttde_tipe_material').innerHTML = document.getElementById('ttde_tipe_material').value
    document.getElementById('review-ttde_bobot').innerHTML = document.getElementById('ttde_bobot').value
    document.getElementById('review-tpde_dilapisi_cat').innerHTML = document.getElementById('tpde_dilapisi_cat').value
    document.getElementById('review-tpde_dilapisi_keramik').innerHTML = document.getElementById('tpde_dilapisi_keramik').value
    document.getElementById('review-tpde_dilapisi_walpaper').innerHTML = document.getElementById('tpde_dilapisi_walpaper').value
    document.getElementById('review-tpde_dilapisi_mozaik').innerHTML = document.getElementById('tpde_dilapisi_mozaik').value
    document.getElementById('review-tpde_dilapisi_batu_alam').innerHTML = document.getElementById('tpde_dilapisi_batu_alam').value
    document.getElementById('review-ttde_bobot_pdc').innerHTML = document.getElementById('ttde_bobot_pdc').value
    document.getElementById('review-ttpde_tipe_material').innerHTML = document.getElementById('ttpde_tipe_material').value
    document.getElementById('review-ttpde_bobot').innerHTML = document.getElementById('ttpde_bobot').value
    document.getElementById('review-tpdje_pintu_kayu_panil').innerHTML = document.getElementById('tpdje_pintu_kayu_panil').value
    document.getElementById('review-tpdje_pintu_kayu_dobel_triplek').innerHTML = document.getElementById('tpdje_pintu_kayu_dobel_triplek').value
    document.getElementById('review-tpdje_pintu_kaca_rk').innerHTML = document.getElementById('tpdje_pintu_kaca_rk').value
    document.getElementById('review-tpdje_jendela_kaca_kayu').innerHTML = document.getElementById('tpdje_jendela_kaca_kayu').value
    document.getElementById('review-tpdje_pintu_km').innerHTML = document.getElementById('tpdje_pintu_km').value
    // Step 4
    document.getElementById('review-ttpdje_tipe_material').innerHTML = document.getElementById('ttpdje_tipe_material').value
    document.getElementById('review-ttpdje_bobot').innerHTML = document.getElementById('ttpdje_bobot').value
    document.getElementById('review-tle_granit').innerHTML = document.getElementById('tle_granit').value
    document.getElementById('review-tle_karpet').innerHTML = document.getElementById('tle_karpet').value
    document.getElementById('review-tle_keramik').innerHTML = document.getElementById('tle_keramik').value
    document.getElementById('review-tle_rabat_beton').innerHTML = document.getElementById('tle_rabat_beton').value
    document.getElementById('review-tle_teraso').innerHTML = document.getElementById('tle_teraso').value
    document.getElementById('review-tle_vynil').innerHTML = document.getElementById('tle_vynil').value
    document.getElementById('review-tle_papan_kayu').innerHTML = document.getElementById('tle_papan_kayu').value
    document.getElementById('review-tle_bobot_lantai').innerHTML = document.getElementById('tle_bobot_lantai').value
    document.getElementById('review-ttle_tipe_material').innerHTML = document.getElementById('ttle_tipe_material').value
    document.getElementById('review-ttle_bobot').innerHTML = document.getElementById('ttle_bobot').value
    document.getElementById('review-penggunaan_bangunan_saat_ini').innerHTML = document.getElementById('penggunaan_bangunan_saat_ini').value
    document.getElementById('review-pb_listrik').innerHTML = document.getElementById('pb_listrik').value
    document.getElementById('review-pb_telepon').innerHTML = document.getElementById('pb_telepon').value
    document.getElementById('review-pb_pdam').innerHTML = document.getElementById('pb_pdam').value
    document.getElementById('review-pb_gas').innerHTML = document.getElementById('pb_gas').value
    document.getElementById('review-pb_ac').innerHTML = document.getElementById('pb_ac').value
    document.getElementById('review-pb_sumur_gali').innerHTML = document.getElementById('pb_sumur_gali').value
    document.getElementById('review-penggunaan_bangunan').innerHTML = document.getElementById('penggunaan_bangunan').value
    document.getElementById('review-progress_pembangunan').innerHTML = document.getElementById('progress_pembangunan').value
    document.getElementById('review-status_data_obyek').innerHTML = document.getElementById('status_data_obyek').value




      
  });
</script>

@endsection
