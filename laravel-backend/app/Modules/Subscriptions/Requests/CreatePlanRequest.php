<?php

namespace App\Modules\Subscriptions\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePlanRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Authed by role check
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'listings_limit' => 'required|integer|min:1',
            'featured_limit' => 'required|integer|min:0',
            'validity_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
