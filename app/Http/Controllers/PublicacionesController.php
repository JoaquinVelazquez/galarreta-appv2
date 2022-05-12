<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use App\Http\Requests\StorePublicacionesRequest;
use App\Http\Requests\UpdatePublicacionesRequest;
use App\Models\Seller;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        set_time_limit(0);
        foreach ($sellers as $seller) {
            $access_token = $seller->access_token;
            $id = $seller->id;
            $publicaciones_seller = Publicaciones::where('seller_id', $id);
            //Establecer fechas
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $horas = time();
            $hora_actual = date('H:i', time());
            $fecha_actual = date("Y-m-d");
            $mes_actual = date("Y-m-01");
            $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 30 days"));
            $fecha_final = date("Y-m-d", strtotime($fecha_actual . "- 0 day"));
            $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
            $DATE_TO = $fecha_final . "T" . $hora_actual . ":00.000-00:00";
    
            $i = 0;
            set_time_limit(0);
            do {
                $url = "https://api.mercadolibre.com/users/" . $id . "/items/search?orders=sold_quantity_desc&limit=50&offset=" . $i;
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
                $publicaciones_output = (json_decode($output, true));
    
                if (isset($publicaciones_output["results"])) {
                    $resultados = count($publicaciones_output["results"]);
    
                    foreach ($publicaciones_output["results"] as $publicacion_id) {
                        $url = "https://api.mercadolibre.com/items?ids=" . $publicacion_id;
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
                        $publicacion = (json_decode($output, true));
                        ///////////////////////////////////////////////////////////////////
                        $url2 = "https://api.mercadolibre.com/items/visits?ids=" . $publicacion_id . "&date_from=" . $DATE_FROM . "&date_to=" . $DATE_TO;
                        $authorization = array("Authorization: Bearer " . $access_token);
                        // create curl resource
                        $ch2 = curl_init();
                        //Apí Link
                        // set url
                        curl_setopt($ch2, CURLOPT_URL, $url2);
                        //Bearer Token to Header
                        curl_setopt($ch2, CURLOPT_HTTPHEADER, $authorization);
                        //return the transfer as a string
                        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                        // $output contains the output string
                        $output2 = curl_exec($ch2);
                        // close curl resource to free up system resources
                        curl_close($ch2);
                        //DD info
                        $publicacion_visitas = (json_decode($output2, true));
    
                        if (isset($publicacion[0]["body"]["shipping"]["tags"][0])) {
                            if ($publicacion[0]["body"]["shipping"]["tags"][0] == "self_service_in") {
                                $envio_flex = "si";
                            } else {
                                $envio_flex = "no ";
                            }
                        } else {
                            $envio_flex = "no ";
                        }
    
                        if (isset($publicacion[0]["body"]["shipping"]["logistic_type"])) {
                            if ($publicacion[0]["body"]["shipping"]["logistic_type"] == "fulfillment") {
                                $envio_full = "si";
                            } else {
                                $envio_full = "no ";
                            }
                        } else {
                            $envio_full = "no ";
                        }
    
                        if(isset($publicacion_visitas[0]["total_visits"])) {
                            $visitas = $publicacion_visitas[0]["total_visits"];
                        } else {
                            $visitas = 0;
                        }
    
                        $nombre = $publicacion[0]["body"]["title"];
                        $precio = $publicacion[0]["body"]["price"];
                        $imagen = $publicacion[0]["body"]["thumbnail"];
                        $tipo = $publicacion[0]["body"]["listing_type_id"];
                        $full = $envio_full;
                        $flex = $envio_flex;
                        $categoria_id = $publicacion[0]["body"]["category_id"];
                        $status = $publicacion[0]["body"]["status"];
                        $pais = $publicacion[0]["body"]["site_id"];
                        $seller_id = $publicacion[0]["body"]["seller_id"];
                        $link_publicacion = $publicacion[0]["body"]["permalink"];
                        $visitas_30_dias = $visitas;
    
                        if (isset($publicacion[0]["body"]["attributes"][0]["value_name"])) {
                            $marca = $publicacion[0]["body"]["attributes"][0]["value_name"];
                        } else {
                            $marca = "Sin_Marca";
                        }
    
                        
                        Publicaciones::firstOrCreate([
                            'id' => $publicacion_id,
                            'nombre' => $nombre,
                        ], [
                            'marca' => $marca,
                            'precio' => $precio,
                            'imagen' => $imagen,
                            'tipo' => $tipo,
                            'full' => $full,
                            'flex' => $flex,
                            'categoria_id' => $categoria_id,
                            'status' => $status,
                            'pais' => $pais,
                            'seller_id' => $seller_id,
                            'link' => $link_publicacion,
                            'visitas_30_dias' => $visitas_30_dias,
                            'created_at' => now()->toDateTimeString(),
                            'updated_at' => now()->toDateTimeString(),
                        ]);
                    }
                } else {
                    $resultados = 0;
                }
                $i += 50;
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
        //
        $publicaciones_seller = Publicaciones::where('seller_id', $id);
        $publicaciones_seller->delete();
        $seller = Seller::find($id);
        $access_token = $seller->access_token;
        //Establecer fechas
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $horas = time();
        $hora_actual = date('H:i', time());
        $fecha_actual = date("Y-m-d");
        $mes_actual = date("Y-m-01");
        $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 30 days"));
        $fecha_final = date("Y-m-d", strtotime($fecha_actual . "- 0 day"));
        $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
        $DATE_TO = $fecha_final . "T" . $hora_actual . ":00.000-00:00";

        $i = 0;
        set_time_limit(0);
        do {
            $url = "https://api.mercadolibre.com/users/" . $id . "/items/search?orders=sold_quantity_desc&limit=50&offset=" . $i;
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
            $publicaciones_output = (json_decode($output, true));

            if (isset($publicaciones_output["results"])) {
                $resultados = count($publicaciones_output["results"]);

                foreach ($publicaciones_output["results"] as $publicacion_id) {
                    $url = "https://api.mercadolibre.com/items?ids=" . $publicacion_id;
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
                    $publicacion = (json_decode($output, true));
                    ///////////////////////////////////////////////////////////////////
                    $url2 = "https://api.mercadolibre.com/items/visits?ids=" . $publicacion_id . "&date_from=" . $DATE_FROM . "&date_to=" . $DATE_TO;
                    $authorization = array("Authorization: Bearer " . $access_token);
                    // create curl resource
                    $ch2 = curl_init();
                    //Apí Link
                    // set url
                    curl_setopt($ch2, CURLOPT_URL, $url2);
                    //Bearer Token to Header
                    curl_setopt($ch2, CURLOPT_HTTPHEADER, $authorization);
                    //return the transfer as a string
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    // $output contains the output string
                    $output2 = curl_exec($ch2);
                    // close curl resource to free up system resources
                    curl_close($ch2);
                    //DD info
                    $publicacion_visitas = (json_decode($output2, true));

                    if (isset($publicacion[0]["body"]["shipping"]["tags"][0])) {
                        if ($publicacion[0]["body"]["shipping"]["tags"][0] == "self_service_in") {
                            $envio_flex = "si";
                        } else {
                            $envio_flex = "no ";
                        }
                    } else {
                        $envio_flex = "no ";
                    }

                    if (isset($publicacion[0]["body"]["shipping"]["logistic_type"])) {
                        if ($publicacion[0]["body"]["shipping"]["logistic_type"] == "fulfillment") {
                            $envio_full = "si";
                        } else {
                            $envio_full = "no ";
                        }
                    } else {
                        $envio_full = "no ";
                    }

                    if(isset($publicacion_visitas[0]["total_visits"])) {
                        $visitas = $publicacion_visitas[0]["total_visits"];
                    } else {
                        $visitas = 0;
                    }

                    $nombre = $publicacion[0]["body"]["title"];
                    $precio = $publicacion[0]["body"]["price"];
                    $imagen = $publicacion[0]["body"]["thumbnail"];
                    $tipo = $publicacion[0]["body"]["listing_type_id"];
                    $full = $envio_full;
                    $flex = $envio_flex;
                    $categoria_id = $publicacion[0]["body"]["category_id"];
                    $status = $publicacion[0]["body"]["status"];
                    $pais = $publicacion[0]["body"]["site_id"];
                    $seller_id = $publicacion[0]["body"]["seller_id"];
                    $link_publicacion = $publicacion[0]["body"]["permalink"];
                    $visitas_30_dias = $visitas;

                    if (isset($publicacion[0]["body"]["attributes"][0]["value_name"])) {
                        $marca = $publicacion[0]["body"]["attributes"][0]["value_name"];
                    } else {
                        $marca = "Sin_Marca";
                    }

                    
                    Publicaciones::firstOrCreate([
                        'id' => $publicacion_id
                    ], [
                        'nombre' => $nombre,
                        'marca' => $marca,
                        'precio' => $precio,
                        'imagen' => $imagen,
                        'tipo' => $tipo,
                        'full' => $full,
                        'flex' => $flex,
                        'categoria_id' => $categoria_id,
                        'status' => $status,
                        'pais' => $pais,
                        'seller_id' => $seller_id,
                        'link' => $link_publicacion,
                        'visitas_30_dias' => $visitas_30_dias,
                        'created_at' => now()->toDateTimeString(),
                        'updated_at' => now()->toDateTimeString(),
                    ]);
                }
            } else {
                $resultados = 0;
            }
            $i += 50;
        } while ($resultados > 0);
        return "Se han agregado: " . $publicaciones_seller->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicacionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicacionesRequest  $request
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $seller = Seller::find($id);
        $access_token = $seller->access_token;
        //Establecer fechas
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $horas = time();
        $hora_actual = date('H:i', time());
        $fecha_actual = date("Y-m-d");
        $mes_actual = date("Y-m-01");
        $fecha_inicial = date("Y-m-d", strtotime($fecha_actual . "- 30 days"));
        $fecha_final = date("Y-m-d", strtotime($fecha_actual . "- 0 day"));
        $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
        $DATE_TO = $fecha_final . "T" . $hora_actual . ":00.000-00:00";

        $i = 0;
        set_time_limit(0);
        do {
            $url = "https://api.mercadolibre.com/users/" . $id . "/items/search?orders=sold_quantity_desc&limit=50&offset=" . $i;
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
            $publicaciones_output = (json_decode($output, true));

            if (isset($publicaciones_output["results"])) {
                $resultados = count($publicaciones_output["results"]);

                foreach ($publicaciones_output["results"] as $publicacion_id) {
                    $url = "https://api.mercadolibre.com/items?ids=" . $publicacion_id;
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
                    $publicacion = (json_decode($output, true));
                    ///////////////////////////////////////////////////////////////////
                    $url2 = "https://api.mercadolibre.com/items/visits?ids=" . $publicacion_id . "&date_from=" . $DATE_FROM . "&date_to=" . $DATE_TO;
                    $authorization = array("Authorization: Bearer " . $access_token);
                    // create curl resource
                    $ch2 = curl_init();
                    //Apí Link
                    // set url
                    curl_setopt($ch2, CURLOPT_URL, $url2);
                    //Bearer Token to Header
                    curl_setopt($ch2, CURLOPT_HTTPHEADER, $authorization);
                    //return the transfer as a string
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    // $output contains the output string
                    $output2 = curl_exec($ch2);
                    // close curl resource to free up system resources
                    curl_close($ch2);
                    //DD info
                    $publicacion_visitas = (json_decode($output2, true));

                    if (isset($publicacion[0]["body"]["shipping"]["tags"][0])) {
                        if ($publicacion[0]["body"]["shipping"]["tags"][0] == "self_service_in") {
                            $envio_flex = "si";
                        } else {
                            $envio_flex = "no ";
                        }
                    } else {
                        $envio_flex = "no ";
                    }

                    if (isset($publicacion[0]["body"]["shipping"]["logistic_type"])) {
                        if ($publicacion[0]["body"]["shipping"]["logistic_type"] == "fulfillment") {
                            $envio_full = "si";
                        } else {
                            $envio_full = "no ";
                        }
                    } else {
                        $envio_full = "no ";
                    }

                    $nombre = $publicacion[0]["body"]["title"];
                    $precio = $publicacion[0]["body"]["price"];
                    $imagen = $publicacion[0]["body"]["thumbnail"];
                    $tipo = $publicacion[0]["body"]["listing_type_id"];
                    $full = $envio_full;
                    $flex = $envio_flex;
                    $categoria_id = $publicacion[0]["body"]["category_id"];
                    $status = $publicacion[0]["body"]["status"];
                    $pais = $publicacion[0]["body"]["site_id"];
                    $seller_id = $publicacion[0]["body"]["seller_id"];
                    $link_publicacion = $publicacion[0]["body"]["permalink"];
                    $visitas_30_dias = $publicacion_visitas[0]["total_visits"];

                    if (isset($publicacion[0]["body"]["attributes"][0]["value_name"])) {
                        $marca = $publicacion[0]["body"]["attributes"][0]["value_name"];
                    } else {
                        $marca = "Sin_Marca";
                    }

                    Publicaciones::updateOrCreate([
                        'id' => $publicacion_id
                    ], [
                        'nombre' => $nombre,
                        'marca' => $marca,
                        'precio' => $precio,
                        'imagen' => $imagen,
                        'tipo' => $tipo,
                        'full' => $full,
                        'flex' => $flex,
                        'categoria_id' => $categoria_id,
                        'status' => $status,
                        'pais' => $pais,
                        'seller_id' => $seller_id,
                        'link' => $link_publicacion,
                        'visitas_30_dias' => $visitas_30_dias,
                        'updated_at' => now()->toDateTimeString(),
                    ]);
                }
            } else {
                $resultados = 0;
            }

            $i += 50;
        } while ($i >= 100);

        return redirect(route('sellers.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicaciones $publicaciones)
    {
        //
    }
}
