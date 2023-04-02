<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;
use ProtoneMedia\Splade\FileUploads\HasSpladeFileUploads;

class AddProductRequest extends FormRequest implements HasSpladeFileUploads
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
            'name' => ['required', 'string', 'max:256'],
            'slug' => ['required', 'string','unique:products'],
            'category_id' => ['required', 'array','min:1'],
            'subcategory_id' => ['required', 'array','min:1'],
            'file' => ['required', 'file', 'image'],
            'keywords' => ['nullable','string', 'max:256'],
            'meta_description' => ['nullable','string', 'max:256'],
            'description' => ['nullable', 'string', 'max:1000'],
            'draft' => ['nullable', 'numeric'],
        ];
    }
}
