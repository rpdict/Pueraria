@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <div id="QRkey">{{ $QRkey }}</div>
    <div id="key">{{ $key }}</div>
    <body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<login-input-field--}}
                    {{--name="{{ config('auth.providers.users.field','email') }}"--}}
                    {{--domain="{{ config('auth.defaults.domain','') }}"--}}
                    {{--></login-input-field>--}}
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" onkeyup="keydown()" id="email"
                               placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control"
                               placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input style="display:none;" type="checkbox"
                                           name="remember"> {{ trans('adminlte_lang::message.remember') }}
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                {{--        @include('adminlte::auth.partials.social_login')--}}

                <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
                <a href="{{ url('/register') }}"
                   class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

    <script>
        var key = document.getElementById("key").innerHTML;
        var QRkey = document.getElementById("QRkey").innerHTML;

        function keydown() {
            var email = document.getElementById("email").value;
            // var password = document.getElementById("password").value;
            console.log(email);
            var json = JSON.stringify({
                type: 'message',
                event: 'email',
                userId: key,
                QR: QRkey,
                email: email
            });
            client.send(json);
        }

        var client = new WebSocket('ws://localhost:3000/', 'echo-protocol');
        client.onerror = function () {
            console.log('Connection Error');
        };
        client.onopen = function () {
            console.log('WebSocket Client Connected');
            var json = JSON.stringify({
                type: 'message',
                event: 'connect',
                userId: key
            });
            client.send(json);
        };
        client.onclose = function () {
            console.log('echo-protocol Client Closed');
        };
        client.onmessage = function (e) {
            if (typeof e.data === 'string') {
                console.log("Received: '" + e.data + "'");
            }
        };
    </script>
    </body>
@endsection
