<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twitter;
use DB;
use Carbon\Carbon;

class TwitterMod extends Model
{
    public function getTweet($string){
        $data = Twitter::getSearch(['result_type'=>'latest','q'=> $string.' -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        $data = $data["statuses"];
        return $data;
    }

    public function getall(){
        $i = 0;
        $data = Twitter::getSearch(['result_type'=>'latest','q'=> 'prabowo sandiaga -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        $data = $data["statuses"];
        $mytime = Carbon::now();
        foreach ($data as $key => $value) {
            DB::table('tweet')->insert(
                ['tweet' => $value['full_text'], 'tanggal' => $value["created_at"],'execute_date'=>$mytime,'idtweet'=>$value["id"],'iduser'=>$value["user"]["id_str"],'username'=>$value["user"]["screen_name"],'namaakun'=>$value["user"]["name"],'platform'=>$value["source"],'paslon'=>"prabowo sandiaga"]
            );
        }
        $data = Twitter::getSearch(['result_type'=>'latest','q'=> 'jokowi maruf -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        $data = $data["statuses"];
        foreach ($data as $key => $value) {
            DB::table('tweet')->insert(
                ['tweet' => $value['full_text'], 'tanggal' => $value["created_at"],'execute_date'=>$mytime,'idtweet'=>$value["id"],'iduser'=>$value["user"]["id_str"],'username'=>$value["user"]["screen_name"],'namaakun'=>$value["user"]["name"],'platform'=>$value["source"],'paslon'=>"prabowo sandiaga"]
            );
        }
        DB::table('setting')->insert(
            ['lastupdate'=> $mytime] 
        );
        return true;
        //$data1 = Twitter::getSearch(['result_type'=>'latest','q'=> 'jokowi maruf -filter:retweets -filter:links','count' => 100, 'format' => 'array','tweet_mode'=> 'extended','retweeted'=>false]);
        
    }

    public function getlastupdate(){
        return DB::table('setting')->orderBy('id', 'desc')->first();
    }
}
