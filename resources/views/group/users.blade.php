@extends('layouts.app')
@section('title') Користувачі групи :: @parent @stop
@section('content')
@if($data)
  <table class="table table-striped">
    <thead>
        <tr>
            <th>
                №
            </th>
            <th>
                ПІБ
            </th>
            <th>
                 Поштова адреса
            </th>
            <th>

            </th>
        </tr>

    </thead>
    @foreach($data as $k=>$v)
        <tr>
            <td>
                {!! $v->user_id !!}
            </td>
            <td>
              {!! $v->fio !!}   {!! $v->name !!}
            </td>
            <td>
                {!! $v->email !!}
            </td>
            <td>
                <a href="/cabinet/{!! $v->user_id !!}">Переглянути</a>
            </td>
        </tr>

    @endforeach
  </table>
@else
    Користувачів не знайдено
@endif

@stop