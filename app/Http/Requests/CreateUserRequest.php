<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'name'=>['required','string','min:2'],
            'password'=>['required','string','min:5'],
            'email'=>['required','string','min:5','email:rfc,dns','unique:users,email'],
            'contact_details'=>['required','string','min:10'],
            'job_title'=>['required','string','min:5'],
            'type'=>['required','string',Rule::in(['employee','hr_manager'])],
            'status'=>['required','boolean']
        ];
    }
}
