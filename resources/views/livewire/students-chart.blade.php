<div x-data="{ open: 'bar' }" class="px-4 py-2">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold">Jumlah Siswa</h2>
        <div class="flex items-center gap-0.5">
            <div x-on:click="open = 'bar'"
                class="px-4 py-1 text-sm duration-300 rounded-md cursor-pointer hover:bg-accent hover:text-white"
                :class="open == 'bar' ? 'bg-slate-200' : ''">Bar Chart</div>
            <div x-on:click="open = 'pie'"
                class="px-4 py-1 text-sm duration-300 rounded-md cursor-pointer hover:bg-accent hover:text-white"
                :class="open == 'pie' ? 'bg-slate-200' : ''">Pie Chart</div>
        </div>
    </div>

    <div class="flex items-center gap-2 px-6 py-2 mb-2 bg-white rounded-md shadow-md w-fit">
        <h3>Generasi ke</h3>
        <div class="flex items-center gap-0.5 *:rounded-md *:bg-slate-200">
            <div wire:click="decrement" class="flex items-center justify-center px-2 py-1 duration-300 cursor-pointer hover:bg-accent group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="duration-300 size-5 group-hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>
            <input type="text" wire:model="generation" disabled class="w-16 text-center px-6 py-0.5 rounded-md bg-slate-200 duration-300 hover:bg-slate-300">
            <div wire:click="increment" class="flex items-center justify-center px-2 py-1 duration-300 cursor-pointer hover:bg-accent group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="duration-300 size-5 group-hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    </div>

    <div wire:ignore x-show="open == 'bar'" x-transition.opacity.duration.300 class="p-4 bg-white rounded-md shadow-md aspect-video">
        <canvas id="studentsBarChart"></canvas>
    </div>
    <div wire:ignore x-show="open == 'pie'" x-transition.opacity.duration.300 class="p-4 bg-white rounded-md shadow-md aspect-video">
        <canvas id="studentsPieChart"></canvas>
    </div>
</div>

@script
    <script>
        let studentsBarChartInstance;
        let studentsPieChartInstance;

        const data = @json($studentCount);

        studentsBarChartInstance = new Chart(studentsBarChart, {
            type: 'bar',
            data: {
                labels: ['AK', 'FKK', 'IM', 'TLM', 'TKJ', 'PS'],
                datasets: [{
                    data: [
                        data.ak || 0,
                        data.fkk || 0,
                        data.im || 0,
                        data.tlm || 0,
                        data.tkj || 0,
                        data.ps || 0
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
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

        // Buat chart baru untuk Pie Chart
        studentsPieChartInstance = new Chart(studentsPieChart, {
            type: 'pie',
            data: {
                labels: ['AK', 'FKK', 'IM', 'TLM', 'TKJ', 'PS'],
                datasets: [{
                    data: [
                        data.ak || 0,
                        data.fkk || 0,
                        data.im || 0,
                        data.tlm || 0,
                        data.tkj || 0,
                        data.ps || 0
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        $wire.on('refresh', (data) => updateCharts(data[0]));

        function updateCharts(data) {
            studentsBarChartInstance.data.datasets[0].data = [
                data.ak || 0,
                data.fkk || 0,
                data.im || 0,
                data.tlm || 0,
                data.tkj || 0,
                data.ps || 0
            ];
            studentsBarChartInstance.update();

            studentsPieChartInstance.data.datasets[0].data = [
                data.ak || 0,
                data.fkk || 0,
                data.im || 0,
                data.tlm || 0,
                data.tkj || 0,
                data.ps || 0
            ];
            studentsPieChartInstance.update();
        }
    </script>
@endscript
