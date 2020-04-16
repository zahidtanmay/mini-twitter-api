<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PostRequest extends RequestAbstract
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "content" => "required",
        ];
    }

    public function messages():array
    {
        return [];
    }
}
