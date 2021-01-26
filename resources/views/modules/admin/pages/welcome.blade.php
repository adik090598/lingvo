@extends('modules.admin.layouts.app-partial')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Магазин</h1>
                </div>
                <div class="card-body">
                    @auth
                        <a href="{{route('admin.home')}}"
                           class="btn btn-primary btn-block">Система</a>
                    @endauth

                    @guest
                        @if(Route::has('admin.login'))
                            <a href="{{route('admin.login')}}"
                               class="btn btn-primary btn-block">Вход</a>
                        @endif
                        @if(Route::has('admin.register'))
                            <a href="{{route('admin.register')}}"
                               class="btn btn-primary btn-block">Регистрация</a>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection
