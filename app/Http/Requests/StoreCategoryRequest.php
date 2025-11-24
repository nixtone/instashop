<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => "required|string",
            'slug' => "required|string",
            'short_name' => "string|nullable",
            'sort' => "integer|nullable",
            'active' => "boolean",
            'external_link' => "",
            'parent_id' => 'nullable|exists:categories,id',
            // 'preview' => '',
            'seo_title' => "string|nullable",
            'seo_description' => "string|nullable",
            'seo_keywords' => "string|nullable",
            'description' => "string|nullable",
        ];
    }
}
