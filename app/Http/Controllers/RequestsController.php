<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\User;

class RequestsController extends Controller
{
    //

    public function index(){
        return view('requests');
    }

    public function makeRequest( Request $request ){

        $requestUserName = User::where('id', $request->request_user_id )->get();

        Requests::create([
            'service_provider_id' => $request->service_provider_id,
            'request_user_id'=> auth()->user()->id,
            'requestUserName'=> auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName,
            'body' => $request->body,
        ]);

        return json_encode( 'request sent successfully' );
    }

    public function getAllRequests(){
        $allRequests = Requests::where('service_provider_id' , auth()->user()->id)->get();

        return json_encode($allRequests);
    }

    // public function requestsCounter(){
    //     $counter = Requests::where('service_provider_id' , auth()->user()->id)->count();

    //     return json_encode($allRequests);
    // }
}
