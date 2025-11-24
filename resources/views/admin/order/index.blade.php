@extends('admin.app')

@section('title', "")
@section('content')

<h2>Заказы</h2>

<table class="list">
    <tr>
        <th class="tac"><input type="checkbox" name="" id=""></th>
        <th>Номер</th>
        <th>Статус</th>
        <th>Создан</th>
    </tr>
    @if($orders->isEmpty())
        <tr>
            <td colspan="4" class="tac">Нет заказов</td>
        </tr>
    @else
        @foreach($orders as $order)
            <tr>
                <td class="tac"><input type="checkbox" name="" id=""></td>
                <td><a href="{{ route('admin.order.show', $order->id) }}">{{ $order->id }}</a></td>
                <td class="tac">{{ $order->statusName }}</td>
                <td class="tac">{{ dateRu($order->created_at) }}</td>
            </tr>
        @endforeach
    @endif
</table>

@endsection
