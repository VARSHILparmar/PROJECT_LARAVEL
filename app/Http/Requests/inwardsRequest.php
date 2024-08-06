<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inwardsRequest extends FormRequest
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
            'date_time' => 'required|after:today',
            'select' => 'required',
            'number' => 'required|numeric|min:0',
        ];
    }

    public function messages(){
        return [
            'date_time.required' => 'Date & Time is Required',
            'date_time.after' => 'Enter only Current or Future Date-Time',
            'select' => 'Enter',
            'number.required' => 'Number of Meter Required',
            'number.numeric' => 'Enter Only Integer Number',
            'number.min' => 'Enter Only positive Number'
        ];
    }
}
