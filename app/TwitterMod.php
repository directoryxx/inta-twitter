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
                ['tweet' => $value['full_text'], 'tanggal' => $value["created_at"],'execute_date'=>$mytime,'idtweet'=>$value["id"],'iduser'=>$value["user"]["id_str"],'username'=>$value["user"]["screen_name"],'namaakun'=>$value["user"]["name"],'platform'=>$value["source"],'paslon'=>"jokowi maruf"]
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

    public function getcurrentcountmostuserpra(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        $users = DB::table('tweet')
                     ->select(DB::raw('count(*) as count, username'))
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'prabowo sandiaga')
                     ->groupBy('username')
                     ->orderBy("count",'desc')
                     ->limit(3)
                     ->get();
        return $users;
    }


    public function getcurrentcountmostuserjok(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        $users = DB::table('tweet')
                     ->select(DB::raw('count(*) as count, username'))
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'jokowi maruf')
                     ->groupBy('username')
                     ->orderBy("count",'desc')
                     ->limit(3)
                     ->get();
        return $users;
    }

    public function getcurrentcountplatjok(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        $users = DB::table('tweet')
                     ->select(DB::raw('count(*) as count, platform'))
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'jokowi maruf')
                     ->groupBy('platform')
                     ->orderBy("count",'desc')
                     ->limit(3)
                     ->get();
        return $users;
    }

    public function getcurrentcountplatpra(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        $users = DB::table('tweet')
                     ->select(DB::raw('count(*) as count, platform'))
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'prabowo sandiaga')
                     ->groupBy('platform')
                     ->orderBy("count",'desc')
                     ->limit(3)
                     ->get();
        return $users;
    }

    public function gettweetpra(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        
        $users = DB::table('tweet')
                     ->select('tweet','username','platform')
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'prabowo sandiaga')
                     ->get();
        return $users;
    }

    public function gettweetjok(){
        $now = $this->getlastupdate();
        $lastexecute = $now->lastupdate;
        
        $users = DB::table('tweet')
                     ->select('tweet','username','platform')
                     ->where('execute_date', '=', $lastexecute)
                     ->where('paslon', '=', 'jokowi maruf')
                     ->get();
        //dd($users);
        return $users;
    }
}
