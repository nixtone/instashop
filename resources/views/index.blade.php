@extends('app')

@section('content')

<div id="categories" class="block">
    @foreach($categories as $category)
        <a href="{{ route('category.show', $category->slug) }}" class="item">
            <img src="{{ $category->getFile('preview') }}" alt="" class="preview bimg">
        </a>
    @endforeach
</div>

@endsection
