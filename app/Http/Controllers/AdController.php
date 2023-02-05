<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = Auth::user();
        return view('ad.create', compact('user'));
    }

    public function show(Ad $ad){
        return view("ad.show", compact('ad'));
    }

    public function edit(Ad $ad) {
        return view('ad.edit', compact('ad'));
    }

    public function update(Request $request, $ad) {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'body' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $image = $request->file('image');
        $image_path = $image->store('public/ads');

        $ad = Ad::findorFail($ad);
        $ad->update([
            'title' => $request->title,
            'price' => $request->price,
            'body' => $request->body,
            'image_path' => $image_path
        ]);
        return back();
    }

    public function delete(Ad $ad) {
        $ad->delete();
        return back()->with('¡Anuncio eliminado correctamente!');
    }
}
