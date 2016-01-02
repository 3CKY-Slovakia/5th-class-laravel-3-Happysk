<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    // simple validation
	    if (!$request->get('text')){
		    return back()->withErrors(['text' => 'You have to write something!']);
	    }

	    $article = Article::findOrFail( $request->get('article_id') );

	    Comment::create([
		    'article_id' => $article->id,
		    'user_id'    => Auth::id(),
		    'text'       => $request->get('text')
	    ]);

	    return redirect()->route('article.show', $article->id);
    }


}
