<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guard =['creat_at','update_at',];

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'category_id',
        'user_id',
        'published_at',

    ];

    protected $dates =[
        'published_at',
    ];
}
