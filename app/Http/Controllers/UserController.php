<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogInRequest;
use App\Http\Resources\CreateUserResource;
use App\Models\User;
use Illuminate\Http\Request;
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
        try {
            $request->user()->currentAccessToken()->delete();
    
            return response()->json([
                'message' => 'logout successfully'
            ],200);
          
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'user dose not logout successfully'
            ],500);
        }
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
        $isLogIn =$user ? DB::table('personal_access_tokens')->where('tokenable_id',$user->id)->first() : false;
        

        if (!$user ||  !Hash::check($request->password,$user->password)) {

            return response()->json([
                'message'=>'credential is wrong'
            ],401);
        }

        if ($isLogIn) {

            return response()->json([
                'message'=>'user is already login'
            ],409);
        }

        $user->token = $user->createToken($user->name)->plainTextToken;

        return New CreateUserResource($user);

    }

    /**
     * return user not found as a json with status code 404
     * 
     * @return json
     */
    protected static function userNotFound()
    {
        return response()->json([
            'message'=>'user not found'
        ],404);
    }

}
