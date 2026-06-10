<?php

namespace App\Modules\Listings\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateListingRequest extends FormRequest
{
    public function authorize()
    {
        // Check authorization inside the controller policy/service
        return true;
    }

    public function rules()
    {
        return [
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'deposit' => 'nullable|numeric|min:0',
            'address' => 'sometimes|required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'contact_name' => 'sometimes|required|string|max:255',
            'contact_mobile' => 'sometimes|required|string|max:20',
            'status' => 'sometimes|required|in:pending,active,paused,rejected',
            'availability_date' => 'nullable|date',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
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
