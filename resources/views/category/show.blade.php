@extends('app')

@section('title', $category->name)
@section('content')
<div id="product-list" class="block">
    @if($category->products->isEmpty())
        Товаров нет
    @else
        <div class="inner">
            @foreach($category->products as $product)
                <div class="item">
                    <div class="preview_area">
                        <img src="{{ $product->getFile('preview') }}" alt="" class="preview bimg">
                    </div>
                    <a href="{{ route('product.show', $product->slug) }}" class="name">{{ $product->name }}</a>
                    <div class="price">
                        <span class="digit">{{ $product->price }}</span> ₽
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
