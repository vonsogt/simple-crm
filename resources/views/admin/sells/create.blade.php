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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.sell.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.add') }}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.sell.index') }}" class="btn btn-secondary" data-style="zoom-in">
                            <span class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp;
                                {{ trans('simplecrm.back_to_all') }}
                                {{ Str::lower(trans('simplecrm.sell.title')) }}
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
                            <h3 class="card-title">{{ trans('simplecrm.add') }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.sell.store') }}">
                            @csrf

                            <div class="card-body">

                                {{-- Error alerts --}}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger pb-0">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li><i class="fa fa-info-circle"></i> {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group required">
                                    <label for="created_date">
                                        {{ trans('simplecrm.sell.fields.created_date') }}
                                    </label>
                                    <div class="input-group" id="created_date-datetime" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control datetimepicker-input {{ $errors->has('created_date') ? 'is-invalid' : '' }}"
                                            data-target="#created_date-datetime" id="created_date" name="created_date"
                                            placeholder="{{ trans('simplecrm.sell.fields.created_date_input') }}"
                                            value="{{ old('created_date', isset($data['sell']) ? $data['sell']->created_date : '') }}" />
                                        <div class="input-group-append" data-target="#created_date-datetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('created_date'))
                                        <span id="created_date-error" class="error invalid-feedback">
                                            {{ $errors->first('created_date') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label>
                                        {{ trans('simplecrm.item.title_singular') }}
                                    </label>
                                    <select name="item_id" id="item_id" class="form-control {{ $errors->has('item_id') ? 'is-invalid' : '' }}">
                                        <option value="" selected disabled>{{ trans('simplecrm.sell.fields.item_select') }}</option>
                                        @foreach ($data['items'] as $id => $item)
                                            <option value="{{ $id }}"
                                                {{ (isset($data['sell']) && $data['sell']->item ? $data['sell']->item->id : old('item_id')) == $id ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('item_id'))
                                        <span id="item_id-error" class="error invalid-feedback">
                                            {{ $errors->first('item_id') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label for="price">
                                        {{ trans('simplecrm.sell.fields.price') }}
                                    </label>
                                    <input type="number" step="any"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price"
                                        name="price" placeholder="{{ trans('simplecrm.sell.fields.price_input') }}"
                                        value="{{ old('price', isset($data['sell']) ? $data['sell']->price : '') }}">
                                    @if ($errors->has('price'))
                                        <span id="price-error" class="error invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label for="discount">
                                        {{ trans('simplecrm.sell.fields.discount') }}
                                    </label>
                                    <div class="input-group">
                                        <input type="number" step="any" max="100"
                                            class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" id="discount"
                                            name="discount" placeholder="{{ trans('simplecrm.sell.fields.discount_input') }}"
                                            value="{{ old('discount', isset($data['sell']) ? $data['sell']->discount : '') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-percent"></i></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('discount'))
                                        <span id="discount-error" class="error invalid-feedback">
                                            {{ $errors->first('discount') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label>
                                        {{ trans('simplecrm.employee.title_singular') }}
                                    </label>
                                    <select name="employee_id" id="employee_id" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : '' }}">
                                        <option value="" selected disabled>{{ trans('simplecrm.sell.fields.employee_select') }}</option>
                                        @foreach ($data['employees'] as $id => $employee)
                                            <option value="{{ $id }}"
                                                {{ (isset($data['sell']) && $data['sell']->employee ? $data['sell']->employee->id : old('employee_id')) == $id ? 'selected' : '' }}>
                                                {{ $employee }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('employee_id'))
                                        <span id="employee_id-error" class="error invalid-feedback">
                                            {{ $errors->first('employee_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            {{-- Save Button --}}
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>&nbsp;
                                    {{ trans('simplecrm.save') }}
                                </button>
                                <a class="btn btn-secondary" href="{{ route('admin.sell.index') }}">
                                    <i class="fa fa-ban"></i>&nbsp;
                                    {{ trans('simplecrm.cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(function () {
            //Date and time picker
            $('#created_date-datetime').datetimepicker({
                icons: { time: 'far fa-clock' },
                format: "Y-MM-DD HH:mm"
            });
        });

        jQuery('document').ready(function($){
            // prevent duplicate entries on double-clicking the submit form
            $(".card-footer").parents("form").submit(function (event) {
                $("button[type=submit]").prop('disabled', true);
            });
        });
    </script>
@endsection
