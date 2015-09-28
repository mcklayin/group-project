@extends('layouts.app')


@section('title') Кабінет :: @parent @stop
@section('content')





    <div class="row">

        <div class="page-header">
         <h2>Кабінет корисуствача - {!! $arrData['user']['name'] !!}</h2>
        </div>
    </div>

@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif
    <h4>Контактні дані:</h4>
    {!! $arrData['user']['name'] !!}<br />
    {!! $arrData['user']['email'] !!}<br />
    {!! $arrData['user']['phone'] !!}<br />

    <a href="#" id="show_edit_user">Редагувати</a>
    <div id="edit_user" style="display:none;margin-top:10px;">
      <div class="col-md-4 col-sm-4" style="padding-left:0px;">
        @include('cabinet.user_edit', $user)
      </div>
    </div>

<div class="clearfix">

</div>
@if(!empty($arrData['user_groups']))
<h3>Моя група</h3>

      <a href="/group" class="btn btn-info">{!! $arrData['user_groups']->name !!}</a>


@endif

@if(!empty($errors->all()))
<script>

        $('#edit_user').show();

</script>
@endif
@endsection
@stop