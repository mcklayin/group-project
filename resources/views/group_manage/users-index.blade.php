@extends('...layouts.app')
@section('title') Управління користувачами групи :: @parent @stop
@section('content')
<div class="row">
<h1>Керування користувачами групи</h1>


@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
	<br />
@endif

<a href="/group/manage/users/add">Додати користувача</a>
@if(!empty($data))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Ім'я</th>
                <th>Поштова адреса</th>
                <th>Дії</th>
            </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tr>
                <td>{!! $v['id'] !!}</td>
                <td>{!! $v['name'] !!}</td>
                <td>{!! $v['email'] !!}</td>
                <td>
                      <a href="/group/manage/users/{!! $v['id'] !!}/edit">Редагувати</a>
                                    |
                    <a href="/group/manage/users/{!! $v['id'] !!}/delete">Видалити</a>
                </td>
            </tr>
        @endforeach
    </table>
@else
    Новини не знайдено
@endif

</div>

@stop