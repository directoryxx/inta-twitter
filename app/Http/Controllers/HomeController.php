<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;

class HomeController extends Controller
{
    public function index(){
        //$data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);
        $data = Twitter::getSearch(['result_type'=>'latest','q'=> 'ojek online -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        $data = $data["statuses"];
        //dd($data);
        return view('welcome3',compact('data'));
    }

    public function jowoki(){
        return view('paslongj');
    }

    public function prabowo(){
        return view('paslongj');
    }
}
