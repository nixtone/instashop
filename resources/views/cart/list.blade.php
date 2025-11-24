@extends('app')

@section('title', "Корзина")
@section('content')
<div id="cart-list" class="block">
    <div class="col c1">
        <div class="item">
            <img src="" alt="" class="preview bimg">
            <a href="#" class="name"></a>
        </div>
    </div>
    <div class="col c2">
        <div class="subtotal">
            <span class="digit"></span>
        </div>
    </div>
</div>
@endsection
