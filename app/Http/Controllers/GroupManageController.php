<?php

namespace App\Http\Controllers;



use App\Article;
use App\Files;
use App\Http\Middleware\Group;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\StaticBlocksRequest;
use App\Privileges;
use App\Role;
use App\StaticBlocks;
use App\User;
use App\UserGroups;
use Exception;
use File;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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


    public function addNews(Request $request)
    {
        //check access to writing news
        if($this->checkPrivileges(2))
        {
            if($request->isMethod('post'))
            {
                $input = $request->all();


                $rules = array(
                    'title' => 'required|min:3',
                    'introduction' => 'required|min:20',
                    'content' => 'required|min:20',
                );
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                   
                    if ($request->ajax()) {
                        return Response::json(array('status' => 'fail', 'message' => $validator->messages()));
                    } else {
                        return Redirect::back()->withInput()->withErrors($validator);
                    }
                }

                try{
                    $input['language_id'] = 5;//ru
                    $article = new Article($input);
                    $article -> user_id = Auth::id();
                    $article -> group_id = $this->group->id;

                    $article->save();



                    $message = 'Новина успішно створена';
                    if ($request->ajax()) {
                        return Response::json(array('status'=>'ok','message'=>$message));
                    }
                    Session::flash('message', $message);
                    return Redirect::to('/group/manage/news');

                }catch(QueryException $e)
                {
                    Log::error("Error adding article - {$e->getMessage()}");
                }
            }

            return view('group_manage.news-form');
        }
    }
    public function editNews(Request $request,Gate $gate, Article $article)
    {
       /* if ($gate->allows('update-article', $article)) {
            dd('it\'s work');
        }*/
        //check access to edit news
        if($this->checkPrivileges(3))
        {
            if($request->isMethod('post'))
            {
                $input = $request->all();
                $rules = array(
                    'title' => 'required|min:3',
                    'introduction' => 'required|min:20',
                    'content' => 'required|min:20',
                );
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                    if ($request->ajax()) {
                        return Response::json(array('status' => 'fail', 'message' => $validator->messages()));
                    } else {
                        return Redirect::back()->withInput()->withErrors($validator);
                    }
                }

                try{
                    $article->update($input);

                    $message = 'Новина успішно оновлена';
                    if ($request->ajax()) {
                        return Response::json(array('status'=>'ok','message'=>$message));
                    }
                    Session::flash('message', $message);
                    return Redirect::to('/group/manage/news');

                }catch(QueryException $e)
                {
                    Log::error("Error updating article with id - {$article->id}");
                }
            }
            return view('group_manage.news-form', compact('article'));
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

    public function addStaticBlock(Request $request)
    {
        //check access to writing static blocks
        if($this->checkPrivileges(4))
        {
            if($request->isMethod('post'))
            {
                $input = $request->all();


                $rules = array(
                    'text' => 'required|min:20',
                );
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {

                    if ($request->ajax()) {
                        return Response::json(array('status' => 'fail', 'message' => $validator->messages()));
                    } else {
                        return Redirect::back()->withInput()->withErrors($validator);
                    }
                }

                try{
                    $block = new StaticBlocks($input);
                    $block -> group_id = $this->group->id;

                    $block->save();



                    $message = 'Статичний блок успішно створений';
                    if ($request->ajax()) {
                        return Response::json(array('status'=>'ok','message'=>$message));
                    }
                    Session::flash('message', $message);
                    return Redirect::to('/group/manage/blocks');

                }catch(QueryException $e)
                {
                    Log::error("Error adding static block - {$e->getMessage()}");
                }
            }

            return view('group_manage.static-form');
        }
    }

    public function editStaticBlock(Request $request, StaticBlocks $block)
    {
        //check access to edit static blocks
        if($this->checkPrivileges(5))
        {
            if($request->isMethod('post'))
            {
                $input = $request->all();
                $rules = array(
                    'text' => 'required|min:20',
                );
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                    if ($request->ajax()) {
                        return Response::json(array('status' => 'fail', 'message' => $validator->messages()));
                    } else {
                        return Redirect::back()->withInput()->withErrors($validator);
                    }
                }

                try{
                    $block->update($input);

                    $message = 'Статичний блок успішно оновленo';
                    if ($request->ajax()) {
                        return Response::json(array('status'=>'ok','message'=>$message));
                    }
                    Session::flash('message', $message);
                    return Redirect::to('/group/manage/blocks');

                }catch(QueryException $e)
                {
                    Log::error("Error updating static block with id - {$block->id}");
                }
            }
            return view('group_manage.static-form', compact('block'));
        }
    }

    public function deleteStaticBlock(Request $request, StaticBlocks $block)
    {
        //check access to delete static blocks
        if($this->checkPrivileges(4))
        {
            if($block->delete())
            {
                if($request->ajax())
                {
                    return Response::json(array('status'=>'ok'));
                }
                return Redirect::to('/group/manage/blocks');
            }
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
            $disk = Storage::disk('dropbox');
            $disk->delete($file->path);

            $file->delete();

            return Redirect::to('/group/manage/files');
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
                    $input = $request->all();
                   

                    $users = User::where('confirmed','=',1)
                                ->where('admin','!=',1)
                                ->where('phone','!=','')
                                ->where('email','!=','')
                                ->get();


                    foreach($users as $k=>$v)
                    {
                        if ($input['type'] == 'sms') {

                            try {
                                //$balance = SMS::getBalance();
                                //print_r($balance);

                                $message_id = SMS::send($input['text'], $v->phone);
                                if ($message_id) {
                                    $message = "Повідомлення успішно відправлено";
                                }
                                //  print_r($message_id);

                                //$message_id = 'faca2af2-5600-3316-7240-bcee37364ed7';
                                //$status = SMS::getStatus($message_id);
                                // print_r($status);


                            } catch (TurboSmsException $e) {
                                Log::error($e->getMessage());
                            }


                        } elseif ($input['type'] == 'email') {
                            Mail::send(array('text' => 'emails.plain'), array('hello' => $input['text']), function ($message) use($v) {
                                $message->from('groupsite@gmail.com', "Група - " . $this->group->name);
                                $message->to($v->email);
                            });
                            $message = "Повідомлення успішно відправлено";
                        }
                    }



                        if($request->ajax())
                        {
                            //todo ajax
                            return Response::json(array('status'=>'ok','message'=>$message));

                        }
                        else
                        {
                            Session::flash('message', $message);
                           return Redirect::to('/group/manage/sends');
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
    public function users(Request $request, GroupController $group)
    {
        $data = $group->getUsers(true);

        if($request->ajax())
        {
            return $data;
        }

        return view('group_manage.users-index')->with('data', json_decode($data, true));
    }
    /*
     * Add user to group
     */
    public function addUser(Request $request)
    {
        //check access to add user to group
        if($this->checkPrivileges(9))
        {

            $message = '';
            if($request->isMethod('post'))
            {
                $input = $request->get('user');

                if(!empty($input))
                {
                    foreach ($input as $k=>$v)
                    {
                        UserGroups::insert(array('user_id'=>$v,'group_id'=>$this->group->id));
                    }

                    $message = 'Користувач успышно доданий до групи';
                    if ($request->ajax()) {
                        return Response::json(array('status' => 'ok', 'message' => $message));
                    }
                }
                Session::flash('message', $message);
                return Redirect::to('/group/manage/users');
            }

            $all_users = User::where('confirmed','=',1)->where('admin','!=',1)->get();
            $users_in_group = UserGroups::all();

            $users = array_diff($all_users->lists('id')->toArray(), $users_in_group->lists('user_id')->toArray());



            return view('group_manage.user-add', compact('users', 'all_users'));
        }
    }
/*
 * change user privilegess
 */
    public function editUser(Request $request, User $user)
    {


        if($this->group->owner == Auth::user()->id)
        {

            $user_privileges = $this->user_privs;
            $roles = Role::where('id','>',2)->lists('name','id');

            if($request->isMethod('post'))
            {
                $input = $request->all();

                try{
                    unset($input['_token']);
                    DB::table('user_roles')->where('user_id','=',$user->id)->delete();

                    DB::table('user_roles')->insert(array('user_id'=>$user->id, 'role_id'=>$input['role']));

                    $message = 'Права користувача успішно змінено';
                    if ($request->ajax()) {
                        return Response::json(array('status'=>'ok','message'=>$message));
                    }
                    Session::flash('message', $message);
                    return Redirect::to('/group/manage/users');

                }catch(QueryException $e)
                {
                    Log::error("Error updating user privileges with  id - {$user->id} - {$e->getMessage()}");
                }
            }
            return view('group_manage.user-form', compact('roles','user_privileges', 'user'));
        }
    }
    /*
     * delete user from group
     */
    public function deleteUser(Request $request,User $user)
    {
        //check access to delete user from group
        if($this->checkPrivileges(10))
        {
            if(UserGroups::where('user_id','=',$user->id)->delete())
            {
                if($request->ajax())
                {
                    return Response::json(array('status'=>'ok'));
                }
                return Redirect::to('/group/manage/users');
            }
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
