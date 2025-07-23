@extends('layouts.main')
@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        <div class="stat-card rounded-2xl p-6 scale-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Periode</p>
                    <p class="text-3xl font-bold text-gray-600">{{$periodes->count()}}</p>
                    <p class="text-green-400 text-sm mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+12.5%
                    </p>
                </div>
                <div class="p-4 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-2xl p-6 scale-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Transaksi</p>
                    <p class="text-3xl font-bold text-gray-600">{{$transactions->count()}}</p>
                    <p class="text-green-400 text-sm mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+8.2%
                    </p>
                </div>
                <div class="p-4 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl">
                    <i class="fas fa-dollar-sign text-2xl text-white"></i>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-2xl p-6 scale-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Asset</p>
                    <p class="text-3xl font-bold text-gray-600">{{$assets->count()}}</p>
                    <p class="text-yellow-400 text-sm mt-1">
                        <i class="fas fa-arrow-down mr-1"></i>-2.1%
                    </p>
                </div>
                <div class="p-4 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-2xl">
                    <i class="fas fa-shopping-cart text-2xl text-white"></i>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-2xl p-6 scale-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Performance</p>
                    <p class="text-3xl font-bold text-gray-600">98.5%</p>
                    <p class="text-green-400 text-sm mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+1.3%
                    </p>
                </div>
                <div class="p-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl">
                    <i class="fas fa-chart-line text-2xl text-white"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="form-card p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold text-white mb-4">Monthly Revenue</h2>
        <canvas id="lineChart" height="100"></canvas>
    </div>
@endsection
@push('scripts')
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');

        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                        label: 'Pemasukan',
                        data: @json($income),
                        backgroundColor: 'rgba(34,197,94,0.2)', // Tailwind green-500
                        borderColor: 'rgba(34,197,94,1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(34,197,94,1)',
                    },
                    {
                        label: 'Pengeluaran',
                        data: @json($expense),
                        backgroundColor: 'rgba(239,68,68,0.2)', // Tailwind red-500
                        borderColor: 'rgba(239,68,68,1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(239,68,68,1)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#000000'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#ccc'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#ccc'
                        }
                    }
                }
            }
        });
    </script>
@endpush
