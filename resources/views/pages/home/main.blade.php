@extends('layouts.home')

@section('head')
    <title>Karsa : Karawangi Sejahtera</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection

@section('contents')
    <div class="h-screen">
        {{-- Section 1 --}}
        <div class="h-screen bg-cover transition-all duration-700 " style="background-image: linear-gradient(to bottom, transparent 90%, #FDFBF7 100%), url('{{ asset('images/png/BackgroundHome.png') }}');">
            <div class="flex flex-col items-center text-center justify-center w-full h-full">
                <p class="text-8xl font-bold mb-10">Selamat Datang</p>
                <p class="text-4xl font-normal mb-20">Di Situs Resmi Karawangi Sejahtera</p>
                <p class="text-lg leading-loose"> Mewujudkan masyarakat Karawangi yang mandiri, sejahtera, dan terus berkembang </p>
            </div>
        </div>

        {{-- Section 2 --}}
        <div class="h-screen bg-[#FDFBF7] transition-all duration-700 ">
            <div class="flex flex-col items-start w-full h-full px-80 pt-50 lg:px-40">
                <div class="flex flex-row space-x-4">
                    <x-bi-newspaper class="w-15 h-15 text-[#E3B765]" />
                    <p class="text-6xl font-bold mb-5 bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] h-full"> Desa Karawangi Sejahtera </p>
                </div>
                <p class="text-xl font-normal mb-5">
                    Karangwangi Sejahtera adalah platform desa yang memudahkan Anda mengakses informasi, program, dan layanan desa dalam satu tempat. Platform ini mendukung keterbukaan dan partisipasi warga.
                </p>

                <div class="container mx-auto p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                        <!-- Chart Penduduk -->
                        <div class="bg-white p-6 rounded-lg shadow-2xl">
                            <h3 class="text-2xl font-semibold text-center mb-6">Jumlah Penduduk</h3>
                            <canvas id="chartPopulasi" class="w-full h-full"></canvas> <!-- Set height and width -->
                        </div>
                        <!-- Chart Gender -->
                        <div class="bg-white p-6 rounded-lg shadow-2xl">
                            <h3 class="text-2xl font-semibold text-center mb-6">Jumlah Gender</h3>
                            <canvas id="chartGender" class="w-full h-32"></canvas> <!-- Set height and width -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Populasi
        var ctxPopulasi = document.getElementById('chartPopulasi').getContext('2d');
        var chartPopulasi = new Chart(ctxPopulasi, {
            type: 'bar',
            data: {
                labels: ['Balita', 'Anak-anak', 'Remaja', 'Dewasa', 'Lansia'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [540, 560, 520, 542, 620],
                    backgroundColor: '#CDAA65',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: false
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        font: {
                            family: 'Poppins',
                            weight: 'bold',
                            size: 14
                        },
                        color: 'black'
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Chart Gender
        var ctxGender = document.getElementById('chartGender').getContext('2d');
        var chartGender = new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: ['Pria', 'Perempuan'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [50, 50],
                    backgroundColor: ['#CDAA65', '#3D6B47'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
