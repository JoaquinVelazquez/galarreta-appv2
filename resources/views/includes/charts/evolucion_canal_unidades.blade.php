@php
$mes_actual = date("Y-m-01");
$mes_1_nombre = date("F", strtotime($mes_actual . "- 12 months"));
$mes_2_nombre = date("F", strtotime($mes_actual . "- 11 months"));
$mes_3_nombre = date("F", strtotime($mes_actual . "- 10 months"));
$mes_4_nombre = date("F", strtotime($mes_actual . "- 9 months"));
$mes_5_nombre = date("F", strtotime($mes_actual . "- 8 months"));
$mes_6_nombre = date("F", strtotime($mes_actual . "- 7 months"));
$mes_7_nombre = date("F", strtotime($mes_actual . "- 6 months"));
$mes_8_nombre = date("F", strtotime($mes_actual . "- 5 months"));
$mes_9_nombre = date("F", strtotime($mes_actual . "- 4 months"));
$mes_10_nombre = date("F", strtotime($mes_actual . "- 3 months"));
$mes_11_nombre = date("F", strtotime($mes_actual . "- 2 months"));
$mes_12_nombre = date("F", strtotime($mes_actual . "- 1 months"));

$mes_1_meli = array();
$mes_1_mshops = array();
if (isset($mes_1_array)) {
    foreach ($mes_1_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_1_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_1_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_2_meli = array();
$mes_2_mshops = array();
if (isset($mes_2_array)) {
    foreach ($mes_2_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_2_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_2_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_3_meli = array();
$mes_3_mshops = array();
if (isset($mes_3_array)) {
    foreach ($mes_3_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_3_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_3_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_4_meli = array();
$mes_4_mshops = array();
if (isset($mes_4_array)) {
    foreach ($mes_4_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_4_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_4_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_5_meli = array();
$mes_5_mshops = array();
if (isset($mes_5_array)) {
    foreach ($mes_5_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_5_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_5_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_6_meli = array();
$mes_6_mshops = array();
if (isset($mes_6_array)) {
    foreach ($mes_6_array as $data) {
        switch ($data["plataforma"]) {
            case 'meli':
                array_push($mes_6_meli, $data["unidades"]);
                break;
            case 'mshops':
                array_push($mes_6_mshops, $data["unidades"]);
                break;
        }
    }
}

$mes_7_meli = array();
$mes_7_mshops = array();
foreach ($mes_7_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_7_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_7_mshops, $data["unidades"]);
            break;
    }
}

$mes_8_meli = array();
$mes_8_mshops = array();
foreach ($mes_8_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_8_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_8_mshops, $data["unidades"]);
            break;
    }
}

$mes_9_meli = array();
$mes_9_mshops = array();
foreach ($mes_9_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_9_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_9_mshops, $data["unidades"]);
            break;
    }
}

$mes_10_meli = array();
$mes_10_mshops = array();
foreach ($mes_10_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_10_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_10_mshops, $data["unidades"]);
            break;
    }
}

$mes_11_meli = array();
$mes_11_mshops = array();
foreach ($mes_11_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_11_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_11_mshops, $data["unidades"]);
            break;
    }
}

$mes_12_meli = array();
$mes_12_mshops = array();
foreach ($mes_12_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_12_meli, $data["unidades"]);
            break;
        case 'mshops':
            array_push($mes_12_mshops, $data["unidades"]);
            break;
    }
}
@endphp

<body>
    <div>
        <canvas id="evolucion_canal_unidades"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const DATA_COUNT1 = 7;
        const NUMBER_CFG1 = {
            count: DATA_COUNT1,
            min: 0,
            max: 100
        };

        const labels1 = [
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

        const data1 = {
            labels: labels1,
            datasets: [{
                    label: 'MercadoLibre',
                    data: [
                        {{array_sum($mes_1_meli)}},
                        {{array_sum($mes_2_meli)}},
                        {{array_sum($mes_3_meli)}},
                        {{array_sum($mes_4_meli)}},
                        {{array_sum($mes_5_meli)}},
                        {{array_sum($mes_6_meli)}},
                        {{array_sum($mes_7_meli)}},
                        {{array_sum($mes_8_meli)}},
                        {{array_sum($mes_9_meli)}},
                        {{array_sum($mes_10_meli)}},
                        {{array_sum($mes_11_meli)}},
                        {{array_sum($mes_12_meli)}},
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                },
                {
                    label: 'Mercadoshops',
                    data: [
                        {{array_sum($mes_1_mshops)}},
                        {{array_sum($mes_2_mshops)}},
                        {{array_sum($mes_3_mshops)}},
                        {{array_sum($mes_4_mshops)}},
                        {{array_sum($mes_5_mshops)}},
                        {{array_sum($mes_6_mshops)}},
                        {{array_sum($mes_7_mshops)}},
                        {{array_sum($mes_8_mshops)}},
                        {{array_sum($mes_9_mshops)}},
                        {{array_sum($mes_10_mshops)}},
                        {{array_sum($mes_11_mshops)}},
                        {{array_sum($mes_12_mshops)}},
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',

                    ],
                    borderWidth: 1
                },
            ]
        };

        const config1 = {
            type: 'bar',
            data: data1,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Evolución de Canal - Unidades'
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
        };

        var myChart1 = new Chart(
            document.getElementById('evolucion_canal_unidades').getContext('2d'),
            config1
        );
    </script>
</body>
</html>