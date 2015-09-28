@extends('...layouts.app')
@section('title') Редагування новин групи :: @parent @stop


@section('content')
<div class="row">
@if (isset($article))
    <h1>Редагування Новини </h1>
    <h4>{!! $article->title !!}</h4>
@else
    <h1>Створення Новини </h1>
@endif
@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif

    @if (isset($article))
    {!! Form::model($article, array('url' => URL::to('group/manage/news') . '/' . $article->id.'/edit', 'method' => 'post','id'=>'fupload', 'class' => 'bf')) !!}
    @else
    {!! Form::open(array('url' => URL::to('group/manage/news/add'), 'method' => 'post', 'class' => 'bf','id'=>'fupload')) !!}
    @endif




            <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('title', trans("admin/modal.title"), array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('title', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('introduction') ? 'has-error' : '' }}">
                {!! Form::label('introduction', trans("admin/article.introduction"), array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::textarea('introduction', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('introduction', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('content') ? 'has-error' : '' }}">
                {!! Form::label('content', trans("admin/article.content"), array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::textarea('content', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('content', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('source') ? 'has-error' : '' }}">
                {!! Form::label('source', trans("admin/article.source"), array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('source', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('source', ':message') }}</span>
                </div>
            </div>

            <!-- ./ general tab -->

        <!-- ./ tabs content -->


    <!-- Form Actions -->

    <div class="form-group">


            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>
                @if	(isset($article))
                    {{ trans("admin/modal.edit") }}
                @else
                    {{trans("admin/modal.create") }}
                @endif
            </button>

    </div>
    <!-- ./ form actions -->

    </form>
</div>
@stop