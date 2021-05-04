<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return ; not_regex:/^[web_-][a-z_\-0-9]*/i | regex:/^[A-Za-z_ \-0-9]+$/u |
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'image',
            'fname' => 'required | max:100 | alpha',
            'middleName' => 'max:100 | alpha',
            'lname' => 'required | max:100 | alpha',
            'district' => 'required | max:100',
            'street' => 'required',
            'phone' => 'required | max:9 | numeric | starts_with:6,7',
            'email' => 'required | email | max:100',
            'password' => 'required | confirmed',
        ]);

        //checking if User has image
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');

            //Stor User with image
            User::create([
                'firstName' => $request->fname,
                'middleName' => $request->mname,
                'lastName' => $request->lname,
                'avartar' => $fileName,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'region' => $request->region,
                'district' => $request->district,
                'street' => $request->street,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //authenticate User with image
            if (auth()->attempt($request->only('email', 'password'))) {
                //Redirect User with image
                return redirect()->route('home');
            }
        }

        //Stor User
        User::create([
            'firstName' => $request->fname,
            'middleName' => $request->mname,
            'lastName' => $request->lname,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'region' => $request->region,
            'district' => $request->district,
            'street' => $request->street,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //authenticate User
        if (auth()->attempt($request->only('email', 'password'))) {
            //Redirect User
            return redirect()->route('home');
        }

        //Redirect User if authentication fails
        return redirect()->back()->with('message' , 'registration failed');
    }
}

