@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/static.static_block") !!} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/static.static_block") !!}

        </h3>
    </div>
    {!! $block->text !!}
@stop

{{-- Scripts --}}
@section('scripts')
@stop