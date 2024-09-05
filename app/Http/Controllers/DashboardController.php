<?php

namespace App\Http\Controllers;

use App\Models\Produce;
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
            'produces' => Produce::all(),
            'nearToExpiry' => StoredProduce::with('produce')->closeToExpiration()->where('user_id', Auth::id())->get(),
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
