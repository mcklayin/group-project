@extends('...layouts.app')
@section('title') Розсилки групи :: @parent @stop


@section('content')

<h1>Керування Повідомленнями</h1>

@if($errors->all())
  <div class= "message-box bg-danger">
      @foreach ($errors->all() as $message)
          {{ $message }} <br/>
      @endforeach
  </div>
@endif
@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif
<div class="row">
    {!! Form::open() !!}

        <div class="col-md-6">
            <div class="form-group">
                <label>Тип розсилання:</label>
                {!! Form::select('type',$arrTypes,Input::old('type'), array('class'=>'form-control')) !!}
            </div>

             <div class="form-group">
                <label>Повідомлення:</label>
                {!! Form::textarea('text',Input::old('text'), array('class'=>'form-control')) !!}
            </div>

             <div class="form-group">
             {!! Form::submit('Відправити') !!}
             </div>
        </div>
    {!! Form::close() !!}
</div>
@stop