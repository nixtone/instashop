@extends('admin.app')

@section('content')
<h2>Создание категории</h2>
@include('admin.category.form', [
    'action' => route('admin.category.store'),
    'method' => 'POST',
    'category' => null,
    'options' => $options
])
@endsection
