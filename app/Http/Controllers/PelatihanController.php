<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function register(Pelatihan $pelatihan, Request $request) {
        Auth::user()->pelatihan()->syncWithoutDetaching($pelatihan->id);

        $redirectUrl = $request->input('redirect_to', route('pelatihana.index')); // fallback if empty

        return redirect($redirectUrl)->with('success', 'Berhasil mendaftar pelatihan!');
    }
}
