@extends('pages.auth.auth')

@section('form-title', 'Buat Kata Sandi')

@section('content')
<form method="POST" action="{{ route('register.store') }}" class="space-y-8 max-w-w-lg mx-auto">
    @csrf

    <!-- Hidden data dari step 1 -->
    <input type="hidden" name="name" value="{{ session('register_data.name') }}">
    <input type="hidden" name="email" value="{{ session('register_data.email') }}">

    <!-- Nama Lengkap (Read-only) -->
    <div>
        <label class="block text-lg font-medium text-gray-700 mb-3">Nama Lengkap</label>
        <div class="flex items-center gap-4 px-6 py-5 bg-amber-100 border-2 border-amber-400 rounded-2xl">
            <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-lg font-medium text-gray-900">{{ session('register_data.name') }}</span>
        </div>
    </div>

    <!-- Tanggal Lahir -->
    <div>
        <label class="block text-lg font-medium text-gray-700 mb-3">Tanggal Lahir</label>
        <div class="grid grid-cols-3 gap-4">
            <input type="number" name="birth_day" min="1" max="31" placeholder="Hari"
                   class="px-6 py-5 text-center text-lg bg-white border-2 border-gray-300 rounded-2xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition"
                   value="{{ old('birth_day') }}" required>

            <input type="number" name="birth_month" min="1" max="12" placeholder="Bulan"
                   class="px-6 py-5 text-center text-lg bg-white border-2 border-gray-300 rounded-2xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition"
                   value="{{ old('birth_month') }}" required>

            <input type="number" name="birth_year" min="1900" max="{{ date('Y') }}" placeholder="Tahun"
                   class="px-6 py-5 text-center text-lg bg-white border-2 border-gray-300 rounded-2xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition"
                   value="{{ old('birth_year') }}" required>
        </div>
        @error('birth_day') @error('birth_month') @error('birth_year')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Jenis Kelamin -->
    <div>
        <label class="block text-lg font-medium text-gray-700 mb-3">Jenis Kelamin</label>
        <div class="grid grid-cols-2 gap-6">
            @foreach(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'] as $value => $label)
                <label class="flex items-center justify-center p-5 bg-white border-2 rounded-2xl cursor-pointer has-[:checked]:bg-amber-50 has-[:checked]:border-amber-600 transition">
                    <input type="radio" name="gender" value="{{ $value }}"
                           {{ old('gender') === $value ? 'checked' : '' }}
                           class="sr-only" required>
                    <span class="text-lg font-medium text-gray-800">{{ $label"></span>
                </label>
            @endforeach
        </div>
        @error('gender') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- Alamat Tempat Tinggal -->
    <div>
        <label class="block text-lg font-medium text-gray-700 mb-3">Alamat Tempat Tinggal</label>
        <textarea name="address" rows="3" placeholder="Masukan alamat anda"
                  class="w-full px-6 py-5 text-lg bg-white border-2 border-gray-300 rounded-2xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 resize-none transition"
                  required>{{ old('address') }}</textarea>
        @error('address') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>



    <!-- Submit Button -->
    <button type="submit"
            class="w-full py-5 mt-10 text-xl font-bold text-white bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-full shadow-xl hover:shadow-2xl hover:-translate-y-1 transform transition duration-300">
        Selanjutnya
    </button>

    <!-- Back Link -->
    <div class="text-center mt-6">
        <a href="{{ route('register.step1') }}" class="text-emerald-700 hover:underline font-medium">
            ← Kembali ke langkah sebelumnya
        </a>
    </div>
</form>
@endsection