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
        <script>
            $(function() {

                // Data table
                var table = $("#datatable-sell_summary").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "order": [0, "desc"],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.sell-summary.index') }}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'date', name: 'date'},
                        {data: 'employee_id', name: 'employee_id'},
                        {data: 'price_total', name: 'price_total'},
                        {data: 'discount_total', name: 'discount_total'},
                        {data: 'total', name: 'total'},
                        {data: 'last_update', name: 'last_update'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
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
                    "language": {
                        "info":         "{{ trans('simplecrm.datatable.info') }}",
                        "infoEmpty":    "{{ trans('simplecrm.datatable.info_empty') }}",
                        "infoFiltered": "{{ trans('simplecrm.datatable.info_filtered') }}",
                        "paginate": {
                            "next":     ">",
                            "previous": "<"
                        },
                    }
                }).buttons().container().appendTo('#datatable-sell_summary_wrapper .col-md-6:eq(0)');
            });

            $(document).ready(function() {
                // move "showing x out of y" info to header
                $("#datatable_info_stack").html($("#datatable-sell_summary_info"))
                    .css('display', 'inline-flex')
                    .css('font-size', '17px');
            });

        </script>
    @endsection
@endsection
