@extends('layouts.app')


@section('title') Кабінет :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
         <h2>Кабінет користувача - {!! $arrData['user']['name'] !!} {!! $arrData['user']['fio'] !!}</h2>
        </div>
    </div>

<h1>Контактні дані:</h1>
        {!! $arrData['user']['email'] !!}<br />
        {!! $arrData['user']['phone'] !!}<br />

@if(!empty($arrData['user_groups']))
<h1>Групи:</h1>
    <a href="/group" class="btn btn-info">{!! $arrData['user_groups']->name !!}</a>

@endif

@endsection
@stop