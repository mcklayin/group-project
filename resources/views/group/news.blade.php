@extends('layouts.app')
@section('title') Новини групи :: @parent @stop
@section('content')
@if($news)
  <table class="table table-striped">
    <thead>
        <tr>
            <th>
                №
            </th>
            <th>
                Заголовок
            </th>
            <th>
                 Вступ
            </th>
            <th>

            </th>
        </tr>

    </thead>
    @foreach($news as $k=>$v)
        <tr>
            <td>
                {!! $v->id !!}
            </td>
            <td>
                {!! $v->title !!}
            </td>
            <td>
                {!! $v->introduction !!}
            </td>
            <td>
                <a href="/article/{!! $v->slug !!}">Переглянути</a>
            </td>
        </tr>

    @endforeach
  </table>
@else
    Нажаль новин немає
@endif

@stop