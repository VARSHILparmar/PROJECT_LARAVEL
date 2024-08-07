<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z]+([_ -]?[a-zA-Z0-9])*$/',
            'number' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|numeric|digits:4'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'The Username is Required',
            'name.regex' => 'Enter valid Username',
            'number.required' => 'The Number Is Required',
            'number.numeric' => 'Enter Only Number',
            'number.digits' => 'Enter Only 10 Digit Number',
            'email.required' => 'The Email is Required',
            'email.email' => 'Email Format is Unvalid',
            'email.unique' => 'Email address is already taken',
            'password.required' => 'The Password is Required',
            'password.numeric' => 'Enter only Numeric Number',
            'password.digits' => 'Enter Only 4 Digit Password',
        ];
    }
}
