<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class CreateProductRequest extends FormRequest
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
            'productName'=>'required|min:6|unique:products,productName',
            'avatar'=>'required',
            'quantity'=>'required|numeric',
            'cost'=>'required|digits_between:5,10',
            'percent'=>'required|numeric',
            'coolingRange'=>'required|string|max:100',
            'wattage'=>'required|string|max:255',
            'windSpeed'=>'required|string|max:255',
            'control'=>'required|string|max:255',
            'highestNoiseLevel'=>'required|string|max:255',
            'waterBottle'=>'required|string|max:255',
            'dimensionsAndWeight'=>'required|string|max:255',
            'utilities'=>'required|string|max:1000',
            'brand'=>'required|string|max:100',
            'madeIn'=>'required|string|max:50',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $err = (new ValidationValidationException($validator))->errors();
        throw new HttpResponseException(new JsonResponse($err,422));
    }
}
