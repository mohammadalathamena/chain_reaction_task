<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateContact;
use App\Models\User;


class EmployeeController extends UserController
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\updateContact  $request
     * @param  int  $id
     * @return json
     */
    public function updateContact(updateContact $request,int $id)
    {

        $user = User::find($id);
        if (!$user){
            
            return $this->userNotFound();
            
        }

        $isMyId = auth('sanctum')->id() === $id;
        
        if(!$isMyId)
            return response()->json([
                'message'=>'you are not authorized'
            ],200);

        
        $user->contact_details = $request->contact_details ;
        $user->save();

        return response()->json([
            'message'=>'update contact details successfully'
        ],200);
    }
}
