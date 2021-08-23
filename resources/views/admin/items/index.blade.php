@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        <span class="text-capitalize">{{ trans('simplecrm.item.title') }}</span>
                        <small id="datatable_info_stack"></small>
                    </h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.item.index') }}">{{ trans('simplecrm.item.title') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.list') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.item.create') }}" class="btn btn-success" data-style="zoom-in">
                            <span class="ladda-label"><i class="fa fa-plus"></i>&nbsp;
                                {{ trans('simplecrm.add') }}
                                {{ Str::lower(trans('simplecrm.item.title_singular')) }}
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
                            <table id="datatable-item" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('simplecrm.item.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.item.fields.name') }}</th>
                                        <th>{{ trans('simplecrm.item.fields.price') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Datatable serverside ajax --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('simplecrm.item.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.item.fields.name') }}</th>
                                        <th>{{ trans('simplecrm.item.fields.price') }}</th>
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
                var table = $("#datatable-item").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "order": [0, "desc"],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.item.index') }}",
                    "columns": [
                        {data: 'id', name: "{{ trans('simplecrm.item.fields.id') }}"},
                        {data: 'name', name: "{{ trans('simplecrm.item.fields.name') }}"},
                        {data: 'price', name: "{{ trans('simplecrm.item.fields.price') }}"},
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
                }).buttons().container().appendTo('#datatable-item_wrapper .col-md-6:eq(0)');
            });

            $(document).ready(function() {
                // move "showing x out of y" info to header
                $("#datatable_info_stack").html($("#datatable-item_info"))
                    .css('display', 'inline-flex')
                    .css('font-size', '17px');
            });

        </script>
    @endsection
@endsection
