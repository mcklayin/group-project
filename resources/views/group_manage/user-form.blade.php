@extends('...layouts.app')
@section('title') Редагування прав користувачів :: @parent @stop


@section('content')
<div class="row">
@if (isset($user))
    <h1>Редагування Прав Користувача </h1>

@endif
@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif


    {!! Form::model($user, array('url' => URL::to('group/manage/users') . '/' . $user->id.'/edit', 'method' => 'post','id'=>'fupload', 'class' => 'bf')) !!}


            <div class="form-group  {{ $errors->has('privileges') ? 'has-error' : '' }}">
                    {!! Form::select('role', $roles,null,array('class'=>'form-control')) !!}

            </div>


    <div class="form-group">


            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>

                    {{ trans("admin/modal.edit") }}

            </button>

    </div>
    <!-- ./ form actions -->
    {!! Form::close() !!}
    
</div>
@stop