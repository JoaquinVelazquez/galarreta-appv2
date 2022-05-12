@extends('layouts.dashboard')
@section('title', 'Ranking Ventas - ' . $seller->nickname)
@section('contenido')

<?php
/*
$ordenes_por_producto = array();
foreach ($ordenes_seller as $data) {
    $producto_id = $data["publicacion_id"];
    $ordenes_por_producto[$producto_id]["producto_id"] = $data["producto_id"];
    $ordenes_por_producto[$producto_id]["orden_id"] = $data["order_id"];
    $ordenes_por_producto[$producto_id]["cantidad"][] = $data["cantidad"];
}
foreach ($ordenes_por_producto as $data) {
    echo "<pre>";
        echo($data["producto_id"]);
        echo "<br>";
        echo($data["orden_id"]);
        echo "<br>";
        echo(array_sum($data["cantidad"]));
        echo "<br>";
    echo "</pre>";
}
die;
*/
foreach ($ordenes_seller as $ordenes) {
$producto_id = $ordenes["producto_id"];
if (isset($ordenes[$producto_id])) {
$ordenes_array_dinero[$producto_id] = array('montos' => []);
$ordenes_array_dinero[$producto_id] = array('cantidad' => []);
}
$ordenes_array_dinero[$producto_id]["producto_id"] = $ordenes["producto_id"];
$ordenes_array_dinero[$producto_id]["producto"] = $ordenes["producto"];
$ordenes_array_dinero[$producto_id]["cantidad"][] = $ordenes["cantidad"];
$ordenes_array_dinero[$producto_id]["montos"][] = $ordenes["monto"];
$ordenes_array_dinero[$producto_id]["cantidad_total"] = array_sum($ordenes_array_dinero[$producto_id]['cantidad']);
$ordenes_array_dinero[$producto_id]["monto_total"] = array_sum($ordenes_array_dinero[$producto_id]['montos']);
$ordenes_array_dinero[$producto_id]["imagen"] = $ordenes["imagen"];
$ordenes_array_dinero[$producto_id]["tipo"] = $ordenes["tipo"];
$ordenes_array_dinero[$producto_id]["full"] = $ordenes["full"];
$ordenes_array_dinero[$producto_id]["flex"] = $ordenes["flex"];
$ordenes_array_dinero[$producto_id]["status"] = $ordenes["status"];
$ordenes_array_dinero[$producto_id]["link"] = $ordenes["link"];
$ordenes_array_dinero[$producto_id]["visitas"] = $ordenes["visitas_30_dias"];

if($ordenes["visitas_30_dias"] == 0) {
$conversion = 0;
} else {
$conversion = (($ordenes_array_dinero[$producto_id]["cantidad_total"] / $ordenes['visitas_30_dias']) * 100);
}

$ordenes_array_dinero[$producto_id]["conversion"] = $conversion;
///////////////////////////////////////////////////////////////////////
$producto_id = $ordenes["producto_id"];
if (isset($ordenes[$producto_id])) {
$ordenes_array_cantidad[$producto_id] = array('montos' => []);
$ordenes_array_cantidad[$producto_id] = array('cantidad' => []);
}
$ordenes_array_cantidad[$producto_id]["producto_id"] = $ordenes["producto_id"];
$ordenes_array_cantidad[$producto_id]["producto"] = $ordenes["producto"];
$ordenes_array_cantidad[$producto_id]["cantidad"][] = $ordenes["cantidad"];
$ordenes_array_cantidad[$producto_id]["montos"][] = $ordenes["monto"];
$ordenes_array_cantidad[$producto_id]["cantidad_total"] = array_sum($ordenes_array_cantidad[$producto_id]['cantidad']);
$ordenes_array_cantidad[$producto_id]["monto_total"] = array_sum($ordenes_array_cantidad[$producto_id]['montos']);
$ordenes_array_cantidad[$producto_id]["imagen"] = $ordenes["imagen"];
$ordenes_array_cantidad[$producto_id]["tipo"] = $ordenes["tipo"];
$ordenes_array_cantidad[$producto_id]["full"] = $ordenes["full"];
$ordenes_array_cantidad[$producto_id]["flex"] = $ordenes["flex"];
$ordenes_array_cantidad[$producto_id]["status"] = $ordenes["status"];
$ordenes_array_cantidad[$producto_id]["link"] = $ordenes["link"];
$ordenes_array_cantidad[$producto_id]["visitas"] = $ordenes["visitas_30_dias"];

if($ordenes["visitas_30_dias"] == 0) {
$conversion = 0;
} else {
$conversion = (($ordenes_array_cantidad[$producto_id]["cantidad_total"] / $ordenes['visitas_30_dias']) * 100);
}

$ordenes_array_cantidad[$producto_id]["conversion"] = $conversion;
/////////////////////////////////////////////////////////////////////////
$producto_id = $ordenes["producto_id"];
if (isset($ordenes[$producto_id])) {
$ordenes_array_conversion[$producto_id] = array('montos' => []);
$ordenes_array_conversion[$producto_id] = array('cantidad' => []);
}
$ordenes_array_conversion[$producto_id]["producto_id"] = $ordenes["producto_id"];
$ordenes_array_conversion[$producto_id]["producto"] = $ordenes["producto"];
$ordenes_array_conversion[$producto_id]["cantidad"][] = $ordenes["cantidad"];
$ordenes_array_conversion[$producto_id]["montos"][] = $ordenes["monto"];
$ordenes_array_conversion[$producto_id]["cantidad_total"] =
array_sum($ordenes_array_conversion[$producto_id]['cantidad']);
$ordenes_array_conversion[$producto_id]["monto_total"] = array_sum($ordenes_array_conversion[$producto_id]['montos']);
$ordenes_array_conversion[$producto_id]["imagen"] = $ordenes["imagen"];
$ordenes_array_conversion[$producto_id]["tipo"] = $ordenes["tipo"];
$ordenes_array_conversion[$producto_id]["full"] = $ordenes["full"];
$ordenes_array_conversion[$producto_id]["flex"] = $ordenes["flex"];
$ordenes_array_conversion[$producto_id]["status"] = $ordenes["status"];
$ordenes_array_conversion[$producto_id]["link"] = $ordenes["link"];
$ordenes_array_conversion[$producto_id]["visitas"] = $ordenes["visitas_30_dias"];

if($ordenes["visitas_30_dias"] == 0) {
$conversion = 0;
} else {
$conversion = (($ordenes_array_conversion[$producto_id]["cantidad_total"] / $ordenes['visitas_30_dias']) * 100);
}

$ordenes_array_conversion[$producto_id]["conversion"] = $conversion;
}

