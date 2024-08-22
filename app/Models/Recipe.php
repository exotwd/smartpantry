<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
        'prep_time',
        'cook_time',
        'servings',
        'instructions',
        'calories',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function categories()
    {
        return $this->belongsToMany(RecipeCategory::class, 'recipe_categories', 'recipe_id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
