<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Traits\ApiResponse;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        $categorys = ProductCategory::all();
        return $this->successResponse($categorys);
    }
    public function show(ProductCategory $category): JsonResponse
    {
        return $this->successResponse($category);
    }

    public function store(Request $request): JsonResponse
    {
        //Menambahkan produk baru (hanya seller)
        $validated = $request->validate([
            //  'name' => ['required', 'string', 'max:50'],
            //  'description' => ['nullable', 'string'],
            //  'icon' => ['required', 'string', 'max:100']

            'name' => 'required|string|max:100|unique:product_categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
        ]);
        $categorys = ProductCategory::create($validated);
        return $this->successResponse($categorys, 'Pesan sukses');
    }

    public function update(Request $request, ProductCategory $categorys): JsonResponse
    {
        $validated = $request->validate([
            //  'name' => ['required', 'string', 'max:50'],
            //  'description' => ['nullable', 'string'],
            //  'icon' => ['required', 'string', 'max:100']

            'name' => 'required|string|max:100|unique:product_categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
        ]);

        // UPDATE data
        $categorys->update($validated);

        return $this->successResponse($categorys, 'pesan sukses');
    }

    // DELETE data
    public function destroy(ProductCategory $categorys): JsonResponse
    {
        $categorys->delete();

        return $this->successResponse(message: 'Data berhasil dihapus');
    }

    // membuat message eror
    public function shows(int $id)
    {
        $categorys = ProductCategory::find($id);

        if (!$categorys) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                ],
                404,
            );
        }
    }

    public function store2(StoreProductCategoryRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $category = ProductCategory::create($validatedData);

        return response()->json(
            [
                'success' => true,
                'message' => 'Kategori produk berhasil ditambahkan',
                'data' => $category,
            ],
            201,
        );
    }

    // Fungsi untuk memperbarui kategori (PUT)
    public function update2(StoreProductCategoryRequest $request, int $id): JsonResponse
    {
        $category = ProductCategory::find($id);

        if (!$category) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan untuk diupdate',
                ],
                404,
            );
        }

        $validatedData = $request->validated();

        $category->update2($validatedData);

        return response()->json(
            [
                'success' => true,
                'message' => 'Kategori produk berhasil diperbarui',
                'data' => $category,
            ],
            200,
        );
    }
}
