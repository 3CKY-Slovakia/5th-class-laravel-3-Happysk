<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ArticleOwnage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $articleID)
    {
        if(empty(Auth::user()->isOwner($request->id))){
            Flash::error('You are not owner of this article, so you cannot edit or delete it');
	        return redirect('/');
        }else{
            return $next($request);
        }
    }
}
