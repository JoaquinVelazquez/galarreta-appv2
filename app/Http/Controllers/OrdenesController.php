<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Http\Requests\StoreOrdenesRequest;
use App\Http\Requests\UpdateOrdenesRequest;
use App\Models\Seller;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        $ordenes_seller = Ordenes::all();
        set_time_limit(0);
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        set_time_limit(0);
        $ordenes_seller = Ordenes::where('seller_id', $id);
        //$ordenes_seller->delete();
        $seller = Seller::find($id);
        $access_token = $seller->access_token;
        //Establecer fechas
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $horas = time();
        $hora_actual = date('H:i', time());
        $fecha_actual = date("Y-m-d");
        $mes_actual = date("Y-m-01");
        $fecha_inicial = date("Y-m-d", strtotime($mes_actual . "- 10 months"));
        $fecha_final = date("Y-m-d", strtotime($mes_actual . "- 0 months"));

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

        // $chunks = array_chunk($orden_chunk, 1000);

        // foreach ($chunks as $chunk) {
        //     Ordenes::firstOrCreate($chunk);
        // }

        return $ordenes_seller->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrdenesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*
        foreach ($sellers as $seller) {
            set_time_limit(0);
            $access_token = $seller->access_token;
            $id = $seller->id;
            //Establecer fechas
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $horas = time();
            $hora_actual = date('H:i', time());
            $fecha_actual = date("Y-m-d");
            $mes_actual = date("Y-m-01");
            $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 365 days"));
            $fecha_final = date("Y-m-d", strtotime($fecha_actual . "- 0 day"));

            $i = 0;

            $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
            $DATE_TO = $fecha_final . "T" . $hora_actual . ":00.000-00:00";

            do {
                $url = "https://api.mercadolibre.com/orders/search?seller=" . $id . "&order.status=paid&order.date_created.from=" . $DATE_FROM . "&order.date_created.to=" . $DATE_TO . "&sort=date_asc&limit=50&offset=" . $i;
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
        */

        return "Hola";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function show(Ordenes $ordenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordenes $ordenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdenesRequest  $request
     * @param  \App\Models\Ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        set_time_limit(0);
        $ordenes_seller = Ordenes::where('seller_id', $id);
        $seller = Seller::find($id);
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
        return redirect(route('sellers.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordenes_seller = Ordenes::where('seller_id', $id);
        $ordenes_seller->delete();
    }
}
