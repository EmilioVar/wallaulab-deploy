<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use App\Jobs\ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function show(Ad $ad)
    {
        $ad->increment('countViews');
        return view('ad.show', compact('ad'));
    }

    public function edit(Ad $ad)
    {
        $images = $ad->images()->get('path');
        return view('ad.edit', compact('ad','images'));
    }

    public function update(Request $request, $ad)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'body' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        

        $ad = Ad::findorFail($ad);
        $ad->update([
            'title' => $request->title,
            'price' => $request->price,
            'body' => $request->body,
        ]);
        return back();
    }

    public function delete(Ad $ad)
    {
        $ad->delete();
        return back()->with('¡Anuncio eliminado correctamente!');
    }
}
