@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('site/user.login') !!} :: @parent @stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>{!! trans('site/user.login_to_account') !!}</h2>
        </div>
    </div>

@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
	<br />
@endif

    <div class="container-fluid">
        <div class="row">
            {!! Form::open(array('url' => URL::to('auth/login'), 'method' => 'post', 'files'=> true)) !!}
            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', "Поштова адреса", array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                {!! Form::label('password', "Пароль", array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Запам'ятати
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                        Вхід
                    </button>

                    <a href="{{ URL::to('/password/email') }}">Забули пароль?</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
