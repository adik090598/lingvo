@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Настройки</h1>

    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('admin.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                </header>

                <div class="card-body pt-0">
                    <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$settings_web_form"/>

                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("input[name='phone1'],input[name='phone2'], input[name='phone3']").mask("+7(799) 999-99-99");
    </script>
@endsection
