<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_categories', 'category_id', 'recipe_id');
    }

    public function scopeCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }
}
