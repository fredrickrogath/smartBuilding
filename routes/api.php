<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/androidLogin', function (Request $request) {
//     return json_encode('login');
// });


// unauthenticated routes AndroidGetAllRequests
Route::get('/allPosts', [App\Http\Controllers\PostController::class, 'posts']);
Route::get('/archtecturePosts', [App\Http\Controllers\PostController::class, 'archtecturePosts']);
Route::get('/EngineerPosts', [App\Http\Controllers\PostController::class, 'EngineerPosts']);
Route::get('/SellerPosts', [App\Http\Controllers\PostController::class, 'SellerPosts']);
Route::get('/posts/getMyComment/{post_id?}', [App\Http\Controllers\PostController::class, 'AndroidGetMyComment']);
Route::get('/account/searchUser/{userId}', [App\Http\Controllers\AccountController::class, 'AndroidSearchUser']);
Route::get('/account/postUserLikesCounter/{userId}', [App\Http\Controllers\AccountController::class, 'AndroidPostUserLikesCounter']);
Route::get('/posts/getPostsForSearchedUser/{userId}', [App\Http\Controllers\PostController::class, 'AndroidGetPostsForSearchedUser']);
Route::post('/request/makeRequest', [App\Http\Controllers\RequestsController::class, 'AndroidMakeRequest']);
Route::post('/androidLogin', [App\Http\Controllers\Auth\RegisterController::class, 'AndroidAuthenticate']);
Route::post('/posts/likePost/', [App\Http\Controllers\PostController::class, 'AndroidLikePost']);
Route::post('/posts/unlikePost/', [App\Http\Controllers\PostController::class, 'AndroidUnlikePost']);
Route::post('/limitUserRating', [App\Http\Controllers\AccountController::class, 'AndroidLimitUserRating']);
Route::post('/account/rate', [App\Http\Controllers\AccountController::class, 'AndroidRate']);
Route::get('/userInfo/{user_id}', [App\Http\Controllers\AccountController::class, 'AndroidUser']);
Route::post('/makeComment', [App\Http\Controllers\PostController::class, 'AndroidMakeComment']);
Route::post('makeCommentReply', [App\Http\Controllers\PostController::class, 'AndroidMakeCommentReply']);
Route::delete('/deleteCommentAndReply/{commentReplyId}', [App\Http\Controllers\PostController::class, 'AndroidDeleteCommentAndReply']);
Route::get('/request/getAllRequests/{userId}', [App\Http\Controllers\RequestsController::class, 'AndroidGetAllRequests']);
Route::delete('/requests/deleteRequest/{delete_id}', [App\Http\Controllers\RequestsController::class, 'AndroidDeleteRequest']);
Route::delete('/deletePost/{postId}', [App\Http\Controllers\PostController::class, 'AndroidDeletePost']);
Route::get('/posts/searchPost/{filter?}', [App\Http\Controllers\PostController::class, 'AndroidSearchPost']);
Route::post('/posts/searchPostByCost', [App\Http\Controllers\PostController::class, 'AndroidsearchPostByCost']);
Route::post('/editProfile/editProfileText', [App\Http\Controllers\EditProfileController::class, 'AndroidEditProfileText']);
Route::post('/posts/AndroidCreatePost', [App\Http\Controllers\PostController::class, 'AndroidCreatePost']);
Route::post('/AndroidRegisterRequests', [App\Http\Controllers\RegisterRequestsController::class, 'AndroidRegisterRequests']);
Route::post('/androidRegister', [App\Http\Controllers\Auth\RegisterController::class, 'androidRegister']);






// TESTING API ROUTE

Route::get('/test', function () {
    // return Post::with('likes.user')->where('cost' , '<=' , 'houseBuilder' )->where('userStatus' , 'houseBuilder' )->orderBy('cost' , 'asc')->get();

    // Post::with('likes.user')->where('cost' , '<=' , 'archtecture' )->where('userStatus' , 'archtecture' )->orWhere('userStatus' , 'seller' )->orderBy('cost' , 'asc')->get();
});
