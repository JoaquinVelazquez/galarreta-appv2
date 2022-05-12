<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>charts</title>
</head>

<body>
    <canvas id="visitas_grafico" width="400" height="400"></canvas>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f"
        src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('visitas_grafico').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [  
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
                "Dia",
            ],
                datasets: [{
                    label: '',
                    data: [
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                        10,
                        20,
                        30,
                        10,
                        30,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false,
            }
        });
    </script>
</body>

</html>