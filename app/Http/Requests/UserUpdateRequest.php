<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
          'name' => 'min:3|max:120|required|string',
          'email' => "max:120|email|required|unique:users,email,{$this->user->id}",
          'password' => 'min:4|max:120|required|same:repeatPassword',
          'repeatPassword' => 'min:4|max:120|required',
        ];
    }
}
