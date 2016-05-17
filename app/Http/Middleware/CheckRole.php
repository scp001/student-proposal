<?php namespace App\Http\Middleware;
// First copy this file into your middleware directoy
use Closure;
use App\Http\Controllers\Auth\Login;

class CheckRole{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		return Redirect::route('home')->with('user', Login::getUser());

	}

}
