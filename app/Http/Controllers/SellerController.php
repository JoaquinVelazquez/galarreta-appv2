<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Publicaciones;
use App\Models\Seller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SellerController extends Controller
{
    public function  index()
    {
        /*
        $sellers = Seller::all();
        foreach ($sellers as $seller) {
            $id = $seller->id;
            $refresh_token = $seller->refresh_token;
    
            //RENOVAR ACCESS TOKEN CON REFRESH TOKEN
    
            $url_refresh = "https://api.mercadolibre.com/oauth/token";
    
            $data_refresh = array(
                'grant_type' => 'refresh_token',
                'client_id' => '624787090575020',
                'client_secret' => 'OtbNMR17kSC5nuFuU7fZXNBDyPiaR5UQ',
                'refresh_token' => $refresh_token,
            );
    
            $post_refresh = http_build_query($data_refresh);
    
            $header_refresh = array(
                'Accept' => 'application/json',
                'Content_Type' => 'application/x-www-form-urlencoded'
            );
    
            $options_refresh = array(
                CURLOPT_RETURNTRANSFER => 'true',
                CURLOPT_HTTPHEADER => $header_refresh,
                CURLOPT_SSL_VERIFYPEER => 'false',
                CURLOPT_URL => $url_refresh,
                CURLOPT_POSTFIELDS => $post_refresh,
                CURLOPT_CUSTOMREQUEST => "POST",
            );
    
            // do a curl call
            $call_refresh = curl_init();
            curl_setopt_array($call_refresh, $options_refresh);
            // execute the curl call
            $response_refresh = curl_exec($call_refresh);
            // get the curl status
            $status_refresh = curl_getinfo($call_refresh);
            // close the call
            curl_close($call_refresh);
            // transform the json in array
            $response_refresh = (array) json_decode($response_refresh);
    
            $access_token_new = ($response_refresh["access_token"]);
            $refresh_token_new = ($response_refresh["refresh_token"]);
    
            Seller::where('id', $id)->update(
                ['access_token' => $access_token_new],
                ['refresh_token' => $refresh_token_new],
            );
        }
        */

        $sellers = Seller::orderBy('nickname')->paginate(18);
        if(request(key: 'search')) {
            $sellers = Seller::search(request(key: 'search'))->paginate(18);
        }
        return view('apanel.sellers', compact("sellers"));
    }

    public function  create()
    {
    }

    public function  show($id)
    {
        //Establecer fechas
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $horas = time();
        $hora_actual = date('H', time());
        $fecha_actual = date("y-m-d");
        $fecha_inicial = date("y-m-d", strtotime($fecha_actual . "- 60 day"));

        $DATE_FROM = "20" . $fecha_inicial . "T00:00:00.000-00:00";
        $DATE_TO = "20" . $fecha_actual . "T" . $hora_actual . ":00:00.000-00:00";

        $seller = Seller::find($id);

        $ordenes_seller = Ordenes::where('seller_id', $id)
            ->whereBetween('fecha', [$DATE_FROM, $DATE_TO])
            ->get();
        $divisa = Ordenes::where('seller_id', $id)->first();

        $publicaciones_seller = Publicaciones::where('seller_id', $id)
            ->where('status', 'active')
            ->get();

        $access_token = $seller->access_token;

        $client = new Client([
            'base_uri' => 'https://api.mercadolibre.com/users/'
        ]);

        $headers = [
            'Authorization' => 'Bearer ' . $access_token,
            'Accept'        => 'application/json',
        ];

        $response = $client->request('GET', $id, [
            'headers' => $headers
        ]);

        $content = json_decode($response->getBody()->getContents());

        if(isset($content->thumbnail->picture_url)) {
            $imagen = $content->thumbnail->picture_url;
        } else {
            $imagen = NULL;
        }


        Seller::where('id', $id)->update(
            ['imagen' => $imagen]
        );

        /////////////////////////////////////////////////

        $authorization = array("Authorization: Bearer " . $access_token);
        // create curl resource
        $ch = curl_init();
        //Apí Link
        $url = "https://api.mercadolibre.com/users/" . $id . "/items_visits/time_window?last=59&unit=day";
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
        $visitas = (json_decode($output, true));


        return view('apanel.dashboard', compact("seller", "content", "visitas", "ordenes_seller", "publicaciones_seller", "divisa"));
    }

    public function  update($id)
    {
        $seller = Seller::find($id);
        $refresh_token = $seller->refresh_token;

        //RENOVAR ACCESS TOKEN CON REFRESH TOKEN

        $url_refresh = "https://api.mercadolibre.com/oauth/token";

        $data_refresh = array(
            'grant_type' => 'refresh_token',
            'client_id' => '624787090575020',
            'client_secret' => 'OtbNMR17kSC5nuFuU7fZXNBDyPiaR5UQ',
            'refresh_token' => $refresh_token,
        );

        $post_refresh = http_build_query($data_refresh);

        $header_refresh = array(
            'Accept' => 'application/json',
            'Content_Type' => 'application/x-www-form-urlencoded'
        );

        $options_refresh = array(
            CURLOPT_RETURNTRANSFER => 'true',
            CURLOPT_HTTPHEADER => $header_refresh,
            CURLOPT_SSL_VERIFYPEER => 'false',
            CURLOPT_URL => $url_refresh,
            CURLOPT_POSTFIELDS => $post_refresh,
            CURLOPT_CUSTOMREQUEST => "POST",
        );

        // do a curl call
        $call_refresh = curl_init();
        curl_setopt_array($call_refresh, $options_refresh);
        // execute the curl call
        $response_refresh = curl_exec($call_refresh);
        // get the curl status
        $status_refresh = curl_getinfo($call_refresh);
        // close the call
        curl_close($call_refresh);
        // transform the json in array
        $response_refresh = (array) json_decode($response_refresh);

        $access_token_new = ($response_refresh["access_token"]);
        $refresh_token_new = ($response_refresh["refresh_token"]);

        Seller::where('id', $id)->update(
            ['access_token' => $access_token_new],
            ['refresh_token' => $refresh_token_new],
        );

        return redirect(route('ordenes.update', $id));
    }
}
