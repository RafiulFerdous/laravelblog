<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guard =['creat_at', 'delet_at','update_at',];

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
