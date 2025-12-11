<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===================================================================
    // STEP 1: Register - Collect name, phone, role
    // Route: POST /daftar2
    // ===================================================================
    public function registerStep1(Request $request)
    {
        $validated = $request->validate([
              'name'     => 'required|string|max:100',
              'email'    => 'required|email|max:100|unique:users,email',
              'password' => 'required|min:8|confirmed',
        ], [
              'email.unique' => 'Email ini sudah terdaftar.',
        ]);

        // Simpan sementara di session
        session()->flash('register_data', $validated);

           // Hash the password before storing in session
           $validated['password'] = Hash::make($validated['password']);

        return redirect()->route('register.step2');
    }

    // ===================================================================
    // STEP 2: Register - Collect email & password → create user
    // Route: POST /daftar
    // ===================================================================
public function registerStore(Request $request)
{
    if (!session()->has('register_data')) {
        return redirect()->route('register.step1');
    }

    $step1 = session('register_data');

    $validated = $request->validate([
        'email'        => 'required|email|max:100|unique:users,email',
        'password'     => 'required|min:8|confirmed',
        'birth_day'    => 'required|integer|min:1|max:31',
        'birth_month'  => 'required|integer|min:1|max:12',
        'birth_year'   => 'required|integer|min:1900|max:' . date('Y'),
        'gender'       => 'required|in:Laki-laki,Perempuan',
        'address'      => 'required|string|max:500',
    ]);

    // Gabungkan tanggal lahir jadi format Y-m-d
    $birthDate = sprintf(
        '%04d-%02d-%02d',
        $validated['birth_year'],
        $validated['birth_month'],
        $validated['birth_day']
    );

    $user = User::create([
        'name'     => $step1['name'],
        'email'    => $validated['email'],
        'phone'    => $step1['phone'],
        'password' => Hash::make($validated['password']),
        'birth_date' => $birthDate,
        'gender'   => $validated['gender'],
        'address'  => $validated['address'],
        'status'   => 'verify',
    ]);

    session()->forget('register_data');
    Auth::login($user);

    return redirect('/user/home')->with('success', 'Akun berhasil dibuat! Selamat datang di Karangwangi.');
}

    // ===================================================================
    // LOGIN
    // Route: POST /login
    // ===================================================================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect berdasarkan role (opsional)
            if (Auth::user()->role === 'umkm') {
                return redirect('/user/home');
            }

            return redirect('/user/home');
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    // ===================================================================
    // LOGOUT
    // ===================================================================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah keluar.');
    }
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->date('birth_date')->nullable()->after('password');
        $table->enum('gender', ['Laki-laki', 'Perempuan'])->after('birth_date');
        $table->text('address')->nullable()->after('gender');
    });
}
}