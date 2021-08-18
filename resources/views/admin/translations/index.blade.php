@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        <span class="text-capitalize">{{ trans('simplecrm.translation.title') }}</span>
                        <small id="datatable_info_stack"></small>
                    </h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.translation.index') }}">{{ trans('simplecrm.translation.title') }}</a></li>
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
                            <table id="datatable-translation" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('simplecrm.translation.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.group') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.key') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.text') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Datatable serverside ajax --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('simplecrm.translation.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.group') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.key') }}</th>
                                        <th>{{ trans('simplecrm.translation.fields.text') }}</th>
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
                var table = $("#datatable-translation").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "order": [0, "desc"],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.translation.index') }}",
                    "columns": [
                        {data: 'id', name: "{{ trans('simplecrm.translation.fields.id') }}"},
                        {data: 'group', name: "{{ trans('simplecrm.translation.fields.group') }}"},
                        {data: 'key', name: "{{ trans('simplecrm.translation.fields.key') }}"},
                        {data: 'text', name: "{{ trans('simplecrm.translation.fields.text') }}"},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                        {
                            "render": function ( data, type, row ) {
                                var render = '';
                                for (const [key, value] of Object.entries(data)) {
                                    render += '<span class="right badge badge-primary" style="width: 2rem;">' + `${key}` + '</span> ' + `${value}` + '<br>';
                                }
                            return render;
                            },
                            "targets": 3
                        },
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
                }).buttons().container().appendTo('#datatable-translation_wrapper .col-md-6:eq(0)');
            });

            $(document).ready(function() {
                // move "showing x out of y" info to header
                $("#datatable_info_stack").html($("#datatable-translation_info"))
                    .css('display', 'inline-flex')
                    .css('font-size', '17px');
            });

        </script>
    @endsection
@endsection
