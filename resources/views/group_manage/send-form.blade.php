@extends('...layouts.app')



@section('content')

<h1>Керування Повідомленнями</h1>

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