@extends('admin.app')

@section('title', "")
@section('content')

<h2>Пользователи</h2>

@foreach($userGroups as $userGroup)

    <table class="list">
        <tr>
            <th>Имя</th>
            <th>Логин</th>
            <th>Телефон</th>
            <th>Группа</th>
        </tr>
        @foreach($userGroup->users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->login }}</td>
            <td class="tac">{{ $user->phone }}</td>
            <td><a href="">{{-- $user->group->name --}}</a></td>
        </tr>
        @endforeach
    </table>
@endforeach

{{--
    $table->id();
    $table->string('name');
    $table->string('login');
    $table->foreignId('userGroup_id')->constrained('user_groups')->cascadeOnDelete();
    $table->string('phone')->unique()->nullable();
    $table->text('address')->nullable();
    $table->string('email')->unique()->nullable();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password')->nullable();
    $table->rememberToken();
    $table->timestamps();
--}}

@endsection
