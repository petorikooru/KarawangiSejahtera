@extends('pages.auth.auth')

@section('form-title', 'Lengkapi Data Diri')

@section('content')
<form method="POST" action="{{ route('register.step1') }}" class="space-y-6">
    @csrf

    <!-- Nama Lengkap -->
    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/user.png') }}" alt="" class="w-5 h-5">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                   class="w-full bg-transparent text-gray-800 placeholder-gray-500 focus:outline-none text-lg" required autofocus>
        </label>
        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- Email -->
    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/email.png') }}" alt="" class="w-5 h-5">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                   class="w-full bg-transparent text-lg placeholder-gray-500 focus:outline-none" required>
        </label>
        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>


    <!-- Password -->
    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/lock.png') }}" alt="" class="w-5 h-5">
            <input type="password" name="password" placeholder="Kata Sandi"
                   class="w-full bg-transparent text-lg placeholder-gray-500 focus:outline-none" required>
        </label>
        @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- Konfirmasi Password -->
    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/lock.png') }}" alt="" class="w-5 h-5">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi"
                   class="w-full bg-transparent text-lg placeholder-gray-500 focus:outline-none" required>
        </label>
    </div>

    <button type="submit" class="w-full py-4 mt-8 text-xl font-semibold text-amber-50 bg-gradient-to-r from-amber-600 via-emerald-700 to-amber-500 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform transition">
        Lanjut ke Langkah Berikutnya
    </button>

    <p class="text-center text-gray-600 mt-8">
        Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-emerald-700 hover:underline">Masuk</a>
    </p>
</form>
@endsection