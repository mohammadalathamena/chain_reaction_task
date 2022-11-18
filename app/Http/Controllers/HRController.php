<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\AuthedUserResource;
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
     * @return \App\Http\Resource\AuthedUserResource
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::add($request->only('name', 'password', 'email', 'contact_details', 'job_title', 'type', 'status'));

        return New AuthedUserResource($user);
    }

    /**
     * get user by id
     * 
     * @param int $id
     * @return \App\Http\Resources\UserResource 
     */
    public function show(User $employee)
    {
        return new UserResource($employee);
    }

    /**
     * change user status that have 'employee' type 
     * 
     * @param int $id
     */
    public function changeStatus(User $employee)
    {
        return response()->json([
            'success' => $isUpdated = $employee->update(['status' => $employee->status]),
            'message'=> $isUpdated ? 'change status successfully' : 'change status Failed'
        ],200);
    }
}
