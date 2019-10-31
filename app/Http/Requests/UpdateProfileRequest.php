<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
       
        return [
            'first_name' => 'required|string|max:150|min:2',
            'last_name' => 'required|string|max:150|min:2',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->profile->user->id,
            'phone' => 'required|min:11|regex:/^\d+$/|unique:users,phone,'.$this->profile->user->id,
            'country' => 'required|string|max:150|min:2',
            'city' => 'required|string|max:150|min:2',
            'gender' => 'required',
            'profile_image'=>'mimes:png,JPG|image|max:2000'
            
        ];
    }
}
