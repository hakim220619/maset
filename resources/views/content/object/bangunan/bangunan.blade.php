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
              <span class="bs-stepper-label">Account Details</span>
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
              <span class="bs-stepper-label">Personal Info</span>
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
              <span class="bs-stepper-label">Address</span>
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
              <span class="bs-stepper-label">Social Links</span>
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
                <h6 class="mb-0">Account Details</h6>
                <small>Enter Your Account Details.</small>
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
                <h6 class="mb-0">Personal Info</h6>
                <small>Enter Your Personal Info.</small>
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
                <h6 class="mb-0">Address</h6>
                <small>Enter Your Address.</small>
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
                <h6 class="mb-0">Social Links</h6>
                <small>Enter Your Social Links.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label" for="twitter">Twitter</label>
                  <input type="text" id="twitter" class="form-control" placeholder="https://twitter.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="facebook">Facebook</label>
                  <input type="text" id="facebook" class="form-control" placeholder="https://facebook.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="google">Google+</label>
                  <input type="text" id="google" class="form-control" placeholder="https://plus.google.com/abc" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="linkedin">Linkedin</label>
                  <input type="text" id="linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
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
  
              <p class="fw-medium mb-2">Account</p>
              <ul class="list-unstyled">
                <li>Username</li>
                <li>exampl@email.com</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Personal Info</p>
              <ul class="list-unstyled">
                <li>First Name</li>
                <li>Last Name</li>
                <li>Country</li>
                <li>Language</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Address</p>
              <ul class="list-unstyled">
                <li>Address</li>
                <li>Landmark</li>
                <li>Pincode</li>
                <li>City</li>
              </ul>
              <hr>
              <p class="fw-medium mb-2">Social Links</p>
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
