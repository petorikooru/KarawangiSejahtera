<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        $notifications = collect([
            (object)[
                'status' => 'Baru',
                'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                'created_at' => now()->subDays(1),
                'from' => 'Admin'
            ],
            (object)[
                'status' => 'Pesan',
                'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                'created_at' => now()->subDays(2),
                'from' => 'Admin'
            ],
            (object)[
                'status' => 'Pesan',
                'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                'created_at' => now()->subDays(3),
                'from' => 'Admin'
            ],
            (object)[
                'status' => 'Pesan',
                'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                'created_at' => now()->subDays(4),
                'from' => 'Admin'
            ],
        ]);

        return view('pages.user.notifikasi', compact('notifications'));
    }
}