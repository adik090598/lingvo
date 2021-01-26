@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Результаты</h1>
    <div class="d-flex justify-content-between items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Результаты</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Результаты <span
                                class="badge badge-primary">{{$results->total()}}</span></h2>

                    <div class="col-md-12 search-box m-2">
                        <!-- Search form -->
                        <form action="{{route('result.index')}}" id="search_form"
                              class="mt-2 justify-content-center col-12">
                            <div class="row">
                                <div class="form-group col-5">
                                    <label for="search_text" class="form-label-text">Аудан</label>
                                    <input id="search_text" name="search_text" value="{{$search ? $search : ""}}"
                                           class="form-control" type="text" placeholder="Поиск"
                                           aria-label="Search">
                                </div>
                                <div class="form-group col-5">
                                    <label for="school" class="form-label-text">Мектеп</label>
                                    <input id="school" name="school" value="{{$school ? $school : ""}}"
                                           class="form-control" type="text" placeholder="Мектеп"
                                           aria-label="Search">
                                </div>
                                <div class="form-group col-5">
                                    <label for="search_text" class="form-label-text">Результат</label>
                                    <input id="score" name="score" value="{{$score ? $score : ""}}"
                                           class="form-control" type="number" min="0" placeholder="13"
                                           aria-label="Search">
                                </div>
                                <div class="form-group col-2">
                                    <label for="search_text" class="form-label-text"> </label>
                                    <button type="submit" class=" form-control btn btn-primary">Поиск</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </header>
                <div class="card-body pt-0">
                    @if($results->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Тест</th>
                                <th>Результат</th>
                                <th>Регион</th>
                                <th>Город</th>
                                <th>Школа</th>
                                <th>Создан</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td>
                                        <a href="{{route('result.user',['id'=>$result->id])}}">{{$result->order->user->fullname()}}</a>
                                    </td>
                                    <td>{{$result->quiz->name}}</td>
                                    <td>{{$result->result .' / '.$result->all_score}}</td>
                                    <td>{{$result->region}}</td>
                                    <td>{{$result->area}}</td>
                                    <td>{{$result->school}}</td>
                                    <td>{{$result->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
                @if($results->items())
                    <div class="panel-footer">
                        <p style="text-align: center"> Показано с {{ $results->firstItem() }}
                            до {{ $results->lastItem() }}
                            из {{$results->total()}} результатов</p>
                    </div>
                    {{$results->links() }}

                @endif
                @else <h6>У вас пока нет результатов!</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        // $(document).ajaxComplete(function() {
        //     $('.pagination li a').click(function(e) {
        //         e.preventDefault();
        //         var url = $(this).attr('href');
        //         $.ajax({
        //             url: url,
        //             success: function(data) {
        //                 $('#result').html(data);
        //             }
        //         });
        //     });
        // });

        // $('#search_form').submit(function(e)
        // {
        //     e.preventDefault();
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         data:{
        //             search: $('#search_text').val()
        //         },
        //         success: function(data){
        //             alert(data['search']);
        //         }
        //     });
        // });
    </script>
@endsection
