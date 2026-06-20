<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
        public function register(Request $request){
            $validated = $request->validate([

        'username' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email',
        'password'=> 'required|string|min:6|confirmed',
        'role' => 'required|in:seller,buyer',

            ]);
            $validated['balance'] = 0;


            $user = User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role']
            ]);

            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json([

                'message' => 'Registrasi Berhasil',
                'user' => $user,
                'token' => $token

            ]);
        }

            public function login(Request $request){
            $validated = $request->validate([

                    'email' => 'required|email',
                    'password' => 'required|string',
                ]);


            $user = User::where('email', $validated['email'])->first();

                if(!$user || !Hash::check($validated['password'], $user->password)){
                return response()->json([
                        'message' => 'email atau password salah'
                        ], 401);
                }

            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json([

                'message' => 'Login Berhasil',
                'user' => $user,
                'token' => $token

                 ]);
            }
            public function logout (Request $request){
                $request->user()->currentAccessToken()->delete();
                return response()->json([
                    'message' => 'logout berhasil'
                ]);
            }

            public function update4(Request $request, Product $product){
                if ($request -> user()->role !== 'seller'){
                return response()->json([
                    'message' => 'Akses Ditolak'
                    ], 403);
                }

                if ($product->seller_id !== $request->user()->id){
                    return response()->json([
                        'message' => 'Bukan Pemilik Produk'
                    ], 403);
                }

                $product->delete();
                return response()->json([
                    'message' => 'Produk Berhasil di hapus'
                ]);
            }
}


