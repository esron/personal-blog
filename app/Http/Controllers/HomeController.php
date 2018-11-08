<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == true) {
            return redirect(route('adminDashboard'));
        }

        if (Auth::user()->author == true) {
            return redirect(route('authorDashboard'));
        }

        return redirect(route('userDashboard'));
    }
}
