<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users = User::orderBy('id' , 'desc')->paginate(99);
    $search = false;
    return view('welcome' , [
        'users' => $users,
    ]);
});

//route for posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'posts']);
Route::get('/posts/forSpecificUser', [App\Http\Controllers\PostController::class, 'forSpecificUser'])->middleware('auth');
Route::get('/posts/postInDetail/{postId?}', [App\Http\Controllers\PostController::class, 'postInDetail']);
Route::get('/posts/getUserStatus', [App\Http\Controllers\PostController::class, 'getUserStatus'])->middleware('auth');
Route::post('posts/makePost', [App\Http\Controllers\PostController::class, 'create'])->name('makePost')->middleware('auth');
Route::get('/posts/postCategory/{filter?}', [App\Http\Controllers\PostController::class, 'postCategory']);
Route::get('/posts/searchPost/{filter?}', [App\Http\Controllers\PostController::class, 'searchPost']);
Route::post('/posts/likePost/', [App\Http\Controllers\PostController::class, 'likePost'])->middleware('auth');
Route::post('/posts/unlikePost/', [App\Http\Controllers\PostController::class, 'unlikePost'])->middleware('auth');
Route::post('/posts/makeComment', [App\Http\Controllers\PostController::class, 'makeComment'])->middleware('auth');
Route::get('/posts/getMyComment/{post_id?}', [App\Http\Controllers\PostController::class, 'getMyComment']);
Route::get('/posts/liveAuthenticatedUserId', [App\Http\Controllers\PostController::class, 'liveAuthenticatedUserId'])->middleware('auth');
Route::post('/posts/makeCommentReply/', [App\Http\Controllers\PostController::class, 'makeCommentReply'])->middleware('auth');
Route::patch('/posts/deleteCommentAndReply/{commentReplyId}', [App\Http\Controllers\PostController::class, 'deleteCommentAndReply'])->middleware('auth');
Route::patch('/posts/deletePost/{postId}', [App\Http\Controllers\PostController::class, 'deletePost'])->middleware('auth');
Route::get('/posts/getPostsForSearchedUser/{userId}', [App\Http\Controllers\PostController::class, 'getPostsForSearchedUser']);

//Route for home controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

//register controller
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

//route for customers requesting for registration
Route::get('/registerRequests/{id?}', [App\Http\Controllers\RegisterRequestsController::class, 'index'])->name('registerRequests')->middleware('auth');


//adminstrator route for managing customer accounts
Route::get('/manageAccounts', [App\Http\Controllers\ManageAccountsController::class, 'index'])->name('manageAccounts')->middleware('auth');
Route::get('/manageAccounts/view', [App\Http\Controllers\ManageAccountsController::class, 'show'])->middleware('auth');
Route::get('/manageAccounts/count/', [App\Http\Controllers\ManageAccountsController::class, 'userCount'])->middleware('auth');
Route::get('/manageAccounts/notificationCounter/', [App\Http\Controllers\ManageAccountsController::class, 'notificationCounter'])->middleware('auth');
Route::get('/manageAccounts/search/{filter?}', [App\Http\Controllers\ManageAccountsController::class, 'search'])->name('manageAccounts.search')->middleware('auth');
Route::delete('/manageAccounts/delete/{user}', [App\Http\Controllers\ManageAccountsController::class, 'destroy'])->name('manageAccounts.delete')->middleware('auth');
Route::patch('/manageAccounts/block/{user}', [App\Http\Controllers\ManageAccountsController::class, 'update'])->name('manageAccounts.block')->middleware('auth');
Route::get('/manageAccounts/blockHistory/{user}', [App\Http\Controllers\ManageAccountsController::class, 'blockHistory'])->middleware('auth');
Route::get('/manageAccounts/registerRequests', [App\Http\Controllers\ManageAccountsController::class, 'registerRequests'])->middleware('auth');
Route::patch('/manageAccounts/acceptRequest/archtecture/{acceptRequestId?}', [App\Http\Controllers\ManageAccountsController::class, 'acceptRequestArchtecture'])->middleware('auth');
Route::patch('/manageAccounts/acceptRequest/builder/{acceptRequestId?}', [App\Http\Controllers\ManageAccountsController::class, 'acceptRequestBuilder'])->middleware('auth');
Route::patch('/manageAccounts/acceptRequest/seller/{acceptRequestId?}', [App\Http\Controllers\ManageAccountsController::class, 'acceptRequestSeller'])->middleware('auth');
// Route::get('/manageAccounts/retrieveDocumentName/', [App\Http\Controllers\ManageAccountsController::class, 'retrieveDocumentName']);


//routes for register requests from customers
Route::post('/registerRequests/{requestType?}', [App\Http\Controllers\RegisterRequestsController::class, 'store'])->name('registerRequests')->middleware('auth');


//routes for account
Route::get('/account/{userId?}', [App\Http\Controllers\AccountController::class, 'index'])->name('account')->middleware('auth');
Route::post('/account/rate', [App\Http\Controllers\AccountController::class, 'rate'])->name('rate')->middleware('auth');
Route::get('/userInfo', [App\Http\Controllers\AccountController::class, 'user'])->name('user')->middleware('auth');
Route::get('/account/searchUser/{userId}', [App\Http\Controllers\AccountController::class, 'searchUser']);
Route::get('/account/postUserLikesCounter/{userId}', [App\Http\Controllers\AccountController::class, 'postUserLikesCounter']);
Route::get('/posts/limitUserRating/{rated_user_id}', [App\Http\Controllers\AccountController::class, 'limitUserRating'])->middleware('auth');


// profile routes for editing
Route::get('/editProfile', [App\Http\Controllers\EditProfileController::class, 'index'])->name('editProfile')->middleware('auth');
Route::get('/editProfile/editProfileText/{column?}/{value?}', [App\Http\Controllers\EditProfileController::class, 'editProfileText'])->middleware('auth');
Route::post('/editProfile/editProfilePicture', [App\Http\Controllers\EditProfileController::class, 'editProfilePicture'])->middleware('auth');


//Rouutes for requesting for services
Route::get('/requests', [App\Http\Controllers\RequestsController::class, 'index'])->name('requests')->middleware('auth');
Route::post('/request/makeRequest/', [App\Http\Controllers\RequestsController::class, 'makeRequest']);
Route::get('/request/getAllRequests/', [App\Http\Controllers\RequestsController::class, 'getAllRequests'])->middleware('auth');
Route::get('/request/requestsCounter', [App\Http\Controllers\RequestsController::class, 'requestsCounter'])->middleware('auth');
Route::post('/request/replyRequest', [App\Http\Controllers\RequestsController::class, 'replyRequest'])->middleware('auth');
Route::get('/requests/getConversation/{conversationId}', [App\Http\Controllers\RequestsController::class, 'getConversation'])->middleware('auth');
Route::get('/requests/requestsDetails/{conversationId}', [App\Http\Controllers\RequestsController::class, 'requestsDetails'])->middleware('auth');
Route::delete('/requests/deleteRequest', [App\Http\Controllers\RequestsController::class, 'deleteRequest'])->name('deleteRequest')->middleware('auth');
