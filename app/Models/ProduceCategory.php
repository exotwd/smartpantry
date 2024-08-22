<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function produce()
    {
        return $this->hasMany(Produce::class);
    }

    public function scopeCategory($query, $category_id)
    {
        return $query->where('produce_category_id', $category_id);
    }
}
