@extends('...layouts.app')

@section('content')
<h1>Керування новинами</h1>

<div class="row">

<a href="/group/manage/news/add">Створити</a>
@if(!empty($data))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Заголовок</th>
                <th>Дата останньої зміни</th>
                <th>Дії</th>
            </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tr>
                <td>{!! $v['id'] !!}</td>
                <td>{!! $v['title'] !!}</td>
                <td>{!! $v['updated_at'] !!}</td>
                <td>
                    <a href="/group/manage/news/{!! $v['id'] !!}/edit">Редагувати</a>
                    |
                    <a href="/group/manage/news/{!! $v['id'] !!}/delete">Видалити</a>
                </td>
            </tr>
        @endforeach
    </table>
@else
    Новини не знайдено
@endif

</div>

@stop