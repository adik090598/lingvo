@extends('modules.admin.layouts.app-auth')
@section('content')
    <div class="card">
        <div class="card-body p-4 p-lg-7">
            <h2 class="text-center mb-4">Создать аккаунт</h2>
            <form action="{{route('admin.register.post')}}" method="post">
                <x-admin.input-form-group-list
                        :errors="$errors"
                        :elements="$register_web_form"/>
                <button type="submit" class="btn btn-block btn-wide btn-primary text-uppercase">
                    Регистрация
                </button>
                <div class="divider-with-text text-center my-4 mx-7">
                    <span class="divider-with-text__content"></span>
                </div>
                <p class="text-center mb-0">
                    Уже есть аккаунт?
                    <a class="font-weight-semi-bold" href="{{route('login')}}">Вход здесь</a>
                </p>
            </form>
        </div>
    </div>
@endsection
