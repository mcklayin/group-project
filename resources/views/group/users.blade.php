@extends('layouts.app')

@section('content')
@if($data)
  <table>
    <thead>
        <tr>
            <th>
                №
            </th>
            <th>
                Ім'я
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
                {!! $v->name !!}
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