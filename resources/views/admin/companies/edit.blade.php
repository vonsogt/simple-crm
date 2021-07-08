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
                        <li class="breadcrumb-item active">{{ trans('simplecrm.edit') }}</li>
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
                            <h3 class="card-title">{{ trans('simplecrm.edit') }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.company.update', $data['company']->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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

                                <div class="form-group">
                                    <label for="name">
                                        {{ trans('simplecrm.company.fields.name') }}
                                    </label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="name" name="name" placeholder="Enter name"
                                        value="{{ old('name', isset($data['company']) ? $data['company']->name : '') }}">
                                    @if ($errors->has('name'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        {{ trans('simplecrm.company.fields.email') }}
                                    </label>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" placeholder="Enter email"
                                        value="{{ old('email', isset($data['company']) ? $data['company']->email : '') }}">
                                    @if ($errors->has('email'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="logo">
                                        {{ trans('simplecrm.company.fields.logo') }}
                                    </label>

                                    {{-- Show the file name on EDIT form. --}}
                                    @if (!empty($data['company']->logo))
                                        <div class="existing-file">
                                            <a target="_blank"
                                                href="{{ URL::to('/storage/img/companies') . '/' . $data['company']->logo }}">
                                                {{ $data['company']->logo }}
                                            </a>
                                        </div>
                                    @endif

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo" name="logo">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                        <small class="text-secondary">Minimum image size is 100x100. Upload image again to replace the current image.</small>
                                        @if ($errors->has('logo'))
                                            <span id="name-error" class="error invalid-feedback">
                                                {{ $errors->first('logo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website_link">
                                        {{ trans('simplecrm.company.fields.website_link') }}
                                    </label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('website_link') ? 'is-invalid' : '' }}"
                                        id="website_link" name="website_link" placeholder="Enter website link"
                                        value="{{ old('website_link', isset($data['company']) ? $data['company']->website_link : '') }}">
                                    @if ($errors->has('website_link'))
                                        <span id="name-error" class="error invalid-feedback">
                                            {{ $errors->first('website_link') }}
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
                                <a class="btn btn-secondary" href="{{ route('admin.company.index') }}">
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
