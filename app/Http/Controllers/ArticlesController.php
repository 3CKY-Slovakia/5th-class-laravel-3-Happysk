<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\SaveArticleRequest;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;


class ArticlesController extends Controller
{

    /**
     * Middleware
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'destroy' ]]);
        $this->middleware('articleOwner:', ['except' => ['index', 'show', 'create', 'store' ]]);
	    $this->middleware('articlesLimit', ['only' => 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // sending articles and tags to homepage
	    $articles = Article::latest('created_at')->get();
        $tags = Tag::all();

        return view('articles.index', compact('tags', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show form for creating articles with tags
	    $tags = Tag::all();
	    return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveArticleRequest $request)
    {
	    // create article after successful validation
	    $article = Auth::user()->articles()->create( $request->all() );

	    //attach tags to article
	    $article->tags()->sync($request->get('tags') ?: []);

		// inform author of article via email
	    Mail::send('emails.article-creation', ['article' => $article], function ($message) use ($article) {
		    $message->subject('Your article: '.$article->title)
			    ->to($article->user->email, $article->user->name);
	    });

	    // redirect to author's newly created article and show success message a
	    Flash::success('You have just created this article!');
		return redirect()->route('article.show',$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
	    $tags = Tag::all();
	    $article->tags->lists('id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
	    $article->update( $request->all() );
	    $article->tags()->sync( $request->get('tags') ?: []);

	    Flash::success('You have just updated this article!');
	    return redirect()->to('article/show/'. $article->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    // find article
	    $article = Article::findOrFail($id);

	    // if authorized, delete
	    $this->authorize('edit-article', $article);
	    $article->delete();

	    // redirect and show success message
	    Flash::success('Your article has been deleted');
	    return redirect('/');

    }

}
