@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/group.groups") !!} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/group.groups") !!}
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{!! URL::to('admin/group/create') !!}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{
					trans("admin/modal.new") }}</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ trans("admin/group.name") }}</th>
            <th>{{ trans("admin/group.owner_name") }}</th>
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
