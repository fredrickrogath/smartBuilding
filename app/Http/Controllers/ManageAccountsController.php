<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Filesystem\FilesystemManager;
use App\Models\User;
use App\Models\Archtecture;
use App\Models\Builder;
use App\Models\Seller;
use App\Models\DocumentName;
use App\Models\Requests;
class ManageAccountsController extends Controller
{
    //
    // anyone accessing this controller should be authenticated user

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    // showing manage account page with 100 names

    public function index()
    {
        $userCount = User::all();

        $newRequestsCounter = Requests::where('service_provider_id' , auth()->user()->id)->where('new' , 1)->count();

        return view('manageAccounts' , [
            'newRequestsCounter' => $newRequestsCounter,
        ]);
    }



    public function show()
    {

        //show overall user management view

        $users = User::orderBy('firstName')->paginate(10000000000);

        return json_encode(array(['data' => $users]));
    }




    // deleting the customers

    public function destroy(User $user)
    {
        $user->delete();
    }



    public function blockHistory($user){
        if( $user == 'block' ){
            $user = User::where('block' , '1')->get();
            return json_encode($user);
        }
    }




    //blocking and unblocking the customers

    public function update(User $user)
    {

        // block user if in not blocked
        if ($user->block == 0) {
            $user->block = 1;
            $user->save();

            return json_encode('blocked');
        }


        // unblock user if is blocked
        if ($user->block == 1) {
            $user->block = 0;
            $user->save();

            return json_encode('unblocked');
        }
    }


    //searching for customers by names both first , middle and last names

    public function search($filter)
    {
        if($filter == 'customer'){
            $userSearches = User::orderBy('firstName')->where('customer' , '1')->get();

            return json_encode($userSearches);
        }

        elseif($filter == 'archtecture'){
            $userSearches = User::orderBy('firstName')->where('archtecture' , '1')->get();

            return json_encode($userSearches);
        }

        elseif($filter == 'seller'){
            $userSearches = User::orderBy('firstName')->where('seller' , '1')->get();

            return json_encode($userSearches);
        }

        elseif($filter == 'houseBuilder'){
            $userSearches = User::orderBy('firstName')->where('houseBuilder' , '1')->get();

            return json_encode($userSearches);
        }

        elseif($filter == 'block'){
            $userSearches = User::orderBy('firstName')->where('block' , '1')->get();

            return json_encode($userSearches);
        }

        $userSearches = User::where('firstName', 'LIKE', '%' . $filter . '%')
            ->orWhere('middleName', 'LIKE', '%' . $filter . '%')
            ->orWhere('lastName', 'LIKE', '%' . $filter . '%')
            ->get();

        return json_encode($userSearches);

    }


    public function userCount()
    {

        $countArchtecture = User::orderBy('firstName')->where('archtecture', 1)->count();
        $countSeller = User::orderBy('firstName')->where('seller', 1)->count();
        $countHouseBuilder = User::orderBy('firstName')->where('houseBuilder', 1)->count();
        $countBlock = User::orderBy('firstName')->where('block', 1)->count();
        $countCustomer = User::orderBy('firstName')->where('customer', 1)->count();

        return json_encode(array([
            'countArchtecture' => $countArchtecture ,
            'countSeller' => $countSeller ,
            'countHouseBuilder' => $countHouseBuilder ,
            'countBlock' => $countBlock ,
            'countCustomer' => $countCustomer ,
            ]));
    }

    public function notificationCounter(){
        $archtectureNotification = Archtecture::where('access' , '0')->count();
        $builderNotification = Builder::where('access' , '0')->count();
        $sellerNotificationt = Seller::where('access' , '0')->count();

        $totalNotification = $archtectureNotification + $builderNotification + $sellerNotificationt ;

        return json_encode(array(['totalNotification' => $totalNotification ]));
    }

    public function registerRequests(){
        // $archtectureRequests = collect( Archtecture::where('access' , '0')->get() );
        // $builderRequests = collect( Builder::where('access' , '0')->get() );
        // $sellerRequests = collect( Seller::where('access' , '0')->get() );

        // $combined1 = $archtectureRequests->merge( $builderRequests );
        // $combined2 = $combined1->merge( $sellerRequests );

        // return json_encode( $combined2->all() );


        $archtectureRequests = Archtecture::where('access' , '0')->get();
        $builderRequests = Builder::where('access' , '0')->get();
        $sellerRequests = Seller::where('access' , '0')->get();

        return json_encode(array([

            'archtectureRequests' => $archtectureRequests ,
            'builderRequests' => $builderRequests ,
            'sellerRequests' => $sellerRequests ,
        ]));
    }

    public function acceptRequestArchtecture( Archtecture $acceptRequestId ){

        if( $acceptRequestId->access == 0 ){

            $acceptRequestId->access = 1 ;
            $acceptRequestId->save() ;


            $users = User::where( 'id' , $acceptRequestId->user_id )->get();

            foreach ($users as $user )  {

               if( $user->archtecture == 0 ){

                     $user->archtecture = 1 ;

                     $user->save() ;
                }

            }

        }


    }

    public function acceptRequestBuilder( Builder $acceptRequestId ){

        if( $acceptRequestId->access == 0 ){

            $acceptRequestId->access = 1 ;
            $acceptRequestId->save() ;


            $users = User::where( 'id' , $acceptRequestId->user_id )->get();

            foreach ($users as $user )  {

               if( $user->houseBuilder == 0 ){

                     $user->houseBuilder = 1 ;

                     $user->save() ;
                }

            }

        }

    }

    public function acceptRequestSeller( Seller $acceptRequestId){

        if( $acceptRequestId->access == 0 ){

            $acceptRequestId->access = 1 ;
            $acceptRequestId->save() ;


            $users = User::where( 'id' , $acceptRequestId->user_id )->get();

            foreach ($users as $user )  {

               if( $user->seller == 0 ){

                     $user->seller = 1 ;

                     $user->save() ;
                }

            }

        }

    }
}
