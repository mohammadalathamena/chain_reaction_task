<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LogInRequest;
use App\Http\Resources\CreateUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        try {
        
            $user = User::create([
                'name'=>$request->name,
                'password'=>bcrypt($request->password) ,
                'email'=>$request->email,
                'contact_details'=>$request->contact_details,
                'job_title'=>$request->job_title,
                'type'=>$request->type,
                'status'=>$request->status,
            ]);
    
            $user->token = $user->createToken($user->name)->plainTextToken;

            $user->assignRole($request->type);
            
            return New CreateUserResource($user);

        } catch (\Throwable $th) {
            return [
                'message'=>'something wrong happen when you create user'
            ];
        }
   
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
    
            return [
                'message' => 'logout successfully'
            ];
          
        } catch (\Throwable $th) {
            return [
                'message' => 'user dose not logout successfully'
            ];
        }
    }

    public function logIn(LogInRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        $isLogIn =$user ? DB::table('personal_access_tokens')->where('tokenable_id',$user->id)->first() : false;
        

        if (!$user || $isLogIn ||  !Hash::check($request->password,$user->password)) {
            return response([
                'message'=>'credential is wrong or user is already login'
            ],401);
        }

        $user->token = $user->createToken($user->name)->plainTextToken;

        return New CreateUserResource($user);

    }

}
