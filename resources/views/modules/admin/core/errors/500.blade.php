@extends('modules.admin.layouts.app-error')
@section('content')
    <div class="u-error-content container text-center my-auto">
        <h1 class="u-error__title">500</h1>
        <h2 class="u-error__sub-title">Ошибка сервера</h2>
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