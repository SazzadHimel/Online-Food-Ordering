<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profiledetails()
    {
        $users = User::where('email', '<>', 'admin@gmail.com')->get();
        return view('admin.profiledetails.index', compact('users'));
    }

    public function remove(int $id){
        $users = User::findOrfail($id);
        $users->delete();
        return redirect()->back()->with('status', 'Data Deleted Succesfully');
    }
}
