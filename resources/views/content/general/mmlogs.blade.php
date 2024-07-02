@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite('resources/assets/js/app-users-logs-activity.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>All</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_mmlogs->total }}</h3>
                                {{-- <p class="text-success mb-0">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-user ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Super Admin</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_raSuperAdmin->total }}</h3>
                                {{-- <p class="text-success mb-0">(+42%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-user-exclamation ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Admin</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_raAdmin->total }}</h3>
                                {{-- <p class="text-success mb-0">(+18%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-plus ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_rausers->total }}</h3>
                                {{-- <p class="text-danger mb-0">(-14%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 mmName"></div>
                    <div class="col-md-3 mmRole"></div>
                    <div class="col-md-3 mmRoleAccess"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger me-sm-3 me-1 data-submit"
                            id="resetAllMmLogs">Reset</button></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table datatable-users-activity border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>Role structure</th>
                            <th>Role Access</th>
                            <th>Role</th>
                            <th>Activity</th>
                            <th>Action</th>
                            <th>Ip</th>
                            <th>Crated</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Offcanvas to add new user -->
            <!--/ Edit User Modal -->
        </div>
        <div class="modal fade" id="DetailUSers" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5" style="background-color: transparent;">
                    <div class="modal-body">
                        <div class="row">

                            <!-- User Sidebar -->
                            <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                                <!-- User Card -->
                                <div class="card mb-12">
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button> --}}
                                    <div class="card-body">


                                        <div class="user-avatar-section">
                                            <div class=" d-flex align-items-center flex-column">
                                                <div id="image">

                                                </div>
                                                <div class="user-info text-center">
                                                    <h4 class="mb-2" id="full_name"></h4>
                                                    <span class="badge bg-label-secondary mt-1" id="rs_name"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                                            <div class="d-flex align-items-start me-4 mt-3 gap-2">
                                                <span class="badge bg-label-primary p-2 rounded"><i
                                                        class='ti ti-checkbox ti-sm'></i></span>
                                                <div>
                                                    <p class="mb-0 fw-medium">1.23k</p>
                                                    <small>Tasks Done</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mt-3 gap-2">
                                                <span class="badge bg-label-primary p-2 rounded"><i
                                                        class='ti ti-briefcase ti-sm'></i></span>
                                                <div>
                                                    <p class="mb-0 fw-medium">568</p>
                                                    <small>Projects Done</small>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-4 small text-uppercase text-muted">Details</p>
                                        <div class="info-container">
                                            <ul class="list-unstyled ">
                                                <li class="mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Nik:</span>
                                                        <span id="nik"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Email:</span>
                                                        <span id="email"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Kontak:</span>
                                                        <span id="kontak"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Role Structure:</span>
                                                        <span id="rs_name"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Role Access:</span>
                                                        <span id="ra_name"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Role:</span>
                                                        <span id="role_name"></span>
                                                    </div>
                                                </li>
                                                <li class="mb-2 pt-1 d-flex justify-content-between" id="status">

                                                </li>
                                                <li class="mb-2 pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-medium me-1">Alamat:</span>
                                                        <span id="alamat"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function OpenModalDetailUsers(uid, image, nik, name, email, kontak, rs_name, ra_name, role_name, status, alamat) {
            $('#DetailUSers').modal('show');
            $('#nik').text(nik);
            $('#name').text(name);
            $('#email').text(email);
            $('#kontak').text(kontak);
            $('#rs_name').text(rs_name);
            $('#ra_name').text(ra_name);
            $('#role_name').text(role_name);
            var html = '<span class="fw-medium me-1">Status:</span>';
            if (status == 'ACTIVE') {
                $('#status').html('' + html + '<span class="badge bg-label-success">' + status + '</span>');
            }
            if (status == 'INACTIVE') {
                $('#status').html('' + html + '<span class="badge bg-label-warning">' + status + '</span>');
            }
            if (status == 'SUSPENDED') {
                $('#status').html('' + html + '<span class="badge bg-label-danger">' + status + '</span>');
            }

            $('#image').html(
                '<img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('') }}storage/images/users/' + image +
                '" height="100" width="100" alt="User avatar" />'
            );
            $('#alamat').text(alamat);

        }
        $(document).ready(function() {
            $('#resetAllMmLogs').click(function() {
                $('[type="search"]').val('').trigger('keyup');
                $('#mmName').val('').trigger('change');
                $('#mmRole').val('').trigger('change');
                $('#mmRoleAccess').val('').trigger('change');
            });
        })
    </script>
@endsection
