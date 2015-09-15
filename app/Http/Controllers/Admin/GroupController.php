<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\GroupRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group as Group;
use App\User as User;
use Illuminate\Support\Facades\DB;

class GroupController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'group');
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
        // Show the page
        return view('admin.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $users = User::where('confirmed','=',1)->get()->lists('name','id');
        $active = array('0'=>'No', '1'=>'Yes');

        return view('admin.group.create_edit',compact('users', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(GroupRequest $request)
    {
        //
        $group = new Group($request->all());
        $group -> save();

        DB::table('user_groups')->insert(array('group_id'=>$group->id, 'user_id'=>$group->owner));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Group $group)
    {
        //

        return view('admin.group.lists', compact('group'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function delete(Group $group)
    {
        return view('admin.group.delete', compact('group'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Group $group)
    {

        $users = User::where('confirmed','=',1)->get()->lists('name','id');
        $active = array('0'=>'No', '1'=>'Yes');

        return view('admin.group.create_edit',compact('group', 'users', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(GroupRequest $request, Group $group)
    {
        //

        DB::table('user_groups')->where('group_id','=',$group->id)->where('user_id','=',$group->owner)->delete();
        $group->update($request->all());
        DB::table('user_groups')->insert(array('group_id'=>$group->id, 'user_id'=>$group->owner));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Group $group)
    {
        //
        DB::table('user_groups')->where('group_id','=',$group->id)->delete();
        $group->delete();

    }

    public function data()
    {
        $group = Group::join('users', 'users.id', '=', 'groups.owner')

            ->select(array('groups.id','groups.name', 'users.name as owner','groups.is_active', 'groups.created_at'));

        return \Datatables::of($group)
            ->edit_column('is_active', '@if ($is_active=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/group/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon                              glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/group/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{                  trans("admin/modal.delete") }}</a>
                    <a href="{{{ URL::to(\'admin/group/\' . $id . \'/show\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-list"></span> {{                  trans("admin/modal.view") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
    }
}
