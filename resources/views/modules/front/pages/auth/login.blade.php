@extends('modules.front.layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-7 col-xl-9 order-lg-4">
            <div class="justify-content-start mt-2 mt-lg-5 ml-lg-5">
                <a href="{{route('welcome')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Артқа қайту</a>
            </div>
            <div class="row justify-content-center p-4 align-items-center mt-lg-5">
                <div class="col-12 text-center">
                    <h2 class="logo-text">Akadem</h2>
                    <h5>Кіру</h5>
                </div>
                <div class="col-md-6">
                    <form class="mt-2" method="post" action="{{route('login')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Электронды почта</label>
                            <input type="email" aria-describedby="emailHelp"
                                   class="form-control{{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="example@example.ru"
                                   value="{{old('email')}}"
                                   name="email">

                            <small id="emailHelp" class="form-text text-muted">Сіздің электронды почтаңыз жайлы барлық ақпарат құпия сақталады</small>
                            @if (isset($errors) && $errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-field">Құпия сөз</label>
                            <input id="password-field" type="password"
                                   class="form-control{{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password"
                                   placeholder="**********" />
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if (isset($errors) && $errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Сақтап қалу</label>
                            <a class="ml-3" href="{{route('register.form')}}">Тіркелу?</a>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary float-right">Кіру<i class="fas fa-sign-in-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-3 d-flex left-img p-0 col-12 justify-content-center">
            <img src="{{asset('modules/front/assets/img/background_login.png')}}" class="d-none d-lg-flex login-image"
                 alt="img">
            <img src="{{asset('modules/front/assets/img/mobile_login.png')}}" class="d-lg-none d-flex login-image"
                 alt="img">
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });
    </script>
@endsection