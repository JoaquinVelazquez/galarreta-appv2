<?php

namespace App\Console;

use App\Models\Ordenes;
use App\Models\Seller;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $orden_chunk = Ordenes::firstOrCreate([
                "order_id" => random_int(0, 100000),
            ], [
                "seller_id" => random_int(0, 100000),
                "producto_id" => random_int(0, 100000),
                "shipping_id" => random_int(0, 100000),
                "producto" => "Nombre Producto",
                "cantidad" => random_int(0, 10),
                "monto" => random_int(0, 1000),
                "fecha" => now()->toDateTimeString(),
                "plataforma" => "meli",
                "divisa" => "ARS",
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        })->everyMinute();

        $schedule->call(function () {
            set_time_limit(0);
            $sellers = Seller::all();
            foreach ($sellers as $seller) {
                $id = $seller->id;
                $access_token = $seller->access_token;
                //Establecer fechas
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $horas = time();
                $hora_actual = date('H:i', time());
                $fecha_actual = date("Y-m-d");
                $mes_actual = date("Y-m-01");
                $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
                $fecha_final = date("Y-m-d", strtotime($fecha_actual . "- 0 day"));

                $i = 0;

                $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
                $DATE_TO = $fecha_final . "T" . $hora_actual . ":00.000-00:00";

                do {
                    $url = "https://api.mercadolibre.com/orders/search?seller=" . $id . "&order.status=paid&order.date_created.from=" . $DATE_FROM . "&order.date_created.to=" . $DATE_TO . "&sort=date_desc&limit=50&offset=" . $i;
                    $authorization = array("Authorization: Bearer " . $access_token);
                    // create curl resource
                    $ch = curl_init();
                    //Apí Link
                    // set url
                    curl_setopt($ch, CURLOPT_URL, $url);
                    //Bearer Token to Header
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $authorization);
                    //return the transfer as a string
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    // $output contains the output string
                    $output = curl_exec($ch);
                    // close curl resource to free up system resources
                    curl_close($ch);
                    //DD info
                    $ordenes = (json_decode($output, true));

                    $i += 50;

                    if (isset($ordenes["results"])) {
                        foreach ($ordenes["results"] as $data) {
                            if ($data["tags"][0] == "mshops") {
                                $plataforma_orden = "mshops";
                            } else {
                                if ($data["tags"][1] == "mshops") {
                                    $plataforma_orden = "mshops";
                                } else {
                                    $plataforma_orden = "meli";
                                }
                            }

                            $orden_chunk = Ordenes::firstOrCreate([
                                "order_id" => $data["payments"][0]["order_id"],
                            ], [
                                "seller_id" => $id,
                                "producto_id" => $data["order_items"][0]["item"]["id"],
                                "shipping_id" => $data["shipping"]["id"],
                                "producto" => $data["payments"][0]["reason"],
                                "cantidad" => $data["order_items"][0]["quantity"],
                                "monto" => $data["payments"][0]["total_paid_amount"],
                                "fecha" => $data["payments"][0]["date_created"],
                                "plataforma" => $plataforma_orden,
                                "divisa" => $data["payments"][0]["currency_id"],
                                'created_at' => now()->toDateTimeString(),
                                'updated_at' => now()->toDateTimeString(),
                            ]);
                        }
                        $resultados = count($ordenes["results"]);
                    } else {
                        $resultados = 0;
                    }
                } while ($resultados > 0);
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
