<?php

namespace App\Http\Middleware;

use App\Models\Poll;
use Closure;
use Illuminate\Http\Request;

class EnsurePollIsPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->route()->poll->status == Poll::PUBLISHED || $request->route()->poll->creator_id == $request->user()->id) {
            return $next($request);
        }

        abort(404);
    }
}
