<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'difficulty_id',
        'category_id',
        'description',
        'ingredients',
        'instruction',
        'time',
        'image_path',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
