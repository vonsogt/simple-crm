@extends('layouts.app')

@section('content')

    <div class="login-box">
        {{-- Demo info just for domain 'simple-crm.vonso.online' --}}
        @if (\Str::contains(url()->current(), 'simple-crm.vonso.online'))
            <div class="callout callout-info">
                <h5>{{ trans('simplecrm.login_info_title') }}</h5>
                <p>{{ trans('simplecrm.login_info_text') }}: <br><b>admin@admin.com / password</b></p>
            </div>
        @endif
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Simple<b>CRM</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">{{ __('simplecrm.sign_in_message') }}</p>

                <form method="POST" action="{{ route('api.v1.auth.login') }}">
                    {{-- @csrf --}}

                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') == null ? request()->email : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('simplecrm.email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ trans('simplecrm.password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember_me" type="checkbox" id="remember">
                                <label for="remember">
                                    {{ __('simplecrm.remember_me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('simplecrm.sign_in') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('simplecrm.i_forgot_my_password') }}
                        </a>
                    @endif
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
@section('scripts')
    <script>
        function insertAfter(referenceNode, newNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }

        function emailInputError(text = null){
            var email_input = document.getElementsByName('email')[0].nextSibling.nextSibling;
            var err = document.createElement('span');
            err.classList.add('invalid-feedback');
            err.innerHTML = text != null ? '<strong>' + text + '</strong>' : '<strong>{{ trans("auth.failed") }}</strong>';

            insertAfter(email_input, err);
            document.getElementsByName('email')[0].classList.add("is-invalid");
        }

        function passwordInputError(text = null){
            var email_input = document.getElementsByName('password')[0].nextSibling.nextSibling;
            var err = document.createElement('span');
            err.classList.add('invalid-feedback');
            err.innerHTML = text != null ? '<strong>' + text + '</strong>' : '<strong>{{ trans("auth.password") }}</strong>';

            insertAfter(email_input, err);
            document.getElementsByName('password')[0].classList.add("is-invalid");
        }

        document.addEventListener("DOMContentLoaded", function(){
            var current_url = window.location.href;
            var msg = '';

            // Check if any error from param msg
            if(msg = getParam('msg', current_url)){
                var message = JSON.parse(msg);

                // Check msg
                for (const [key, value] of Object.entries(message)) {
                    if(`${key}` == 'password')
                        passwordInputError(`${value}`)
                    else if(`${key}` == 'email')
                        emailInputError(`${value}`)
                }

                // Remove param
                current_url = removeParam('login', current_url);
                current_url = removeParam('msg', current_url);
            }

            // Add user unauthorized
            if (getParam('login', current_url) == 'unauthorized') {
                emailInputError();
                // Remove param
                current_url = removeParam('login', current_url);
            }

            // Remove param
            if(getParam('email', current_url) || getParam('email', current_url) == '')
                current_url = removeParam('email', current_url);

            // Replace param
            window.history.replaceState(null, null, current_url);
        });

        var previous_url = '{{ url()->previous() }}';
        if (previous_url.indexOf('/password/reset/') > -1 && getParam('email', previous_url)) {
            console.log('test')
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ trans('simplecrm.reset_password_successful') }}");
        }
    </script>
@endsection
