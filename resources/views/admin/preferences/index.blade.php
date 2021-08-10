@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('simplecrm.profile') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">{{ trans('simplecrm.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('simplecrm.profile') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('img/user2-160x160.jpg') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">Web Developer</p>

                            <blockquote>
                                <p>{{ $data['quote'][0] }}</p>
                                <small>{{ $data['quote'][1] }}</small>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <form class="form-horizontal"
                        action="{{ route('admin.preference.update', ['user' => auth()->user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#general"
                                            data-toggle="tab">{{ trans('simplecrm.general') }}</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="general">
                                        <div class="form-group row">
                                            <label for="language"
                                                class="col-sm-2 col-form-label">{{ trans('simplecrm.language') }}</label>
                                            <div class="col-sm-10">
                                                <select name="language" id="language" class="form-control">
                                                    <option value="" selected disabled>
                                                        {{ trans('simplecrm.preference.choose_language') }}
                                                    </option>
                                                    <option value="en" @if(app()->getLocale() == 'en') selected="" @endif>EN</option>
                                                    <option value="id" @if(app()->getLocale() == 'id') selected="" @endif>ID</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="timezone"
                                                class="col-sm-2 col-form-label">{{ trans('simplecrm.timezone') }}</label>
                                            <div class="col-sm-10">
                                                {{-- Timezone Selection --}}
                                                <select name="timezone" id="timezone" class="form-control">
                                                    <option value="" selected disabled>
                                                        {{ trans('simplecrm.preference.choose_timezone') }}</option>
                                                    @foreach (timezone_identifiers_list() as $timezone)
                                                        <option value="{{ $timezone }}"
                                                            {{ $timezone == (old('timezone') ?? config('app.timezone')) ? ' selected' : '' }}>
                                                            {{ $timezone }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row pb-3">
                            <div class="col-12">
                                <input type="submit" value="{{ trans('simplecrm.save_changes') }}" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@section('scripts')
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
    </script>
@endsection
@endsection
