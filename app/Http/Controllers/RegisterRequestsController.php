<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Archtecture;
use App\Models\Seller;
use App\Models\Builder;
// use Illuminate\Support\Facades\Validator;

class RegisterRequestsController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index($id){
        $accountType = /*Crypt::decrypt(*/$id/*)*/;

        return view('registerRequests' , [
            'accountType' => $accountType,
        ]);
    }

    public function store(Request $request , $requestType){

        // codes for archtecture request requirements
        if($requestType == 'archtecture'){

            //Validate User request requirements
        $this->validate($request, [
            'certificate' => 'required | pdf' ,
            'tinNumber' => 'required | max:255',
            'nationalId' => 'required | max:255',
        ]);

        $fileName = $request->certificate->getClientOriginalName();
        $request->certificate->storeAs('documents', $fileName, 'public');

        Archtecture::create([
            'user_id' => auth()->user()->id ,
            'tinNumber' => $request->tinNumber ,
            'nationalId' => $request->nationalId ,
            'certificate' => $fileName ,
        ]);

        return back()->with('message', 'please wait for verification');
        }

        //codes for seller request requirements

        if($requestType == 'seller'){

            //Validate User request requirements
        $this->validate($request, [
            'certificate' => 'required | pdf' ,
            'busnessLisence' => 'required | pdf' ,
            'tinNumber' => 'required | max:255',
            'nationalId' => 'required | max:255',
            'shopName' => 'required | max:255',
            'shopLocation' => 'required | max:255',
        ]);

        $fileNameBusnessLisence = $request->busnessLisence->getClientOriginalName();
        $request->busnessLisence->storeAs('documents', $fileNameBusnessLisence, 'public');

        $fileNameCertificate = $request->certificate->getClientOriginalName();
        $request->certificate->storeAs('documents', $fileNameCertificate, 'public');

        Seller::create([
            'user_id' => auth()->user()->id ,
            'tinNumber' => $request->tinNumber ,
            'nationalId' => $request->nationalId ,
            'busnessLisence' => $fileNameBusnessLisence ,
            'certificate' => $fileNameCertificate ,
            'shopName' => $request->shopName ,
            'shopLocation' => $request->shopLocation ,
        ]);

        return back()->with('message', 'please wait for verification');
        }

        //codes for house builder request requirements
        if($requestType == 'houseBuilder'){

            //Validate User request requirements
        $this->validate($request, [
            'certificate' => 'required | pdf' ,
            'tinNumber' => 'required | max:255',
            'nationalId' => 'required | max:255',
        ]);

        $fileName = $request->certificate->getClientOriginalName();
        $request->certificate->storeAs('documents', $fileName, 'public');

        Builder::create([
            'user_id' => auth()->user()->id ,
            'tinNumber' => $request->tinNumber ,
            'nationalId' => $request->nationalId ,
            'certificate' => $fileName ,
        ]);

        return back()->with('message', 'please wait for verification');
        }

    }

}

