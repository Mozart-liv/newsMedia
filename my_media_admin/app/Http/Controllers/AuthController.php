<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class AuthController extends Controller
{
    //user login and release token
    public function login(Request $request){
        //email password
        $user = User::where('email', $request->email)->first();

        if(isset($user)){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }
        }else{
            return response()->json([
                'user' => null,
                'token' => null
            ]);
        }
    }

    //register
    public function register(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $message = false;
        $check = User::where('email', $request->email)->get();

        if(count($check) == 0){
            User::create($data);
            $message = true;
        }

        return response()->json([
            'message' => $message
        ]);
    }

    //category
    public function category(){
        $category = Category::get();
        return response()->json([
            'message' => $category
        ]);
    }
}
