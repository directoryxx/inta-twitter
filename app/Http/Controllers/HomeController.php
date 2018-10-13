<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TwitterMod;

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
        return view('home');
    }

    public function refresh(){
        $twittermod = new TwitterMod();
        $twittermod->getAll();
        //dd($twittermod->getlastupdate());
        return redirect()->back();
    }


}
