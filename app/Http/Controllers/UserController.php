<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Default Laravel User model
use App\Models\Berita; // Assumed model for news; create with php artisan make:model Berita -m
use App\Models\UserProfile; // Optional: for extended profile fields; create if needed

class UserController extends Controller
{
    /**
     * Toggle for using dummy data (true = dummies; false = real DB fetches).
     * Set this globally or per-method as needed; for simplicity, it's per-method here.
     */
    protected $useDummyData;

    /**
     * Display the user's main dashboard with paginated news and profile card.
     */
    public function Main(Request $request)
    {
        $this->useDummyData = true; // Toggle: true for dummies, false for real

        if ($this->useDummyData) {
            // Original dummy setup for user basics
            $username       = 'Hilman';
            $namalengkap    = 'Hilman Sky';
            $tanggallahir   = '12 Juni 1995';
            $alamat         = 'Jalan Telekomunikasi No.1';
            $nomortelepon   = '081234567890';
            $gender         = 'Laki-laki';

            // Dummy berita
            $berita = collect([
                (object) [
                    'id' => '1',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Majidee_Malay_Village.JPG/1280px-Majidee_Malay_Village.JPG',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '2',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '3',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '4',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '5',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '6',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
                (object) [
                    'id' => '7',
                    'kategori' => 'Teknologi',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'judul' => 'Literasi Digital: Pemanfaatan Aplikasi Layanan Desa untuk Warga Karangwangi',
                    'deskripsi' => 'Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen.',
                    'tanggal' => now()->subDays(1),
                    'sumber' => 'Desa Karangwangi'
                ],
            ]);

            // Dummy pelatihan
            $pelatihan = collect([
                (object) [
                    'id' => '1',
                    'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Majidee_Malay_Village.JPG/1280px-Majidee_Malay_Village.JPG',
                    'title' => 'Kelas Bisnis UMKM',
                    'category' => 'Bisnis',
                    'time' => '18:30-20:30',
                    'date' => now()->subMonths(6)->setDate(2025, 6, 28), // June 28, 2025
                    'location' => 'Online',
                    'description' => 'Pelatihan meningkatkan kemampuan UMKM dalam memahami dasar keuangan usaha dan pemasaran digital untuk pemula.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '2',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'title' => 'Coaching Clinic',
                    'category' => 'Bisnis',
                    'time' => '18:30-20:30',
                    'date' => now()->subMonths(6)->setDate(2025, 6, 28),
                    'location' => 'Online',
                    'description' => 'Sesi coaching interaktif untuk UMKM, fokus pada peningkatan keterampilan manajemen dan strategi pemasaran digital.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '3',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'title' => 'Kelas Bisnis 2024',
                    'category' => 'Digital',
                    'time' => '18:30-20:30',
                    'date' => now()->subMonths(5)->setDate(2025, 7, 28), // July 28, 2025
                    'location' => 'Offline',
                    'description' => 'Pelatihan mendalam tentang pengelolaan usaha digital, termasuk praktik langsung untuk mempercepat pertumbuhan bisnis UMKM.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '4',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'title' => 'Klinik Konsultasi Bisnis',
                    'category' => 'Konsultasi',
                    'time' => '18:30-20:30',
                    'date' => now()->subMonths(5)->setDate(2025, 7, 28),
                    'location' => 'Offline',
                    'description' => 'Konsultasi satu-satu dengan ahli untuk mengatasi tantangan operasional dan keuangan di UMKM skala kecil.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '5',
                    'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Majidee_Malay_Village.JPG/1280px-Majidee_Malay_Village.JPG',
                    'title' => 'Workshop Pemasaran Digital UMKM',
                    'category' => 'Digital',
                    'time' => '14:00-16:00',
                    'date' => now()->subMonths(4)->setDate(2025, 8, 15), // August 15, 2025
                    'location' => 'Online',
                    'description' => 'Belajar teknik pemasaran online terbaru, dari SEO hingga media sosial, disesuaikan untuk pelaku UMKM lokal.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '6',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'title' => 'Seminar Keuangan Berkelanjutan',
                    'category' => 'Bisnis',
                    'time' => '09:00-12:00',
                    'date' => now()->subMonths(4)->setDate(2025, 8, 15),
                    'location' => 'Offline',
                    'description' => 'Diskusi tentang strategi keuangan jangka panjang untuk UMKM, termasuk pengelolaan risiko dan investasi sederhana.',
                    'link' => '#'
                ],
                (object) [
                    'id' => '7',
                    'thumbnail' => 'https://www.shutterstock.com/image-photo/dieng-indonesia-july-10-2023-600nw-2334536475.jpg',
                    'title' => 'Bootcamp Inovasi Produk UMKM',
                    'category' => 'Inovasi',
                    'time' => '18:30-20:30',
                    'date' => now()->subMonths(3)->setDate(2025, 9, 10), // September 10, 2025
                    'location' => 'Online',
                    'description' => 'Bootcamp intensif untuk mengembangkan produk inovatif, dengan fokus pada tren pasar dan prototipe cepat.',
                    'link' => '#'
                ],
            ]);

            // Manual pagination for dummies
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 4;
            $currentItemsBerita = $berita->slice(($currentPage - 1) * $perPage, $perPage)->values();
            $currentItemsPelatihan = $pelatihan->slice(($currentPage - 1) * $perPage, $perPage)->values();
            $paginatedBerita = new LengthAwarePaginator($currentItemsBerita, $berita->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
            $paginatedPelatihan = new LengthAwarePaginator($currentItemsPelatihan, $pelatihan->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
            
            // Construct profile array from dummies (adapted for main)
            $umkm = [
                'name' => 'Ayam Tung Tung',
                'phone' => $nomortelepon,
                'address' => $alamat,
                'description' => 'UMKM ini fokus pada produk lokal dengan proses yang rapi dan terarah. Kamu dapat melihat informasi usaha, layanan, serta perkembangan kegiatan yang dijalankan untuk mendukung ekonomi warga.',
                'app_link' => 'https://telkomuniversity.ac.id/user-profile',
                'access_link' => 'https://telkomuniversity.ac.id/access-link',
                'logo' => 'https://lms.daskomlab.com/assets/daskom.svg',
                'qr_code' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/960px-QR_code_for_mobile_English_Wikipedia.svg.png'
            ];

            $hasUMKM = true; // Always true for dummies

            // AJAX handling for dummies (no profile in partials, assuming)
            if ($request->ajax()) {
                return response()->json(view('pages.user.partials.berita', compact('paginatedBerita'))->render());
            }

            return view('pages.user.main', compact('username', 'paginatedBerita', 'paginatedPelatihan', 'umkm', 'hasUMKM'));
        } else {
            // Real data logic
            $user = Auth::user();
            if (!$user) {
                return redirect()->route('login');
            }

            // Fetch real berita, paginated
            $paginatedBerita = Berita::orderBy('tanggal', 'desc')->paginate(4);

            // Real profile construction
            $extendedProfile = $user->profile;

            $profile = [
                'name' => $user->name ?? $user->namalengkap ?? 'Nama Pengguna',
                'phone' => $user->phone ?? $user->nomortelepon ?? 'No. Telepon Tidak Tersedia',
                'address' => $user->address ?? $user->alamat ?? 'Alamat Tidak Tersedia',
                'description' => $extendedProfile?->description ?? 'Deskripsi profil belum diisi. Silakan lengkapi untuk fitur lengkap.',
                'app_link' => $extendedProfile?->app_link ?? route('user.profile'),
                'access_link' => $extendedProfile?->access_link ?? route('user.access'),
            ];

            $hasProfile = !empty($extendedProfile) && filled($user->name) && filled($user->phone);

            $username = $user->username ?? 'Pengguna';

            if ($request->ajax()) {
                return response()->json(view('pages.user.partials.berita', compact('paginatedBerita'))->render());
            }

            return view('pages.user.main', compact('user', 'username', 'paginatedBerita', 'profile', 'hasProfile'));
        }
    }

    /**
     * Display the user's notifications.
     */
    public function Notifikasi()
    {
        $this->useDummyData = true; // Toggle: true for dummies, false for real

        $user = Auth::user();
        if (!$user && !$this->useDummyData) {
            return redirect()->route('login');
        }

        if ($this->useDummyData) {
            // Original dummy setup
            $notifications = collect([
                (object) [
                    'status' => 'Baru',
                    'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                    'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                    'created_at' => now()->subDays(1),
                    'from' => 'Admin'
                ],
                (object) [
                    'status' => 'Pesan',
                    'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                    'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                    'created_at' => now()->subDays(2),
                    'from' => 'Admin'
                ],
                (object) [
                    'status' => 'Pesan',
                    'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                    'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                    'created_at' => now()->subDays(3),
                    'from' => 'Admin'
                ],
                (object) [
                    'status' => 'Pesan',
                    'title' => 'Registrasi Berhasil: Silahkan Lengkapi Profile Anda!',
                    'message' => 'Registrasi berhasil. Lengkapi profil Kamu agar layanan lebih sesuai dan proses verifikasi berjalan cepat.',
                    'created_at' => now()->subDays(4),
                    'from' => 'Admin'
                ],
            ]);

            return view('pages.user.notifikasi', compact('notifications'));
        } else {
            // Real data logic
            if (!$user) {
                return redirect()->route('login');
            }

            $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();

            if ($notifications->isEmpty()) {
                $notifications = collect();
            }

            return view('pages.user.notifikasi', compact('user', 'notifications'));
        }
    }

    /**
     * Display and manage user settings/profile.
     */
    public function Pengaturan(Request $request)
    {
        $this->useDummyData = true; // Toggle: true for dummies, false for real

        if ($this->useDummyData) {
            // Original dummy setup (profile removed, as it's now on main)
            $username       = 'Hilman';
            $namalengkap    = 'M Hilman Rofiq';
            $tanggallahir   = '12 Juni 1995';
            $alamat         = 'Jalan Telekomunikasi No.1';
            $nomortelepon   = '081234567890';
            $gender         = 'Laki-laki';
            $email          = 'hilmanganteng@gmail.com';

            return view('pages.user.pengaturan', compact(
                'namalengkap',
                'tanggallahir',
                'alamat',
                'nomortelepon',
                'gender',
                'email',
                'username'
            ));
        } else {
            // Real data logic (profile removed, as it's now on main)
            $user = Auth::user();
            if (!$user) {
                return redirect()->route('login');
            }

            // Additional user vars for the view (now from DB, with fallbacks)
            $username = $user->username ?? 'Pengguna';
            $namalengkap = $user->name ?? $user->namalengkap ?? 'Nama Lengkap';
            $tanggallahir = $user->birth_date ?? $user->tanggallahir ?? 'Tanggal Lahir';
            $alamat = $user->address ?? $user->alamat ?? 'Alamat Tidak Tersedia';
            $nomortelepon = $user->phone ?? $user->nomortelepon ?? 'No. Telepon Tidak Tersedia';
            $gender = $user->gender ?? 'Tidak Diketahui';
            $email = $user->email ?? 'Email Tidak Tersedia';

            return view('pages.user.pengaturan', compact(
                'user',
                'namalengkap',
                'tanggallahir',
                'alamat',
                'nomortelepon',
                'gender',
                'email',
                'username'
            ));
        }
    }
}