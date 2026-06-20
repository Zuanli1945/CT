<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CuacaTani</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard CuacaTani</h1>

        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <p class="text-4xl font-bold text-blue-600">{{ $totalLahan }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Lahan</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <p class="text-4xl font-bold text-green-600">{{ number_format($totalLuas, 2) }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Luas (ha)</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <p class="text-4xl font-bold text-amber-500">{{ $jumlahPadi }}</p>
                <p class="text-sm text-gray-500 mt-1">Lahan Padi</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <p class="text-4xl font-bold text-yellow-600">{{ $jumlahJagung }}</p>
                <p class="text-sm text-gray-500 mt-1">Lahan Jagung</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6 max-w-md mx-auto">
            <h2 class="text-lg font-semibold text-gray-700 mb-4 text-center">Perbandingan Komoditas</h2>
            <canvas id="komoditasChart" height="250"></canvas>
        </div>
    </div>

    <script>
        new Chart(document.getElementById('komoditasChart'), {
            type: 'pie',
            data: {
                labels: ['Padi', 'Jagung'],
                datasets: [{
                    data: [{{ $jumlahPadi }}, {{ $jumlahJagung }}],
                    backgroundColor: ['#f59e0b', '#ca8a04'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
</body>
</html>
