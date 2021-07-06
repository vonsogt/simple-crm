@extends('layouts.admin')
@php

    $title = $data['title'];
    $companies = $data['companies'];

@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ $title }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }} List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable-company" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $key => $company)
                                        <tr data-entry-id="{{ $company->id }}">
                                            <td>{{ $company->id }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->logo }}</td>
                                            <td>{{ $company->website_link }}</td>
                                            <td>
                                                <a class="btn btn-primary" title="Show" href="{{ route('admin.company.show', $company->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success" title="Edit" href="{{ route('admin.company.edit', $company->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" title="Delete" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="{{ route('admin.company.destroy', $company->id) }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website Link</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@section('scripts')
    {{-- Swal2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // DataTable
        $(function() {
            $("#datatable-company").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
        function deleteEntry(button){
            var route = $(button).attr('data-route');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
@endsection
