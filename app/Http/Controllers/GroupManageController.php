<?php

namespace App\Http\Controllers;



use App\Article;
use App\Files;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\StaticBlocksRequest;
use App\StaticBlocks;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

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
    public function news()
    {

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

   

    public function deleteNews(Article $article)
    {
        //check access to delete news
        if($this->checkPrivileges(2))
        {

        }
    }

    /*
     * Static blocks
     */
    public function staticBlocks()
    {

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
    public function files()
    {

    }

    public function addFile(Files $file)
    {
        //check access to add files
        if($this->checkPrivileges(1))
        {

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
    public function makeSend()
    {
        //check access make sends
        if($this->checkPrivileges(6))
        {

        }
    }
    /*
     * Users block
     * Users list
     */
    public function users()
    {

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
