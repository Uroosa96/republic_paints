<?php

namespace App\Http\Middleware;

use Closure;

class UserPage
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

        $user= \Auth::user()->id;
        $access = \DB::table('page_user')->where('user_id', '=',$user)->where('page_id', '=','1')->exists();
        if($access){
            return $next($request);
 }
        return redirect('home');
    }
}
