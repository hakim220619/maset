var groupColumn = 2;
if (dt_row_grouping_table.length) {
  var groupingTable = dt_row_grouping_table.DataTable({
    ajax: assetsPath + 'json/table-datatable.json',
    columns: [
      { data: '' },
      { data: 'full_name' },
      { data: 'post' },
      { data: 'email' },
      { data: 'city' },
      { data: 'start_date' },
      { data: 'salary' },
      { data: 'status' },
      { data: '' }
    ],
    columnDefs: [
      {
        // For Responsive
        className: 'control',
        orderable: false,
        targets: 0,
        searchable: false,
        render: function (data, type, full, meta) {
          return '';
        }
      },
      { visible: false, targets: groupColumn },
      {
        // Label
        targets: -2,
        render: function (data, type, full, meta) {
          var $status_number = full['status'];
          var $status = {
            1: { title: 'Current', class: 'bg-label-primary' },
            2: { title: 'Professional', class: ' bg-label-success' },
            3: { title: 'Rejected', class: ' bg-label-danger' },
            4: { title: 'Resigned', class: ' bg-label-warning' },
            5: { title: 'Applied', class: ' bg-label-info' }
          };
          if (typeof $status[$status_number] === 'undefined') {
            return data;
          }
          return (
            '<span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
          );
        }
      },
      {
        // Actions
        targets: -1,
        title: 'Actions',
        orderable: false,
        searchable: false,
        render: function (data, type, full, meta) {
          return (
            '<div class="d-inline-block">' +
            '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
            '<div class="dropdown-menu dropdown-menu-end m-0">' +
            '<a href="javascript:;" class="dropdown-item">Details</a>' +
            '<a href="javascript:;" class="dropdown-item">Archive</a>' +
            '<div class="dropdown-divider"></div>' +
            '<a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a>' +
            '</div>' +
            '</div>' +
            '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>'
          );
        }
      }
    ],
    order: [[groupColumn, 'asc']],
    dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    displayLength: 7,
    lengthMenu: [7, 10, 25, 50, 75, 100],
    drawCallback: function (settings) {
      var api = this.api();
      var rows = api.rows({ page: 'current' }).nodes();
      var last = null;

      api
        .column(groupColumn, { page: 'current' })
        .data()
        .each(function (group, i) {
          if (last !== group) {
            $(rows)
              .eq(i)
              .before('<tr class="group"><td colspan="8">' + group + '</td></tr>');

            last = group;
          }
        });
    },
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return 'Details of ' + data['full_name'];
          }
        }),
        type: 'column',
        renderer: function (api, rowIdx, columns) {
          var data = $.map(columns, function (col, i) {
            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
              ? '<tr data-dt-row="' +
                  col.rowIndex +
                  '" data-dt-column="' +
                  col.columnIndex +
                  '">' +
                  '<td>' +
                  col.title +
                  ':' +
                  '</td> ' +
                  '<td>' +
                  col.data +
                  '</td>' +
                  '</tr>'
              : '';
          }).join('');

          return data ? $('<table class="table"/><tbody />').append(data) : false;
        }
      }
    }
  });

  // Order by the grouping
  $('.dt-row-grouping tbody').on('click', 'tr.group', function () {
    var currentOrder = groupingTable.order()[0];
    if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
      groupingTable.order([groupColumn, 'desc']).draw();
    } else {
      groupingTable.order([groupColumn, 'asc']).draw();
    }
  });
}
