<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{

    public function Home(Request $request) {
        $username       = 'Hilman';
        $namalengkap    = 'Hilman Sky';
        $tanggallahir   = '12 Juni 1995';
        $alamat         = 'Jalan Telekomunikasi No.1';
        $nomortelepon   = '081234567890';
        $gender         = 'Laki-laki';

        $password = '123';


        // DUmmy data
        $berita = collect([
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Majidee_Malay_Village.JPG/1280px-Majidee_Malay_Village.JPG',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
            (object)[
                'kategori' => 'Teknologi',
                'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                'tanggal' => now()->subDays(1),
                'sumber' => 'Desa Karangwangi'
            ],
        ]);
        // Paginate the collection manually (e.g., 4 items per page)
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 4;
        $currentItems = $berita->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedBerita = new LengthAwarePaginator($currentItems, $berita->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        // If it's an AJAX request, return only the section
        if ($request->ajax()) {
            return response()->json(view('pages.user.partials.berita', compact('paginatedBerita'))->render());
        }

        // Your usual return for the non-AJAX request
        return view('pages.user.home', compact('username', 'paginatedBerita'));
    }

    public function Notifikasi()
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

    public function Pengaturan(Request $request) {
        $username       = 'Hilman';
        $namalengkap    = 'M Hilman Rofiq';
        $tanggallahir   = '12 Juni 1995';
        $alamat         = 'Jalan Telekomunikasi No.1';
        $nomortelepon   = '081234567890';
        $gender         = 'Laki-laki';
        $email          = 'hilmanganteng@gmail.com';

        $password = '123';

        return view('pages.user.pengaturan', compact('namalengkap', 'tanggallahir', 'alamat', 'nomortelepon', 'gender', 'email'));
    }
}
