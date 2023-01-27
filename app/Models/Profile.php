<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username',
        'full_name',
        'followers',
        'followees',
        'biography',
        'is_verified',
        'profile_pic_url',
        'requested_by_viewer',
        'follows_viewer',
        'blocked_by_viewer',
        'is_business',
        'external_url',
        'igtv_count',
        'post_count',
        'followed_by_viewer',
        'created_at',
        'updated_at'
    ];
}
