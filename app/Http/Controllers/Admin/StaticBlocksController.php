<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\AdminController;
use App\StaticBlocks;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StaticBlocksController extends AdminController
{

    public function __construct()
    {
        view()->share('type', 'static');
        view()->share('params', '');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('admin.static.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(StaticBlocks $block)
    {
        //

        return view('admin.static.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(StaticBlocks $block)
    {
        //
        $block->delete();
    }

    public function data()
    {
        $file = StaticBlocks::select(array('static_blocks.id','static_blocks.text','static_blocks.is_active', 'static_blocks.created_at'));

        $params = Input::get('params');
        $group_id = $params['group_id'];

        if($group_id)
        {
            $file->where('group_id','=',$group_id);
        }

        return \Datatables::of($file)
            ->edit_column('is_active', '@if ($is_active=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif')
            ->add_column('actions', '

                    <a href="{{{ URL::to(\'admin/static/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger "><span class="glyphicon glyphicon-trash"></span> {{                  trans("admin/modal.delete") }}</a>
                    <a href="{{{ URL::to(\'admin/static/\' . $id . \'/show\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-list"></span> {{                  trans("admin/modal.view") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
    }
}
