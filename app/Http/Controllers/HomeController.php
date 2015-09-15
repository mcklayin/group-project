<?php

namespace App\Http\Controllers;

use App\Article;
use App\PhotoAlbum;
use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::with('author')->orderBy('position', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();


		return view('pages.home', compact('articles'));
	}

}