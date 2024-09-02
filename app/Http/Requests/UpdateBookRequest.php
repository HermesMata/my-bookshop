<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            "title" => ["min:3"],
            "slug" => ["min:3", Rule::unique("books")->ignore($this->route()->parameter('book'))],
            "summary" => ["min:8", "nullable"],
            "poster" => ["image", "nullable"],
            "author" => ["required", "integer", "min:1", Rule::exists("book_authors", "id")],
            "category" => ["required", "integer", "min:1", Rule::exists("book_categories", "id")],
            "publisher" => ["required", "integer", "min:1", Rule::exists("users", "id")],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => $this->input('slug') ?? \Str::slug($this->input('title')),
            "publisher" => $this->user()->id
        ]);
    }
}
