<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Product;
// use Illuminate\Support\Facades\Auth;
// use Laravel\Sanctum\HasApiTokens;

// class ProductController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $data = Product::all();
//         if($data){
//             return response([
//                 "data"=> $data
//             ]);
//         }
//             return response([
//                 "err_Message"=> 'Unauthorized'
//             ]);
        
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
       
//     }

//     public function login(){
//         if (Auth::attempt([
//                 'email' => request('email'),
//                 'password' => request('password')
//             ]
//         )) {
//             $user = Auth::user();
//             $token = $user->createToken('my_token')->plainTextToken;

//             // Trả về access token
//             return response()->json([
//                 'err_code'=>200,
//                 'err_Message'=>'Login Success',
//                 'success' => $user,
//                 'token' => $token
//             ]);
//         }
//         else {
//             return response()->json([
//                     'error' => 'Email or Password Incorrect '
//             ]);
//         }
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
