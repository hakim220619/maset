@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')
@section('title', 'User View - Pages')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection
@section('content')

    <div class="card">
        <div class="card-header border-bottom">
            {{-- <h5 class="card-title mb-3">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <div class="col-md-3 user_role"></div>
                <div class="col-md-3 user_plan"></div>
                <div class="col-md-3 user_status"></div>
                <div class="col-md-2 user_active"></div>
                <div class="col-md-1"><button type="button" class="btn btn-danger me-sm-3 me-1 data-submit"
                        id="resetAll">Reset</button></div>
            </div> --}}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-tanah-kosong-view table">
                <thead class="border-top">
                    <tr>
                        <th>No</th>
                        <th>Id Asset</th>
                        <th>Nis</th>
                        <th>Nib</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        var dt_role_structure_table = $('.datatables-tanah-kosong-view');

        // Users datatable
        if (dt_role_structure_table.length) {
            var dt_user = dt_role_structure_table.DataTable({
                ajax: '/object/tanahKosongLoadData',
                columns: [
                    // columns according to JSON
                    {
                        data: 'no'
                    },
                    {
                        data: 'id_asset'
                    },
                    {
                        data: 'nia'
                    },
                    {
                        data: 'nib'
                    }
                ],
                columnDefs: [
                    // {
                    //   // User Status
                    //   targets: 2,
                    //   render: function (data, type, full, meta) {
                    //     var status = full['status'];
                    //     var dataStatus = '';
                    //     if (status == 'ON') {
                    //       dataStatus = '<span class="badge bg-label-success">' + status + '</span>';
                    //     }
                    //     if (status == 'OFF') {
                    //       dataStatus = '<span class="badge bg-label-danger">' + status + '</span>';
                    //     }
                    //     return dataStatus;
                    //   }
                    // },
                    // {
                    //     // Actions
                    //     targets: 4,
                    //     title: 'Actions',
                    //     searchable: false,
                    //     orderable: false,
                    //     render: function(data, type, full, meta) {
                    //         // console.log(full);
                    //         return (
                    //             '<div class="d-flex align-items-center">' +
                    //             '<a href="/broadcast/aplikasiUpdate/' +
                    //             full.id +
                    //             '" class="text-body" ><i class="ti ti-edit ti-sm me-2"></i></a>' +
                    //             '<a href="javascript:;" class="text-body delete-record" data-id="' +
                    //             full.id +
                    //             '"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                    //             '</div>'
                    //         );
                    //     }
                    // }
                ],
                // order: [[1, 'asc']],
                dom: '<"row me-2"' +
                    '<"col-md-2"<"me-3"l>>' +
                    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                language: {
                    sLengthMenu: '_MENU_',
                    search: '',
                    searchPlaceholder: 'Search..'
                },
                // Buttons with Dropdown
                buttons: [{
                    extend: 'collection',
                    className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
                    text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                    buttons: [{
                            extend: 'print',
                            text: '<i class="ti ti-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be print
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function(index, item) {
                                            if (item.classList !==
                                                undefined && item
                                                .classList.contains(
                                                    'user-name')) {
                                                result = result +
                                                    item.lastChild
                                                    .firstChild
                                                    .textContent;
                                            } else if (item
                                                .innerText ===
                                                undefined) {
                                                result = result +
                                                    item
                                                    .textContent;
                                            } else result = result +
                                                item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            },
                            customize: function(win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', headingColor)
                                    .css('border-color', borderColor)
                                    .css('background-color', bodyBg);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function(index, item) {
                                            if (item.classList !==
                                                undefined && item
                                                .classList.contains(
                                                    'user-name')) {
                                                result = result +
                                                    item.lastChild
                                                    .firstChild
                                                    .textContent;
                                            } else if (item
                                                .innerText ===
                                                undefined) {
                                                result = result +
                                                    item
                                                    .textContent;
                                            } else result = result +
                                                item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function(index, item) {
                                            if (item.classList !==
                                                undefined && item
                                                .classList.contains(
                                                    'user-name')) {
                                                result = result +
                                                    item.lastChild
                                                    .firstChild
                                                    .textContent;
                                            } else if (item
                                                .innerText ===
                                                undefined) {
                                                result = result +
                                                    item
                                                    .textContent;
                                            } else result = result +
                                                item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function(index, item) {
                                            if (item.classList !==
                                                undefined && item
                                                .classList.contains(
                                                    'user-name')) {
                                                result = result +
                                                    item.lastChild
                                                    .firstChild
                                                    .textContent;
                                            } else if (item
                                                .innerText ===
                                                undefined) {
                                                result = result +
                                                    item
                                                    .textContent;
                                            } else result = result +
                                                item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-2" ></i>Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function(inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function(index, item) {
                                            if (item.classList !==
                                                undefined && item
                                                .classList.contains(
                                                    'user-name')) {
                                                result = result +
                                                    item.lastChild
                                                    .firstChild
                                                    .textContent;
                                            } else if (item
                                                .innerText ===
                                                undefined) {
                                                result = result +
                                                    item
                                                    .textContent;
                                            } else result = result +
                                                item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        }
                    ]
                }]
                // For responsive popup
                // responsive: {
                //   details: {
                //     display: $.fn.dataTable.Responsive.display.modal({
                //       header: function (row) {
                //         var data = row.data();
                //         return 'Details of ' + data['nama'];
                //       }
                //     }),
                //     type: 'column',
                //     renderer: function (api, rowIdx, columns) {
                //       var data = $.map(columns, function (col, i) {
                //         return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                //           ? '<tr data-dt-row="' +
                //               col.rowIndex +
                //               '" data-dt-column="' +
                //               col.columnIndex +
                //               '">' +
                //               '<td>' +
                //               col.title +
                //               ':' +
                //               '</td> ' +
                //               '<td>' +
                //               col.data +
                //               '</td>' +
                //               '</tr>'
                //           : '';
                //       }).join('');

                //       return data ? $('<table class="table"/><tbody />').append(data) : false;
                //     }
                //   }
                // },
            });
        }
    </script>
@endsection
