<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ArticlesController extends Controller {


    public function index()
    {
        $articles = Article::paginate(5);
        $articles->setPath('articles/');

        return view('article.index', compact('articles'));
    }

	public function show($slug)
	{
		$article = Article::findBySlugOrId($slug);
        //check if article from user group
        if(Auth::user()->groups->first()->id != $article->group_id)
            return Redirect::to(route('cabinet'));

		return view('article.view', compact('article'));
	}

}
