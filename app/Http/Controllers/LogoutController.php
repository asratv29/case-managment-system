<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function studentLogout() {
        if(session()->has('sessionStudent')) {
            session()->pull('sessionStudent');
            return redirect('/');
        }
    }

    public function adminLogout() {
        if(session()->has('sessionAdmin')) {
            session()->pull('sessionAdmin');
            return redirect('/');
        }
    }
    public function deanLogout() {
        if(session()->has('sessionDean')) {
            session()->pull('sessionDean');
            return redirect('/');
        }
    }
    public function chairLogout() {
        if(session()->has('sessionChair')) {
            session()->pull('sessionChair');
            return redirect('/');
        }
    }

    public function instructorLogout() {
        if(session()->has('sessionInstructor')) {
            session()->pull('sessionInstructor');
            return redirect('/');
        }
    }

    public function secreteryLogout() {
        if(session()->has('sessionSecretery')) {
            session()->pull('sessionSecretery');
            return redirect('/');
        }
    }

    public function acLogout() {
        if(session()->has('sessionAc')) {
            session()->pull('sessionAc');
            return redirect('/');
        }
    }

    public function collageLogout() {
        if(session()->has('sessionCollage')) {
            session()->pull('sessionCollage');
            return redirect('/');
        }
    }

    public function registralLogout() {
        if(session()->has('sessionRegistral')) {
            session()->pull('sessionRegistral');
            return redirect('/');
        }
    }



}
