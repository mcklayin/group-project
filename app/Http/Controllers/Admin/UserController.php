<?php namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\AdminController;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class UserController extends AdminController
{


    public function __construct()
    {
        view()->share('type', 'user');
        view()->share('params', '');
    }

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        $group_id = Input::get('group_id');
        view()->share('params', json_encode(array('group_id'=>$group_id)));

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $groups = Group::all()->lists('name','id');
        return view('admin.user.create_edit', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {

        $user = new User ($request->except('password','password_confirmation'));
        $user->password = bcrypt($request->password);
        $user->confirmed = 1;
        $user->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function edit(User $user)
    {
        $groups = Group::all()->lists('name','id');


        return view('admin.user.create_edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user->password = bcrypt($password);
            }
        }
        $user->group_id = $request->get('group_id');
        $user->update($request->except('password','password_confirmation','group_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function delete(User $user)
    {
        return view('admin.user.delete', compact('user'));
    }

    public function deleteFromGroup(User $user, $id)
    {
        $d = DB::table("user_groups")->where('user_id','=',$user->id)->delete();

        return Redirect::to('/admin/user?group_id='.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $users = User::leftJoin('user_groups', 'users.id', '=', 'user_groups.user_id')
                 ->select(array('users.id', 'users.name', 'users.email', 'users.confirmed','user_groups.group_id', 'users.created_at'));

        $params = Input::get('params');
        $group_id = $params['group_id'];

        if($group_id)
        {
            $users->where('user_groups.group_id','=',$group_id);
        }

        return Datatables::of($users)
            ->edit_column('confirmed', '@if ($confirmed=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif')
            ->add_column('actions', '@if ($id!="1")<a href="{{{ URL::to(\'admin/user/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/user/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                @endif
              @if($group_id)
                <a href="{{{ URL::to(\'admin/user/\' . $id . \'/deleteFromGroup/\'.$group_id ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete_from_froup") }}</a>
              @endif
               <input type="hidden" name="row" value="{{$id}}" id="row">
                ')
            ->remove_column('id')
            ->make();
    }

}
