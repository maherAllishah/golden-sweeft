<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
            'categories' => 'required|array|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'the name field is required',
            'image' => 'the image field is required',
            'lng' => 'the lng field is required',
            'lat' => 'the lat field is required',
            'categories' => 'the categories field is required',
        ];
    }
}
