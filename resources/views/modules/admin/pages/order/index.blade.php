@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Заявки</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Тесты</li>
        </ol>
    </nav>
    <div class="col-6 search-box m-2">
        <!-- Search form -->
        <form action="{{route('order.index')}}"  id="search_form" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
            <input id="search_text" name="search_text" value="{{$search ? $search : ""}}" class="form-control" type="text" placeholder="Поиск"
                   aria-label="Search">
            <button type="submit" class="input-group-button btn btn-primary">Поиск</button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Заявки</h2>
                </header>
                <div class="card-body pt-0">
                    @if($orders->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>PaymentId</th>
                                <th>Пользователь</th>
                                <th>Тест</th>
                                <th>Создан</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->payment_id}}</td>
                                    <td>
                                       {{$order->user->fullName()}}
                                    </td>
                                    <td>{{$order->quiz->name}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->price ."тг."}}</td>
                                    <td>
                                        @if($order->status == \App\Models\Entities\Order::PROCESS)
                                            <span class="badge bg-warning text-light">Күтілуде</span>
                                        @elseif($order->status == \App\Models\Entities\Order::ACCEPTED)
                                            <span
                                                class="badge bg-secondary text-light">Қабылданды</span>
                                        @elseif($order->status == \App\Models\Entities\Order::PASSED)
                                            <span class="badge bg-primary text-light">Тапсырды</span>
                                        @endif
                                    </td>
                                    <td class="d-inline-block">
                                        @if($order->status==0)
                                            <form method="POST" action="{{route('order.accept',
                                            ['id' => $order->id, 'page' => $orders->currentPage()])}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-sm">
                                                    <i class="ti ti-check"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    @else <h6>У вас пока нет заявок!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
