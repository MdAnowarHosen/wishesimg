<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Validation\Rule;
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
    public function rules() : array
    {
       // $nullableString = ['nullable','string', 'max:256'];

        $rules = [
            'name' => ['required', 'string', 'max:256'],
            'keywords' => ['nullable','string', 'max:256'],
            'meta_description' => ['nullable','string', 'max:256'],
            'description' => ['nullable', 'string', 'max:1000'],
            'draft' => ['nullable', 'numeric'],
        ];

        if ($this->getMethod() == "POST")
        {
            $rules += [
                'category_id' => ['required', 'array','min:1'],
                'subcategory_id' => ['required', 'array','min:1'],
                'file' => ['required', 'file', 'image'],
                'slug' => ['required', 'string','unique:products'],
            ];
        }

        if ($this->getMethod() == "PUT")
        {
            $rules += [
                'categories' => ['required', 'array','min:1'],
                'subcategories' => ['required', 'array','min:1'],
                'file' => ['nullable', 'file', 'image'],
                'slug' => ['required', 'string',Rule::unique('products')->ignore($this->product)],
            ];
        }

        return $rules;
    }

    /**
     * if we need custom messages then we can write function like this
     */
    // public function messages()
    // {
    //     return [
    //         'name.keywords' => 'Please enter your name',
    //     ];
    // }
}
