<?php

namespace App\Http\Controllers\Admin;

use App\Files;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'file');
        view()->share('params', '');
    }
    public function index()
    {
        $group_id = Input::get('group_id');
        view()->share('params', json_encode(array('group_id'=>$group_id)));

        return view('admin.file.index');
    }
    public function delete(Files $file)
    {
        $file->delete();
    }
    public function show(Files $file)
    {
        //todo
        /*
         * get file
         * and download it to user
         */
      //  return response()->download(public_path().'/'.$file->path, $file->filename);
    }
    public function data()
    {
        $file = Files::join("users", "users.id", '=',"files.user_id")->select(array('files.id','files.filename','files.path','users.name', 'files.created_at'));

        $params = Input::get('params');
        $group_id = $params['group_id'];

        if($group_id)
        {
            $file->where('group_id','=',$group_id);
        }

        return \Datatables::of($file)
            ->add_column('actions', '
                    <a href="{{{ URL::to(\'admin/file/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> {{                  trans("admin/modal.delete") }}</a>
                    <a href="{{{ URL::to(\'admin/file/\' . $id . \'/show\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-list"></span> {{                  trans("admin/modal.download") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
    }
}
