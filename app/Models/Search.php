<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'profile_id',
        'profile_username',
        'created_at',
        'updated_at'
    ];
}
