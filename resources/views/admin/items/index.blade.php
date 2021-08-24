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
                    confirmButtonText: '{{ trans('simplecrm.delete_confirmation_confirm_button') }}',
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

                                    // Refresh datatable
                                    $('#datatable-item').DataTable().ajax.reload()
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

            $(document).ready(function() {
                // move "showing x out of y" info to header
                $("#datatable_info_stack").html($("#datatable-item_info"))
                    .css('display', 'inline-flex')
                    .css('font-size', '17px');
            });

        </script>
    @endsection
@endsection
