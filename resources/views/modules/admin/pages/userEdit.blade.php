@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Профиль</h1>
    
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('home')}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                </header>
                <div class="card-header border-dark">
                    <img src="{{asset($user->profile_photo_path)}}" style="max-height: 500px; max-width: 500px" alt="User image">
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$user_web_form"/>

                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
