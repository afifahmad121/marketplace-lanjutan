<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResources;
use App\Http\Requests\StoreProductRequest;
use App\Http\Traits\ApiResponse;
use App\Models\Product;
use Dotenv\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{

    use ApiResponse;

    public function index(): JsonResponse{
        $products = Product::all();
        return $this->successResponse($products);

        }


        public function show(Product $products): JsonResponse
        {

            return $this->successResponse($products);
            }



        //     public function store(Request $request): JsonResponse
        //     {

        //         //Menambahkan produk baru (hanya seller)
        //         $validated = $request->validate([




        //             'title'       => ['required', 'string', 'max:100'],
        //             'description' => ['nullable', 'string'],
        //             'price'       => ['required', 'numeric'],
        //             'rating'      => ['required', 'numeric'],
        //             'thumbnail'   => ['required', 'string', 'max:100'],
        //             'file_path'   => ['nullable', 'string', 'max:100'],
        //             'download_count' =>['nullable','numeric'],
        //             'status'      => ['nullable', 'string', 'max:100'],
        //             'seller_id'   => ['required', 'exists:users,id'],
        //             'category_id' => ['required', 'exists:product_categories,id']




        // ]);

        // $product = Product::create($validated);
        // return $this->successResponse($product, 'Pesan sukses');

        // }


        public function store2(Request $request): JsonResponse

        {

        $validated = $request->validate([



        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:0',
        'rating'      => 'required|numeric|min:0|max:10',
        'category_id' => 'required|exists:product_categories,id',
        'file_path' => 'required|string',
        'thumbnail'   => 'nullable|string',
        'status' => 'in:active,inactive'


        ]);
        $validated['seller_id'] = \App\Models\User::first()->id ?? 1;
        $product = Product::create($validated);
        return $this->successResponse($product, 'Pesan sukses');



        }




// public function update(Request $request, Product $product): JsonResponse
//     {
//         $validated = $request->validate([

//         'title'       => ['required', 'string', 'max:100'],
//         'description' => ['nullable', 'string'],
//         'price'       => ['required', 'numeric'],
//         'rating'      => ['required', 'numeric'],
//         'thumbnail'   => ['required', 'string', 'max:100'],
//         'file_path'   => ['nullable', 'string', 'max:100'],
//         'download_count' =>['nullable','numeric'],
//         'status'      => ['nullable', 'string', 'max:100'],
//         'seller_id'   => ['required', 'exists:users,id'],
//         'category_id' => ['required', 'exists:product_categories,id']



//         ]);

//         // UPDATE data
//         $product->update($validated);
//         return $this->successResponse($product,'pesan sukses');
    // }




     public function update2(Request $request, Product $product): JsonResponse
    {

        $validated = $request->validate([

        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:0',
        'rating'      => 'required|numeric|min:0|max:10',
        'category_id' => 'required|exists:product_categories,id',
        'file_path' => 'required|string',
        'thumbnail'   => 'nullable|string',
        'status' => 'in:active,inactive'


        ]);

        // UPDATE data
        $product->update($validated);
        $validated['seller_id'] = \App\Models\User::first()->id ?? 1;
        return $this->successResponse($product,'pesan sukses');
    }



        // DELETE data
        public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return $this->successResponse(message: 'Data berhasil dihapus');
    }


     // membuat message eror
    public function shows(int $id){

         $product = product::find($id);

       if(!$product){

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
       }


    }

    public function store3(StoreProductRequest $request)
{

    $validatedData = $request->validated();


    $product = Product::create($validatedData);

    return response()->json([
        'success' => true,
        'message' => 'Produk berhasil ditambahkan',
        'data'    => $product
    ], 201);
}


// Fungsi untuk Update Data (PUT)
public function update3(StoreProductRequest $request, int $id): JsonResponse
{

    $product = Product::find($id);


    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan untuk diupdate'
        ], 404);
    }


    $validatedData = $request->validated();


    $product->update($validatedData);


    return response()->json([
        'success' => true,
        'message' => 'Produk berhasil diperbarui',
        'data'    => $product
    ], 200);
}



}
