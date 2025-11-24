@extends('app')

@section('title', $product->name)
@section('content')

<div id="product-item" class="block">
    <div class="inner">
        <div class="area">
            <div class="preview_area">
                <img src="{{ $product->getFile('preview') }}" alt="" class="preview bimg">
            </div>
        </div>
        <div class="area">
            <h1>{{ $product->name }}</h1>
            <div class="price">
                <span class="digit">{{ $product->price }}</span> ₽
            </div>
            <a href="#" class="btn">В корзину</a>
        </div>
        <div class="area">
            <div class="tab-area" data-name="resume">
                <div class="tab-label">
                    <div class="tab-item active">Характеристики</div>
                    <div class="tab-item">Описание</div>
                    <div class="tab-item">Отзывы</div>
                </div>
                <div class="tab-page">
                    <div class="tab-item active">
                        <table>
                            @foreach($product->options as $option)
                            <tr>
                                <td><strong>{{ $option->name }}:</strong></td>
                                <td>{{ $option->pivot->value }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-item">
                        @if(empty($product->description))
                            Нет описания
                        @else
                            {!! $product->description  !!}
                        @endif
                    </div>
                    <div class="tab-item">
                        @foreach($product->reviews as $review)
                            <div class="review">
                                {{ $review->text }}
                                {{ $review->rating }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
