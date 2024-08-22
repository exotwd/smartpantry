<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'produce_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProduceCategory::class, 'produce_category_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredients', 'produce_id', 'recipe_id')->withPivot('quantity');
    }

    public function scopeCategory($query, $category_id)
    {
        return $query->where('produce_category_id', $category_id);
    }
}
