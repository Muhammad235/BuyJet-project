<?php

namespace App\Http\Controllers\Admin;

use App\Models\GiftCard;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'symbol' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $symbolFileName = $this->uploadImage($request, 'symbol', '/upload/giftcard');

        $giftcard = GiftCard::create([
            'name' => $request->name,
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
    public function show(GiftCard $giftcard)
    {
        return response()->json($giftcard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GiftCard $giftcard)
    {
        $request->validate([
            'name' => 'sometimes|required|string',
            'symbol' => 'sometimes|required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $uploadSymbol = $this->uploadImage($request, 'symbol', '/upload/giftcard');
        $symbolFileName = $uploadSymbol ?? $giftcard->symbol;

        // Remove the old image if a new one has been uploaded
        if (isset($uploadSymbol)) {
            $this->removeImage("upload/giftcard/$giftcard->symbol");
        }

        $giftcard->update([
            'name' => $request->name,
            'symbol' => $symbolFileName,
            'status' => $request->status ?? $giftcard->status,
        ]);

        return redirect()->back()->with('success', 'Gift card updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
