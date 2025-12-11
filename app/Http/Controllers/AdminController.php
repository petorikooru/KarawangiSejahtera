<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan; // Contoh model
use App\Models\User;
use App\Models\UmkmSubmission;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data ringkasan untuk dashboard
        $jumlahPelatihan = Pelatihan::count();
        $jumlahUser = User::count();
        $jumlahPengajuanUmkm = UmkmSubmission::where('status', 'pending')->count();

        return view('pages.admin.admin-dashboard', [
            'jumlahPelatihan' => $jumlahPelatihan,
            'jumlahUser' => $jumlahUser,
            'jumlahPengajuanUmkm' => $jumlahPengajuanUmkm,
        ]);
    }
}