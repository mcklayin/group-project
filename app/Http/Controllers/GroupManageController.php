<?php

namespace App\Http\Controllers;



use App\Article;
use App\Files;
use App\Http\Middleware\Group;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\StaticBlocksRequest;
use App\StaticBlocks;
use App\User;
use Exception;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FilesystemInterface;
use Newway\TurboSms\Exceptions\TurboSmsException;
use Newway\TurboSms\Facade as SMS;

class GroupManageController extends Controller
{
    protected  $group;
    protected  $user_privs;
    //
    public function __construct()
    {
        $this->group = Auth::user()->groups->first();
        view()->share('group' ,$this->group);
        $this->user_privs = Auth::user()->privileges();

    }

    public function manage()
    {

        return view('group_manage.manage');
    }

    /*
     * news block
     */
    public function news(Request $request, GroupController $group)
    {
        $data = $group->getNews(true);

        if($request->ajax())
        {
            return $data;
        }

        return view('group_manage.news-index')->with('data', json_decode($data, true));
    }


    public function addNews()
    {
        //check access to writing news
        if($this->checkPrivileges(2))
        {

        }
    }
    public function editNews(Article $article)
    {
        //check access to edit news
        if($this->checkPrivileges(3))
        {

        }
    }

   

    public function deleteNews(Request $request,Article $article)
    {
        //check access to delete news
        if($this->checkPrivileges(2))
        {
            if($article->delete())
            {
                if($request->ajax())
                {
                    return Response::json(array('status'=>'ok'));
                }
                return Redirect::to('/group/manage/news');
            }
        }
    }

    /*
     * Static blocks
     */
    public function staticBlocks(Request $request, GroupController $group)
    {
        $data = $group->getStaticBlocks(true);

        if($request->ajax())
        {
            return $data;
        }

        return view('group_manage.static-index')->with('data', json_decode($data, true));
    }

    public function addStaticBlock()
    {
        //check access to writing static blocks
        if($this->checkPrivileges(4))
        {

        }
    }

    public function editStaticBlock(StaticBlocks $block)
    {
        //check access to edit static blocks
        if($this->checkPrivileges(5))
        {

        }
    }

    public function deleteStaticBlock(StaticBlocks $block)
    {
        //check access to delete static blocks
        if($this->checkPrivileges(4))
        {

        }
    }

    /*
   * Files block
   */
    public function files(Request $request,GroupController $group)
    {
        $data = $group->getFiles(true);

        if($request->ajax())
        {
            return $data;
        }

        return view('group_manage.files-index')->with('data', json_decode($data, true));
    }

    public function addFile(Request $request)
    {

        $answer = array();
        //check access to add files
        if($this->checkPrivileges(1))
        {
            if($request->isMethod('post'))
            {

               // return Response::json($_FILES);
                if($request->ajax()) {
                    $file = $_FILES['qqfile'];
                    $origin_name = $file['name'];
                    $file_path = $file['tmp_name'];
                }
                else
                {
                    $file = $request->file('file');
                    $origin_name = $file->getClientOriginalName();
                    $file_path = $file;
                }
                if(File::size($file_path) < 26214400)
                {
                    $disk = Storage::disk('dropbox');

                    Files::create(array('group_id' => $this->group->id, 'user_id' => Auth::user()->id, 'filename' => $origin_name, 'path' => $this->group->id . '/' . $origin_name));

                    $disk->makeDirectory($this->group->id);
                    $disk->put($this->group->id . '/' . $origin_name, File::get($file_path));

                    $answer = array('success' => true);
                }
                else
                {
                    $answer = array('success'=>false, 'message'=>"Розмір файлу занадто великий, максимальний розмір 25мб");
                }
                if ($request->ajax()) {
                    return Response::json($answer);
                }
            }

            return view('group_manage.files-form');
        }
    }

    public function deleteFile(Files $file)
    {
        //check access to delete files
        if($this->checkPrivileges(8))
        {

        }
    }

    /*
     * Sends block
     *
     */
    public function makeSend(Request $request)
    {

        //check access make sends
        if($this->checkPrivileges(6))
        {
            $arrTypes = array('sms'=>"SMS", 'email'=>"Email");
            if($request->isMethod('post'))
            {
                try{
                        //todo send message
                  /*  try {
                        $balance = SMS::getBalance();
                        print_r($balance);

                        //$message_id = SMS::send('Hi, Dima!', '+380951627975');
                        //  print_r($message_id);

                        //$message_id = 'faca2af2-5600-3316-7240-bcee37364ed7';
                        //$status = SMS::getStatus($message_id);
                        // print_r($status);


                    } catch (TurboSmsException $e) {
                        Log::error($e->getMessage());
                    }*/
                    /* Mail::send(array('text'=>'emails.plain'), array('hello'=>'hello w'), function($message){
                        $message->from('groupsite@gmail.com', "Група - ".$this->group->name);
                        $message->to('mcklayin@gmail.com');
                    });*/
                        $message = "Повідомлення успішно відправлено";
                        if($request->ajax())
                        {
                            //todo ajax
                            return Response::json(array('status'=>'ok','message'=>$message));

                        }
                        else
                        {
                            return view('group_manage.send-form', compact('arrTypes','message'));
                        }
                }catch(Exception $e)
                {
                    Log::error($e->getMessage().' in file - '.$e->getFile().' on line - '.$e->getLine());
                }
            }
            else
            {
                return view('group_manage.send-form', compact('arrTypes'));
            }

        }
    }
    /*
     * Users block
     * Users list
     */
    public function users(GroupController $group)
    {
        $data = $group->getUsers(true);

        if(Request::ajax())
        {
            return $data;
        }

        return view('group_manage.users-index')->with('data', json_decode($data, true));
    }
    /*
     * Add user to group
     */
    public function addUser()
    {
        //check access to add user to group
        if($this->checkPrivileges(9))
        {

        }
    }
/*
 * change user privilegess
 */
    public function editUser(User $user)
    {
        if($this->group->user_id == Auth::user()->id)
        {

        }
    }
    /*
     * delete user from group
     */
    public function deleteUser(User $user)
    {
        //check access to delete user from group
        if($this->checkPrivileges(10))
        {

        }
    }

    private function checkPrivileges($key)
    {
        if(array_key_exists($key,$this->user_privs) || $this->group->user_id == Auth::user()->id || Auth::user()->roles->first()->id == 1)
        {
            return true;
        }


        return Redirect::to(route('cabinet'));
    }

}
