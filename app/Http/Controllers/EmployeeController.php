<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends UserController
{
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request,int $id)
    {
        $user = User::find($id);
        if (!$user){

            return $this->userNotFound();

        }
        
        $user->contact_details = $request->contact_details ;
        $user->save();

        return response()->json([
            'message'=>'update contact details successfully'
        ],200);
    }
}
