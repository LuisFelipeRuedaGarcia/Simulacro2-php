<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cotizacion.php?op=GetbyId";
$data2 = array("IdCotizacion"=>$_GET["IdCotizacion"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdCotizacion;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cotizacion.php?op=Update";
    $data5 = array(
        "IdCotizacion"=>$_POST["IdCotizacion"],
        "IdEmpleado"=>$_POST["IdEmpleado"],
        "IdProducto"=>$_POST["IdProducto"],
        "IdCliente"=>$_POST["IdCliente"],
        "Fecha"=>$_POST["Fecha"],
        "Hora"=>$_POST["Hora"],
        "DuracionDias"=>$_POST["DuracionDias"],
        "PrecioPorDia"=>$_POST["PrecioPorDia"],
        "TotalPesos"=>$_POST["TotalPesos"],
        "OldId"=>$_GET["IdCotizacion"]
        );
        var_dump($data5);
echo" </pre>----------------------------------------------------------------------------------------------------";
        $Curl5 = curl_init();
        curl_setopt($Curl5, CURLOPT_URL, $Url5);
        curl_setopt($Curl5, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($Curl5,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($Curl5,CURLOPT_POSTFIELDS, json_encode($data5));
        curl_setopt($Curl5, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        $Output5=json_decode(curl_exec($Curl5));
        curl_close($Curl5);
/*         echo "<pre>";
var_dump($Output5);
echo" </pre>----------------------------------------------------------------------------------------------------"; */
        header("location: ../../../../Cotizaciones");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdCotizacion">IdCotizacion</label>
        <input value="<?=$Output2[0]->IdCotizacion?>" type="text" name="IdCotizacion" id="IdCotizacion">
        <br><label for="IdEmpleado">IdEmpleado</label>
        <input value="<?=$Output2[0]->IdEmpleado?>" type="text" name="IdEmpleado" id="IdEmpleado">
        <br><label for="IdProducto">IdProducto</label>
        <input value="<?=$Output2[0]->IdProducto?>" type="text"  name="IdProducto" id="IdProducto">
        <br><label for="IdCliente">IdCliente</label>
        <input value="<?=$Output2[0]->IdCliente?>" type="text" name="IdCliente" id="IdCliente">

        <br><label for="Fecha">Fecha</label>
        <input value="<?=$Output2[0]->Fecha?>" type="text" name="Fecha" id="Fecha">

        <br><label for="Hora">Hora</label>
        <input value="<?=$Output2[0]->Hora?>" type="text" name="Hora" id="Hora">

        <br><label for="DuracionDias">DuracionDias</label>
        <input value="<?=$Output2[0]->DuracionDias?>" type="text" name="DuracionDias" id="DuracionDias">

        <br><label for="PrecioPorDia">PrecioPorDia</label>
        <input value="<?=$Output2[0]->PrecioPorDia?>" type="text" name="PrecioPorDia" id="PrecioPorDia">
        <br><label for="TotalPesos">TotalPesos</label>
        <input value="<?=$Output2[0]->TotalPesos?>" type="text" name="TotalPesos" id="TotalPesos">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
