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
          <form onSubmit="return false">
            <!-- Account Details -->
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
                    <label class="switch" for="kpl_pemilik">
                    <input type="checkbox" id="kpl_pemilik" name="kpl_pemilik" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_imb">IMB</label>
                    </div>
                    <label class="switch" for="kpl_imb">
                    <input type="checkbox" id="kpl_imb" name="kpl_imb" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_pengamatan_visual">Pengamatan visual</label>
                    </div>
                    <label class="switch" for="kpl_pengamatan_visual">
                    <input type="checkbox" id="kpl_pengamatan_visual" name="kpl_pengamatan_visual" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                  </div>
                  <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="kpl_keterangan_lingkungan">Keterangan lingkungan</label>
                    </div>
                    <label class="switch" for="kpl_keterangan_lingkungan">
                    <input type="checkbox" id="kpl_keterangan_lingkungan" name="kpl_keterangan_lingkungan" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <input type="text" id="lpj_luas" name="lpj_luas" class="form-control" placeholder="44" />
                  </div>
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
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
                  <input type="text" id="lrad_nama_area" name="lrd_nama_area" class="form-control" placeholder="Luas Rangka Atap Datar" />
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
                    <label class="form-label" for="lad_luas">Bobot Pondasi Batu Kali (%)</label>
                    <input type="number" id="lad_luas" name="lad_luas" class="form-control" placeholder="44" />
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
                    <input type="text" id="ttse_tipe_material" name="ttse_tipe_material" class="form-control" placeholder="Baja Profil " />
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
                    <label class="switch" for="trae_dak_beton">
                    <input type="checkbox" id="trae_dak_beton" name="trae_dak_beton" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_atap_genteng">Kayu (Atap Genteng)</label>
                    </div>
                    <label class="switch" for="trae_atap_genteng">
                    <input type="checkbox" id="trae_atap_genteng" name="trae_atap_genteng" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_atap_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
                    </div>
                    <label class="switch" for="trae_atap_asbes">
                    <input type="checkbox" id="trae_atap_asbes" name="trae_atap_asbes" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_br_atap_genteng">Baja Ringan (Atap Genteng)</label>
                    </div>
                    <label class="switch" for="trae_br_atap_genteng">
                    <input type="checkbox" id="trae_br_atap_genteng" name="trae_br_atap_genteng" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="trae_br_atap_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
                    </div>
                    <label class="switch" for="trae_br_atap_asbes">
                    <input type="checkbox" id="trae_br_atap_asbes" name="trae_br_atap_asbes" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Rangka Atap Existing</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttrae_tipe_material">Tipe Material</label>
                    </div>
                    <label class="switch" for="ttrae_tipe_material">
                    <input type="checkbox" id="ttrae_tipe_material" name="ttrae_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="tpae_asbes">
                    <input type="checkbox" id="tpae_asbes" name="tpae_asbes" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_dak_beton">Dak Beton</label>
                    </div>
                    <label class="switch" for="tpae_dak_beton">
                    <input type="checkbox" id="tpae_dak_beton" name="tpae_dak_beton" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_fibreglass">Fibreglass</label>
                    </div>
                    <label class="switch" for="tpae_fibreglass">
                    <input type="checkbox" id="tpae_fibreglass" name="tpae_fibreglass" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_tanah_liat">Genteng Tanah Liat</label>
                    </div>
                    <label class="switch" for="tpae_genteng_tanah_liat">
                    <input type="checkbox" id="tpae_genteng_tanah_liat" name="tpae_genteng_tanah_liat" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_beton">Genteng Beton</label>
                    </div>
                    <label class="switch" for="tpae_genteng_beton">
                    <input type="checkbox" id="tpae_genteng_beton" name="tpae_genteng_beton" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_genteng_metal">Genteng Metal</label>
                    </div>
                    <label class="switch" for="tpae_genteng_metal">
                    <input type="checkbox" id="tpae_genteng_metal" name="tpae_genteng_metal" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_seng_gelombang">Seng Gelombang</label>
                    </div>
                    <label class="switch" for="tpae_seng_gelombang">
                    <input type="checkbox" id="tpae_seng_gelombang" name="tpae_seng_gelombang" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_spandek">Spandek</label>
                    </div>
                    <label class="switch" for="tpae_spandek">
                    <input type="checkbox" id="tpae_spandek" name="tpae_spandek" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpae_pvc">PVC</label>
                    </div>
                    <label class="switch" for="tpae_pvc">
                    <input type="checkbox" id="tpae_pvc" name="tpae_pvc" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>

                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
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
                    <label class="switch" for="tpe_asbes">
                    <input type="checkbox" id="tpe_asbes" name="tpe_asbes" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_beton_ekspose">Beton Ekspose</label>
                    </div>
                    <label class="switch" for="tpe_beton_ekspose">
                    <input type="checkbox" id="tpe_beton_ekspose" name="tpe_beton_ekspose" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_grc">GRC</label>
                    </div>
                    <label class="switch" for="tpe_grc">
                    <input type="checkbox" id="tpe_grc" name="tpe_grc" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_gypsum">Gypsum</label>
                    </div>
                    <label class="switch" for="tpe_gypsum">
                    <input type="checkbox" id="tpe_gypsum" name="tpe_gypsum" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpe_triplek">Triplek</label>
                    </div>
                    <label class="switch" for="tpe_triplek">
                    <input type="checkbox" id="tpe_triplek" name="tpe_triplek" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <hr>    
                <div>
                    <h5>Tambah Plafon Eksisting</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tampe_tipe_material">Tipe Material</label>
                    </div>
                    <label class="switch" for="tampe_tipe_material">
                    <input type="checkbox" id="tampe_tipe_material" name="tampe_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="tde_batako">
                    <input type="checkbox" id="tde_batako" name="tde_batako" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_bata_merah">Bata Merah</label>
                    </div>
                    <label class="switch" for="tde_bata_merah">
                    <input type="checkbox" id="tde_bata_merah" name="tde_bata_merah" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_bata_ringan">Bata Ringan</label>
                    </div>
                    <label class="switch" for="tde_bata_ringan">
                    <input type="checkbox" id="tde_bata_ringan" name="tde_bata_ringan" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_gypsumboard">Partisi Gypsumboard 2 Muka</label>
                    </div>
                    <label class="switch" for="tde_gypsumboard">
                    <input type="checkbox" id="tde_gypsumboard" name="tde_gypsumboard" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tde_roaster_bata">Rooster Bata</label>
                    </div>
                    <label class="switch" for="tde_roaster_bata">
                    <input type="checkbox" id="tde_roaster_bata" name="tde_roaster_bata" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div>   
                <div class="col-sm-6">
                  <label class="form-label" for="tampe_bobot">Bobot Dinding(%)</label>
                  <input type="number" id="tampe_bobot" name="tampe_bobot" class="form-control" placeholder="73" />
                </div>  
                <hr>    
                <div>
                    <h5>Tambah Tipe Dinding Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttde_tipe_material">Tipe Material</label>
                    </div>
                    <label class="switch" for="ttde_tipe_material">
                    <input type="checkbox" id="ttde_tipe_material" name="ttde_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="tpde_dilapisi_cat">
                    <input type="checkbox" id="tpde_dilapisi_cat" name="tpde_dilapisi_cat" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_keramik">Dilapis Keramik</label>
                    </div>
                    <label class="switch" for="tpde_dilapisi_keramik">
                    <input type="checkbox" id="tpde_dilapisi_keramik" name="tpde_dilapisi_keramik" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_walpaper">Dilapis Wallpaper</label>
                    </div>
                    <label class="switch" for="tpde_dilapisi_walpaper">
                    <input type="checkbox" id="tpde_dilapisi_walpaper" name="tpde_dilapisi_walpaper" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_mozaik">Dilapis Mozaik</label>
                    </div>
                    <label class="switch" for="tpde_dilapisi_mozaik">
                    <input type="checkbox" id="tpde_dilapisi_mozaik" name="tpde_dilapisi_mozaik" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpde_dilapisi_batu_alam">Dilapis Batu Alam</label>
                    </div>
                    <label class="switch" for="tpde_dilapisi_batu_alam">
                    <input type="checkbox" id="tpde_dilapisi_batu_alam" name="tpde_dilapisi_batu_alam" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="ttpde_tipe_material">
                    <input type="checkbox" id="ttpde_tipe_material" name="ttpde_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="tpdje_pintu_kayu_panil">
                    <input type="checkbox" id="tpdje_pintu_kayu_panil" name="tpdje_pintu_kayu_panil" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_kayu_dobel_triplek">Pintu Kayu Dobel Triplek/ HPL</label>
                    </div>
                    <label class="switch" for="tpdje_pintu_kayu_dobel_triplek">
                    <input type="checkbox" id="tpdje_pintu_kayu_dobel_triplek" name="tpdje_pintu_kayu_dobel_triplek" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_kaca_rk">Pintu Kaca Rk Aluminium</label>
                    </div>
                    <label class="switch" for="tpdje_pintu_kaca_rk">
                    <input type="checkbox" id="tpdje_pintu_kaca_rk" name="tpdje_pintu_kaca_rk" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_jendela_kaca_kayu">Jendela Kaca Rk Kayu</label>
                    </div>
                    <label class="switch" for="tpdje_jendela_kaca_kayu">
                    <input type="checkbox" id="tpdje_jendela_kaca_kayu" name="tpdje_jendela_kaca_kayu" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tpdje_pintu_km">Pintu KM UPVC/PVC</label>
                    </div>
                    <label class="switch" for="tpdje_pintu_km">
                    <input type="checkbox" id="tpdje_pintu_km" name="tpdje_pintu_km" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttpde_bobot">Bobot(%)</label>
                    <input type="number" id="ttpde_bobot" name="ttpde_bobot" class="form-control" placeholder="73" />
                </div>               
                               
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
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
                    <label class="switch" for="ttpdje_tipe_material">
                    <input type="checkbox" id="ttpdje_tipe_material" name="ttpdje_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="tle_granit">
                    <input type="checkbox" id="tle_granit" name="tle_granit" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_karpet">Karpet</label>
                    </div>
                    <label class="switch" for="tle_karpet">
                    <input type="checkbox" id="tle_karpet" name="tle_karpet" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_keramik">Keramik</label>
                    </div>
                    <label class="switch" for="tle_keramik">
                    <input type="checkbox" id="tle_keramik" name="tle_keramik" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_rabat_beton">Rabat Beton (Semen Ekspose)</label>
                    </div>
                    <label class="switch" for="tle_rabat_beton">
                    <input type="checkbox" id="tle_rabat_beton" name="tle_rabat_beton" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_teraso">Teraso</label>
                    </div>
                    <label class="switch" for="tle_teraso">
                    <input type="checkbox" id="tle_teraso" name="tle_teraso" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_vynil">Vynil</label>
                    </div>
                    <label class="switch" for="tle_vynil">
                    <input type="checkbox" id="tle_vynil" name="tle_vynil" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tle_papan_kayu">Papan Kayu</label>
                    </div>
                    <label class="switch" for="tle_papan_kayu">
                    <input type="checkbox" id="tle_papan_kayu" name="tle_papan_kayu" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                    <label class="switch" for="ttle_tipe_material">
                    <input type="checkbox" id="ttle_tipe_material" name="ttle_tipe_material" class="switch-input"/>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                    </label>
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
                  <label class="switch" for="pb_listrik">
                  <input type="checkbox" id="pb_listrik" name="pb_listrik" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_telepon">Telepon</label>
                  </div>
                  <label class="switch" for="pb_telepon">
                  <input type="checkbox" id="pb_telepon" name="pb_telepon" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_pdam">PDAM</label>
                  </div>
                  <label class="switch" for="pb_pdam">
                  <input type="checkbox" id="pb_pdam" name="pb_pdam" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_gas">Gas</label>
                  </div>
                  <label class="switch" for="pb_gas">
                  <input type="checkbox" id="pb_gas" name="pb_gas" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_ac">AC</label>
                  </div>
                  <label class="switch" for="pb_ac">
                  <input type="checkbox" id="pb_ac" name="pb_ac" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
              </div> 
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="pb_sumur_gali">Sumur Gali/Pompa</label>
                  </div>
                  <label class="switch" for="pb_sumur_gali">
                  <input type="checkbox" id="pb_sumur_gali" name="pb_sumur_gali" class="switch-input"/>
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
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
                  <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Review -->
            <div id="review-submit" class="content">
  
              <p class="fw-medium mb-2">Step 1</p>
              <ul class="list-unstyled">
                <li>Username</li>
                <li>exampl@email.com</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Step 2</p>
              <ul class="list-unstyled">
                <li>First Name</li>
                <li>Last Name</li>
                <li>Country</li>
                <li>Language</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Step 3</p>
              <ul class="list-unstyled">
                <li>Address</li>
                <li>Landmark</li>
                <li>Pincode</li>
                <li>City</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Step 4</p>
              <ul class="list-unstyled">
                <li>https://twitter.com/abc</li>
                <li>https://facebook.com/abc</li>
                <li>https://plus.google.com/abc</li>
                <li>https://linkedin.com/abc</li>
              </ul>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Default Icons Wizard -->
  </div>
  


@endsection
