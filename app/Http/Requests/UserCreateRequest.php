<?php
namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserCreateRequest extends RequestAbstract
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "first_name" => "required|max:10",
            "last_name" => "required|max:10",
            "email" => "required|email|unique:users|max:100",
            "password" => "required|min:6"
        ];
    }

    public function messages():array
    {
        return [];
    }
}
