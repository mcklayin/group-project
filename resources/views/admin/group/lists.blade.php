@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/group.groups") !!} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/group.groups") !!}

        </h3>
    </div>

<a href="{!! URL::to('/admin/article?group_id='.$group->id) !!}" class="btn btn-primary">{!! trans('etc.news_group') !!}</a>
<a href="{!! URL::to('/admin/file?group_id='.$group->id) !!}" class="btn btn-primary">{!! trans('etc.files_group') !!}</a>
<a href="{!! URL::to('/admin/static?group_id='.$group->id) !!}" class="btn btn-primary">{!! trans('etc.statics_group') !!}</a>
<a href="{!! URL::to('/admin/user?group_id='.$group->id) !!}" class="btn btn-primary">{!! trans('etc.users_group') !!}</a>
@stop

{{-- Scripts --}}
@section('scripts')
@stop
