<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\UserDetail;

class ProductController extends Controller
{
   
        // return back()->withErrors(['email' => 'Invalid email or password']);

         // --------CREATE JWT TOKEN---------
        // if ($user && Hash::check($request->password, $user->password)) {

        //     $secret_key = "env('JWT_SECRET', 'fallback_secret_key');";
        //     $payload = [
        //         "iss" => "http://localhost",
        //         "aud" => "http://localhost",
        //         "iat" => time(),
        //         "exp" => time() + (60 * 60), // Token expires in 1 hour
        //         "user_id" => $user->id,
        //         "email" => $user->email
        //     ];

        //     $jwt = JWT::encode($payload, $secret_key, 'HS256');

        //     // Send JWT token instead of using session
        //     // return response()->json([
        //     //     'success' => true,
        //     //     'token' => $jwt,
        //     //     'message' => 'Login successful'
        //     // ]);
        //     return redirect()->route('dashboard', ['token' => $jwt]);
        // }
        // $response = Http::post('http://127.0.0.1:8000/api/login', [
        //     'email' => 'user@example.com',
        //     'password' => 'password',
        // ]);
        
        
        
        // $data = $response->json();
        
        // if ($response->successful()) {
        //     // Store token in session (for web use)
        //     session(['token' => $data['token']]);
    
        //     return redirect()->route('dashboard')->with('success', 'Login successful');
        // } else {
        //     return back()->withErrors(['email' => $data['error'] ?? 'Login failed']);
        // }

        // return redirect()->route('login')->with('error', 'Invalid credentials');
    
        public function dashboard()
        {
            $products = Product::all(); // Fetch all products
            return view('products.dashboard', compact('products'));
        }
    
    
    public function index()
    {
        $products = product::all();
        
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
   
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $newproduct = product::create($data);
        return redirect(route('product.index'));
    }
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $product->update($data);
        return redirect(route('product.index'));
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }
    public function index1()
    {  
    $products = Product::all();
    return response()->json([
        'success' => true,
        'data' => $products
    ], 200);
    }
}
