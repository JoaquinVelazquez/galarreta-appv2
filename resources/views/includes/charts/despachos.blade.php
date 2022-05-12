<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>charts</title>
</head>

<body>
    <canvas id="visitas" style="max-width: 600px; max-height: 600px;"></canvas>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('visitas');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Mercado Envíos = ',
                    'Punto de despacho = ',
                    'Mercado Envíos Colecta = ',
                    'Mercado Envíos Flex = ',
                    'Mercado Envíos Full = ',
                    'Acordado con el vendedor = ',
                    'Pendiente de entrega = '
                ],
                datasets: [{
                    label: '',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    backgroundColor: [
                        '#0B5345',
                        '#0E6655',
                        '#117A65',
                        '#138D75',
                        '#16A085',
                        '#45B39D',
                        '#73C6B6',
                    ]
                }]
            },
        });
    </script>

</body>

</html>

<?php
/*
                        <?php echo count($mercado_envios_array) ?>,
                        <?php echo count($mercado_envios_places_array) ?>,
                        <?php echo count($mercado_envios_colecta_array) ?>,
                        <?php echo count($mercado_envios_flex_array) ?>,
                        <?php echo count($mercado_envios_full_array) ?>,
                        <?php echo count($no_entregado_array) ?>,
                        <?php echo count($otro_envio_array) ?>,
*/
?>