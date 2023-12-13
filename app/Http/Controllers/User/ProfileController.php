<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view("user.user-profile.profile");
    }

    public function updateProfileDetails(Request $request){
        $request->validate([
            'username'=>['required','string'],
            'email'=>['required','string'],
            'phone'=>['required','digits:11'],
            'address'=>['required','string','max:499'],

        ]);
        $user = User::findOrfail(Auth::user()->id);
        $user->update([
            'name'=> $request->username,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        $user->ProfileDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                
            ]
        );

        return redirect()->back()->with('message','Your profile has been updated');

    }
}
