@extends('...layouts.app')

@section('content')
<h1>Панель керування групою - {!! $group->name !!} </h1>

<div class="row">
<a href="/group/manage/news">Новини</a>
<a href="/group/manage/files">Файли</a>
<a href="/group/manage/blocks">Статичні блоки</a>
<a href="/group/manage/makeSend">Розсилання повідомлень</a>
<a href="/group/manage/users">Користувачі</a>

</div>

@stop