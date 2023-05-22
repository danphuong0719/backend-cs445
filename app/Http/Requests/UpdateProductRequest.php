<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends CreateProductRequest
{
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
}
