<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ////  Student


        if(!session()->has('sessionStudent') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }
        if(session()->has('sessionStudent') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }

        //// Admin

        if(!session()->has('sessionAdmin') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionAdmin') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }


        ///// Registral

        if(!session()->has('sessionRegistral') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionRegistral') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }


        /////// AC

        if(!session()->has('sessionAc') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionAc') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }


        ////  Collage

        if(!session()->has('sessionCollage') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionCollage') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }

        ////  Dean

        if(!session()->has('sessionDean') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionDean') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }

        ///// Chair

        if(!session()->has('sessionChair') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionChair') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }


        ///// Instructor

        if(!session()->has('sessionInstructor') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionInstructor') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }

        ///// secretery

        if(!session()->has('sessionSecretery') && ($request->path() != '/' && $request->path() != 'register')) {
            return back();
        }

        if(session()->has('sessionSecretery') && ($request->path() == '/' || $request->path() == 'register')) {
            return back();
        }




        return $next($request);
    }
}
