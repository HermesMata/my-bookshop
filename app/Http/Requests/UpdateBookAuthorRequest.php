<?php

namespace App\Http\Requests;

use App\Models\BookAuthor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return in_array($this->user()->role, ['admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "min:3"],
            "slug" => ["required", Rule::unique("book_authors")->ignore($this->route()->parameter('author'))],
            "biography" => ["min:50"]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => $this->input('slug') ?? \Str::slug($this->input('name'))
        ]);
    }
}
