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
    @vite('resources/assets/js/app-user-list.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_users }}</h3>
                                {{-- <p class="text-success mb-0">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                            <span>Status Active</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_active }}</h3>
                                {{-- <p class="text-success mb-0">(+42%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                            <span>Status Inactive</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_inactive }}</h3>
                                {{-- <p class="text-success mb-0">(+18%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                            <span>Status Suspended</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_suspended }}</h3>
                                {{-- <p class="text-danger mb-0">(-14%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                    <thead class="border-top">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role Structure</th>
                            <th>Role Access</th>
                            <th>Role Users</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="modal fade" id="openModalAddUsers" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add User</h3>
                                <p class="text-muted">Add user will receive a privacy audit.</p>
                            </div>
                            <form class="row add-new-user pt-0" id="addNewUserForm">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nik">Nik</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        placeholder="330206**" name="userFullname" aria-label="330206**" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="John Doe" name="userFullname" aria-label="John Doe" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" class="form-control"
                                        placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                        name="email" />
                                </div>
                                <div class="mb-3 col-12 col-md-6 form-password-toggle">
                                    <label class="form-label" for="newPassword">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="no">Contact</label>
                                    <input type="text" id="no" name="no" class="form-control phone-mask"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        placeholder="+62 8579" aria-label="john.doe@example.com" name="no" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="status" name="status" class="select2 form-select">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getStatus() as $r)
                                            <option value="{{ $r->status_nama }}">
                                                {{ $r->status_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Role Structure</label>
                                    <select id="role_structure" name="role_structure" class="select3 form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRoleStructure() as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_access">Role Access</label>
                                    <select id="role_access" name="role_access" class="select4 form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRoleaccess() as $r)
                                            <option value="{{ $r->ra_id }}">
                                                {{ $r->ra_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role">Role</label>
                                    <select id="role" name="role" class="select5 form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRole() as $r)
                                            <option value="{{ $r->role_id }}">
                                                {{ $r->role_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="Jl hr**"
                                        name="image" aria-label="Jl hr**" />
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Jl hr**"
                                        name="alamat" aria-label="Jl hr**" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                                        id="submitUsers" onclick="SaveUsers()">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Edit User</h3>
                                <p class="text-muted">Updating user details will receive a privacy audit.</p>
                            </div>
                            <form class="row g-3">
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Nik</label>
                                    <input type="text" id="nikEdit" name="nik" class="form-control"
                                        placeholder="330206****" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" id="namaEdit" name="nama" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="emailEdit" name="email" class="form-control"
                                        placeholder="example@domain.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="no_tlp">Contact</label>
                                    <input type="text" id="noEdit" name="no_tlp" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="statusEdit" name="status" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getStatus() as $r)
                                            <option value="{{ $r->status_nama }}">
                                                {{ $r->status_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Role Structure</label>
                                    <select id="role_structureEdit" name="role_structure" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRoleStructure() as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role_access">Role Access</label>
                                    <select id="role_accessEdit" name="role_access" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRoleaccess() as $r)
                                            <option value="{{ $r->ra_id }}">
                                                {{ $r->ra_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role">Role</label>
                                    <select id="roleEdit" name="role" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRole() as $r)
                                            <option value="{{ $r->role_id }}">
                                                {{ $r->role_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" id="imageEdit" name="image" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" id="alamatEdit" name="alamat" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" onclick="EditUsers()"
                                        class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->

        </div>
        {{-- <script>
           
        </script> --}}
        <script>
            function OpenModalEditUsers(id, nik, nama, email, no_tlp, role_structure, role_access, role, status, alamat) {
                $('#editUser').modal('show');
                $('#idEdit').val(id);
                $('#nikEdit').val(nik);
                $('#namaEdit').val(nama);
                $('#emailEdit').val(email);
                $('#noEdit').val(no_tlp);
                $('#statusEdit').val(status);
                $('#role_structureEdit').val(role_structure);
                $('#role_accessEdit').val(role_access);
                $('#roleEdit').val(role);
                $('#alamatEdit').val(alamat);
            }
        </script>
        <script>
            function SaveUsers() {
                let nik = $('#nik').val();
                let nama = $('#nama').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let no = $('#no').val();
                let status = $('#status').val();
                let role_structure = $('#role_structure').val();
                let role_access = $('#role_access').val();
                let role = $('#role').val();
                let alamat = $('#alamat').val();
                var fd = new FormData();

                // var file_data = object.get(0).files[i];
                var other_data = $('form').serialize();
                fd.append('nik', nik);
                fd.append('nama', nama);
                fd.append('email', email);
                fd.append('password', password);
                fd.append('no', no);
                fd.append('status', status);
                fd.append('role_structure', role_structure);
                fd.append('role_access', role_access);
                fd.append('role', role);
                fd.append('alamat', alamat);
                fd.append('image', $('input[type=file]')[0].files[0]);

                if (nik === '' || nama === '' || email === '' || password === '' || no === '' || status === '' ||
                    role_structure === '' || role_access === '' || role === '' || alamat === '') {
                    console.log('error');
                } else {
                    $.ajax({
                        url: '/users/addProses',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        type: 'POST',
                        success: function(data) {
                            console.log(data);
                            if (data.success == true) {
                                $('#openModalAddUsers').modal('hide');
                                Swal.fire({
                                    width: 400,
                                    padding: 7,
                                    position: 'bottom-right',
                                    toast: true,
                                    icon: 'success',
                                    title: 'Success',
                                    text: `${data.message}`,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    backgroundColor: '#28a745',
                                    titleColor: '#fff',
                                });
                                $('.datatables-users').DataTable().ajax.reload();
                            }
                        }
                    });
                }
            }

            function EditUsers() {
                let id = $('#idEdit').val();
                let nik = $('#nikEdit').val();
                let nama = $('#namaEdit').val();
                let email = $('#emailEdit').val();
                let no = $('#noEdit').val();
                let status = $('#statusEdit').val();
                let role_structure = $('#role_structureEdit').val();
                let role_access = $('#role_accessEdit').val();
                let role = $('#roleEdit').val();
                let alamat = $('#alamatEdit').val();
                var fd = new FormData();

                // var file_data = object.get(0).files[i];
                var other_data = $('form').serialize();
                fd.append('id', id);
                fd.append('nik', nik);
                fd.append('nama', nama);
                fd.append('email', email);
                fd.append('no_tlp', no);
                fd.append('status', status);
                fd.append('role_structure', role_structure);
                fd.append('role_access', role_access);
                fd.append('role', role);
                fd.append('alamat', alamat);
                fd.append('image', $('#imageEdit')[0].files[0]);
                // console.log(fd);
                if (nik === '' || nama === '' || email === '' || no === '' || status === '' ||
                    role_structure === '' || role_access === '' || role === '' || alamat === '') {
                    console.log('error');
                } else {
                    $.ajax({
                        url: '/users/updateProses',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        type: 'POST',
                        success: function(data) {
                            console.log(data);
                            if (data.success == true) {
                                $('#editUser').modal('hide');
                                Swal.fire({
                                    width: 400,
                                    padding: 7,
                                    position: 'bottom-right',
                                    toast: true,
                                    icon: 'success',
                                    title: 'Success',
                                    text: `${data.message}`,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    backgroundColor: '#28a745',
                                    titleColor: '#fff',
                                });
                                $('.datatables-users').DataTable().ajax.reload();
                            }
                        }
                    });
                }
            }
        </script>

    @endsection
