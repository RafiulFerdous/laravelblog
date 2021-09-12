<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Category;

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

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
