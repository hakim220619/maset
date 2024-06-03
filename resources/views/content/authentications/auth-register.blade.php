@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth.js'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y ">
            <div class="authentication-inner py-4 ">
                <!-- Register Card -->
                <div class="row">
                    <div class="card mb-12">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">@include('_partials.macros', [
                                        'height' => 20,
                                        'withbg' => 'fill: #fff;',
                                    ])</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="app-brand justify-content-center mb-4 mt-2">Adventure starts here 🚀</h4>
                            <p class="app-brand justify-content-center mb-4 mt-2">Make your app management easy and fun!</p>

                            <form id="formAuthentication" class="mb-3 row" action="{{ url('/auth/register') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="nik" class="form-label">Nik</label>
                                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16"
                                        placeholder="Enter your Nik" autofocus>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" autofocus>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        onchange="chekEmailAktif(this.value)" placeholder="Enter your email">
                                </div>
                                <div class="mb-3 col-12 col-md-6 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Entitas</label>
                                    <select id="role_structure" name="role_structure" class="select3 form-select"
                                        aria-label="Default select example" onchange="changeRole()">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($role_structure as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="Jl hr**"
                                        name="image" aria-label="Jl hr**" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="kontak">Kontak</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control phone-mask"
                                        maxlength="15"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        placeholder="+62 8579" aria-label="john.doe@example.com" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Jl hr**"
                                        name="alamat" aria-label="Jl hr**" />
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms-conditions"
                                            name="terms">
                                        <label class="form-check-label" for="terms-conditions">
                                            I agree to
                                            <a href="javascript:void(0);">privacy policy & terms</a>
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    Sign up
                                </button>
                            </form>

                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="{{ url('auth/login-basic') }}">
                                    <span>Sign in instead</span>
                                </a>
                            </p>

                            <div class="divider my-4">
                                <div class="divider-text">or</div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                    <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                                    <i class="tf-icons fa-brands fa-google fs-5"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                    <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Register Card -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function chekEmailAktif(email) {
            console.log(email);
            $.ajax({
                url: '/chekEmail',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email
                },
                contentType: false,
                processData: false,
                dataType: 'json',
                type: 'POST',
                success: function(data) {
                    console.log(data);
                    if (data.success == true) {
                        // $('#openModalAddUsers').modal('hide');
                        // Swal.fire({
                        //     width: 400,
                        //     padding: 7,
                        //     position: 'bottom-right',
                        //     toast: true,
                        //     icon: 'success',
                        //     title: 'Success',
                        //     text: `${data.message}`,
                        //     showConfirmButton: false,
                        //     timer: 3000,
                        //     timerProgressBar: true,
                        //     backgroundColor: '#28a745',
                        //     titleColor: '#fff',
                        // });
                        // $('.datatables-users').DataTable().ajax.reload();
                    }
                }
            });

        }
    </script>
@endsection
