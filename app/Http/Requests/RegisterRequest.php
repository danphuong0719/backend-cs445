<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_name' => 'string|required|unique:users,user_name',
            'phone' => 'string|required|unique:users,phone|between:9,12',
            'password' => 'string|required|min:6',
            'retype_password' => 'string|required_with:password|same:password|min:6'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $err = (new ValidationValidationException($validator))->errors();
        throw new HttpResponseException(new JsonResponse($err,422));
    }


}
