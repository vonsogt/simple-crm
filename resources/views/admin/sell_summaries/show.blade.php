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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.sell-summary.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.show') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.sell-summary.index') }}" class="btn btn-secondary" data-style="zoom-in">
                            <span class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp;
                                {{ trans('simplecrm.back_to_all') }}
                                {{ Str::lower(trans('simplecrm.sell_summary.title')) }}
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
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">
                                                        {{ trans('simplecrm.sell_summary.fields.price_total') }}
                                                    </span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $data['sell_summary']->price_total }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">
                                                        {{ trans('simplecrm.sell_summary.fields.discount_total') }}
                                                    </span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $data['sell_summary']->discount_total }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">
                                                        {{ trans('simplecrm.sell_summary.fields.total') }}
                                                    </span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $data['sell_summary']->total }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.sell_summary.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.sell_summary.fields.date') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.employee.title_singular') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->employee->first_name . ' ' . $data['sell_summary']->employee->last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.company.title_singular') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->employee->company->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.sell_summary.fields.created_date') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->created_date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.sell_summary.fields.last_update') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->last_update }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>
                                            {{ trans('simplecrm.created_at') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('simplecrm.updated_at') }}
                                        </th>
                                        <td>
                                            {{ $data['sell_summary']->updated_at }}
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>

                            <br>
                            <h4 class="text-bold">{{ trans('simplecrm.sell.title') }}</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>{{ trans('simplecrm.item.title_singular') }}</th>
                                        <th>{{ trans('simplecrm.sell.fields.price') }}</th>
                                        <th>{{ trans('simplecrm.sell.fields.discount') }}</th>
                                        <th>{{ trans('simplecrm.sell.fields.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['sells'] as $key => $sell)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sell->item->name }}</td>
                                            <td>{{ $sell->price }}</td>
                                            <td>{{ $sell->discount }}%</td>
                                            <td>{{ round($sell->price - ($sell->price * $sell->discount / 100), 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!--/.row -->
        </div>
    </section>
@endsection
