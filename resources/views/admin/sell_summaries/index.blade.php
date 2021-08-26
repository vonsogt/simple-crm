@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        <span class="text-capitalize">{{ trans('simplecrm.sell_summary.title') }}</span>
                        <small id="datatable_info_stack"></small>
                    </h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.sell-summary.index') }}">{{ trans('simplecrm.sell_summary.title') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.list') }}</li>
                    </ol>
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
                            <table id="datatable-sell_summary" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('simplecrm.sell_summary.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.date') }}</th>
                                        <th>{{ trans('simplecrm.employee.title_singular') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.price_total') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.discount_total') }} (%)</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.total') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.last_update') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Datatable serverside ajax --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('simplecrm.sell_summary.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.date') }}</th>
                                        <th>{{ trans('simplecrm.employee.title_singular') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.price_total') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.discount_total') }} (%)</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.total') }}</th>
                                        <th>{{ trans('simplecrm.sell_summary.fields.last_update') }}</th>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/URI.js/1.18.2/URI.min.js" type="text/javascript"></script>
        <script>
            $(function() {

                // Data table
                var table = $("#datatable-sell_summary").DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    order: [0, "desc"],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.sell-summary.index') }}",
                        data: function(d) {
                            d.date = $('#date-filter-date').val();
                            d.employee = $('#text-filter-employee').val();
                            d.company = $('#text-filter-company').val();
                        }
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'date', name: 'date'},
                        {data: 'employee_id', name: 'employee_id'},
                        {data: 'price_total', name: 'price_total'},
                        {data: 'discount_total', name: 'discount_total'},
                        {data: 'total', name: 'total'},
                        {data: 'last_update', name: 'last_update'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    lengthChange: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    buttons: [{
                            extend: "collection",
                            text: '<i class="fa fa-download"></i> {{ trans('simplecrm.datatable.export') }}',
                            dropup: true,
                            buttons: [{
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
                    language: {
                        info:         "{{ trans('simplecrm.datatable.info') }}",
                        infoEmpty:    "{{ trans('simplecrm.datatable.info_empty') }}",
                        infoFiltered: "{{ trans('simplecrm.datatable.info_filtered') }}",
                        paginate: {
                            next:     ">",
                            previous: "<"
                        },
                    },
                    dom: "<'row hidden'<'col-sm-6'i><'col-sm-6 d-print-none'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row mt-2 d-print-none '<'col-sm-12 col-md-4'l><'col-sm-0 col-md-4 text-center d-none d-md-block'B><'col-sm-12 col-md-4 'p>>",
                }).buttons().container().appendTo('#datatable-sell_summary_wrapper .col-md-6:eq(0)');
            });

            $(document).ready(function() {
                // move "showing x out of y" info to header
                $("#datatable_info_stack").html($("#datatable-sell_summary_info"))
                    .css('display', 'inline-flex')
                    .css('font-size', '17px');

                // Add responsive filter navbar
                $("#datatable-sell_summary_wrapper .col-sm-6:eq(0)").append(
                    '<nav class="navbar navbar-expand-lg mb-0 pb-0 pt-0">' +
                        '<span class="navbar-item mb-0 d-none d-lg-block"><span class="fa fa-filter"></span></span>' +
                        '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filters-navbar" aria-controls="filters-navbar" aria-expanded="false" aria-label="Toggle navigation">' +
                            '<span class="fa fa-filter"></span> Filters' +
                        '</button>' +
                        '<div class="collapse navbar-collapse" id="filters-navbar">' +
                            '<ul class="nav navbar-nav">' +
                                // Append filters here
                            '</ul>' +
                        '</div>' +
                    '</nav>'
                );

                // START FILTER DATE
                // Add filter date range button
                $("#filters-navbar .navbar-nav").append(
                    '<li class="nav-item mr-1 dropdown rounded" id="filter-date">' +
                        '<a class="nav-link dropdown-toggle text-secondary" href="#" id="filter-date-navbar-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '{{ trans("simplecrm.sell_summary.fields.date") }} Range'  +
                        '</a>' +
                        '<div class="dropdown-menu p-0" aria-labelledby="filter-date-navbar-dropdown">' +
                            '<div class="form-group mb-0">' +
                                '<div class="input-group date">' +
                                    '<div class="input-group-prepend">' +
                                    '<span class="input-group-text">' +
                                        '<i class="far fa-calendar-alt"></i>' +
                                    '</span>' +
                                    '</div>' +
                                    '<input type="text" class="form-control float-right pull-right" id="date-filter-date">' +
                                    '<div class="input-group-append date-filter-date-clear-button">' +
                                        '<a class="input-group-text" href=""><i class="fa fa-times"></i></a>' +
                                    '</div>' +
                                    '</div>' +
                            '</div>' +
                        '</div>' +
                    '</li>'
                );

                // Trigger filter date on change
                $('#date-filter-date').daterangepicker({
                    autoUpdateInput: false,
                });
                $("#date-filter-date").on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));

                    $("#remove_filters_button").removeClass('invisible');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });

                // $("#date-filter-date").on('cancel.daterangepicker', function(ev, picker) {
                //     $(this).val('');
                // });

                // Clear date employee
                $(".date-filter-date-clear-button").on('click', function(event){
                    event.preventDefault();

                    $('#date-filter-date').val('');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });
                // END FILTER DATE

                // START FILTER EMPLOYEE
                // Add filter employee button
                $("#filters-navbar .navbar-nav").append(
                    '<li class="nav-item mr-1 dropdown rounded" id="filter-employee">' +
                        '<a class="nav-link dropdown-toggle text-secondary" href="#" id="filter-employee-navbar-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '{{ trans("simplecrm.employee.title_singular") }}' +
                        '</a>' +
                        '<div class="dropdown-menu p-0" aria-labelledby="filter-employee-navbar-dropdown">' +
                            '<div class="form-group mb-0">' +
                                '<div class="input-group">' +
                                    '<input class="form-control pull-right" type="text" id="text-filter-employee">' +
                                    '<div class="input-group-append text-filter-employee-clear-button">' +
                                        '<a class="input-group-text" href=""><i class="fa fa-times"></i></a>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</li>'
                );

                // Trigger filter employee on change
                $("#text-filter-employee").on('change', function(event){

                    $("#remove_filters_button").removeClass('invisible');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });

                // Clear filter employee
                $(".text-filter-employee-clear-button").on('click', function(event){
                    event.preventDefault();

                    $('#text-filter-employee').val('');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });
                // END FILTER EMPLOYEE


                // START FILTER COMPANY
                // Add filter company button
                $("#filters-navbar .navbar-nav").append(
                    '<li class="nav-item mr-1 dropdown rounded" id="filter-company">' +
                        '<a class="nav-link dropdown-toggle text-secondary" href="#" id="filter-company-navbar-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '{{ trans("simplecrm.company.title_singular") }}' +
                        '</a>' +
                        '<div class="dropdown-menu p-0" aria-labelledby="filter-company-navbar-dropdown">' +
                            '<div class="form-group mb-0">' +
                                '<div class="input-group">' +
                                    '<input class="form-control pull-right" type="text" id="text-filter-company">' +
                                    '<div class="input-group-append text-filter-company-clear-button">' +
                                        '<a class="input-group-text" href=""><i class="fa fa-times"></i></a>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</li>'
                );

                // Trigger filter company on change
                $("#text-filter-company").on('change', function(event){

                    $("#remove_filters_button").removeClass('invisible');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });

                // Clear filter company
                $(".text-filter-company-clear-button").on('click', function(event){
                    event.preventDefault();

                    $('#text-filter-company').val('');
                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });
                // END FILTER COMPANY

                // Clear All Filters
                $("#filters-navbar .navbar-nav").append(
                    '<li>' +
                        '<a href="javascript:void(0)" id="remove_filters_button" class="btn invisible">' +
                            '<i class="fa fa-eraser"></i> {{ trans("simplecrm.datatable.remove_filters") }}' +
                        '</a>' +
                    '</li>'
                );
                $("#remove_filters_button").on('click', function(event) {
                    $('#text-filter-employee').val('');
                    $('#text-filter-company').val('');
                    $('#date-filter-date').val('');

                    $('#remove_filters_button').addClass('invisible');

                    $("#datatable-sell_summary").DataTable().draw();
                    checkFilterValue();
                });
            });

            // Check filter value if all is null, remove clear filter button
            function checkFilterValue() {
                var employee = $("#text-filter-employee").val();
                var company = $("#text-filter-company").val();
                var date = $("#date-filter-date").val();

                employee.length > 0 ? $("#filter-employee").addClass('bg-secondary') : $("#filter-employee").removeClass('bg-secondary');
                company.length > 0 ? $("#filter-company").addClass('bg-secondary') : $("#filter-company").removeClass('bg-secondary');
                date.length > 0 ? $("#filter-date").addClass('bg-secondary') : $("#filter-date").removeClass('bg-secondary');

                if (employee.length == 0 && company.length == 0 && date.length == 0)
                    $('#remove_filters_button').addClass('invisible');

            }

        </script>
    @endsection
@endsection
