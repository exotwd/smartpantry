<?php

namespace App\Http\Controllers;

use App\Models\Produce;
use App\Models\StoredProduce;
use Illuminate\Support\Facades\Auth;

class PantryController extends Controller
{
    public function index()
    {
        return StoredProduce::all();
    }

    public function show($id)
    {
        return StoredProduce::find($id);
    }

    public function store()
    {
        $produce = StoredProduce::create([
            'produce_id' => request('id'),
            'user_id' => Auth::id(),
            'quantity' => request('quantity'),
            'expires_at' => now()->addDays(Produce::find(request('id'))->expires_in_days),
        ]);

        return $produce;
    }
}
