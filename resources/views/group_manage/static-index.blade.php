@extends('...layouts.app')

@section('content')
<h1>Керування статичними блоками</h1>

<div class="row">

<a href="/group/manage/blocks/add">Створити</a>
@if(!empty($data))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Текст</th>
                <th>Дата останньої зміни</th>
                <th>Дії</th>
            </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tr>
                <td>{!! $v['id'] !!}</td>
                <td>{!! $v['text'] !!}</td>
                <td>{!! $v['updated_at'] or $v['created_at'] !!}</td>
                <td>
                    <a href="/group/manage/blocks/{!! $v['id'] !!}/edit">Редагувати</a>
                    |
                    <a href="/group/manage/blocks/{!! $v['id'] !!}/delete">Видалити</a>
                </td>
            </tr>
        @endforeach
    </table>
@else
    Новини не знайдено
@endif

</div>

@stop