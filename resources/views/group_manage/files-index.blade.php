@extends('...layouts.app')

@section('content')
<h1>Керування файлами</h1>

<div class="row">

<a href="/group/manage/files/add">Додати</a>
@if(!empty($data))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Назва</th>
                <th>Дата останньої зміни</th>
                <th>Дії</th>
            </tr>
        </thead>
        @foreach($data as $k=>$v)
            <tr>
                <td>{!! $v['id'] !!}</td>
                <td>{!! $v['filename'] !!}</td>
                <td>{!! $v['updated_at'] or $v['created_at'] !!}</td>
                <td>
                    <a href="/group/manage/files/{!! $v['id'] !!}/delete">Видалити</a>
                </td>
            </tr>
        @endforeach
    </table>
@else
    Новини не знайдено
@endif

</div>

@stop