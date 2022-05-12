<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>charts</title>
</head>

<body>
    <canvas id="categorias"></canvas>
    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('categorias');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                        "Categoria 1",
						"Categoria 2",
						"Categoria 3",
						"Categoria 4",
						"Categoria 5"
                ],
                datasets: [{
                    label: 'Publicaciones',
                    data: [
                        10,
                        10,
                        10,
                        10,
                        10,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        max: 50,
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>

</body>

</html>