<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XssMiddleware
{
        /**
         * The following method loops through all request input and strips out all tags from
         * the request. This to ensure that users are unable to set ANY HTML within the form
         * submissions, but also cleans up input.
         *
         * @param Request $request
         * @param callable $next
         * @return mixed
         */
        public function handle(Request $request, \Closure $next)
    {
        if (!in_array(strtolower($request->method()), ['put', 'post', 'patch'])) {
            return $next($request);
        }

        $input = $request->all();

        array_walk_recursive($input, function(&$input) {
            $search  = array("<script","<SCRIPT","http:","HTTP:","window.","WINDOW.","javascript:","JAVASCRIPT:","<meta","<META","<EMBED","alert(","ALERT(");
            $replace = array(""       ,""       ,""     ,""     ,""       ,""       ,""           ,""           ,""    ,""      ,""      ,""      ,"");
            $input = str_replace($search,$replace,$input);
        });

        $request->merge($input);

        return $next($request);
    }
}
