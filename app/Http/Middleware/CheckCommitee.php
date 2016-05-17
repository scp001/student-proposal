<?php namespace App\Http\Middleware;
// First copy this file into your middleware directoy
use Closure;
use App\Http\Controllers\Auth\Login;

class CheckCommitee{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Login::isCommitee()) {
//			var_dump("ffff");
//			die;
			return $next($request);		}

	}

}
