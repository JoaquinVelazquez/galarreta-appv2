<body>
    <div style="height: 300px; width: 300px;">
        <canvas id="ventas_facturacion_mtd"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const DATA_COUNT2 = 7;
        const NUMBER_CFG2 = {
            count: DATA_COUNT2,
            min: 0,
            max: 100
        };

        const labels2 = [
            <?php echo '"' . substr($mes_12_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_actual_nombre, 0, 3) . '"'; ?>,
        ]
        const data2 = {
            labels: labels2,
            datasets: [{
                    label: 'Facturacion',
                    data: [
                        {{array_sum($mes_anterior_monto_array)}},
                        {{array_sum($mes_actual_monto_array)}},
                    ],
                    borderColor: ["#d6ede7"],
                    backgroundColor: ["#d6ede7"],
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y',
                },
                {
                    label: 'Ventas',
                    data: [
                        {{count($mes_anterior_unidades_array)}},
                        {{count($mes_actual_unidades_array)}},
                    ],
                    borderColor: ["#9ad2ad"],
                    backgroundColor: ["#9ad2ad"],
                    stack: 'combined',
                    yAxisID: 'y2',
                },
            ]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Ventas + Facturacion (Month to Date)'
                    }
                },
                scales: {
                    y: {
                        stacked: true,
                        type: 'linear',
                        display: false,
                        position: 'left',
                        grid: {
                            display: false,
                        },
                    },
                    y1: {
                        stacked: true,
                        type: 'linear',
                        display: false,
                        position: 'right',
                        grid: {
                            display: false,
                        },
                    },
                    x: {
                        display: false,
                        grid: {
                            display: false,
                        },
                    }
                },
                maintainAspectRatio: false,
            },
        };

        var myChart2 = new Chart(
            document.getElementById('ventas_facturacion_mtd').getContext('2d'),
            config2
        );
    </script>
</body>

</html>