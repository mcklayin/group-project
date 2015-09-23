@extends('layouts.app')
@section('title') Група - {!! $group->name !!} :: @parent @stop
@section('content')
<div class="row">
<h1>Група - {!! $group->name !!}</h1>


    <div id="stat_blocks">
        {!! $static_blocks !!}
    </div>
    <div class="clearfix">

    </div>
    <a href="/group/getUsers" class="btn btn-info">Користувачі</a>
    <a href="/group/getNews" class="btn btn-info">Новини</a>
    <a href="/group/getFiles" class="btn btn-info">Файли</a>


    <a href="/group/manage" class="btn btn-success">Керування групою</a>

</div>

@stop