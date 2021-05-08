<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Post;
use App\Models\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newRequestsCounter = Requests::where('service_provider_id' , auth()->user()->id)->where('new' , 1)->count();

        return view('home' , [
            'newRequestsCounter' => $newRequestsCounter,
        ]);
    }

}
