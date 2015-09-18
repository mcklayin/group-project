@extends('layouts.app')

@section('content')
@if($files)
  <table>
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
    @foreach($files as $k=>$v)
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
                <a href="/group/getFile/{!! $v->id !!}">Переглянути</a>
            </td>
        </tr>

    @endforeach
  </table>
@else
    Нажаль  файлів не знайдено
@endif

@stop