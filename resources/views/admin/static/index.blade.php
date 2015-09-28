@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/static.static_blocks") !!} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/static.static_blocks") !!}

        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ trans("admin/static.text") }}</th>
            <th>{{ trans("admin/group.is_active") }}</th>
            <th>{{ trans("admin/admin.created_at") }}</th>
            <th>{{ trans("admin/admin.action") }}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
@stop
