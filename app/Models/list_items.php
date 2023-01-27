<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_items extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'list_id',
        'username',
        'created_at',
        'updated_at'
    ];
}
