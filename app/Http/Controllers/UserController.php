<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{

    public function ShowAll(Request $request) {
        $username = 'Hilman';

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
}
