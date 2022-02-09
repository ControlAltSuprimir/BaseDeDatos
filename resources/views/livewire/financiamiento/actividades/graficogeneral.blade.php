<div>
    <canvas id="finanzasDeptomatActividades"></canvas>

    {{-- Gráfico de las finanzas --}}
    <script>
        var ctx = document.getElementById('finanzasDeptomatActividades').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [{!! $data['anosFinanciados'] !!}], // responsible for how many bars are gonna show on the chart
                // create 12 datasets, since we have 12 items
                // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
                // put 0, if there is no data for the particular bar
                datasets: [{
                    label: 'Monto Invertido',
                    data: [{!! $data['financiamientoPorAno'] !!}],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Gastos en los últimos 10 años'
                    },
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>

</div>
