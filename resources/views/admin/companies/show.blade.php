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
                        <a href="{{ route('admin.company.index') }}" class="btn btn-secondary" data-style="zoom-in">
                            <span class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp;
                                {{ trans('simplecrm.back_to_all') }}
                                {{ Str::lower(trans('simplecrm.company.title')) }}
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
                                            {{ trans('simplecrm.company.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $data['company']->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $data['company']->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $data['company']->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.fields.logo') }}
                                        </th>
                                        <td>
                                            <img height="200px"
                                                src="{{ URL::to('/storage/img/companies') . '/' . $data['company']->logo }}"
                                                class="rounded float-start d-block" alt="logo-{{ $data['company']->name }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.fields.website_link') }}
                                        </th>
                                        <td>
                                            {{ $data['company']->website_link }}
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
