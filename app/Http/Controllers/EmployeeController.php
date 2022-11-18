<?php
namespace App\Http\Controllers;

use App\Http\Requests\updateContact;
use App\Models\User;

class EmployeeController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\updateContact  $request
     * @param  int  $id
     * @return json
     */
    public function updateContact(updateContact $request)
    {
        
        return response()->json([
            'success' => $isUpdated = User::where('id',auth('sanctum')->id())->update(['contact_details' => $request->contact_details]),
            'message'=> $isUpdated ? 'update contact details successfully' : 'update contact details Failed'
        ],200);
    }
}
