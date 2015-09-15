<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
        view()->share('params', '');
    }

	public function index()
	{
        $title = "Dashboard";

        $news = Article::count();
        $newscategory = ArticleCategory::count();
        $users = User::count();

		return view('admin.dashboard.index',  compact('title','news','newscategory','users'));
	}
}