<div class="px-4 py-2">
    <h3 class="mb-3 text-lg font-semibold">Statistik Pengunjung</h3>
    <input type="date" wire:model="date" class="mb-2">
    <div wire:ignore class="p-4 bg-white rounded-md shadow-md aspect-video">
        <canvas id="visitorsChart"></canvas>
    </div>
</div>

<script>
    const data = @json($data);

    new Chart(visitorsChart, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: [
                    data[0] || 0,
                    data[1] || 0,
                    data[2] || 0,
                    data[3] || 0,
                    data[4] || 0,
                    data[5] || 0,
                    data[6] || 0
                ],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
