@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/file.files") !!} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/file.files") !!}

        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ trans("admin/file.filename") }}</th>
            <th>{{ trans("admin/file.path") }}</th>
            <th>{{ trans("admin/file.username") }}</th>
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
