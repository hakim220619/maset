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
@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            populateTable();

            // Form submission event
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();
                addTableRow();
            });
            $('#addHeaderModalOpt').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('#modalId').val(id);
            });
        });

        function populateTable() {
            const tableBody = document.querySelector('#masterTable tbody');

            // Fetch data using AJAX
            fetch('/options/listDataOptions')
                .then(response => response.json())
                .then(data => {

                    const groupedData = data.data.reduce((acc, rowData) => {
                        if (!acc[rowData.label_header]) {
                            acc[rowData.label_header] = [];
                        }
                        acc[rowData.label_header].push(rowData);
                        return acc;
                    }, {});

                    for (const header in groupedData) {

                        const headerRow = document.createElement('tr');
                        headerRow.innerHTML = `
                            <td colspan="5" style="background: #e1e1e1;"><strong>${header}</strong></td>
                            <td style="background: #e1e1e1;">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addHeaderModalOpt" data-id="${header}">
                                    <i class="fas fa-plus"></i>
                                </button>

                            </td>   
                        `;
                        tableBody.appendChild(headerRow);

                        groupedData[header].forEach(rowData => {
                            const row = document.createElement('tr');
                            if (rowData.type === 'Options') {
                                row.innerHTML = `
                                    <td></td>
                                    <td>${rowData.label_option}</td>
                                    <td>${rowData.type}</td>
                                    <td>${rowData.state}</td>
                                    <td>${rowData.created_at}</td>
                                    <td><a href="javascript:;" class="btn btn-sm btn-icon item-edit" ><i class="text-primary ti ti-pencil"></i></a></td>
                                `;
                            }
                            tableBody.appendChild(row);

                        });
                    }

                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Failed to fetch data. Please try again later.');
                });
        }


        function saveHeaderData() {
            const header = document.querySelector('#header').value;
            const state = document.querySelector('#state').value;

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
                        location.reload();
                    } else {
                        alert('Failed to save data. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving data:', error);
                    alert('Failed to save data. Please try again later.');
                });
        }

        function submitModalForm() {
            const modalOption = document.querySelector('#modalOption').value;
            const modalState = document.querySelector('#modalState').value;
            const modalId = document.querySelector('#modalId').value;

            fetch('/options/saveOptions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        option: modalOption,
                        state: modalState,
                        id: modalId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        // Close the modal
                        $('#addHeaderModalOpt').modal('hide');
                        location.reload();

                        // Clear the form
                        document.querySelector('#addHeaderForm').reset();

                        // Add the new data to the table without refreshing
                        // addNewRowToTable(modalId, modalHeader, modalState, data.created_at);
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
@endsection

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
                            <input type="text" class="form-control" id="header" name="header"
                                placeholder="Masukkan Header" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-control" id="state" name="state">
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
                        <input type="hidden" id="modalId" name="id">
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
                    <!-- Table data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Row grouping -->
@endsection
