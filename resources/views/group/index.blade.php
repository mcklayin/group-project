@extends('layouts.app')

@section('content')
<h1>Група - {!! $group->name !!}</h1>

<div class="row">
    <div id="stat_blocks">
        {!! $static_blocks !!}
    </div>
    <a href="/group/getUsers">Користувачі</a>
    <a href="/group/getNews">Новини</a>
    <a href="/group/getFiles">Файли</a>

     @if($group->user_id == Auth::user()->id)
        <a href="/group/manage">Керування групою</a>
     @endif
</div>

@stop