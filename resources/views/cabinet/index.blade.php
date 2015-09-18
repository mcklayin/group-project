@extends('layouts.app')


@section('title') Кабінет :: @parent @stop
@section('content')

<!-- todo dropdown form with configs -->
<a href="#">Налаштування</a>

    <div class="row">
        <div class="page-header">
         <h2>Кабінет корисуствача</h2>
        </div>
    </div>


    <ul>
     @foreach($arrData['user'] as $k=>$v)
        <li>
            {!! $k !!} - {!! $v !!}
        </li>
     @endforeach
    </ul>

@if(!empty($arrData['user_groups']))
<h1>Мої групи:</h1>
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