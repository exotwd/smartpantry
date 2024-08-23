<?php

namespace App\Http\Controllers;

use App\Models\StoredProduce;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'produces' => StoredProduce::notExpired()->where('user_id', Auth::id())->get(),
            'nearToExpiry' => StoredProduce::closeToExpiration()->where('user_id', Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
}
