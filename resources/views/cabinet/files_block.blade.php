@extends('layouts.app')


@section('title') Файли Групи :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
         <h2>Останні Файли</h2>
        </div>
    </div>



@if(!empty($files))
<h1>Файли Групи:</h1>
    <table class="table table-striped">
        <tr>
            <th>
                id
            </th>
            <th>
                   Назва файлу
              </th>
               <th>
                   Дата оновлення
               </th>
        </tr>
         @foreach($files->toArray() as $k=>$v)

             <tr>
                <td>
                    {!! $v['id'] !!}
                </td>
                <td>
                    {!! $v['filename'] !!}
                </td>
                <td>
                    {!! $v['updated_at'] !!}
                </td>
             </tr>


         @endforeach
    </table>

@endif

@endsection
@stop