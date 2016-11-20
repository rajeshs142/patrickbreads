<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class AdminMiddleware
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
        $user = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->select('users.admin')
                    ->get();

        if(count($user) === 1 && $user[0]->admin === 0){
            return response()->view('errors.401', [], 401);
        }
        return $next($request);
    }
}
