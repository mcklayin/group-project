<?php

namespace App\Http\Controllers;

use App\Article;
use App\Files;
use App\Http\Requests\UserSettingsRequest;
use App\User;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserGroups;
use App\UserSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CabinetController extends Controller
{

    //onlye for logged users
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getUserData(User $user){
        $arrData['user'] = $user->toArray();
        $arrData['user_groups'] = $user->groups->first();




        return $arrData;
    }

    //show logged user cabinet
    public function index(Request $request)
    {
        $user = Auth::user();
        $arrData = array();
        $arrData = $this->getUserData($user);


        if ($request->ajax())
        {
            return json_encode($arrData, JSON_FORCE_OBJECT);
        }

        return view('cabinet.index', compact('arrData'));
    }
    
    /*
     * Show User Contacts
     */
    public function show(Request $request, User $user){

        $arrData = array();
        $arrData = $this->getUserData($user);

        if ($request->ajax())
        {
            return json_encode($arrData, JSON_FORCE_OBJECT);
        }

        return view('cabinet.show', compact('arrData'));
    }

    /*
     * Get Last Group news
     * @return view
     * @return json object if requested by ajax
     */
    public function getGroupNewsFeed(Request $request)
    {
        $user = Auth::user();
        $news = array();
        $user_settings = $request->session()->get('user_settings');
        if($user_settings['show_group_news_feed'])
        {
            $group_id = $user->groups->first()->id;

            if($group_id)
            {
                $news = Article::where('group_id','=',$group_id)->take($user_settings['news_group_feed_count'])->orderBy('updated_at','DESC')->get();
            }

            if($request->ajax())
            {
                return json_encode($news, JSON_FORCE_OBJECT);
            }

            return view('cabinet.news_block', compact('news'));
        }

    }

    /*
    * Get Last Group files
    * @return view
    * @return json object if requested by ajax
    */
    public function getGroupFilesFeed(Request $request)
    {
        $user = Auth::user();
        $files = array();
        $user_settings = $request->session()->get('user_settings');
        if($user_settings['show_group_files_feed'])
        {
            $group_id = $user->groups->first()->id;

            if($group_id)
            {
                $files = Files::where('group_id','=',$group_id)->take($user_settings['files_group_feed_count'])->orderBy('updated_at','DESC')->get();
               // $files = DB::table('files')->where('group_id','=',$group_id)->take($user_settings['files_group_feed_count'])->orderBy('updated_at','DESC')->get();


            }


            if($request->ajax())
            {
                return json_encode($files, JSON_FORCE_OBJECT);
            }

            return view('cabinet.files_block', compact('files'));
        }

    }

    /*
     * Update user settings
     */
    public function updateSettings(UserSettingsRequest $request){

        $user = Auth::user();
        $data = $request->all();

        if(!empty($data))
        {
            //delete old settings
            UserSettings::where('user_id','=',$user->id)->delete();
            //add new settings
            foreach($data as $k=>$v)
            {
                $array[] = array(
                    'user_id' => $user->id,
                    $k => $v
                );
            }

            if($array)
            {
                UserSettings::insert($array);

                //update session
                $request->session()->forget('user_settings');
                UserSettings::getKeyValue();

                return Response::json(array('status'=>'ok'));
            }

        }
    }
}
