<body>
    <div style="height: 200px;">
        <canvas id="canales_transacciones"></canvas>
    </div>
    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('canales_transacciones');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ventas'],
                datasets: [{
                        label: 'MercadoShops',
                        data: [
                            @php
                            echo(isset($ordenes_seller->countBy('plataforma')["mshops"]) ? $ordenes_seller->countBy('plataforma')["mshops"] : 0);
                            @endphp
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',

                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'MercadoLibre',
                        data: [
                            @php
                            echo(isset($ordenes_seller->countBy('plataforma')["meli"]) ? $ordenes_seller->countBy('plataforma')["meli"] : 0);
                            @endphp
                        ],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',

                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        stacked: true,
                        max:
                            @php
                                echo((isset($ordenes_seller->countBy('plataforma')["meli"]) ? $ordenes_seller->countBy('plataforma')["meli"] : 0) + (isset($ordenes_seller->countBy('plataforma')["mshops"]) ? $ordenes_seller->countBy('plataforma')["mshops"] : 0));
                            @endphp,
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        stacked: true,
                        grid: {
                            display: false
                        }
                    }
                },
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>