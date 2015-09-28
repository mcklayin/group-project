@extends('layouts.app')


@section('title') Новини Групи :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
         <h2>Останні Новини</h2>
        </div>
    </div>



@if(!empty($news))
<h1>Новини Групи:</h1>
    <table class="table table-striped">
        <tr>
            <th>
                id
            </th>
            <th>
                   Заголовок
              </th>
               <th>
                   Вступ
               </th>
        </tr>
         @foreach($news->toArray() as $k=>$v)

             <tr>
                <td>
                    {!! $v['id'] !!}
                </td>
                <td>
                    {!! $v['title'] !!}
                </td>
                <td>
                    {!! $v['introduction'] !!}
                </td>
             </tr>


         @endforeach
    </table>

@endif

@endsection
@stop