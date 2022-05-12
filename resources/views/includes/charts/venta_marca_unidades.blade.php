<?php
uasort($ordenes_por_marca, function ($orden3, $orden4) {
    if ($orden3['total_cantidad'] == $orden4['total_cantidad']) {
        return 0;
    }

    return $orden3['total_cantidad'] < $orden4['total_cantidad'] ? 1 : -1;
});
?>

<body>
    <div>
        <canvas id="venta_marca_unidades" style="width: 1000px; height: 700px"></canvas>
    </div>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const DATA_COUNT1 = 5;
        const NUMBER_CFG1 = {
            count: DATA_COUNT1,
            min: 0,
            max: 100
        };

        const data1 = {
            labels: [
                <?php
                foreach ($ordenes_por_marca as $data) {
                    echo "'" . preg_replace('/[^a-z]/iu', '', ($data[0]["marca"])) . " = %" . number_format((($data["total_cantidad"] / $total_unidades) * 100), 2) . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Dataset 1',
                data: [
                    <?php
                    foreach ($ordenes_por_marca as $data) {
                        echo (array_sum(array_column($data, 'cantidad'))) . ",";
                    }
                    ?>
                ],
                backgroundColor: [
                    "#F79494",
                    "#F7BA94",
                    "#F7CD94",
                    "#F7E094",
                    "#C6E2C6",
                    "#ADE3DF",
                    "#94E4F7",
                    "#AFD2F5",
                    "#CABFF2",
                    "#E5ACEF",
            ],
            }]
        };

        const config1 = {
            type: 'pie',
            data: data1,
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'right',
                        align: 'start',
                        fullSize: true,
                    },
                    title: {
                        display: false,
                        text: 'Ventas Por Marca - Unidades'
                    }
                }
            },
        };

        var myChart1 = new Chart(
            document.getElementById('venta_marca_unidades').getContext('2d'),
            config1
        );
    </script>
</body>
</html>