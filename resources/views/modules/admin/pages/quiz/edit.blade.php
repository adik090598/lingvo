@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Тест</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Тест</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('quiz.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i
                                class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Тест</h2>
                </header>
                <div class="card-header border-dark">
                    <img src="{{asset($quiz->image_path)}}" style="max-height: 500px; max-width: 500px"
                         alt="quiz image">
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('quiz.update')}}" method="post" enctype="multipart/form-data">
                        <div class="form-check">
                            <input class="form-check-input" name="is_enable" type="checkbox" value="{{ $quiz->is_enable ? 1 : 0 }}" id="is_enable"  {{ $quiz->is_enable ? 'checked' : '' }}>
                            <label class="form-label" for="is_enable">
                                Активный
                            </label>
                        </div>
                        <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$quiz_web_form"/>

                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'image code',
            height: 300,
            toolbar: 'undo redo | link image | code',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

    </script>
@endsection


