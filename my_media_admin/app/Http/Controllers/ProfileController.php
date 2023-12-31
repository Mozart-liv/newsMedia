<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::select('id', 'name', 'email', 'phone', 'address', 'gender')->where('id', $id)->first();
		return view('admin.profile.index', compact('user'));
	}

    //update profile
    public function updateProfile(Request $request){
        $this->Val($request);
        $userdata = $this->getData($request);

        User::where('id', Auth::user()->id)->update($userdata);
        return back()->with(['updateSuccess' => 'Admin account updated!']);
    }

    //direct changePassword page
    public function changePasswordPage(){
        return view('admin.profile.changePassword');
    }

    //update password
    public function changePassword(Request $request){
        $this->passwordVal($request);

        $dbData = User::where('id', Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        $newPassword = Hash::make($request->newPassword);

        if(Hash::check($request->oldPassword, $dbPassword)){
            $data = [
                'password' => $newPassword
            ];
            User::where('id', Auth::user()->id)->update($data);

            return redirect()->route('admin#profile');
        }else{
            return back()->with(['fail' => 'Old Password does not match!']);
        }
    }

    //validate
    private function Val($request){
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ])->validate();
    }

    //password validation
    private function passwordVal($request){
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword'
        ])->validate();
    }
    //getData
    private function getData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender
        ];
    }
}
