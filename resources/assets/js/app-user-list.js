/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }

  // Variable declaration for table
  var dt_user_table = $('.datatables-users'),
    select2 = $('.select2'),
    select3 = $('.select3'),
    select4 = $('.select4'),
    select5 = $('.select5'),
    userView = baseUrl + 'app/user/view/account',
    statusObj = {
      1: { title: 'Pending', class: 'bg-label-warning' },
      2: { title: 'Active', class: 'bg-label-success' },
      3: { title: 'Inactive', class: 'bg-label-secondary' }
    };

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Status',
      dropdownParent: $this.parent()
    });
  }
  if (select3.length) {
    var $this = select3;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role Structure',
      dropdownParent: $this.parent()
    });
  }
  if (select4.length) {
    var $this = select4;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role Access',
      dropdownParent: $this.parent()
    });
  }
  if (select5.length) {
    var $this = select5;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role',
      dropdownParent: $this.parent()
    });
  }

  // Users datatable
  if (dt_user_table.length) {
    var i = 1;
    var dt_user = dt_user_table.DataTable({
      ajax: 'users/list',
      columns: [
        // columns according to JSON

        { data: 'no' },
        { data: 'nama' },
        { data: 'email' },
        { data: 'rs_nama' },
        { data: 'ra_nama' },
        { data: 'role_nama' },
        { data: 'no_tlp' },
        { data: 'status' },
        { data: 'action' }
      ],
      columnDefs: [
        // {
        //   // For Responsive
        //   // className: 'no',
        //   // searchable: false,
        //   // orderable: false,
        //   // sortable: false,
        //   // responsivePriority: 0,
        //   targets: 0,
        //   render: function (data, type, full, meta) {
        //     return i++;
        //   }
        // },
        // {
        //   // User full name and email
        //   targets: 1,
        //   responsivePriority: 4,
        //   render: function (data, type, full, meta) {
        //     var $nama = full['nama'],
        //       $email = full['email'];
        //     // $image = full['avatar'];
        //     // if ($image) {
        //     //   // For Avatar image
        //     //   var $output =
        //     //     '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
        //     // } else {
        //     //   // For Avatar badge
        //     //   var stateNum = Math.floor(Math.random() * 6);
        //     //   var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
        //     //   var $state = states[stateNum],
        //     //     $name = full['full_name'],
        //     //     $initials = $name.match(/\b\w/g) || [];
        //     //   $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
        //     //   $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
        //     // }
        //     // Creates full output for row
        //     var $row_output =
        //       '<div class="d-flex justify-content-start align-items-center user-name">' +
        //       '<div class="avatar-wrapper">' +
        //       '<div class="avatar me-3">' +
        //       $output +
        //       '</div>' +
        //       '</div>' +
        //       '<div class="d-flex flex-column">' +
        //       '<a href="' +
        //       userView +
        //       '" class="text-body text-truncate"><span class="fw-medium">' +
        //       $nama +
        //       '</span></a>' +
        //       '<small class="text-muted">' +
        //       $email +
        //       '</small>' +
        //       '</div>' +
        //       '</div>';
        //     return $row_output;
        //   }
        // },
        // {
        //   // User Role
        //   targets: 7,
        //   render: function (data, type, full, meta) {
        //     var $role = full['status'];
        //     var roleBadgeObj = {
        //       Subscriber:
        //         '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="ti ti-user ti-sm"></i></span>',
        //       Author:
        //         '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="ti ti-circle-check ti-sm"></i></span>',
        //       Maintainer:
        //         '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="ti ti-chart-pie-2 ti-sm"></i></span>',
        //       Editor:
        //         '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="ti ti-edit ti-sm"></i></span>',
        //       Admin:
        //         '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="ti ti-device-laptop ti-sm"></i></span>'
        //     };
        //     return "<span class='text-truncate d-flex align-items-center'>" + roleBadgeObj[$role] + $role + '</span>';
        //   }
        // },
        // {
        //   // Plans
        //   targets: 3,
        //   render: function (data, type, full, meta) {
        //     var $plan = full['current_plan'];

        //     return '<span class="fw-medium">' + $plan + '</span>';
        //   }
        // },
        // {
        //   // User Status
        //   targets: 5,
        //   render: function (data, type, full, meta) {
        //     var $status = full['status'];

        //     return (
        //       '<span class="badge ' +
        //       statusObj[$status].class +
        //       '" text-capitalized>' +
        //       statusObj[$status].title +
        //       '</span>'
        //     );
        //   }
        // },
        {
          // Actions
          targets: 8,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center">' +
              '<a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>' +
              '<a href="javascript:;" class="text-body delete-record" data-id="' +
              full.id +
              '"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
              '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="' +
              userView +
              '" class="dropdown-item">View</a>' +
              '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      // order: [[1, 'asc']],
      dom:
        '<"row me-2"' +
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
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
          text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-2" ></i>Print',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be print
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
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
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]
        },
        {
          text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span>',
          className: 'add-new btn btn-primary waves-effect waves-light',
          attr: {
            'data-bs-toggle': 'offcanvas',
            'data-bs-target': '#offcanvasAddUser'
          }
        }
      ],
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
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(1)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Nama </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Role Structure </option></select>'
            )
              .appendTo('.user_plan')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding status filter once table initialized
        this.api()
          .columns(6)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.user_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
      }
    });
  }

  // Delete Record
  $('.datatables-users tbody').on('click', '.delete-record', function () {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert user!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Suspend user!',
      customClass: {
        confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: '/users/deleteProses/' + id,
          success: function (response) {
            if (response.success == true) {
              dt_user.row($(this).parents('tr')).remove().draw();
              Swal.fire({
                position: 'bottom-right',
                toast: true,
                icon: 'success',
                title: 'Success',
                text: `${response.message}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                backgroundColor: '#28a745',
                titleColor: '#fff'
              });
              $('.datatables-users').DataTable().ajax.reload();
              // location.reload();
            }
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'Cancelled Suspension :)',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success waves-effect waves-light'
          }
        });
      }
    });
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

// Validation & Phone mask
(function () {
  // const phoneMaskList = document.querySelectorAll('.phone-mask'),
  addNewUserForm = document.getElementById('addNewUserForm');

  // Phone Number
  // if (phoneMaskList) {
  //   phoneMaskList.forEach(function (phoneMask) {
  //     new Cleave(phoneMask, {
  //       phone: true,
  //       phoneRegionCode: 'US'
  //     });
  //   });
  // }
  // Add New User Form Validation
  const fv = FormValidation.formValidation(addNewUserForm, {
    fields: {
      nama: {
        validators: {
          notEmpty: {
            message: 'Please enter fullname'
          }
        }
      },
      nik: {
        validators: {
          notEmpty: {
            message: 'Please enter nik'
          }
        }
      },
      status: {
        validators: {
          notEmpty: {
            message: 'Please enter status'
          }
        }
      },

      alamat: {
        validators: {
          notEmpty: {
            message: 'Please enter Alamat'
          }
        }
      },
      password: {
        validators: {
          notEmpty: {
            message: 'Please enter password'
          },
          stringLength: {
            min: 4,
            message: 'Password must be more than 4 characters'
          }
        }
      },
      no: {
        validators: {
          notEmpty: {
            message: 'Please enter Contact'
          },
          stringLength: {
            min: 11,
            message: 'Contact must be more than 11 characters'
          }
        }
      },
      email: {
        validators: {
          notEmpty: {
            message: 'Please enter your email'
          },
          emailAddress: {
            message: 'The value is not a valid email address'
          }
        }
      },
      role_structure: {
        validators: {
          notEmpty: {
            message: 'Please enter Role Structure'
          }
        }
      },
      role_access: {
        validators: {
          notEmpty: {
            message: 'Please enter Role Access'
          }
        }
      },
      role: {
        validators: {
          notEmpty: {
            message: 'Please enter Role'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: '',
        rowSelector: function (field, ele) {
          // field is the field name & ele is the field element
          return '.mb-3';
        }
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      // Submit the form when all fields are valid
      // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  });
})();
