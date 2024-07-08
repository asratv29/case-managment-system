<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('sessionStudent') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }


        if(Session()->has('sessionAdmin') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }


        if(Session()->has('sessionRegistral') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionAc') && (url('/') == $request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionCollage') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionDean') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionChair') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionInstructor') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }

        if(Session()->has('sessionSecretery') && (url('/')==$request->url() || url('register')==$request->url())) {
            return redirect()->back();
        }



        return $next($request);
    }
}
