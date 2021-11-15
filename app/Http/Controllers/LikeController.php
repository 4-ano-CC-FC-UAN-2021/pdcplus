<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Like;
use Exception;

class LikeController extends Controller
{
    public function countLikes($post_id){
        return count(DB::select( DB::raw("SELECT * from likes where post_id = ".$post_id." and tipo=1")));
    }

    public function countUnlikes($post_id){
        return count(DB::select( DB::raw("SELECT * from likes where post_id = ".$post_id." and tipo=0")));
    }

    public function isClassificao($post_id){
        $classificao = DB::select( DB::raw("SELECT tipo FROM `likes` WHERE user_id =".Auth::user()->id ." and post_id=".$post_id));
        
        return $classificao[0]->tipo ?? -1;
    }

    public function like(Request $request){
        $like = new Like;
        try{
            
            if($this->isClassificao($request->postid) == -1){
                $like->post_id = $request->postid;
                $like->tipo = $request->type;
                $like->user_id = Auth::user()->id;
                $like->save();
                $return_arr = array("likes" => $this->countLikes($request->postid), "unlikes" => $this->countUnlikes($request->postid));
                echo json_encode($return_arr);
            }else{
                $classificaoUpdate = DB::table('likes')->where([['post_id',$request->postid],['user_id',Auth::user()->id]])->update(['tipo' => $request->type]); 
                $return_arr = array("likes" => $this->countLikes($request->postid), "unlikes" => $this->countUnlikes($request->postid));
                echo json_encode($return_arr);
            }

        }catch(Exception $e){

        }

    }
}
