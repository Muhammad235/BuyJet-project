<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Http\Controllers\Controller;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crypto = Cryptocurrency::all();
        return view('admin.manage.crypto', compact('crypto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $crypto)
    {
        $crypto = Cryptocurrency::find($crypto);
        return response()->json($crypto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
