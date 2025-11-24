@extends('admin.app')

@section('title', "")
@section('content')
<h2>Заказ: {{ $order->id }}<span class="name">Создан: {{ dateRu($order->created_at) }}</span></h2>

<table class="list">
    <tr>
        <th>Статус</th>
        <th>Способ оплаты</th>
        <th></th>
    </tr>
    <tr>
        <td class="tac">
            <select name="" id="">
                @foreach($order->statusNames as $level => $name)
                    <option value="{{ $level }}" @if($order->status == $level) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </td>
        <td class="tac">
            <select name="" id="">
                @foreach($order->payMethodNames as $level => $name)
                    <option value="{{ $level }}" @if($order->pay_method == $level) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </td>
        <td class="tac">
            <input type="checkbox" name="" id="payed_field" @if($order->payed) checked @endif>
            <label for="payed_field">Оплачен</label>
        </td>
    </tr>
</table>

<div>Комментарий: {{ $order->comment }}</div>

<h3>Покупатель</h3>
<div>Имя: {{ $order->user->name }}</div>
<div>Телефон: {{ $order->user->phone }}</div>
<div>Адрес: {{ $order->user->address }}</div>
<div>E-mail: {{ $order->user->email }}</div>


<h3>Список товаров</h3>
<table class="list">
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Сумма</th>
    </tr>
    @foreach($order->products as $product)
        <tr>
            <td><a href="{{-- route('admin.product.show', $product->id) --}}">{{ $product->name }}</a></td>
            <td class="tac">{{ $product->pivot->price }}</td>
            <td class="tac">{{ $product->pivot->quantity }}</td>
            <td class="tac">{{ $product->subtotal }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" style="text-align: right;">Итого:</td>
        <td class="tac">0{{ $product->total }}</td>
    </tr>
</table>

@endsection
