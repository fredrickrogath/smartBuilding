<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

class EditProfileController extends Controller
{
    //
    public function index(){
        return view('editProfile');
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
