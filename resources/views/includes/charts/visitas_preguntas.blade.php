
<body>
    <div style="height: 400px; width: 1000px;">
        <canvas id="visitas_preguntas"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const DATA_COUNT3 = 7;
        const NUMBER_CFG3 = {
            count: DATA_COUNT3,
            min: 0,
            max: 100
        };

        const labels3 = [
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
        const data3 = {
            labels: labels3,
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
                        if (isset($mes_1_visitas_array[0]["visitas"])) {
                            echo $mes_1_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_2_visitas_array[0]["visitas"])) {
                            echo $mes_2_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_3_visitas_array[0]["visitas"])) {
                            echo $mes_3_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_4_visitas_array[0]["visitas"])) {
                            echo $mes_4_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_5_visitas_array[0]["visitas"])) {
                            echo $mes_5_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_6_visitas_array[0]["visitas"])) {
                            echo $mes_6_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_7_visitas_array[0]["visitas"])) {
                            echo $mes_7_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_8_visitas_array[0]["visitas"])) {
                            echo $mes_8_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_9_visitas_array[0]["visitas"])) {
                            echo $mes_9_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_10_visitas_array[0]["visitas"])) {
                            echo $mes_10_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_11_visitas_array[0]["visitas"])) {
                            echo $mes_11_visitas_array[0]["visitas"];
                        } else {
                            echo 0;
                        }
                        ?>,
                        <?php
                        if (isset($mes_12_visitas_array[0]["visitas"])) {
                            echo $mes_12_visitas_array[0]["visitas"];
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

        const config3 = {
            type: 'bar',
            data: data3,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Visitas'
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

        var myChart3 = new Chart(
            document.getElementById('visitas_preguntas').getContext('2d'),
            config3
        );
    </script>
</body>
</html>