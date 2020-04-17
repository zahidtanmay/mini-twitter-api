<?php
namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserLogInRequest extends RequestAbstract
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "email" => "required|email",
            "password" => "required"
        ];
    }

    public function messages():array
    {
        return [];
    }
}
