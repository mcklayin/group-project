@extends('...layouts.app')
@section('title') Панель Управління групою - {!! $group->name !!} :: @parent @stop
@section('content')
<div class="row">
<h1>Панель керування групою - {!! $group->name !!} </h1>


<a href="/group/manage/news" class="btn btn-info">Новини</a>
<a href="/group/manage/files" class="btn btn-info">Файли</a>
<a href="/group/manage/blocks" class="btn btn-info">Статичні блоки</a>
<a href="/group/manage/sends" class="btn btn-info">Розсилання повідомлень</a>
<a href="/group/manage/users" class="btn btn-info">Користувачі</a>

</div>

@stop