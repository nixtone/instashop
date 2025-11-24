@extends('admin.app')

@section('title', "")
@section('content')

<h2>Список категорий</h2>

<div class="panel">
    <div class="btn_area">
        <a href="{{ route('admin.category.create') }}" class="btn">Новая запись</a>
        <a href="" class="">Отображение</a>
    </div>
    <div>
        <a href=""><</a>
        <a href="">1</a>
        <a href="">></a>
    </div>
</div>

<table class="list">
    <tr>
        <th class="tac"><input type="checkbox" name="" id=""></th>
        <th>Название</th>
        <th>Активность</th>
        <th>Создано</th>
        <th>Отредактировано</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($categories as $category)
    {{-- TODO: переделать вызов трейтов на хелперы --}}
    <tr @if($category->deleted_at) class="deleted" @endif>
        <td class="tac"><input type="checkbox" name="" id=""></td>
        @if($category->deleted_at)
            <td>{{ $category->name }} (удалено: {{ dateRu($category->deleted_at) }})</td>
        @else
            <td><a href="">{{ $category->name }}</a></td>
        @endif
        <td class="tac">{{ yesNo($category->active) }}</td>
        <td class="tac">{{ dateRu($category->created_at) }}</td>
        <td class="tac">{{ dateRu($category->updated_at) }}</td>
        @if($category->deleted_at)
            <td class="tac" colspan="2"><a href="{{ route('admin.category.restore', $category->id) }}">Восстановить</a></td>
        @else
            <td class="tac"><a href="{{ route('admin.category.edit', $category->id) }}">edit</a></td>
            <td class="tac">
                <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить">
                </form>
            </td>
        @endif
    </tr>
    @endforeach
</table>

<div class="message panel">
    <div>
        С отмеченными
        <select name="" id="">
            <option value="" disabled selected>выбрать</option>
            <option value="">удалить мягко</option>
            <option value="">удалить жестко</option>
            <option value="">восстановить</option>
        </select>
    </div>
    <div>
        На странице
        <select name="" id="">
            <option value="">10</option>
            <option value="">20</option>
            <option value="">30</option>
            <option value="">все</option>
        </select>
    </div>
</div>


@endsection
