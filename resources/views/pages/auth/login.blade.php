@extends('pages.auth.auth')

@section('form-title', 'Masuk')

@section('content')
<form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/email.png') }}" alt="" class="w-5 h-5">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full bg-transparent text-lg" required autofocus>
        </label>
    </div>

    <div>
        <label class="flex items-center gap-4 px-5 py-4 bg-amber-900/10 border-2 border-amber-700 rounded-2xl focus-within:ring-4 focus-within:ring-amber-200 transition">
            <img src="{{ asset('images/png/lock.png') }}" alt="" class="w-5 h-5">
            <input type="password" name="password" placeholder="Kata Sandi" class="w-full bg-transparent text-lg" required>
        </label>
    </div>

    <button type="submit" class="w-full py-4 text-xl font-semibold text-amber-50 bg-gradient-to-r from-amber-600 via-emerald-700 to-amber-500 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition">
        Masuk
    </button>

    <div class="text-center space-y-3 mt-8">
        <p>Belum punya akun? <a href="{{ route('register.step1') }}" class="font-semibold text-emerald-700 hover:underline">Daftar</a></p>
        <p class="text-gray-500">- Atau -</p>
        <div class="flex justify-center gap-6 mt-4">
            <button type="button" class="p-4 border-2 border-gray-300 rounded-2xl hover:border-gray-400 transition">
                <img src="{{ asset('images/png/google.png') }}" alt="Google" class="w-8 h-8">
            </button>
            <button type="button" class="p-4 border-2 border-gray-300 rounded-2xl hover:border-gray-400 transition">
                <img src="{{ asset('images/png/facebook.png') }}" alt="Facebook" class="w-8 h-8">
            </button>
        </div>
    </div>
</form>
@endsection