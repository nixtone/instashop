@extends('admin.app')

@section('content')
<h2>Редактирование категории <span class="name">{{ $category->name }}</span></h2>
@include('admin.category.form', [
    'action' => route('admin.category.update', $category),
    'method' => 'patch',
    'category' => $category,
    'options' => $options
])
@endsection
