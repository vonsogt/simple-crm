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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.translation.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.show') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.translation.index') }}" class="btn btn-secondary" data-style="zoom-in">
                            <span class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp;
                                {{ trans('simplecrm.back_to_all') }}
                                {{ Str::lower(trans('simplecrm.translation.title')) }}
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
                                            {{ trans('simplecrm.translation.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $data['language_line']->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.translation.fields.group') }}
                                        </th>
                                        <td>
                                            {{ $data['language_line']->group }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.translation.fields.key') }}
                                        </th>
                                        <td>
                                            {{ $data['language_line']->key }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.translation.fields.text') }}
                                        </th>
                                        <td>
                                            @foreach($data['language_line']->text as $key => $value)
                                                <span class="right badge badge-primary" style="width: 2rem;">{{ $key }}</span> {{ $value }} <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.created_at') }}
                                        </th>
                                        <td>
                                            {{ $data['language_line']->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.updated_at') }}
                                        </th>
                                        <td>
                                            {{ $data['language_line']->updated_at }}
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
