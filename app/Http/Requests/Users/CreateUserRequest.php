<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'       =>     'required|min:2|max:50',
            'email'      =>     'required|email|unique:users,email',   //unique:table,column, → The email must be unique in the users table, specifically in the email column.
            'mobile'     =>     'required|string|max:15',
            'department' =>     'required|integer',
            'role_id'       =>     'required|integer',
            'password'   =>     'required|string|min:6|max:18',
            'is_active'  =>     'required|boolean',
        ];
    }
}
