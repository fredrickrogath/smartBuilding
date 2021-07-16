<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Support\ServiceProvider;
use ProtoneMedia\LaravelFFMpeg\FFMpeg\CopyFormat;

class PostController extends Controller
{
    //
    public function index(){
        return view('post');
    }

    public function posts(){

        $posts = Post::with('likes.user')->orderBy('id' , 'desc')->get();


        return json_encode($posts);
    }

    public function archtecturePosts(){

        $posts = Post::with('likes.user')->orderBy('id' , 'desc')->where('userStatus', 'archtecture')->get();


        return json_encode($posts);
    }

    public function EngineerPosts(){

        $posts = Post::with('likes.user')->orderBy('id' , 'desc')->where('userStatus', 'houseBuilder')->get();


        return json_encode($posts);
    }

    public function SellerPosts(){

        $posts = Post::with('likes.user')->orderBy('id' , 'desc')->where('userStatus','seller')->get();


        return json_encode($posts);
    }

    public function forSpecificUser(){

        $posts = Post::with('likes.user')->where('user_id' , auth()->user()->id )->orderBy('id' , 'desc')->get();

        return json_encode($posts);

    }

    public function getUserStatus(){
        $user = User::find(auth()->user()->id);
        return json_encode($user);
    }

    public function create( Request $request){

        $this->validate($request, [
            'poster' => 'image',
            'status' => 'required',
        ]);

        $fileName = str_replace(' ', '', $request->file->getClientOriginalName());

        // dd($request->file->getMimeType() == 'image/png' || $request->file->getMimeType() == 'image/bmp' || $request->file->getMimeType() == 'image/jpg');

        if( $request->poster != null ){

            $posterName = $request->poster->getClientOriginalName();

            $request->poster->storeAs('uploads', $posterName, 'public');

            $request->file->storeAs('uploads', $fileName, 'public');


                // Store posts
        Post::create([
            'user_id' => auth()->user()->id,
            'sender_name' => auth()->user()->firstName . ' ' . auth()->user()->lastName,
            'userStatus' => $request->status ,
            'description' => $request->description,
            'mediaType' => $request->picked,
            'poster' => $posterName ,
            'avartar' => auth()->user()->avartar,
            'post' => $fileName,
            'region' => auth()->user()->region ,
        ]);


        // Get the video duration
        // $getID3 = new \getID3;
        // $file = $getID3->analyze( 'storage/uploads/' . $fileName );
        // $duration = date('H:i:s', $file['playtime_seconds']);

        // $post = Post::where( 'user_id' ,auth()->user()->id )->where('post' , $fileName)->update(array('duration' => $duration));

        return back();

        }

        $request->file->storeAs('uploads', $fileName, 'public');

        $posterName = $fileName;


            // Store posts
        Post::create([
            'user_id' => auth()->user()->id,
            'sender_name' => auth()->user()->firstName . ' ' . auth()->user()->lastName,
            'userStatus' => $request->status ,
            'description' => $request->description,
            'mediaType' => $request->picked,
            'poster' => $posterName ,
            'avartar' => auth()->user()->avartar,
            'cost' => $request->cost ,
            'post' => $fileName,
            'region' => auth()->user()->region ,
        ]);

        if( $request->file->getMimeType() == 'image/png' || $request->file->getMimeType() == 'image/bmp' || $request->file->getMimeType() == 'image/jpg' || $request->file->getMimeType() == 'image/jpeg' ){
            return back();
        }


        // Get the video duration
        $getID3 = new \getID3;
        $file = $getID3->analyze( 'storage/uploads/' . $fileName );
        $duration = date('H:i:s', $file['playtime_seconds']);


        $post = Post::where( 'user_id' ,auth()->user()->id )->where('post' , $fileName)->update(array('duration' => $duration));

        return back();

    }

    public function AndroidCreatePost( Request $request){

        $user = User::find($request->user_id);

        $fileName = $request->file->getClientOriginalName();

        Post::create([
            'user_id' => $request->user_id,
            'sender_name' => $user->firstName . ' ' . $user->lastName,
            'userStatus' => $request->status ,
            'description' => $request->description,
            'mediaType' => $request->picked,
            'poster' => '' ,
            'avartar' => $user->avartar,
            'cost' => $request->cost ,
            'post' => $fileName,
            'region' => $user->region ,
        ]);

        $request->file->storeAs('uploads', $fileName, 'public');

        return json_encode( 'posted successfully' );

    }

    public function postCategory( $filter ){

        if( $filter == 'region' ){

            $posts = Post::with('likes.user')->where('region' , auth()->user()->region )->orderBy('id' , 'desc')->get();

            return json_encode($posts);

        }

        $posts = Post::with('likes.user')->where('userStatus' , $filter )->orderBy('id' , 'desc')->get();


        return json_encode($posts);
    }

    public function searchPost( $filter ){

        $posts = Post::with('likes.user')->where('description', 'LIKE', '%' . $filter . '%')->orderBy('id' , 'desc')->get();


        return json_encode($posts);

    }

