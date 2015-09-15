@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($group))
{!! Form::model($group, array('url' => URL::to('admin/group') . '/' . $group->id, 'method' => 'put','id'=>'fupload', 'class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/group'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
        <!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group  {{ $errors->has('owner') ? 'has-error' : '' }}">
            {!! Form::label('owner', trans("admin/group.owner"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::select('owner', $users, @isset($group) ? $group->owner : '0', array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('owner', ':message') }}</span>
            </div>
        </div>

        <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', trans("admin/group.name"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>

           <div class="form-group  {{ $errors->has('is_active') ? 'has-error' : '' }}">
                    {!! Form::label('is_active', trans("admin/group.is_active"), array('class' => 'control-label')) !!}
                    <div class="controls">
                        {!! Form::select('is_active', $active, @isset($group) ? $group->is_active : '0', array('class' => 'form-control')) !!}
                        <span class="help-block">{{ $errors->first('is_active', ':message') }}</span>
                    </div>
           </div>

        <!-- ./ general tab -->
    </div>
    <!-- ./ tabs content -->
</div>

<!-- Form Actions -->

<div class="form-group">
    <div class="col-md-12">
        <button type="reset" class="btn btn-sm btn-warning close_popup">
            <span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
        </button>
        <button type="reset" class="btn btn-sm btn-default">
            <span class="glyphicon glyphicon-remove-circle"></span> {{
						trans("admin/modal.reset") }}
        </button>
        <button type="submit" class="btn btn-sm btn-success">
            <span class="glyphicon glyphicon-ok-circle"></span>
            @if	(isset($news))
                {{ trans("admin/modal.edit") }}
            @else
                {{trans("admin/modal.create") }}
            @endif
        </button>
    </div>
</div>
<!-- ./ form actions -->

</form>
@stop
