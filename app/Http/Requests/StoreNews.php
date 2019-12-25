<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
            'main_title' => 'required|string|max:150|min:2',
            'sub_title' => 'required|string|max:150|min:2',
            'content' => 'required|string|min:2',
            'media' => 'required',
            'category' => 'required',
        ];
    }
}
