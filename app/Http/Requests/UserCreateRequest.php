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
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "password" => "required"
        ];
    }

    public function messages():array
    {
        return [];
    }
}
