<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title","description","category_id"];

    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }
}
