<div>
    <div>
        <canvas id="VoiceChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const voices = document.getElementById('VoiceChart');

        new Chart(voices, {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Voices',
                    data: @json($counts),
                    borderColor: 'rgb(153,0,255)',
                    borderWidth: 1,
                    fill: false

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
