<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ArticlesLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	    if(Auth::user()->numberOfArticles() >= 2 )
	    {
		    Flash::error('Sorry, you are not allowed to create more than 2 articles');
		    return redirect('/');
	    }
	    else
	    {
		    return $next($request);
	    }
    }
}
