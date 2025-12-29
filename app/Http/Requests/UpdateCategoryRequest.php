<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'short_name' => 'string|nullable',
            'sort' => 'integer',
            'active' => 'boolean',
            'options' => 'array',
            'options.*' => 'integer|exists:options,id',
            'external_link' => '',
            'parent_id' => 'nullable|exists:categories,id',
            'seo_title' => 'string|nullable',
            'seo_description' => 'string|nullable',
            'seo_keywords' => 'string|nullable',
            'description' => 'string|nullable',
        ];
    }
}
