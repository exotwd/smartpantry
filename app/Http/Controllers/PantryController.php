<?php

namespace App\Http\Controllers;

use App\Models\Produce;
use App\Models\StoredProduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PantryController extends Controller
{
    public function index()
    {
        $storedProduces = StoredProduce::with('produce')
            ->where('user_id', Auth::id())
            ->get();

        return Inertia::render('Pantry/Index', [
            'produces' => $storedProduces,
        ]);
    }

    public function show($id) {}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produceId' => 'required|exists:produces,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $produce = Produce::find($validatedData['produceId']);

        $expiresAt = now();
        if ($produce && $produce->expires_in_days) {
            $expiresAt->addDays($produce->expires_in_days);
        } else {
            $expiresAt = null; // No expiration date
        }

        // Store the produce in the pantry (stored_produce table)
        $storedProduce = StoredProduce::create([
            'produce_id' => $validatedData['produceId'],
            'user_id' => Auth::id(),
            'quantity' => $validatedData['quantity'],
            'expires_at' => $expiresAt,
        ]);

        // Redirect back to pantry index
        return redirect()->route('pantry.index')->with('success', 'Item added to pantry successfully.');
    }
}
