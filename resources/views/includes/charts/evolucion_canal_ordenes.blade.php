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
                array_push($mes_1_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_1_mshops, $data["ordenes"]);
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
                array_push($mes_2_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_2_mshops, $data["ordenes"]);
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
                array_push($mes_3_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_3_mshops, $data["ordenes"]);
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
                array_push($mes_4_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_4_mshops, $data["ordenes"]);
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
                array_push($mes_5_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_5_mshops, $data["ordenes"]);
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
                array_push($mes_6_meli, $data["ordenes"]);
                break;
            case 'mshops':
                array_push($mes_6_mshops, $data["ordenes"]);
                break;
        }
    }
}

$mes_7_meli = array();
$mes_7_mshops = array();
foreach ($mes_7_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_7_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_7_mshops, $data["ordenes"]);
            break;
    }
}

$mes_8_meli = array();
$mes_8_mshops = array();
foreach ($mes_8_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_8_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_8_mshops, $data["ordenes"]);
            break;
    }
}

$mes_9_meli = array();
$mes_9_mshops = array();
foreach ($mes_9_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_9_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_9_mshops, $data["ordenes"]);
            break;
    }
}

$mes_10_meli = array();
$mes_10_mshops = array();
foreach ($mes_10_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_10_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_10_mshops, $data["ordenes"]);
            break;
    }
}

$mes_11_meli = array();
$mes_11_mshops = array();
foreach ($mes_11_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_11_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_11_mshops, $data["ordenes"]);
            break;
    }
}

$mes_12_meli = array();
$mes_12_mshops = array();
foreach ($mes_12_array as $data) {
    switch ($data["plataforma"]) {
        case 'meli':
            array_push($mes_12_meli, $data["ordenes"]);
            break;
        case 'mshops':
            array_push($mes_12_mshops, $data["ordenes"]);
            break;
    }
}
@endphp

<body>
    <div>
        <canvas id="evolucion_canal_ordenes"></canvas>
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

        const config3 = {
            type: 'bar',
            data: data3,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Evolución de Canal - Ordenes'
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

        var myChart3 = new Chart(
            document.getElementById('evolucion_canal_ordenes').getContext('2d'),
            config3
        );
    </script>
</body>
</html>