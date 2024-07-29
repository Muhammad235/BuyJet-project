<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCryptoCurrencyRequest;
use App\Http\Requests\Admin\UpdateCryptoCurrencyRequest;

class CryptocurrencyController extends Controller
{
    use FileUploadTrait;

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

        $symbolFileName = $this->uploadImage($request, 'symbol', '/upload/crypto');

        $crypto = Cryptocurrency::create([
            'name' => $request->name,
            'charge' => $request->charge,
            'symbol' => $symbolFileName,
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
        return response()->json($crypto);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCryptoCurrencyRequest $request, Cryptocurrency $crypto)
    {

        $request->validated();

        $uploadSymbol = $this->uploadImage($request, 'symbol', '/upload/crypto');

        $symbolFileName = isset($uploadSymbol) ? $uploadSymbol : $crypto->symbol;

        // Remove the old image if a new one has been uploaded
        if (isset($uploadSymbol)) {
            $this->removeImage("upload/crypto/$crypto->symbol");
        }

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
                'symbol' => $symbolFileName,
                'status' => $request->status ?? $crypto->status,
                'charge' => $request->charge,
                'assets' => json_encode($assets)
            ]);
        } else {
            $crypto->update([
                'name' => $request->name,
                'wallet_address' => $request->wallet_address,
                'symbol' => $symbolFileName,
                'status' => $request->status,
                'charge' => $request->charge,
            ]);
        }

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
