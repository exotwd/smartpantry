<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//scope

class StoredProduce extends Model
{
    use HasFactory;

    //table
    protected $table = 'stored_produce';

    //fillable

    protected $fillable = [
        'produce_id',
        'user_id',
        'quantity',
        'expires_at',
        'expires_at_opened',
    ];

    //casts

    protected $casts = [
        'expires_at' => 'datetime',
        'expires_at_opened' => 'datetime',
    ];

    //relationships
    public function produce()
    {
        return $this->belongsTo(Produce::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //scopes
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<', now());
    }

    public function scopeCloseToExpiration($query)
    {
        return $query->where('expires_at', '>=', now())
            ->where('expires_at', '<=', now()->addDays(2));
    }

    public function scopeNotExpired($query)
    {
        return $query->where('expires_at', '>=', now());
    }

    public function scopeOpened($query)
    {
        return $query->whereNotNull('expires_at_opened');
    }

    public function scopeNotOpened($query)
    {
        return $query->whereNull('expires_at_opened');
    }
}
