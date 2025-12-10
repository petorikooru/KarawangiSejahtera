<div class="bg-white p-6 md:p-8 rounded-xl shadow-lg max-w-8xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Form Masukan</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Left Section: Title & Description -->
        <div>
            <!-- Jenis Masukan -->
            <div class="mb-6">
                <div class="flex flex-wrap gap-6">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_masukan" class="form-radio" value="Saran">
                        <span>Saran</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_masukan" class="form-radio" value="Keluhan">
                        <span>Keluhan</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_masukan" class="form-radio" value="Aspirasi">
                        <span>Aspirasi</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_masukan" class="form-radio" value="Laporan Kondisi">
                        <span>Laporan Kondisi</span>
                    </label>
                </div>
            </div>

            <!-- Judul -->
            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2" for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan Judul Suara">
            </div>

            <!-- Isi -->
            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2" for="isi">Isi</label>
                <textarea id="isi" name="isi" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="13" placeholder="Masukkan Isi"></textarea>
            </div>
        </div>

        <!-- Right Section: Image Upload -->
        <div>
            <!-- Lokasi with Google Map -->
            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2" for="lokasi">Lokasi</label>
                <!-- Hidden input to store the selected location value for form submission -->
                <input type="hidden" id="lokasi" name="lokasi" value="">
                <!-- Map container -->
                <div id="map" class="w-full h-64 border border-gray-300 rounded-lg" style="border-radius: 0.5rem;"></div>
                <p class="text-sm text-gray-500 mt-2">Klik pada peta untuk memilih lokasi. Lokasi yang dipilih akan disimpan secara otomatis.</p>
            </div>

            <!-- Bukti Gambar -->
            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2" for="gambar">Bukti Gambar</label>
                <div class="flex justify-center items-center border-2 border-dashed border-gray-300 rounded-lg p-6">
                    <div class="text-center">
                        <x-bi-cloud-upload-fill class="w-32 h-auto m-auto"/>
                        <p class="text-gray-500">Klik Untuk Upload atau seret dan lepas</p>
                        <input type="file" id="gambar" name="gambar" class="hidden">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="w-full p-4 bg-gradient-to-r from-yellow-500 to-orange-400 text-white font-semibold rounded-lg hover:opacity-90 focus:outline-none focus:ring-4 focus:ring-yellow-500">
        Kirim
    </button>
</div>

<!-- Google Maps JavaScript API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=geometry,places"></script>

<script>
    let map;
    let marker;
    let geocoder;

    function initMap() {
        // Initialize the map centered on Indonesia (adjust as needed)
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: { lat: -2.5489, lng: 118.0149 } // Approximate center of Indonesia
        });

        // Initialize geocoder for reverse geocoding
        geocoder = new google.maps.Geocoder();

        // Add click listener to the map
        map.addListener('click', function(event) {
            const lat = event.latLng.lat();
            const lng = event.latLng.lng();

            // Remove previous marker if exists
            if (marker) {
                marker.setMap(null);
            }

            // Add new marker
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: 'Lokasi Terpilih'
            });

            // Reverse geocode to get address
            geocoder.geocode({ location: event.latLng }, function(results, status) {
                if (status === 'OK' && results[0]) {
                    const address = results[0].formatted_address;
                    document.getElementById('lokasi').value = address;
                } else {
                    // Fallback to coordinates if address not found
                    document.getElementById('lokasi').value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                }
            });

            // Optional: Center map on clicked location
            map.setCenter(event.latLng);
            map.setZoom(15);
        });
    }
</script>