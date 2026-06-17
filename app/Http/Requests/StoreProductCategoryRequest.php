<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:100|unique:product_categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string'   => 'Nama kategori harus berupa teks.',
            'name.max'      => 'Nama kategori maksimal 100 karakter.',
            'name.unique'   => 'Nama kategori ini sudah terdaftar, silakan gunakan nama lain.',

            'description.string' => 'Deskripsi harus berupa teks.',

            'icon.string'   => 'Icon harus berupa teks.',
        ];
    }
}
