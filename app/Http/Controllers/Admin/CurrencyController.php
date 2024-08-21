<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCryptoCurrencyRequest;
use App\Http\Requests\Admin\UpdateCryptoCurrencyRequest;

class CurrencyController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('admin.manage.currency', compact('currencies'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'symbol' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $symbolFileName = $this->uploadImage($request, 'symbol', '/upload/currency');

        $currency = Currency::create([
            'name' => $request->name,
            'symbol' => $symbolFileName,
        ]);

        if($currency){
            return redirect()->back()->with('success', 'Currency added');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return response()->json($currency);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'name' => 'sometimes|required|string',
            'symbol' => 'sometimes|required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $uploadSymbol = $this->uploadImage($request, 'symbol', '/upload/giftcard');
        $symbolFileName = $uploadSymbol ?? $currency->symbol;

        // Remove the old image if a new one has been uploaded
        if (isset($uploadSymbol)) {
            $this->removeImage("upload/currency/$currency->symbol");
        }

        $currency->update([
            'name' => $request->name,
            'symbol' => $symbolFileName,
            'status' => $request->status ?? $currency->status,
        ]);

        return redirect()->back()->with('success', 'Currency updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
