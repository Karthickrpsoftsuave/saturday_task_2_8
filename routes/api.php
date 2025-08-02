<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/test-api', function () {
    return response()->json([
        'message' => 'Hello, this is your API response!',
        'status' => 'success'
    ]);
});
// Route::get('/products',[ProductController::class,'index1'])->name('product.index');
// Route::post('/login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();
    
//     if (!$user || !Hash::check($request->password, $user->password)) {
//         return response()->json(['error' => 'Invalid credentials'], 401);
//     }

//     // Generate Sanctum Token
//     $token = $user->createToken('api-token')->plainTextToken;

//     return response()->json([
//         'message' => 'Login successful',
//         'token' => $token,
//         'user' => $user
//     ]);
// })->name('login');

// Route::middleware([
//     EnsureFrontendRequestsAreStateful::class, // Ensure frontend requests are stateful
//     'throttle:api',
//     SubstituteBindings::class,
// ])->group(function () {
 
//     Route::post('/login', function (Request $request) {
//         dd('print');
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);
    
//         $user = User::where('email', $request->email)->first();
//         dd($user);
//         if (!$user || !Hash::check($request->password, $user->password)) {
//             return response()->json(['error' => 'Invalid credentials'], 401);
//         }
    
//         // Generate Sanctum Token
//         $token = $user->createToken('api-token')->plainTextToken;
       
//         return response()->json([
//             'message' => 'Login successful',
//             'token' => $token,
//             'user' => $user
//         ]);
//     })->name('login');
//     // Protected Route (Requires Auth)
    
    
//     Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//         return $request->user();
//     });

//     // Logout Route
//     Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
//         $request->user()->tokens()->delete();
//         return response()->json(['message' => 'Logged out']);
//     });

// });
