<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\CreateUserResource;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class HRController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\EmployeeCollection
     */
    public function index()
    {
        $employee = User::where('type','employee')->get();
        return new EmployeeCollection($employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\CreateUserRequest  $request
     * @return \App\Http\Resource\CreateUserResource
     */
    public function store(CreateUserRequest $request)
    {
        try {
        
            $user = User::add([
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
            return response()->json([
                'message'=>'something wrong happen when you create user'
            ],500);
        }
   
    
    }

    /**
     * get user by id
     * 
     * @param int $id
     * @return \App\Http\Resources\UserResource 
     */
    public function show(int $id)
    {
        $employee = User::find($id);
        
        if(!$employee)
            return $this->userNotFound();

        $employee->first();
        return new UserResource($employee);

    }

    /**
     * change user status that have 'employee' type 
     * 
     * @param int $id
     */
    public function changeStatus(int $id)
    {

        $employee = User::where('id',$id)->where('type','employee')->first();

        if(!$employee)
            return $this->userNotFound();

        $employee->status = !$employee->status ;
        $employee->save();

        return response()->json([
            'message'=>'change status successfully',
        ],200);
    }
}
