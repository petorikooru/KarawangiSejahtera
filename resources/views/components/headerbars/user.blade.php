<div class="fixed top-0 left-0 w-full bg-[#F8F5EF] p-3 sm:p-4 shadow-xl z-20">
    <div class="pl-20">
        <div class="mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-0">
            
            <div class="text-sm sm:text-base md:text-xl text-black text-center sm:text-left">
                Hallo, Selamat Datang
                <strong>{{ $user }}</strong>
                di
                <strong>{{ $desa }}</strong>
            </div>

            <a href="/" class="w-full sm:w-auto">
                <button
                    class="w-full sm:w-auto bg-[#D4A017] text-white py-2 px-4 sm:px-6 rounded-lg cursor-pointer text-sm sm:text-base text-center">
                    Logout
                </button>
            </a>
        </div>
    </div>
</div>
