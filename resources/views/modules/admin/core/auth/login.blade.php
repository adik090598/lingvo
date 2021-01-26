@extends('modules.admin.layouts.app-auth')
@section('content')
    <div class="card">
        <div class="card-body p-4 p-lg-7">
            <h2 class="text-center mb-4">Вход</h2>
            <form action="{{route('admin.login.post')}}" method="post">
                <x-admin.input-form-group-list
                        :errors="$errors"
                        :elements="$loginInputs"/>

                <div class="form-group d-flex align-items-center justify-content-between my-4">
                    <div class="custom-control custom-checkbox">
                        <input id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="custom-control-input" type="checkbox">
                        <label class="custom-control-label text-dark" for="rememberMe">Запомнить меня</label>
{{--                        <a class="reset_pass" href="{{route('password.reset')}}">Забыли пароль?</a>--}}

                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">
                    Вход
                </button>
{{--                <div class="divider-with-text text-center my-4 mx-7">--}}
{{--                    <span class="divider-with-text__content"></span>--}}
{{--                </div>--}}
{{--                <p class="text-center mb-0">--}}
{{--                    Нет аккаунта?--}}
{{--                    <a class="font-weight-semi-bold" href="{{route('register')}}">Зарегистрируйтесь</a>--}}
{{--                </p>--}}

            </form>
        </div>
    </div>
@endsection
