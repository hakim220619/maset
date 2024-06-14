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
<h4>Lihat Object</h4>
  <div class="row">  
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Ringkasan Object</h5>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Object</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>Tanah dan Bangunan</td>
                        <td>{{ $bangunan }}</td>
                    </tr>
                    <tr>
                        <td>Tanah Kosong</td>
                        <td>{{ $tanah_kosong }}</td>
                    </tr>
                    <tr>
                        <td>Office/Retai/Aset</td>
                        <td>{{ $retail }}</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Responsive Datatable -->
        <div class="card mt-5">
            <h5 class="card-header">Tabel Object</h5>
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Post</th>
                            <th>City</th>
                            <th>Date</th>
                            <th>Salary</th>
                            <th>Age</th>
                            <th>Experience</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                                <td>halo</td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Post</th>
                            <th>City</th>
                            <th>Date</th>
                            <th>Salary</th>
                            <th>Age</th>
                            <th>Experience</th>
                            <th>Status</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
        </div>
        <!--/ Responsive Datatable -->

                   
    </div>
 
@endsection
