<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeRecipe($query, $recipe_id)
    {
        return $query->where('recipe_id', $recipe_id);
    }
}
