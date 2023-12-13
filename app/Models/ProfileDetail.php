<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
    use HasFactory;

    protected $table = "profile_details";

    protected $fillable = [
        'user_id',
        'phone',
        'address',
    ];
}
