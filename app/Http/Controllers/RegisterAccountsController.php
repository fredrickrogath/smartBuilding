<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegisterAccountsController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('registerAccounts');
    }
}
