<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
        // return auth('sanctum')->id() === request()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'contact_details'=>['required','string','min:5']
        ];
    }
}
