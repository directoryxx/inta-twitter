<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;

class TwitterController extends Controller
{
    public function twitterUserTimeLine()
    {
        //$data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);
        $data = Twitter::getSearch(['result_type'=>'latest','q'=> 'prabowo sandiaga -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        $data = $data["statuses"];
        //dd($data);
        return view('twitter',compact('data'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
    	$this->validate($request, [
        		'tweet' => 'required'
        	]);


    	$newTwitte = ['status' => $request->tweet];

    	
    	if(!empty($request->images)){
    		foreach ($request->images as $key => $value) {
    			$uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    			if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    		}
    	}


    	$twitter = Twitter::postTweet($newTwitte);

    	
    	return back();
    }
}
