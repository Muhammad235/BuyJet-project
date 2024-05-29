<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCryptoCurrencyRequest;

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
     * Store a newly created resource in storage.
     */
    public function store(CreateCryptoCurrencyRequest $request)
    {

        $request->validated();

        $assets = [];
        foreach ($request->assetname as $index => $asset) {
            $assets[] = [
                'assetname' => $request->assetname[$index],
                'assetaddress' => $request->assetaddress[$index],
            ];
        }

        // $symbolFileName = ;

        $crypto = Cryptocurrency::create([
            'name' => $request->name,
            'charge' => $request->charge,
            'symbol' => 'test.png',
            'wallet_address' => $request->wallet_address,
            'assets' => json_encode($assets), // Save assets as JSON
        ]);

        if($crypto){
            return redirect()->back()->with('success', 'Cryptocurrency added');

        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cryptocurrency $crypto)
    {
        // $crypto = Cryptocurrency::find($crypto);
        // $crypto = Cryptocurrency::find($crypto);
        return response()->json($crypto);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cryptocurrency $crypto)
    {
        $request->validate([
            'name' => 'required', 
            'wallet_address' => 'required',
            'charge' => 'required',
            'status' => 'required',
        ]);

        if ($request->has('assetname') && $request->has('assetaddress')) {
            $assets = [];
        
            foreach ($request->assetname as $key => $name) {
                $assets[] = [
                    'assetname' => $name,
                    'assetaddress' => $request->assetaddress[$key]
                ];
            }
        
            $crypto->update([
                'name' => $request->name,
                'wallet_address' => $request->wallet_address,
                'status' => $request->status,
                'charge' => $request->charge,
                'assets' => json_encode($assets)
            ]);
        } else {
            $crypto->update([
                'name' => $request->name,
                'wallet_address' => $request->wallet_address,
                'status' => $request->status,
                'charge' => $request->charge,
            ]);
        }
        
        // if ($request->file('symbol') !== null) {
        //     $oldPath = $crypto->symbol;
        
        //     $symbol = $request->file('symbol');
        //     $newPath = $request->file('symbol')->store('crypto', 'public');
        
        //     $crypto->update([
        //         'symbol' => '/' . $newPath
        //     ]);
        
        //     if ($oldPath !== null) {
        //         $oldPath = ltrim($oldPath, '/');
        //         if (Storage::disk('public')->exists($oldPath) && $oldPath !== $newPath) {
        //             Storage::disk('public')->delete($oldPath);
        //         }
        //     }
        // }
        
        return redirect()->back()->with('success', 'Cryptocurrency updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
