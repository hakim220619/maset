@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

<!-- Page Scripts -->


@section('content')
    <div class="card">
        <!-- Form Section -->
        <div class="card-header">
            <h5 class="card-title">Form Add Header</h5>
            <form method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header" class="form-label">Header</label>
                            <input type="text" class="form-control" id="headerHdr" name="header"
                                placeholder="Masukkan Header" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-control" id="stateHdr" name="state">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="saveHeaderData()">Submit</button>
            </form>
        </div>
    </div>
    <!-- Add Header Modal -->
    <div class="modal fade" id="addHeaderModalOpt" tabindex="-1" role="dialog" aria-labelledby="addHeaderModalOptLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHeaderModalOptLabel">Add Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addHeaderForm">
                        @csrf
                        <div class="form-group">
                            <label for="modalOption" class="form-label">Option</label>
                            <input type="text" class="form-control" id="modalOption" name="option"
                                placeholder="Masukkan Option" required>
                        </div>
                        <div class="form-group">
                            <label for="modalState" class="form-label">State</label>
                            <select class="form-control" id="modalState" name="state">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <input type="text" id="modalId" name="id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitModalForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Row grouping -->
    <div class="card mt-4">
        <h5 class="card-header">Master Data</h5>
        <div class="card-datatable table-responsive">
            <table id="masterTable" class="dt-row-grouping table">
                <thead>
                    <tr>
                        <th>Label Header</th>
                        <th>Label Options</th>
                        <th>Type</th>
                        <th>State</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iterasi foreach untuk dataOptions -->
                    @foreach ($dataOptions as $a)
                        @if ($a->type == 'Header')
                            <tr class="group-header" style="background: #e1e1e1;">
                                <th>{{ $a->label_header }}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><button class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addHeaderModalOpt{{ $a->label_header }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                            <div class="modal fade" id="addHeaderModalOpt{{ $a->label_header }}" tabindex="-1"
                                role="dialog" aria-labelledby="addHeaderModalOptLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addHeaderModalOptLabel">Add Header</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/options/saveOptions" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="modalOption" class="form-label">Option</label>
                                                    <input type="text" class="form-control" id="modalOptionOpt"
                                                        name="option" placeholder="Masukkan Option" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="modalState" class="form-label">State</label>
                                                    <select class="form-control" id="modalStateOpt" name="state">
                                                        <option value="ON">ON</option>
                                                        <option value="OFF">OFF</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" id="modalIdOpt" value="{{ $a->label_header }}"
                                                    name="id">
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <tr>
                                <td></td>
                                <td>{{ $a->label_option }}</td>
                                <td>{{ $a->type }}</td>
                                <td>{{ $a->state }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                            class="text-primary ti ti-pencil"></i></a>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#masterTable').DataTable({
                responsive: true,
                rowGroup: {
                    dataSrc: 'label_header'
                },
                columnDefs: [{
                        targets: [0],
                        visible: false
                    }, // Hide the column with label_header to use it for grouping
                ],
                order: [
                    [0, 'asc']
                ],
            });
            $('.group-header').click(function() {
                $(this).toggleClass('collapsed');
                $(this).nextUntil('.group-header').toggle();
            });

        });

        function saveHeaderData() {
            const header = $('#headerHdr').val();
            const state = $('#stateHdr').val();
            console.log(header);
            console.log(state);

            fetch('/options/saveHeaderOptions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        header: header,
                        state: state
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload() // Reload the table data after successful save
                    } else {
                        alert('Failed to save data. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving data:', error);
                    alert('Failed to save data. Please try again later.');
                });
        }
    </script>
    <!--/ Row grouping -->
@endsection
