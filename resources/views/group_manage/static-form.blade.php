@extends('...layouts.app')
@section('title') Редагування статичних блоків гурпи :: @parent @stop


@section('content')
<div class="row">
@if (isset($block))
    <h1>Редагування Статичного блоку </h1>
@else
    <h1>Створення Статичного блоку </h1>
@endif
@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif

    @if (isset($block))
    {!! Form::model($block, array('url' => URL::to('group/manage/blocks') . '/' . $block->id.'/edit', 'method' => 'post','id'=>'fupload', 'class' => 'bf')) !!}
    @else
    {!! Form::open(array('url' => URL::to('group/manage/blocks/add'), 'method' => 'post', 'class' => 'bf','id'=>'fupload')) !!}
    @endif



            <div class="form-group  {{ $errors->has('content') ? 'has-error' : '' }}">
                {!! Form::label('content', trans("admin/article.content"), array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::textarea('text', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('text', ':message') }}</span>
                </div>
            </div>

            <div class="form-group  {{ $errors->has('is_active') ? 'has-error' : '' }}">
                {!! Form::label('is_active', 'Статус', array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::select('is_active',array('1'=>"Активний",'0'=>'Не активний') ,null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('is_active', ':message') }}</span>
                </div>
            </div>


            <!-- ./ general tab -->

        <!-- ./ tabs content -->


    <!-- Form Actions -->

    <div class="form-group">


            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>
                @if	(isset($block))
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