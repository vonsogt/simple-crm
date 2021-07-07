@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>
                        {{ $data['title'] }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.list') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.company.create') }}" class="btn btn-success" data-style="zoom-in"><span
                                class="ladda-label"><i class="fa fa-plus"></i>&nbsp; {{ trans('simplecrm.add') }} company</span></a>
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
                            <table id="datatable-company" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('simplecrm.company.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.name') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.email') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.logo') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.website_link') }}</th>
                                        <th>{{ trans('simplecrm.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['companies'] as $key => $company)
                                        <tr data-entry-id="{{ $company->id }}">
                                            <td>{{ $company->id }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>
                                                @if ($company->logo)
                                                    <img height="100px"
                                                        src="{{ URL::to('/storage/img/companies') . '/' . $company->logo }}"
                                                        class="rounded mx-auto d-block" alt="logo-{{ $company->name }}">
                                                @else
                                                    <span class="text-secondary">{{ trans('simplecrm.company.fields.no_logo') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $company->website_link }}</td>
                                            <td>
                                                <a class="btn btn-primary" title="Show"
                                                    href="{{ route('admin.company.show', $company->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success" title="Edit"
                                                    href="{{ route('admin.company.edit', $company->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" title="Delete" href="javascript:void(0)"
                                                    onclick="deleteEntry(this)"
                                                    data-route="{{ route('admin.company.destroy', $company->id) }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('simplecrm.company.fields.id') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.name') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.email') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.logo') }}</th>
                                        <th>{{ trans('simplecrm.company.fields.website_link') }}</th>
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
    {{-- Swal2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        // DataTable
        $(function() {
            var table = $("#datatable-company").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [0, "desc"],
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
                    "colvis"
                ],
                "columnDefs": [{
                    "targets": 5,
                    "orderable": false
                }]
            }).buttons().container().appendTo('#datatable-company_wrapper .col-md-6:eq(0)');
        });

        // DeleteButton
        function deleteEntry(button) {
            var route = $(button).attr('data-route');

            Swal.fire({
                title: '{{ trans("simplecrm.delete_confirmation_title") }}',
                text: "{{ trans('simplecrm.delete_confirmation_text') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ trans("simplecrm.delete_confirmation_confirm_button") }}',
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
                                toastr.options =
                                {
                                "closeButton" : true,
                                "progressBar" : true
                                }
                                toastr.success('{{ trans("simplecrm.delete_confirmation_message") }}')

                                // remove current table row and draw table again
                                var table = $('#datatable-company').DataTable()
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
@endsection
@endsection
