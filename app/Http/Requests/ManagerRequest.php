<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
            
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|unique:managers',
            'address' => 'required',
            'status' => 'required',
            'dob' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'password' => 'required',

        ];
    }



    public function messages()
    {
        return [
            'f_name.required' => 'First Name is required',
            'l_name.required' => 'last Name is required',
            'email.required' => 'An Email is Has been Taken',
            'address.required' => 'Address is required',
            'status.required' => 'Status is required',
            'dob.required' => 'Date of Birth is required',
            'image.required' => 'Estate is required',
            'gender.required' => 'Gende is reqiured is required',
            'password.required' => 'Password is required',

        ];
    }

}
