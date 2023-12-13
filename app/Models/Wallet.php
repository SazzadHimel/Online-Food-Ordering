<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Wallet extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'wallet_balance',
        'role_as', // Assuming you have an 'role_as' column to distinguish admin users
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function addToWallet($amount)
    {
        $this->wallet_balance += $amount;
        $this->save();
    }

    public function deductFromWallet($amount)
    {
        $this->wallet_balance -= $amount;
        $this->save();
    }
}
