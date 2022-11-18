<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogInRequest;
use App\Http\Resources\AuthedUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * logout from system
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        
        return response()->success('logout successfully');
    }


    /**
     * login to system 
     * 
     * @param \App\Http\Request\LogInRequest $request
     * @return json
     */
    public function logIn(LogInRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        
        if (!Auth::attempt($request->all())) {
            return response()->json([ 'message'=>'credential is wrong' ],401);
        }

        $userAccessToken =DB::table('personal_access_tokens')->where('tokenable_id',$user->id) ;
        if($userAccessToken){
            
            DB::table('personal_access_tokens')->where('tokenable_id',$user->id)->delete();

        }

        $user->token = $user->createToken($user->name)->plainTextToken;

        return New AuthedUserResource($user);

    }

}
