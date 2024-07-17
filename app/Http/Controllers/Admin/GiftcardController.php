<?php

namespace App\Http\Controllers\Admin;

use App\Models\GiftCard;
use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class GiftcardController extends Controller
{
    use FileUploadTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $giftcards = GiftCard::all();
        // $giftcard = Cryptocurrency::all();
        return view('admin.manage.giftcard', compact('giftcards'));
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
        $request->validate([
            'name' => 'required|string',
            'charge' => 'required',
            'symbol' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $symbolFileName = $this->uploadImage($request, 'symbol', '/storage/giftcard');

        $giftcard = GiftCard::create([
            'name' => $request->name,
            // 'charge' => $request->charge,
            'symbol' => $symbolFileName,
        ]);

        if($giftcard){
            return redirect()->back()->with('success', 'Gift card added');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Giftcard $crypto)
    {
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
