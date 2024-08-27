<?php

namespace App\Http\Requests;

use App\Models\BookCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "name" => ["required", "min:2"],
            "slug" => [
                "required",
                Rule::unless(function () {
                    return BookCategory::where("slug", $this->input("slug"))->exists();
                }, "unique:book_categories")
            ],
            "description" => ["required", "min:10"]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => $this->input("slug") ?? \Str::slug($this->input("name"))
        ]);
    }
}
