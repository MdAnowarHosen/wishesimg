<?php

namespace App\Http\Requests\Frontend\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:256'],
            'email' => ['required','email', 'max:256'],
            'subject' => ['required','string', 'max:256'],
            'message' => ['required', 'max:3000'],
        ];

        return $rules;
    }
}
