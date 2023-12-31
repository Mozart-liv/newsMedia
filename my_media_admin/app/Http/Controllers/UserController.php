<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(request('search')){
            $userdata = User::where('name', 'like', '%' . request('search') . '%')
                            ->orWhere('email' , 'like', '%' . request('search') . '%')
                            ->orWhere('phone' , 'like', '%' . request('search') . '%')
                            ->orWhere('address' , 'like', '%' . request('search') . '%')
                            ->orWhere('gender' , 'like', '%' . request('search') . '%')->get();
        }else{
            $userdata = User::select('id', 'name', 'email', 'phone', 'address', 'gender')->get();
        }

        return view('admin.list.index', compact('userdata'));
    }

    //delete acc
    public function deleteAcc($id){
        User::where('id', $id)->delete();
        return back()->with(['success' => 'account delete success!']);
    }
}
