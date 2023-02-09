<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $ads = Ad::where('user_id', '=', Auth::user()->id)->latest()->paginate(9);
        $adsCount = Ad::where('user_id', '=', Auth::user()->id)->count();
        return view('user.dashboard', compact('ads','adsCount'));
    }
}
