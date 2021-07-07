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
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="d-print-none with-border">
                        <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary" data-style="zoom-in"><span
                                class="ladda-label"><i class="fas fa-angle-double-left"></i>&nbsp; Back to
                                employees</span></a>
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
                            <h3 class="card-title">Add</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                        id="first_name" name="first_name" placeholder="Enter first name" value="{{ old('first_name', isset($data['employee']) ? $data['employee']->first_name : '') }}">
                                    @if ($errors->has('first_name'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                        id="last_name" name="last_name" placeholder="Enter last name" value="{{ old('last_name', isset($data['employee']) ? $data['employee']->last_name : '') }}">
                                    @if ($errors->has('last_name'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('last_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <select name="company_id" id="company_id" class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}">
                                        <option value="">-</option>
                                        @foreach ($data['companies'] as $id => $company)
                                            <option value="{{ $id }}"
                                                {{ (isset($data['employee']) && $data['employee']->company ? $data['employee']->company->id : old('company_id')) == $id ? 'selected' : '' }}>
                                                {{ $company }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('company_id') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" placeholder="Enter email" value="{{ old('email', isset($data['employee']) ? $data['employee']->email : '') }}">
                                    @if ($errors->has('email'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        id="phone" name="phone" placeholder="Enter website link"
                                        value="{{ old('phone', isset($data['employee']) ? $data['employee']->phone : '') }}">
                                    @if ($errors->has('phone'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            {{-- Save Button --}}
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    &nbsp;Save
                                </button>
                                <a class="btn btn-secondary" href="{{ route('admin.employee.index') }}">
                                    <i class="fa fa-ban"></i>
                                    &nbsp;Cancel
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
