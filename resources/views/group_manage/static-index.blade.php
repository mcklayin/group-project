@extends('...layouts.app')
@section('title') Управління статичними блоками групи :: @parent @stop
@section('content')
<div class="row">
<h1>Керування статичними блоками</h1>



@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
	<br />
@endif

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
                <td>{!! strip_tags($v['text']) !!}</td>
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