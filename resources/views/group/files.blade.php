@extends('layouts.app')
@section('title') Файли групи :: @parent @stop
@section('content')
@if($files)
  <table class="table table-striped">
    <thead>
        <tr>
            <th>
                №
            </th>
            <th>
                Назва файлу
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
                {!! $v->filename !!}
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