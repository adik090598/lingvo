@extends('modules.admin.layouts.app-error')
@section('content')
    <div class="u-error-content container text-center my-auto">
        <h1 class="u-error__title">404</h1>
        <h2 class="u-error__sub-title">Страница не найдена</h2>

        @auth
            <h4 class="font-weight-semi-bold mb-0">
                <a href="{{route('admin.index')}}">Пройти на главную страницу</a>
            </h4>
        @endauth
        @guest
            <h4 class="font-weight-semi-bold mb-0">
                <a href="{{route('welcome')}}">Перейти в панель управления</a>
            </h4>
        @endguest
        <figure class="u-shape u-shape-top-left">
            <img src="{{asset('modules/admin/assets/svg/shapes/shape-1.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape-top-right">
            <img src="{{asset('modules/admin/assets/svg/shapes/shape-2.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape-bottom-left">
            <img src="{{asset('modules/admin/assets/svg/shapes/shape-3.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape-bottom-right">
            <img src="{{asset('modules/admin/assets/svg/shapes/shape-4.svg')}}" alt="Image description">
        </figure>
    </div>
@endsection
