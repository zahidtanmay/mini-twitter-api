<?php
namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserStoreRequest extends RequestAbstract
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
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "password" => "required"
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages():array
    {
        return [];
    }
}
