<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>charts</title>
</head>

<body>
    <div>
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
            "Jan",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Dic",
        ]

        const data = {
            labels: labels,
            datasets: [{
                    label: 'Mercado Envios',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#ffda89"],
                    backgroundColor: ["#ffe4ab"],
                    fill: true
                },
                {
                    label: 'Punto De Despacho',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#fdfd96"],
                    backgroundColor: ["#fffdb5"],
                    fill: true
                },
                {
                    label: 'Mercado Envíos Coleta',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#1ddddd"],
                    backgroundColor: ["#61eaea"],
                    fill: true
                },
                {
                    label: 'Mercado Envíos Flex',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#b186f1"],
                    backgroundColor: ["#c9a8f6"],
                    fill: true
                },
                {
                    label: 'Mercado Envíos Full',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#77dd77"],
                    backgroundColor: ["#a2e89e"],
                    fill: true
                },
                {
                    label: 'Acordar Con El Vendedor',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    borderColor: ["#8c8c8c"],
                    backgroundColor: ["#bfbfbf"],
                    fill: true
                },
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                        }
                    }
                }
            }
        };

        var myChart = new Chart(
            document.getElementById('ventas_facturacion').getContext('2d'),
            config
        );
    </script>

</body>

</html>