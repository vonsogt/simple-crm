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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.add') }}</li>
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
                            <h3 class="card-title">{{ trans('simplecrm.add') }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
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
                                    <label for="first_name">
                                        {{ trans('simplecrm.employee.fields.first_name') }}
                                    </label>
                                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                        id="first_name" name="first_name" placeholder="{{ trans('simplecrm.employee.fields.first_name_input') }}" value="{{ old('first_name', isset($data['employee']) ? $data['employee']->first_name : '') }}">
                                    @if ($errors->has('first_name'))
                                        <span id="first_name-error" class="error invalid-feedback">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label for="last_name">
                                        {{ trans('simplecrm.employee.fields.last_name') }}
                                    </label>
                                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                        id="last_name" name="last_name" placeholder="{{ trans('simplecrm.employee.fields.last_name_input') }}" value="{{ old('last_name', isset($data['employee']) ? $data['employee']->last_name : '') }}">
                                    @if ($errors->has('last_name'))
                                        <span id="last_name-error" class="error invalid-feedback">
                                            {{ $errors->first('last_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label>
                                        {{ trans('simplecrm.company.title_singular') }}
                                    </label>
                                    <select name="company_id" id="company_id" class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}">
                                        <option value="" selected disabled>{{ trans('simplecrm.employee.fields.company_select') }}</option>
                                        @foreach ($data['companies'] as $id => $company)
                                            <option value="{{ $id }}"
                                                {{ (isset($data['employee']) && $data['employee']->company ? $data['employee']->company->id : old('company_id')) == $id ? 'selected' : '' }}>
                                                {{ $company }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <span id="company_id-error" class="error invalid-feedback">
                                            {{ $errors->first('company_id') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        {{ trans('simplecrm.employee.fields.email') }}
                                    </label>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" placeholder="{{ trans('simplecrm.employee.fields.email_input') }}" value="{{ old('email', isset($data['employee']) ? $data['employee']->email : '') }}">
                                    @if ($errors->has('email'))
                                        <span id="email-error" class="error invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        {{ trans('simplecrm.employee.fields.phone') }}
                                    </label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        id="phone" name="phone" placeholder="{{ trans('simplecrm.employee.fields.phone_input') }}"
                                        value="{{ old('phone', isset($data['employee']) ? $data['employee']->phone : '') }}">
                                    @if ($errors->has('phone'))
                                        <span id="phone-error" class="error invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label for="password">
                                        {{ trans('simplecrm.employee.fields.password') }}
                                    </label>
                                    <input type="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        id="password" name="password" placeholder="{{ trans('simplecrm.employee.fields.password_input') }}"
                                        value="{{ old('password', isset($data['employee']) ? $data['employee']->password : '') }}">
                                    @if ($errors->has('password'))
                                        <span id="password-error" class="error invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group required">
                                    <label for="password_confirmation">
                                        {{ trans('simplecrm.employee.fields.password_confirmation') }}
                                    </label>
                                    <input type="password"
                                        class="form-control"
                                        id="password_confirmation" name="password_confirmation" placeholder="{{ trans('simplecrm.employee.fields.password_confirmation_input') }}"
                                        value="{{ old('password_confirmation', isset($data['employee']) ? $data['employee']->password : '') }}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            {{-- Save Button --}}
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>&nbsp;
                                    {{ trans('simplecrm.save') }}
                                </button>
                                <a class="btn btn-secondary" href="{{ route('admin.employee.index') }}">
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
        jQuery('document').ready(function($){
            // prevent duplicate entries on double-clicking the submit form
            $(".card-footer").parents("form").submit(function (event) {
                $("button[type=submit]").prop('disabled', true);
            });
        });
    </script>
@endsection
