@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2"></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Тесты</a></li>
            <li class="breadcrumb-item active" aria-current="page">Вопрос</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="h-100">
                <header class="m-5">
                    <h2 class="h3 card-header-title"></h2>
                    <a href="{{route('question.create', ['quiz_id' => $questions->id ]) }}" class="btn btn-outline-primary mt-3" >
                        Добавить вопрос
                        <i class="ti ti-plus"></i>
                    </a>
                </header>

                <div class="card-body pt-0">
                    @if($questions)
                        @foreach($questions->questions as $key => $question)
                        <div class="question-box">
                            <div class="d-flex">
                                <h3 class="question-text">{!! $question->question_text !!}</h3>
                            </div>
                            @foreach($question->answers as $key => $answer)
                                <h5> {!! $answer->is_right ? '<i class=ti-check></i>' : '' !!}
                                    {{($key+1).")".$answer->answer}}
                                </h5>
                            @endforeach
                            <a href="{{route('question.edit', ['id' => $question->id])}}" class=" btn btn-outline-primary btn-sm">
                                <i class="ti ti-pencil"></i>
                            </a>
                            <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{$question->id}}"><i class="ti ti-trash"></i>
                            </button>
                            <div class="modal modal-backdrop" id="delete{{$question->id}}" tabindex="-1"
                                 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Вы действительно хотите удалить?</p>
                                            <form method="post" action="{{route('question.delete', ['id' => $question->id])}}">
                                                {{csrf_field()}}
                                                <input type="number" value="{{$question->id}}" hidden>
                                                <button type="submit" class="btn btn-outline-danger mt-3">Удалить безвозвратно<i class="ti ti-trash"></i></button>
                                            </form>
                                        </div>
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">--}}
{{--                                                <i class="ti ti-close"></i> Закрыть</button>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addQuestion" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Добавить вопрос</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('question.store', ['quiz_id' => $questions->id ])}}" method="post">
{{--                        <div class="form-group">--}}
{{--                            <textarea class="ckeditor form-control" id="question-ckeditor" name="question"></textarea>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$question_web_form"/>
                        </div>
                        <div class="answer_box col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="hidden" name="answers[0][check]" value="0">
                                        <input type="checkbox" name="answers[0][check]" value="1" aria-label="Checkbox for following text input">
                                    </div>
                                </div>
                                <input type="text" name="answers[0][text]" class="form-control" aria-label="answer text">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <button class="btn btn-primary add_field_button" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                        <i class="ti ti-close"></i> Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection

