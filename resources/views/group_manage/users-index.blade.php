@extends('...layouts.app')

@section('content')
<h1>Керування користувачами групи</h1>

<div class="row">

<a href="/group/manage/users/add">Додати</a>
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