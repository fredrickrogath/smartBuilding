<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Requests;

class AccountController extends Controller
{
    public function index( $userId ){
        $user = User::where( 'id' , $userId )->with( 'posts.likes' )->get();

        $likesCounter = 0;

        for( $i = 0; $i < $user[0]->posts->count(); $i++ ){

            if( ! $user[0]->posts[ $i ]->likes->isEmpty() ){

                $likesCounter = $likesCounter + $user[0]->posts[ $i ]->likes->count();

            }


        }

        $newRequestsCounter = Requests::where('service_provider_id' , auth()->user()->id)->where('new' , 1)->count();

        return view('account' , [
            'user' => $user,
            'likesCounter' => $likesCounter,
            'newRequestsCounter' => $newRequestsCounter ,
        ]);
    }

    public function postUserLikesCounter( $userId ){

        $user = User::where( 'id' , $userId )->with( 'posts.likes' )->get();

        $likesCounter = 0;

        for( $i = 0; $i < $user[0]->posts->count(); $i++ ){

            if( ! $user[0]->posts[ $i ]->likes->isEmpty() ){

                $likesCounter = $likesCounter + $user[0]->posts[ $i ]->likes->count();

            }

        }

        return json_encode( $likesCounter );
    }

    public function AndroidPostUserLikesCounter( $userId ){

        $user = User::where( 'id' , $userId )->with( 'posts.likes' )->get();

        $likesCounter = 0;

        for( $i = 0; $i < $user[0]->posts->count(); $i++ ){

            if( ! $user[0]->posts[ $i ]->likes->isEmpty() ){

                $likesCounter = $likesCounter + $user[0]->posts[ $i ]->likes->count();

            }

        }

        return json_encode( $likesCounter );
    }

    public function rate(Request $request){

        if( Rate::where('user_id' , auth()->user()->id )->where('rated_user_id' , $request->idForTheRatedUser )->count() == 0 ){

            Rate::create([
                'user_id' => auth()->user()->id,
                'rated_user_id'=> $request->idForTheRatedUser,
                'rate' => $request->index,
            ]);

        }

        return json_encode('rated successfully');
    }

    public function AndroidRate(Request $request){

        if( Rate::where('user_id' , $request->user_id )->where('rated_user_id' , $request->idForTheRatedUser )->count() == 0 ){

            Rate::create([
                'user_id' => $request->user_id,
                'rated_user_id'=> $request->idForTheRatedUser,
                'rate' => $request->index,
            ]);

        }

        return json_encode('rated successfully');
    }

    public function user(){

        $user = User::where('id', auth()->user()->id)->with( 'posts.likes' )->get();

        return json_encode( $user );

    }

    public function AndroidUser( $user_id ){

        $user = User::where('id', $user_id)->get();

        return json_encode( $user );

    }

    public function searchUser( $userId ){

        $user = User::where( 'id' , $userId )->with('posts')->get();

        return json_encode( $user );

    }

    public function AndroidSearchUser( $userId ){

        $user = User::where( 'id' , $userId )->with('posts')->get();

        return json_encode( $user );

    }

    public function limitUserRating( $rated_user_id ){

        $rated = Rate::where('user_id' , auth()->user()->id )->where( 'rated_user_id' , $rated_user_id )->get();

        return json_encode( $rated );

    }

    public function AndroidLimitUserRating( Request $request){

        $rated = Rate::where('user_id' , $request->rating_user_id )->where( 'rated_user_id' , $request->rated_user_id )->get();

        return json_encode( $rated );

    }

}
