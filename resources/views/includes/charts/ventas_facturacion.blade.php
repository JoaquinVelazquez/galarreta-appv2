<body>
    <div style="height: 400px; width: 1000px;">
        <canvas id="ventas_facturacion"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const DATA_COUNT = 7;
        const NUMBER_CFG = {
            count: DATA_COUNT,
            min: 0,
            max: 100
        };

        const labels = [
            <?php echo '"' . substr($mes_1_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_2_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_3_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_4_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_5_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_6_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_7_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_8_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_9_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_10_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_11_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_12_nombre, 0, 3) . '"'; ?>,
        ]
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Facturacion',
                    data: [
                        {{array_sum($mes_1_array_monto)}},
                        {{array_sum($mes_2_array_monto)}},
                        {{array_sum($mes_3_array_monto)}},
                        {{array_sum($mes_4_array_monto)}},
                        {{array_sum($mes_5_array_monto)}},
                        {{array_sum($mes_6_array_monto)}},
                        {{array_sum($mes_7_array_monto)}},
                        {{array_sum($mes_8_array_monto)}},
                        {{array_sum($mes_9_array_monto)}},
                        {{array_sum($mes_10_array_monto)}},
                        {{array_sum($mes_11_array_monto)}},
                        {{array_sum($mes_12_array_monto)}},
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
                        {{count($mes_1_array_monto)}},
                        {{count($mes_2_array_monto)}},
                        {{count($mes_3_array_monto)}},
                        {{count($mes_4_array_monto)}},
                        {{count($mes_5_array_monto)}},
                        {{count($mes_6_array_monto)}},
                        {{count($mes_7_array_monto)}},
                        {{count($mes_8_array_monto)}},
                        {{count($mes_9_array_monto)}},
                        {{count($mes_10_array_monto)}},
                        {{count($mes_11_array_monto)}},
                        {{count($mes_12_array_monto)}},
                    ],
                    borderColor: ["#9ad2ad"],
                    backgroundColor: ["#9ad2ad"],
                    stack: 'combined',
                    yAxisID: 'y2',
                },
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Ventas + Facturacion'
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

        var myChart = new Chart(
            document.getElementById('ventas_facturacion').getContext('2d'),
            config
        );
    </script>
</body>

</html>