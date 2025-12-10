<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/images/svg/logo.svg') }}" type="image/x-icon">
    <title>Selamat Datang!</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-[#FDFBF7] flex min-h-screen">

    <x-sidebars.user
        user={{$username}}
    />
    <x-headerbars.user
        user={{$username}}
        desa="Desa Karawangi"
    />

    <!-- Main Content -->
    <div class="flex-1 ml-0 md:ml-20 mt-4 sm:mt-8 md:mt-16">

        <!-- Hello Section -->
        <section id="home" class="text-center mx-20 pt-24">
            <h2 class="text-4xl font-bold text-[#D4A017] py-6">
                Tempat di mana tradisi membimbing langkah dan kebersamaan meneguhkan arah.
            </h2>
            <img src="{{ asset('images/png/sample/user1.png') }}" alt="Image" class="mx-auto w-full h-[800px] object-cover shadow-lg rounded-2xl">
        </section>

        <!-- Berita Section -->
        <section id="berita" class="mx-4 sm:mx-6 md:mx-12 lg:mx-20 xl:mx-40 my-4 sm:my-6 md:my-10 p-4 sm:p-6 md:p-10">

            <div class="flex items-center space-x-4 h-min">
                <x-bi-newspaper class="w-14 h-14 text-[#E3B765]" />
                <h1 class="text-4xl lg:text-6xl font-bold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-12">
                Berita Terkini
                </h1>
            </div>

            <div id="berita-container">
                @include('pages.user.berita', ['paginatedBerita' => $paginatedBerita])
            </div>
        </section>
        <!-- Desa Bersuara Section -->

        <!-- UMKM Section -->

        <!-- Pelatihan Section -->

        <x-footers.home />
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        // Intercept the click on pagination links
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();  // Prevent the default anchor link behavior

            var url = $(this).attr('href');  // Get the URL for the pagination link

            // Make an AJAX request to fetch the content
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the #berita-container with the new content
                    $('#berita-container').html(data);

                    // Optionally, prevent page scroll jump by maintaining the current scroll position
                    // You can also scroll the page to the top of the section if you need
                    // $("html, body").animate({ scrollTop: $('#berita').offset().top }, 300); // Uncomment to scroll to the berita section
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        });
    });
</script>