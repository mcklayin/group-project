<?php

namespace App\Http\Controllers;

use App\Article;
use App\Files;
use App\Group;
use App\StaticBlocks;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserGroups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GroupController extends Controller
{

    protected  $group;
    public function __construct()
    {
        $this->group = Auth::user()->groups->first();
        view()->share('group' ,$this->group);

    }

    /*
     * return group AJAX ONLY
     */
    public function getGroup($param = false)
    {

        if(Request::ajax() || $param)
        {
            return Response::json($this->group);
        }

        return $this->group;
    }
    /*
     * Group Dashboard
     */
    public function index()
    {
        //static blocks
        $static_blocks  = (string)$this->getStaticBlocks();




        return view('group.index', compact('static_blocks'));

    }

    /*
     * Get List of Group Static blocks
     * @return view of static_blocks
     * @return JSON if request is ajax
     */
    public function getStaticBlocks($param = false){

        $data = StaticBlocks::where('group_id','=',$this->group->id)->where('is_active','=',1)->get();


        if(Request::ajax() || $param)
        {
            return $data->toJson();
        }

        return view('group.static_blocks', compact('data'));
    }

    /*
     * Get list of Users Which in this Group
     * @return view of users
     * @return JSON if request is ajax
     */
    public function getUsers($param = false)
    {
        $data = UserGroups::select('users.id as user_id', 'users.*')->join('users','users.id','=','user_groups.user_id')->where('group_id','=',$this->group->id)->get();

        if(Request::ajax() || $param)
        {
            return $data->toJson();
        }

        return view('group.users', compact('data'));
    }
    /*
    * Get Last Group news
    * @return view
    * @return json object if requested by ajax
    */
    public function getNews($param = false)
    {
        $news = array();
        $news = Article::where('group_id','=',$this->group->id)->orderBy('updated_at','DESC')->get();


        if(Request::ajax() || $param)
        {
            return $news->toJson();
        }

        return view('group.news', compact('news'));

    }

    /*
  * Get  Group files
  * @return view
  * @return json object if requested by ajax
  */
    public function getFiles($param = false)
    {

        $files = Files::where('group_id','=',$this->group->id)->orderBy('updated_at','DESC')->get();

        if(Request::ajax() || $param)
        {
            return $files->toJson();
        }

        return view('group.files', compact('files'));

    }
    /*
     * Get File
     * @return  upload file for user
     */
    public function getFile(Files $file)
    {
        if(Request::ajax())
        {
            return $file->toJson();
        }

        $response = new StreamedResponse;


        $response->setCallBack(function() use ($file)
        {
            $disk = Storage::disk('dropbox');
            echo $disk->get($file->path);
        });

        $disposition = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $file->filename);
        $response->headers->set('Content-Disposition',$disposition);

        return $response;
      //  return response()->download(public_path().'/'.$file->path, $file->filename);
    }



}
