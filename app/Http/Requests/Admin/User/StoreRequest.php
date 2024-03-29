<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле не может быть пустым',
            'email.required' => 'Это поле не может быть пустым',
            'email.unique' => 'Пользователь с такой почтой уже существует',
            'password.required' => 'Это поле не может быть пустым',
            
        ];
    }

}