uasort($ordenes_array_dinero, function ($orden1, $orden2) {
if ($orden1['monto_total'] == $orden2['monto_total']) {
return 0;
}

return $orden1['monto_total'] < $orden2['monto_total'] ? 1 : -1; }); uasort($ordenes_array_cantidad, function ($orden1,
    $orden2) { if ($orden1['cantidad_total']==$orden2['cantidad_total']) { return 0; } return $orden1['cantidad_total']
    < $orden2['cantidad_total'] ? 1 : -1; }); uasort($ordenes_array_conversion, function ($orden1, $orden2) { if
    ($orden1['conversion']==$orden2['conversion']) { return 0; } return $orden1['conversion'] < $orden2['conversion'] ?
    1 : -1; }); $ranking_publicaciones_precio=array(); $ranking_publicaciones_unidades=array();
    $ranking_publicaciones_conversion=array(); foreach ($ordenes_array_dinero as $data) {
    array_push($ranking_publicaciones_precio, $data); } foreach ($ordenes_array_cantidad as $data) {
    array_push($ranking_publicaciones_unidades, $data); } foreach ($ordenes_array_conversion as $data) {
    array_push($ranking_publicaciones_conversion, $data); } $total_dinero=$ordenes_seller->sum('monto');
    $total_unidades = $ordenes_seller->sum('cantidad');

     $total_dinero_array = array();

     foreach ($ranking_publicaciones_precio as $data) {
     array_push($total_dinero_array, $data["monto_total"]);
     }

     $total_cantidad_array = array();

     foreach ($ranking_publicaciones_unidades as $data) {
     array_push($total_cantidad_array, $data["cantidad_total"]);
     }

     $ranking_total_dinero_array = array();
     $ranking_total_cantidad_array = array();

     if (count($ranking_publicaciones_precio) > 20) {
     for ($i = 0; $i < 20; $i++) { array_push($ranking_total_dinero_array,
         $ranking_publicaciones_precio[$i]["monto_total"]); } } else { for ($i=0; $i <
         count($ranking_publicaciones_precio); $i++) { array_push($ranking_total_dinero_array,
         $ranking_publicaciones_precio[$i]["monto_total"]); } } if (count($ranking_publicaciones_unidades)> 20) {
         for ($i = 0; $i < 20; $i++) { array_push($ranking_total_cantidad_array,
             $ranking_publicaciones_unidades[$i]["cantidad_total"]); } } else { for ($i=0; $i <
             count($ranking_publicaciones_unidades); $i++) { array_push($ranking_total_cantidad_array,
             $ranking_publicaciones_unidades[$i]["cantidad_total"]); } }
             $ranking_total_dinero=array_sum($ranking_total_dinero_array);
             $ranking_total_cantidad=array_sum($ranking_total_cantidad_array); 
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- <h2 class="h2">Ranking de productos del usuario: <a
            href="https://www.mercadolibre.com.ar/perfil/<?php echo $informacion[" nickname"] ?>"
            style="text-decoration: none; color: black;">
            <?php echo $informacion["nickname"] ?> (CUST ID:
            <?php echo $id ?>)
        </a></h2> --}}
</div>

