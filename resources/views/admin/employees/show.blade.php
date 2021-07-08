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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.show') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary" data-style="zoom-in">
                            <span class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp;
                                {{ trans('simplecrm.back_to_all') }}
                                {{ Str::lower(trans('simplecrm.employee.title')) }}
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
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('simplecrm.show') }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.fields.first_name') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->first_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.fields.last_name') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.title') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->company->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.fields.phone') }}
                                        </th>
                                        <td>
                                            {{ $data['employee']->phone }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>
@endsection