    public function AndroidSearchPost( $filter ){

        $posts = Post::with('likes.user')->where('description', 'LIKE', '%' . $filter . '%')->orderBy('id' , 'desc')->get();


        return json_encode($posts);

    }

    public function AndroidsearchPostByCost( Request $request){

        if ( $request->userStatus == 'archtecture' ){

        $posts = Post::with('likes.user')->where('cost' , '<=' , $request->postSearch )->where('userStatus' , 'archtecture' )->orderBy('cost' , 'desc')->get();

        }

        if ( $request->userStatus == 'houseBuilder' ){

            $posts = Post::with('likes.user')->where('cost' , '<=' , $request->postSearch )->where('userStatus' , 'houseBuilder' )->orderBy('cost' , 'desc')->get();

        }

        return json_encode( $posts );

    }

    public function likePost( Request $request ){

        if( Like::where('post_id', $request->post_id)->where('user_id' , auth()->user()->id)->count() == 0 ){

            Like::create([
                'user_id' => auth()->user()->id ,
                'post_id' => $request->post_id ,
            ]);
        }

        return json_encode( 'liked successfully' );
    }

    public function AndroidLikePost( Request $request ){

        if( Like::where('post_id', $request->post_id)->where('user_id' , $request->user_id)->count() == 0 ){

            Like::create([
                'user_id' => $request->user_id ,
                'post_id' => $request->post_id ,
            ]);
        }

        return json_encode( 'liked successfully' );
    }

    public function unlikePost( Request $request ){

     Like::where('post_id', $request->post_id)->where('user_id' , $request->user_id)->delete();

     return json_encode( 'unliked successfully' );

    }

    public function AndroidUnlikePost( Request $request ){

        Like::where('post_id', $request->post_id)->where('user_id' , $request->user_id)->delete();

        return json_encode( 'unliked successfully' );

       }

    public function postInDetail( $postId ){

        $post = Post::with('likes.user')->where( 'id', $postId )->get();

        return json_encode( $post );
    }

    public function makeComment( Request $request ){

        Comment::create([
                'user_id' => auth()->user()->id ,
                'post_id' => $request->post_id ,
                'body' => $request->myComment ,
                'sender_name' => auth()->user()->firstName . ' ' . auth()->user()->lastName ,
        ]);

        return json_encode( 'commented succcessfully' );
    }

    public function AndroidMakeComment( Request $request ){

        $user = User::find($request->user_id);

        Comment::create([
                'user_id' => $request->user_id ,
                'post_id' => $request->post_id ,
                'body' => $request->myComment ,
                'sender_name' => $user->firstName . ' ' . $user->lastName ,
        ]);

        return json_encode( 'commented succcessfully' );
    }

    public function getMyComment( $post_id ){

        return json_encode( Comment::with('replies')->where( 'post_id' , $post_id )->get() );
    }

    public function AndroidGetMyComment( $post_id ){

        return json_encode( Comment::with('replies')->where( 'post_id' , $post_id )->where( 'comment_id' , 0 )->get() );
    }


    public function liveAuthenticatedUserId(){

        return json_encode( auth()->user()->id );

    }

    public function makeCommentReply( Request $request ){

        Comment::create([
            'user_id' => auth()->user()->id ,
            'post_id' => $request->post_id ,
            'comment_id' => $request->comment_id ,
            'body' => $request->myComment ,
            'sender_name' => auth()->user()->firstName . ' ' . auth()->user()->lastName ,

        ]);

        return json_encode( 'comment replied succcessfully' );
    }

    public function AndroidMakeCommentReply( Request $request ){

        $user = User::find($request->user_id);

        Comment::create([
            'user_id' => $request->user_id ,
            'post_id' => $request->post_id ,
            'comment_id' => $request->comment_id ,
            'body' => $request->myComment ,
            'sender_name' => $user->firstName . ' ' . $user->lastName ,

        ]);

        return json_encode( 'comment replied succcessfully' );
    }

    public function deleteCommentAndReply( $commentReplyId ){

        $myComment = Comment::find( $commentReplyId );

        $myComment->delete();

        return json_encode( 'comment deleted succcessfully');

    }

    public function AndroidDeleteCommentAndReply( $commentReplyId ){

        $myComment = Comment::find( $commentReplyId );

        $myComment->delete();

        return json_encode( 'comment deleted succcessfully');

    }

    public function deletePost( $postId ){

        Post::where( 'id' , $postId )->delete();

        return json_encode( 'deleted succcessfully');
    }

    public function AndroidDeletePost( $postId ){

        Post::where( 'id' , $postId )->delete();

        return json_encode( 'deleted succcessfully');
    }

    public function getPostsForSearchedUser( $userId ){

        $posts = Post::where('user_id' , $userId )->get();

        return json_encode( $posts );
    }

    public function AndroidGetPostsForSearchedUser( $userId ){

        $posts = Post::where('user_id' , $userId )->get();

        return json_encode( $posts );
    }
}
