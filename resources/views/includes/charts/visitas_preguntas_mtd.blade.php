<body>
    <div style="height: 300px; width: 300px;">
        <canvas id="visitas_preguntas_mtd"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const DATA_COUNT4 = 7;
        const NUMBER_CFG4 = {
            count: DATA_COUNT4,
            min: 0,
            max: 100
        };

        const labels4 = [
            <?php echo '"' . substr($mes_12_nombre, 0, 3) . '"'; ?>,
            <?php echo '"' . substr($mes_actual_nombre, 0, 3) . '"'; ?>,
        ]
        const data4 = {
            labels: labels4,
            datasets: [{
                    label: 'Preguntas',
                    data: [

                    ],
                    borderColor: ["#d6ede7"],
                    backgroundColor: ["#d6ede7"],
                    stack: 'combined',
                    type: 'line',
                    yAxisID: 'y',
                },
                {
                    label: 'Visitas',
                    data: [
                        <?php
                        if (isset($mes_anterior_visitas_array[0]["visitas"])) {
                            echo $mes_anterior_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_actual_visitas_array[0]["visitas"])) {
                            echo $mes_actual_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                    ],
                    borderColor: ["#99c7eb"],
                    backgroundColor: ["#99c7eb"],
                    stack: 'combined',
                    yAxisID: 'y2',
                },
            ]
        };

        const config4 = {
            type: 'bar',
            data: data4,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Visitas + Preguntas (Month to Date)'
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

        var myChart4 = new Chart(
            document.getElementById('visitas_preguntas_mtd').getContext('2d'),
            config4
        );
    </script>
</body>
</html>