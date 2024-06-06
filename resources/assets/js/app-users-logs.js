/**
 * App User View - Account (jquery)
 */

$(function () {
  'use strict';

  // Variable declaration for table
  var dt_project_table = $('.datatable-users-activity');

  // Project datatable
  // --------------------------------------------------------------------
  if (dt_project_table.length) {
    var dt_project = dt_project_table.DataTable({
      ajax: 'setting/listUsersLogs', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'no' },
        { data: 'name' },
        { data: 'activity' },
        { data: 'action' },
        { data: 'ip' },
        { data: 'created_at' }
      ],
      columnDefs: [
        // {
        //   // For Responsive
        //   className: 'control',
        //   searchable: false,
        //   orderable: false,
        //   responsivePriority: 2,
        //   targets: 0,
        //   render: function (data, type, full, meta) {
        //     return '';
        //   }
        // }
        // {
        //   // User full name and email
        //   targets: 1,
        //   responsivePriority: 1,
        //   render: function (data, type, full, meta) {
        //     var $name = full['project_name'],
        //       $framework = full['framework'],
        //       $image = full['project_image'];
        //     if ($image) {
        //       // For Avatar image
        //       var $output =
        //         '<img src="' +
        //         assetsPath +
        //         'img/icons/brands/' +
        //         $image +
        //         '" alt="Project Image" class="rounded-circle">';
        //     } else {
        //       // For Avatar badge
        //       var stateNum = Math.floor(Math.random() * 6) + 1;
        //       var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
        //       var $state = states[stateNum],
        //         $name = full['full_name'],
        //         $initials = $name.match(/\b\w/g) || [];
        //       $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
        //       $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
        //     }
        //     // Creates full output for row
        //     var $row_output =
        //       '<div class="d-flex justify-content-left align-items-center">' +
        //       '<div class="avatar-wrapper">' +
        //       '<div class="avatar avatar-sm me-3">' +
        //       $output +
        //       '</div>' +
        //       '</div>' +
        //       '<div class="d-flex flex-column">' +
        //       '<span class="text-truncate fw-medium">' +
        //       $name +
        //       '</span>' +
        //       '<small class="text-muted">' +
        //       $framework +
        //       '</small>' +
        //       '</div>' +
        //       '</div>';
        //     return $row_output;
        //   }
        // },
        // {
        //   targets: 2,
        //   orderable: false
        // },
        // {
        //   // Label
        //   targets: 3,
        //   responsivePriority: 3,
        //   render: function (data, type, full, meta) {
        //     var $progress = full['progress'] + '%',
        //       $color;
        //     switch (true) {
        //       case full['progress'] < 25:
        //         $color = 'bg-danger';
        //         break;
        //       case full['progress'] < 50:
        //         $color = 'bg-warning';
        //         break;
        //       case full['progress'] < 75:
        //         $color = 'bg-info';
        //         break;
        //       case full['progress'] <= 100:
        //         $color = 'bg-success';
        //         break;
        //     }
        //     return (
        //       '<div class="d-flex flex-column"><small class="mb-1">' +
        //       $progress +
        //       '</small>' +
        //       '<div class="progress w-100 me-3" style="height: 6px;">' +
        //       '<div class="progress-bar ' +
        //       $color +
        //       '" style="width: ' +
        //       $progress +
        //       '" aria-valuenow="' +
        //       $progress +
        //       '" aria-valuemin="0" aria-valuemax="100"></div>' +
        //       '</div>' +
        //       '</div>'
        //     );
        //   }
        // },
        // {
        //   targets: 4,
        //   orderable: false
        // }
      ],
      //   order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row"' +
        '<"col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center"l>' +
        '<"col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center"f>' +
        '>t' +
        '<"d-flex justify-content-between mx-4 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      displayLength: 8,
      lengthMenu: [8, 10, 25, 50, 75, 100],
      language: {
        sLengthMenu: 'Show _MENU_',
        // search: '',
        searchPlaceholder: 'Search Project'
      }
      // For responsive popup
      //   responsive: {
      //     details: {
      //       display: $.fn.dataTable.Responsive.display.modal({
      //         header: function (row) {
      //           var data = row.data();
      //           return 'Details of ' + data['full_name'];
      //         }
      //       }),
      //       type: 'column',
      //       renderer: function (api, rowIdx, columns) {
      //         var data = $.map(columns, function (col, i) {
      //           return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
      //             ? '<tr data-dt-row="' +
      //                 col.rowIndex +
      //                 '" data-dt-column="' +
      //                 col.columnIndex +
      //                 '">' +
      //                 '<td>' +
      //                 col.title +
      //                 ':' +
      //                 '</td> ' +
      //                 '<td>' +
      //                 col.data +
      //                 '</td>' +
      //                 '</tr>'
      //             : '';
      //         }).join('');

      //         return data ? $('<table class="table"/><tbody />').append(data) : false;
      //       }
      //     }
      //   }
    });
  }
});
