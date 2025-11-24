@extends('admin.app')

@section('title', "")
@section('content')



<div class="message">{{ config('app.timezone') }} | {{ now()->format('d F Y | H:i:s') }}</div>

<h2>.env</h2>
<div>APP_ENV: {{ env('APP_ENV') }}</div>
<div>APP_DEBUG: {{ env('APP_DEBUG') }}</div>
<div>APP_URL: {{ env('APP_URL') }}</div>
<div>APP_LOCALE: {{ env('APP_LOCALE') }}</div>
<br>
<div>SESSION_DRIVER: {{ env('SESSION_DRIVER') }}</div>
<div>SESSION_LIFETIME: {{ env('SESSION_LIFETIME') }}</div>
<br>
<div>FILESYSTEM_DISK: {{ env('FILESYSTEM_DISK') }}</div>
<br>
<div>QUEUE_CONNECTION: {{ env('QUEUE_CONNECTION') }}</div>

<pre>
HTML-переменные
{{--
<a href="{{ route('admin.auth') }}">auth</a>
<a href="{{ route('admin.index') }}">index</a>
<a href="{{ route('admin.form') }}">form</a>
<a href="{{ route('admin.table') }}">table</a
--}}
</pre>
@endsection
