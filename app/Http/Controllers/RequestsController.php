<?php

// use Auth;
// use Illuminate\Support\Facades\Auth;

// namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Conversation;
use App\Models\User;

class RequestsController extends Controller
{
    //

    public function index(){

        $requests  = Requests::where('service_provider_id' , auth()->user()->id)->latest()->get();

        $requestsOld = Requests::where('service_provider_id' , auth()->user()->id)->get();

        foreach ($requestsOld as $request){
            $request->new = '0';
            $request->save();
        }

        $newRequestsCounter = Requests::where('service_provider_id' , auth()->user()->id)->where('new' , 1)->count();

        return view('requests' , [
            'requests' => $requests,
            'newRequestsCounter' => $newRequestsCounter,
        ]);
    }

    public function makeRequest( Request $request ){

        // if( Conversation::where( 'service_provider_id' , $request->service_provider_id )->where( 'request_user_id' , auth()->user()->id )->count() == '0' ){

        //     if( auth()->user()->id ){

        //         Conversation::create( [
        //             'service_provider_id' => $request->service_provider_id,
        //             'request_user_id'=> auth()->user()->id,
        //         ] );

        //     }

        //     else {
        //         Conversation::create( [
        //             'service_provider_id' => $request->service_provider_id,
        //             'request_user_id'=> '0',
        //         ] );
        //     }

        // }

        // $requestUserName = User::where('id', $request->request_user_id )->get();

        // $conversation_id = Conversation::where( 'service_provider_id' , $request->service_provider_id )->where( 'request_user_id' , auth()->user()->id )->get();

        if ( auth()->user() ) {

            Requests::create([
                'service_provider_id' => $request->service_provider_id,
                'request_user_id'=> '1',
                'conversation_id' => '1',
                'requestUserName'=> auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName,
                'body' => $request->body,
            ]);

            return json_encode( 'request sent successfully' );

        }

        else {
            Requests::create([
                'service_provider_id' => $request->service_provider_id,
                'request_user_id'=> '1',
                'conversation_id' => '1',
                'requestUserName'=> 'unregistered',
                'body' => $request->body,
            ]);

            return json_encode( 'request sent successfully' );
        }

    }

    public function AndroidMakeRequest( Request $request ){

        // if( Conversation::where( 'service_provider_id' , $request->service_provider_id )->where( 'request_user_id' , auth()->user()->id )->count() == '0' ){

        //     if( auth()->user()->id ){

        //         Conversation::create( [
        //             'service_provider_id' => $request->service_provider_id,
        //             'request_user_id'=> auth()->user()->id,
        //         ] );

        //     }

        //     else {
        //         Conversation::create( [
        //             'service_provider_id' => $request->service_provider_id,
        //             'request_user_id'=> '0',
        //         ] );
        //     }

        // }

        // $requestUserName = User::where('id', $request->request_user_id )->get();

        // $conversation_id = Conversation::where( 'service_provider_id' , $request->service_provider_id )->where( 'request_user_id' , auth()->user()->id )->get();

        // if ( auth()->user() ) {

        //     Requests::create([
        //         'service_provider_id' => $request->service_provider_id,
        //         'request_user_id'=> '100',
        //         'conversation_id' => '100',
        //         'requestUserName'=> auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName,
        //         'body' => $request->body,
        //     ]);

        // }

        // else {
        //     Requests::create([
        //         'service_provider_id' => $request->service_provider_id,
        //         'request_user_id'=> '100',
        //         'conversation_id' => '100',
        //         'requestUserName'=> 'unregistered',
        //         'body' => $request->body,
        //     ]);
        // }

        Requests::create([
                    'service_provider_id' => $request->service_provider_id,
                    'request_user_id'=> '1',
                    'conversation_id' => '1',
                    'requestUserName'=> 'unregistered',
                    'body' => $request->body,
                ]);

        return json_encode( 'request sent successfully' );
    }

    public function getAllRequests(){

        $checkUserStatus = User::where('id' , auth()->user()->id)->get();

        if( $checkUserStatus[0]->archtecture == '1' || $checkUserStatus[0]->seller == '1' || $checkUserStatus[0]->houseBuilder == '1' ){

            $conversations = Conversation::with('requests')->where('service_provider_id' , auth()->user()->id)->get();

            return json_encode( $conversations );

        }

        $conversations = Conversation::where('request_user_id' , auth()->user()->id)->get();

        return json_encode( $conversations );

    }

    public function AndroidGetAllRequests( $userId ){

        // $checkUserStatus = User::where('id' , $userId)->get();

        // if( $checkUserStatus[0]->archtecture == '1' || $checkUserStatus[0]->seller == '1' || $checkUserStatus[0]->houseBuilder == '1' ){

        //     $conversations = Conversation::with('requests')->where('service_provider_id' , $userId)->get();

        //     return json_encode( $conversations );

        // }

        $conversations = Requests::where('service_provider_id' , $userId)->get();

        return json_encode( $conversations );

    }

    public function requestsCounter(){

        $checkUserStatus = User::where('id' , auth()->user()->id)->get();

        if( $checkUserStatus[0]->archtecture == '1' || $checkUserStatus[0]->seller == '1' || $checkUserStatus[0]->houseBuilder == '1' ){

            $counter = Requests::where('service_provider_id' , auth()->user()->id)->count();

            return json_encode( $counter );

        }

        $counter = Requests::where('request_user_id' , auth()->user()->id)->count();

        return json_encode( $counter );
    }

    public function replyRequest( Request $request ){

        $checkUserStatus = User::where('id' , auth()->user()->id)->get();

        if( $checkUserStatus[0]->archtecture == '1' || $checkUserStatus[0]->seller == '1' || $checkUserStatus[0]->houseBuilder == '1' ){


        $conversation_id = Conversation::where( 'service_provider_id' , auth()->user()->id )->where( 'request_user_id' , $request->request_user_id )->get();

        Requests::create([
            'service_provider_id' => $request->service_provider_id,
            'request_user_id'=> auth()->user()->id,
            'conversation_id' => $conversation_id[0]->id,
            'requestUserName'=> auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName,
            'body' => $request->body,
        ]);

        return json_encode( 'replied successfully');

        }

    }

    public function getConversation( $conversationId ){

        $conversation = Requests::where('conversation_id' , $conversationId)->get();

        return json_encode( $conversation );

    }


    public function requestsDetails( $conversationId ){

        $requestsDetails = Conversation::where('id' , $conversationId)->get();

        return json_encode( $requestsDetails );

    }

    public function deleteRequest( Request $request){
        $deleteRequest = Requests::where('id' , $request->requestId)->delete();

        return back();
    }

    public function AndroidDeleteRequest( $delete_id ){
        $deleteRequest = Requests::where('id' , $delete_id )->delete();

        return json_encode( 'deleted successfully' );
    }


}