<h4 class="text-center">Ranking por GMV (Ultimos 30 dias)</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Producto</th>
            <th scope="col" class="text-center">Dinero</th>
            <th scope="col" class="text-center">Porcentaje</th>
            <th scope="col" class="text-center">Full</th>
            <th scope="col" class="text-center">Flex</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($ranking_publicaciones_precio) > 20) { ?>
        <?php for ($i = 0; $i < 20; $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_precio[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_precio[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_precio[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["producto"] ?>
            </td>
            <td class="text-center">$
                <?php echo number_format($ranking_publicaciones_precio[$i]["monto_total"], 2) ?>
            </td>
            <td class="text-center">
                <?php echo number_format((($ranking_publicaciones_precio[$i]["monto_total"] / $total_dinero) * 100), 2); ?>%
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_precio[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_precio[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_precio[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_precio[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_precio[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_precio[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <?php for ($i = 0; $i < count($ranking_publicaciones_precio); $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_precio[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_precio[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_precio[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["producto"] ?>
            </td>
            <td class="text-center">$
                <?php echo number_format($ranking_publicaciones_precio[$i]["monto_total"], 2) ?>
            </td>
            <td class="text-center">
                <?php echo number_format((($ranking_publicaciones_precio[$i]["monto_total"] / $total_dinero) * 100), 2); ?>%
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_precio[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_precio[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_precio[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_precio[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_precio[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_precio[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_precio[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>

<h4>Total porcentaje:
    <?php echo number_format((($ranking_total_dinero / $total_dinero) * 100), 2); ?>%
</h4>

<hr>

<h4 class="text-center pt-4">Ranking por unidades vendidas (Ultimos 30 dias)</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Producto</th>
            <th scope="col" class="text-center">Cantidad</th>
            <th scope="col" class="text-center">Porcentaje</th>
            <th scope="col" class="text-center">Full</th>
            <th scope="col" class="text-center">Flex</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($ranking_publicaciones_unidades) > 20) { ?>
        <?php for ($i = 0; $i < 20; $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_unidades[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_unidades[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_unidades[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["producto"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["cantidad_total"] ?>
            </td>
            <td class="text-center">
                <?php echo number_format((($ranking_publicaciones_unidades[$i]["cantidad_total"] / $total_unidades) * 100), 2); ?>%
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_unidades[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_unidades[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_unidades[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <?php for ($i = 0; $i < count($ranking_publicaciones_unidades); $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_unidades[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_unidades[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_unidades[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["producto"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["cantidad_total"] ?>
            </td>
            <td class="text-center">
                <?php echo number_format((($ranking_publicaciones_unidades[$i]["cantidad_total"] / $total_unidades) * 100), 2); ?>%
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_unidades[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_unidades[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_unidades[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_unidades[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_unidades[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
<h4>Total porcentaje:
    <?php echo number_format((($ranking_total_cantidad / $total_unidades) * 100), 2); ?>%
</h4>

<hr>

<h4 class="text-center pt-4">Ranking por conversión (Ultimos 30 dias)</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Producto</th>
            <th scope="col" class="text-center">Conversion</th>
            <th scope="col" class="text-center">Unidades</th>
            <th scope="col" class="text-center">Full</th>
            <th scope="col" class="text-center">Flex</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($ranking_publicaciones_conversion) > 20) { ?>
        <?php for ($i = 0; $i < 20; $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_conversion[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_conversion[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_conversion[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["producto"] ?>
            </td>

            <td class="text-center">
                <?php echo number_format($ranking_publicaciones_conversion[$i]["conversion"], 2); ?>%
            </td>

            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["cantidad_total"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_conversion[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_conversion[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_conversion[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <?php for ($i = 0; $i < count($ranking_publicaciones_conversion); $i++) { ?>
        <tr>
            <th scope="row" class="text-center"> <a href="<?php echo $ranking_publicaciones_conversion[$i]['link'] ?>">
                    <?php echo $ranking_publicaciones_conversion[$i]["producto_id"] ?>
                </a></th>
            <td class="text-center"> <img class="thumb-ranking" src="<?php echo $ranking_publicaciones_conversion[$i]["imagen"] ?>" alt="foto"></td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["producto"] ?>
            </td>

            <td class="text-center">
                <?php echo number_format($ranking_publicaciones_conversion[$i]["conversion"], 2); ?>%
            </td>

            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["cantidad_total"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["full"] ?>
            </td>
            <td class="text-center">
                <?php echo $ranking_publicaciones_conversion[$i]["flex"] ?>
            </td>
            <td class="text-center">
                <?php if ($ranking_publicaciones_conversion[$i]["status"] == "active") {
                                echo "Activa";
                            } elseif ($ranking_publicaciones_conversion[$i]["status"] == "paused") {
                                echo "Pausada";
                            } else {
                                echo "Cerrada";
                            } ?>
            </td>
            <td class="text-center">
                <?php
                            if ($seller->pais == "AR" || $seller->pais == "BR" || $seller->pais == "CL" || $seller->pais == "MX" || $seller->pais == "CO") {
                                if ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_pro") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_special") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            } else {
                                if ($ranking_publicaciones_conversion[$i]["tipo"] == "gold_special") {
                                    echo "Premium";
                                } elseif ($ranking_publicaciones_conversion[$i]["tipo"] == "bronze") {
                                    echo "Clásica";
                                } else {
                                    echo "Gratuita";
                                }
                            }
                            ?>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
<hr>
@endsection