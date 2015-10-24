@extends('...layouts.app')
@section('title') Управління користувачами групи :: @parent @stop


@section('content')
<div class="row">

    <h1>Додавання користувача до групи</h1>

@if(Session::get('message'))
	<div class="message-box bg-primary">
		{{Session::get('message')}}
	</div>
@endif


    {!! Form::open() !!}


            <div class="form-group  {{ $errors->has('privileges') ? 'has-error' : '' }}">
                    @if($all_users)
                      <select name="user[]" multiple class="form-control" style="min-height:300px;">
                        @foreach($all_users as $k=>$v)
                          @if(in_array($v->id, $users))
                            <option value="{!! $v->id !!}">
                                {!! $v->name !!}
                            </option>
                          @endif
                        @endforeach
                      </select>
                    @endif

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