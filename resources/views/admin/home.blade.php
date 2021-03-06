@extends('layouts.admin')
@php

    $count_users = \DB::table('users')->count();
    $count_companies = \DB::table('companies')->count();
    $count_employees = \DB::table('employees')->count();
    $count_jobs = \DB::table('jobs')->count();

@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ trans('simplecrm.dashboard') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ trans('simplecrm.dashboard') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $count_users }}</h3>

                        <p>{{ trans('simplecrm.user.title') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{ trans('simplecrm.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $count_companies }}</h3>

                        <p>{{ trans('simplecrm.company.title') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>
                    <a href="{{ route('admin.company.index') }}" class="small-box-footer">{{ trans('simplecrm.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $count_employees }}</h3>

                        <p>{{ trans('simplecrm.employee.title') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{ route('admin.employee.index') }}" class="small-box-footer">{{ trans('simplecrm.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $count_jobs }}</h3>

                        <p>{{ $count_jobs > 1 ? trans('simplecrm.jobs_prular') : trans('simplecrm.jobs_singular') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-jet"></i>
                    </div>
                    <a href="https://laravel.com/docs/queues" target="_blank" class="small-box-footer">{{ trans('simplecrm.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            // Remove param for clean look
            if (getParam('login', window.location.href) == 'success') {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ trans('simplecrm.login_successful') }}");
                window.history.replaceState(null, null, removeParam('login', window.location.href));
            }
        });
    </script>
@endsection
