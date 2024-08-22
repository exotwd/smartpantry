<?php

namespace App\Http\Controllers;

use App\Models\Produce;
use Illuminate\Support\Facades\Auth;

class StoredProduceController extends Controller
{
    public function index() {}

    public function create()
    {
        return view('stored-produce.create');
    }

    public function store()
    {
        return redirect()->route('stored-produce.index');
    }

    public function show($type)
    {
        //show the stored produce expired or not according to the type
        if ($type == 'expired') {
            $produces = Produce::where('user_id', Auth::id())->where('expiry_date', '<', now())->get();
        } else {
            $produces = Produce::where('user_id', Auth::id())->where('expiry_date', '>=', now())->get();
        }

    }

    public function edit()
    {
        return view('stored-produce.edit');
    }

    public function update()
    {
        return redirect()->route('stored-produce.index');
    }

    public function destroy()
    {
        return redirect()->route('stored-produce.index');
    }
}
