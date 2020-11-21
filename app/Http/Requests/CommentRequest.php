<?php
namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class CommentRequest extends RequestAbstract
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "content" => "required|max:200|min:1",
        ];
    }

    public function messages():array
    {
        return [];
    }
}
