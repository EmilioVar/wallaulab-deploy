<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use PharIo\Manifest\Url;
use App\Jobs\ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $images = $ad->images()->get();
        return view('ad.edit', compact('ad','images'));
    }

    public function deleteImg(Image $img) {
        Storage::delete('public/'.$img->path);
        Image::find($img->id)->delete();
        return back()->with('success','imagen eliminada correctamente');
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'body' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $ad->update([
            'title' => $request->title,
            'price' => $request->price,
            'body' => $request->body,
        ]);

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $newFileName = "ads/$ad->id";
                $newImage = $ad->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);
                Bus::chain([new ResizeImage($newImage->path, 400, 300)])->dispatch();
            } 
        }

        return back()->with('success','anuncio actualizado correctamente!');
    }

    public function delete(Ad $ad)
    {
        $ad->delete();
        return back()->with('¡Anuncio eliminado correctamente!');
    }
}
