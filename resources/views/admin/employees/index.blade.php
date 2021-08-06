@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        <span class="text-capitalize">{{ trans('simplecrm.employee.title') }}</span>
                        <small id="datatable_info_stack"></small>
                    </h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{ route('admin.employee.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.list') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.employee.create') }}" class="btn btn-success" data-style="zoom-in">
                            <span class="ladda-label"><i class="fa fa-plus"></i>&nbsp;
                                {{ trans('simplecrm.add') }}
                                {{ Str::lower(trans('simplecrm.employee.title_singular')) }}
                            </span>
                        </a>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{ trans('simplecrm.list') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable-employee" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('simplecrm.employee.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.full_name') }}</th>
                                        <th>{{ trans('simplecrm.company.title') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.email') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.phone') }}</th>
                                        <th>{{ trans('simplecrm.created_at') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['employees'] as $key => $employee)
                                        <tr data-entry-id="{{ $employee->id }}">
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->company->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->created_at }}</td>
                                            <td>
                                                <a class="btn btn-primary" title="Show"
                                                    href="{{ route('admin.employee.show', $employee->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success" title="Edit"
                                                    href="{{ route('admin.employee.edit', $employee->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" title="Delete" href="javascript:void(0)"
                                                    onclick="deleteEntry(this)"
                                                    data-route="{{ route('admin.employee.destroy', $employee->id) }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('simplecrm.employee.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.full_name') }}</th>
                                        <th>{{ trans('simplecrm.company.title') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.email') }}</th>
                                        <th>{{ trans('simplecrm.employee.fields.phone') }}</th>
                                        <th>{{ trans('simplecrm.created_at') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@section('scripts')
    <script>
        // Notification bubble
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

        $(function() {

            // Data table
            var table = $("#datatable-employee").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [0, "desc"],
                // "serverSide": true,
                // "ajax": "{{ route('admin.employee.index') }}",
                // "columns": [
                //     {data: 'id', name: 'ID'}
                // ],
                "lengthChange": true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "buttons": [{
                        "extend": "collection",
                        "text": '<i class="fa fa-download"></i> {{ trans('simplecrm.datatable.export') }}',
                        "dropup": true,
                        "buttons": [{
                                extend: "copy",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "csv",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "excel",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "pdf",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "print",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                        ]
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-eye-slash"></i> {{ trans('simplecrm.datatable.column_visibility') }}',
                        dropup: true
                    }
                ],
                "columnDefs": [{
                        "targets": 5,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 6,
                        "orderable": false
                    },
                ],
                "language": {
                    "infoEmpty": "{{ trans('simplecrm.datatable.info_empty') }}",
                    "infoFiltered": "{{ trans('simplecrm.datatable.info_filtered') }}",
                },
                "dom": "<'row hidden'<'col-sm-6'i><'col-sm-6 d-print-none'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-2 d-print-none '<'col-sm-12 col-md-4'l><'col-sm-0 col-md-4 text-center'B><'col-sm-12 col-md-4 'p>>",
            }).buttons().container().appendTo('#datatable-employee_wrapper .col-md-6:eq(0)');
        });

        // DeleteButton
        function deleteEntry(button) {
            var route = $(button).attr('data-route');

            Swal.fire({
                title: '{{ trans('simplecrm.delete_confirmation_title') }}',
                text: "{{ trans('simplecrm.delete_confirmation_text') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ trans('simplecrm.delete_confirmation_confirm_button') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: route,
                        success: function(response) {
                            if (response == 1) {

                                // Show success notification
                                toastr.options = {
                                    "closeButton": true,
                                    "progressBar": true
                                }
                                toastr.success(
                                    '{{ trans('simplecrm.delete_confirmation_message') }}')

                                // remove current table row and draw table again
                                var table = $('#datatable-employee').DataTable()
                                table.row($(button).parents('tr')).remove().draw(false);
                            } else {
                                Swal.fire({
                                    title: 'NOT deleted!',
                                    text: 'There\'s been an error.',
                                    icon: 'error',
                                    timer: 4000,
                                    showConfirmButton: false,

                                })
                            }
                        },
                        error: function(response) {
                            Swal.fire({
                                title: 'NOT deleted!',
                                text: 'There\'s been an error.',
                                icon: 'error',
                                timer: 4000,
                                showConfirmButton: false,

                            })
                        }
                    })
                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {

            // move "showing x out of y" info to header
            $("#datatable_info_stack").html($("#datatable-employee_info"))
                .css('display', 'inline-flex')
                .css('font-size', '20px');

            // Add filter name
            $("#datatable-employee_wrapper .col-sm-6:eq(0)").append(
                '<div class="form-row align-items-center" id="datatable_custom-filter">' +
                    '<div class="col-auto">' +
                        '<input type="text" class="form-control" id="search-by-name" placeholder="Search by full name">' +
                    '</div>' +
                '</div>');

            // Add filter created_at daterange
            $("#datatable-employee_wrapper .col-sm-6:eq(0) #datatable_custom-filter").append(
                '<div class="col-auto">' +
                    '<button type="button" class="btn btn-default float-right mr-2" id="daterange-btn">' +
                        '<i class="far fa-calendar-alt"></i>' +
                        ' {{ trans('simplecrm.created_at') }} ' +
                        '<i class="fas fa-caret-down"></i>' +
                    '</button>' +
                '</div>');

            // Reset all filter
            $("#datatable-employee_wrapper .col-sm-6:eq(0) #datatable_custom-filter").append(
                '<div class="col-auto">' +
                    '<a href="javascript:void(0)" id="remove_filters_button" class="btn invisible"><i class="fa fa-eraser"></i> {{ trans('simplecrm.datatable.remove_filters') }}</a>' +
                '</div>');

            //Date range as a button
            var min = ''
            var max = ''
            $('#daterange-btn').daterangepicker({
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                },
                function(start, end) {
                    // $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    min = start.format('YYYY-MM-DD')
                    max = end.format('YYYY-MM-DD')
                    $('#remove_filters_button').removeClass('invisible');
                    $("#datatable-employee").DataTable().draw()
                }
            );

            // Filter by name
            $('#search-by-name').on('keyup', function() {
                if (this.value == '') {
                    $('#remove_filters_button').addClass('invisible');
                    $("#datatable-employee").DataTable().columns(1).search(this.value).draw();
                } else {
                    $('#remove_filters_button').removeClass('invisible');
                    $("#datatable-employee").DataTable().columns(1).search(this.value).draw();
                }
            });

            // Clear Filters
            $("#remove_filters_button").click(function(e) {
                // $('#daterange-btn').daterangepicker()
                $('#daterange-btn').daterangepicker({
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment(),
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                                .subtract(1,
                                    'month').endOf('month')
                            ]
                        },
                    },
                    function(start, end) {
                        min = start.format('YYYY-MM-DD')
                        max = end.format('YYYY-MM-DD')
                        $('#remove_filters_button').removeClass('invisible');
                        $("#datatable-employee").DataTable().draw()
                    }
                );
                min = ''
                max = ''
                // clear search by name
                $('#search-by-name').val('')
                $("#datatable-employee").DataTable().columns(1).search('').draw();
                $("#datatable-employee").DataTable().search('').draw()
                $('#remove_filters_button').addClass('invisible');
            })

            // Extend dataTables search
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var createdAt = (moment(data[5]).format('YYYY-MM-DD')) || 0; // Our date column in the table

                    if (
                        (min == "" || max == "") ||
                        (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                    ) {

                        return true;
                    }
                    return false;
                }
            );

            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>
@endsection
@endsection
