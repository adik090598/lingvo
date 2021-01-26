@extends('modules.front.layouts.app-full')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="d-flex col-12">
                <a href="{{route('welcome')}}" class="back-button"><i class="fa fa-arrow-circle-left"></i> Негізгі бет</a>
            </div>
        </div>
        <div class="mt-5">
            <div class="row justify-content-between ">
            <div class="col-12 col-md-3 text-left">
                <div class="nav-box ">
                    <div class="avatar_user">
                        <span class="image-edit"><i class="ti-pencil"></i></span>
                        <img class="user_avatar" src="{{$user->avatar_path ? asset($user->avatar_path)
                            : asset('/modules/front/assets/img/defaults/default-avatar.png')}}" alt="">
                    </div>
                    <ul class="profile-box-nav">
                        <li><a href="{{route('profile.quizzes')}}"><i class="fa fa-list"></i> Менің тесттерім</a></li>
                        <li><a href="{{route('profile.certificates')}}"><i class="fa fa-file"></i> Менің сертифкаттарым</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-8 text-left">
                <div class="user_edit mb-3">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        <input class="input_image" type="file" name="avatar_path" value="null">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$user_web_form"/>
                        <div class="form-group">
                            <label for="phone">Байланыс нөмері</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control{{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"
                                   inputmode="numeric"
                                   value="{{$user->phone ? $user->phone: ""}}"
                                   placeholder="+7(7__) ___-__-__"
                                   required>
                            @if (isset($errors) && $errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Электронды почта</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control"
                                   disabled
                                   value="{{$user->email}}">
                        </div>
                        <div class="row justify-content-between">
{{--                            <div class="col-md-5 col-12 m-1">--}}
{{--                                <button type="button" class="btn btn-block btn-wide btn-primary text-uppercase">--}}
{{--                                    Парөлді өзгерту <i class="ti ti-unlock"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
                            <div class="col-md-4 col-12 m-1">
                                <button type="submit" class=" btn btn-block btn-wide btn-success text-uppercase">
                                    Сақтау <i class="ti ti-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript">

        $("#phone").mask("+7(799) 999-99-99");

        //code for image preview
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".user_avatar").attr("src", e.target.result);
        };

        function readURL(input) {
            if (input.files && input.files[0]) {
                $(".user_avatar").css("visibility",'visible');
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".input_image").change(function() {
            readURL(this);
        });


        $('.image-edit').on('click', function(e) {
            $(".input_image").click();
            // url = URL.createObjectURL(file);
        });

    </script>
@endsection
