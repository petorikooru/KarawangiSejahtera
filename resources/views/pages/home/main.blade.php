@extends('layouts.home')

@section('head')
    <title>Karsa : Karawangi Sejahtera</title>
@endsection

@section('contents')
    <div class="h-screen">
        {{-- Section 1 --}}
        <div class="h-screen bg-cover transition-all duration-700 " style="background-image: linear-gradient(to bottom, transparent 90%, #FDFBF7 100%), url('{{ asset('images/png/BackgroundHome.png') }}');">
            <div class="flex flex-col items-center text-center justify-center w-full h-full">
                <p class="text-8xl font-bold mb-10">Selamat Datang</p>
                <p class="text-4xl font-normal mb-20">Di Situs Resmi Karawangi Sejahtera</p>
                <p class="font-normal leading-loose"> Mewujudkan masyarakat Karawangi yang mandiri, sejahtera, dan terus berkembang </p>
            </div>
        </div>

        {{-- Section 2 --}}
        <div class="h-screen bg-[#FDFBF7]">
            <div class="flex flex-col items-start  w-full h-full px-40 pt-40">
                <div class="flex flex-row space-x-4">
                    <x-bi-newspaper class="w-15 h-15 text-[#E3B765]" />
                    <p class="text-6xl font-bold mb-5 bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] h-full"> Desa Karawangi Sejahtera </p>
                </div>
                <p class="text-2xl font-normal mb-5">
                    Karangwangi Sejahtera adalah platform desa yang memudahkan Anda mengakses informasi, program, dan layanan desa dalam satu tempat. Platform ini mendukung keterbukaan dan partisipasi warga.
                </p>
            </div>
        </div>
    </div>

@endsection
