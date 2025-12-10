<!-- Sidebar -->
<div id="sidebar" class="sidebar fixed top-0 left-0 h-screen w-20 bg-[#333333] text-white p-4 flex flex-col items-start shadow-lg transition-all duration-500 z-50">
    <div class="text-3xl mb-5 cursor-pointer" onclick="toggleSidebar()">
        <img src="{{ asset('images/png/logo_white.png') }}" alt="Logo" class="w-12 h-auto">
    </div>

    <div class="flex-grow">
        <div class="sidebar-item">
            <a href="/user/home#home" class="flex items-center">
                <x-heroicon-s-home class="h-auto w-6"/>
                <span class="ml-2 text-sm sidebar-text opacity-0">Home</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="/user/home#berita" class="flex items-center">
                <x-heroicon-s-newspaper class="w-6 h-auto"/>
                <span class="ml-2 text-sm sidebar-text opacity-0">Berita Terkini</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="/user/home#desa-bersuara" class="flex items-center">
                <x-iconoir-sound-high-solid class="w-6 h-auto" />
                <span class="ml-2 text-sm sidebar-text opacity-0">Desa Bersuara</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="/user/home#umkm" class="flex items-center">
                <x-ri-store-3-fill class="w-6 h-auto"/>
                <span class="ml-2 text-sm sidebar-text opacity-0">UMKM</span>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="/user/home#pelatihan" class="flex items-center">
                <x-ri-headphone-fill class="w-6 h-auto"/>
                <span class="ml-2 text-sm sidebar-text opacity-0">Pelatihan</span>
            </a>
        </div>
    </div>

    <div class="sidebar-item">
        <a href="/user/notifikasi" class="flex items-center">
            <x-ri-notification-2-fill class="w-6 h-auto"/>
            <span class="ml-2 text-sm sidebar-text opacity-0">Notifikasi</span>
        </a>
    </div>

    <div class="sidebar-item">
        <a href="/user/pengaturan" class="flex items-center">
            
            @if ($icon ?? false)
                <img 
                    src="{{ asset($icon) }}" 
                    alt="User Avatar" 
                    class="w-6 h-6 rounded-full object-cover border-1"
                >
            @else
                <x-heroicon-s-user class="w-6 h-6"/>
            @endif

            <span class="ml-2 text-sm sidebar-text opacity-0">{{ $user }}</span>
        </a>
    </div>

</div>

<script>
    // Toggle Sidebar Expand/Collapse
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const textElements = document.querySelectorAll(".sidebar-text");
        sidebar.classList.toggle("w-20");
        sidebar.classList.toggle("w-64");  // Toggle between compact and expanded sidebar width

        // Toggle the opacity and visibility of the text with smooth transitions
        textElements.forEach(text => {
            text.classList.toggle("opacity-0");  // Hide text on collapse, show on expand
            text.classList.toggle("opacity-100");  // Ensure the text opacity is fully visible when expanded
        });
        iconElements.forEach(icon => {
            icon.classList.toggle("opacity-100");
        });
    }
</script>

<style>
    /* Sidebar Text Transition */
    .sidebar-text {
        white-space: nowrap;
        transition: opacity 0.5s ease, margin-left 0.5s ease;
    }

    /* Show the text when sidebar is expanded */
    #sidebar.w-64 .sidebar-text {
        opacity: 1 !important;
        margin-left: 10px;  /* Add space between icon and text */
    }

    /* Set opacity to 0 (hidden) and no margin in compact mode */
    #sidebar.w-20 .sidebar-text {
        opacity: 0 !important;
        margin-left: 0;
    }

    /* Sidebar Styling */
    #sidebar {
        transition: width 0.5s ease, box-shadow 0.3s ease;
    }

    /* Sidebar Buttons */
    .sidebar-item {
        padding: 12px 0;
        transition: all 0.3s ease;
    }

    .sidebar-item a {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 12px 16px;
        width: 100%;
        text-decoration: none;
        border-radius: 8px;
        color: white;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Hover Effect on Sidebar Item */
    .sidebar-item a:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);  /* Slight movement on hover */
    }

    .sidebar.w-20 a:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(2px);  /* Slight movement on hover */
    }

    /* Show Text and Icons Together */
    #sidebar.w-64 .sidebar-item a span {
        opacity: 1 !important;
    }

    /* Sidebar Hover Effect */
    #sidebar.w-64 .sidebar-item a {
        transition: transform 0.3s ease, background-color 0.3s ease;
        border-radius: 10px;
    }

    /* Add shadow on expanded sidebar */
    #sidebar.w-64 {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>
