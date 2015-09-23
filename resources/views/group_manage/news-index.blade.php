@extends('...layouts.app')
@section('title') Управління новинами групи :: @parent @stop
@section('content')
<div class="row">
<h1>Керування новинами</h1>


@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
	<br />
@endif

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