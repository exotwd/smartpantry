<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'produce_id',
        'quantity',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function produce()
    {
        return $this->belongsTo(Produce::class);
    }

    public function scopeRecipe($query, $recipe_id)
    {
        return $query->where('recipe_id', $recipe_id);
    }
}
