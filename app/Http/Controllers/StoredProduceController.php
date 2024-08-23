<?php

namespace App\Http\Controllers;

use App\Models\Produce;
use Illuminate\Support\Facades\Auth;

class StoredProduceController extends Controller
{
    public function index() {}

    public function show($type)
    {
        if ($type == 'expired') {
            $produces = Produce::closeToExpiry()->where('user_id', Auth::id())->get();
        } else {
            $produces = Produce::notExpired()->where('user_id', Auth::id())->get();
        }

        return view('dashboard', ['produces' => $produces]);
    }
}
