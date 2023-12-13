<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBalance()
    {
        $user = auth()->user();
        return view('wallet.show_balance', compact('user'));
    }

    public function adminBalance()
    {
        // Assuming there is a separate "isAdmin" column in the users table
        $admin = User::where('role_as', '1')->first();

        if (!$admin) {
            return redirect()->route('dashboard')->with('error', 'Admin not found.');
        }

        return view('wallet.admin_balance', compact('admin'));
    }

    public function redirectToCategory()
    {
        return redirect()->route('categories');
    }


    
    public function showAddMoneyForm(Request $request)
    {
        $email = $request->input('email');
        session()->put('add_money_email', $email); // Store the email in the session
        return view('wallet.add_money', compact('email'));
    }

    public function addMoney(Request $request)
    {
        $email = session()->get('add_money_email');
        $user = User::where('email', $email)->first();

        $user->wallet_balance += $request->amount;
        $user->save();

        session()->forget('add_money_email');

        return redirect("/admin/dashboard/profiledetails")->with('success', 'Money added successfully!');
    }

}
