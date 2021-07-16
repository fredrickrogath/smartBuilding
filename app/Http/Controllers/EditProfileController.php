<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;

class EditProfileController extends Controller
{
    //
    public function index(){

        $newRequestsCounter = Requests::where('service_provider_id' , auth()->user()->id)->where('new' , 1)->count();

        return view('editProfile' , [
            'newRequestsCounter' => $newRequestsCounter,
        ]);
    }

    public function editProfileText( $column , $value ){
        if( $column == 'first name'){
            $user = User::find( auth()->user()->id );
            $user->firstName = $value;
            $user->save();
        }
        elseif( $column == 'middle name'){

            $user = User::find( auth()->user()->id );
            $user->middleName = $value;
            $user->save();
        }
        elseif( $column == 'last name'){

            $user = User::find( auth()->user()->id );
            $user->lastName = $value;
            $user->save();
        }
        elseif( $column == 'email contact'){

            $user = User::find( auth()->user()->id );
            $user->email = $value;
            $user->save();
        }
        elseif( $column == 'mobile contact +255'){

            $user = User::find( auth()->user()->id );
            $user->phone = $value;
            $user->save();
        }
        elseif( $column == 'region'){

            $user = User::find( auth()->user()->id );
            $user->region = $value;
            $user->save();
        }
        elseif( $column == 'district'){

            $user = User::find( auth()->user()->id );
            $user->district = $value;
            $user->save();
        }
        elseif( $column == 'street'){

            $user = User::find( auth()->user()->id );
            $user->street = $value;
            $user->save();
        }

        return json_encode( $column . ' is successfully updated' );
    }

    public function AndroidEditProfileText( Request $request){
        if( $request->column == 'first name'){
            $user = User::find( $request->user_id );
            $user->firstName = $request->value;
            $user->save();
        }
        elseif( $request->column == 'middle name'){

            $user = User::find( $request->user_id );
            $user->middleName = $request->value;
            $user->save();
        }
        elseif( $request->column == 'last name'){

            $user = User::find( $request->user_id );
            $user->lastName = $request->value;
            $user->save();
        }
        elseif( $request->column == 'email'){

            $user = User::find( $request->user_id );
            $user->email = $request->value;
            $user->save();
        }
        elseif( $request->column == 'mobile +255'){

            $user = User::find( $request->user_id );
            $user->phone = $request->value;
            $user->save();
        }
        elseif( $request->column == 'region'){

            $user = User::find( $request->user_id );
            $user->region = $request->value;
            $user->save();
        }
        elseif( $request->column == 'district'){

            $user = User::find( $request->user_id );
            $user->district = $request->value;
            $user->save();
        }
        elseif( $request->column == 'street'){

            $user = User::find( $request->user_id );
            $user->street = $request->value;
            $user->save();
        }

        return json_encode( 'updated successfully' );
    }

    public function editProfilePicture( Request $request ){

            $user = User::find( auth()->user()->id );

            Storage::disk('public')->delete('images/' . auth()->user()->avartar );

            $fileName = $request->profilePicture->getClientOriginalName();
            $request->profilePicture->storeAs('images', $fileName, 'public');

            $user->avartar = $fileName;
            $user->save();

            return json_encode( 'updated successfully' );
    }
}
