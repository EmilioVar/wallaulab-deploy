<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $ads = Ad::where('user_id', '=', Auth::user()->id)->latest()->paginate(9);
        $adsCount = Ad::where('user_id', '=', Auth::user()->id)->count();
        return view('user.dashboard', compact('ads','adsCount'));
    }

    public function create (Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }
}
