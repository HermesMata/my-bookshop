<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBookRequest extends FormRequest
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
            "title" => ["required", "min:3"],
            "slug" => ["required", "min:3", "unique:books"],
            "summary" => ["min:8", "nullable"],
            "poster" => ["nullable", Rule::imageFile()->max(12_228)],
            "author" => ["required", "integer", "min:1", Rule::exists("book_authors", "id")],
            "category" => ["required", "integer", "min:1", Rule::exists("book_categories", "id")],
            "publisher" => ["required", "integer", "min:1", Rule::exists("users", "id")],
            "file" => ["required", Rule::file()->max(1_048_576)->types(["application/pdf", "application/epub"])]
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
