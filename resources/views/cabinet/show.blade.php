@extends('layouts.app')


@section('title') Кабінет :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
         <h2>Кабінет користувача - {!! $arrData['user']['name'] !!}</h2>
        </div>
    </div>

<h1>Контактні дані користувача - {!! $arrData['user']['name'] !!}</h1>
    <ul>
     @foreach($arrData['user'] as $k=>$v)
        <li>
            {!! $k !!} - {!! $v !!}
        </li>
     @endforeach
    </ul>

@if(!empty($arrData['user_groups']))
<h1>Групи:</h1>
    <ul>
         @foreach($arrData['user_groups']->toArray() as $k=>$v)

                 <li>
                      {!! $k !!} - {!! $v !!}
                 </li>


         @endforeach
      </ul>

@endif

@endsection
@stop