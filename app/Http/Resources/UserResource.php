<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=>[ 
                'id'=>$this->id,
                'name'=>$this->name,
                'password'=>bcrypt($this->password) ,
                'email'=>$this->email,
                'contact_details'=>$this->contact_details,
                'job_title'=>$this->job_title,
                'type'=>$this->type,
                'status'=>$this->status
            ],
          
        ];
    }
}
