<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'rating'      => 'required|numeric|min:0|max:10',
            'category_id' => 'required|exists:product_categories,id',
            'file_path'   => 'required|string',
            'thumbnail'   => 'nullable|string',
            'status'      => 'in:active,inactive',
        ];
    }
    public function messages(): array
    {
        return [
            // Title
            'title.required'     => 'Nama produk wajib diisi.',
            'title.string'       => 'Nama produk harus berupa teks.',
            'title.max'          => 'Nama produk maksimal 255 karakter.',

            // Description
            'description.required' => 'Deskripsi produk wajib diisi.',
            'description.string'   => 'Deskripsi harus berupa teks.',

            // Price
            'price.required'     => 'Harga wajib diisi.',
            'price.numeric'      => 'Harga harus berupa angka.',
            'price.min'          => 'Harga tidak boleh kurang dari 0.',

            // Rating
            'rating.required'    => 'Rating wajib diisi.',
            'rating.numeric'     => 'Rating harus berupa angka.',
            'rating.min'         => 'Rating minimal 0.',
            'rating.max'         => 'Rating maksimal 10.',

            // Category ID
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid atau tidak terdaftar.',

            // File Path
            'file_path.required'   => 'File path wajib diisi.',
            'file_path.string'     => 'File path harus berupa teks.',

            // Thumbnail
            'thumbnail.string'     => 'Thumbnail harus berupa teks.',

            // Status
            'status.in'            => 'Status yang dipilih harus berupa active atau inactive.',
        ];
    }
}
