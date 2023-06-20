<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Salida.php?op=GetbyId";
$data2 = array("IdSalida"=>$_GET["IdSalida"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdSalida;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Salida.php?op=Update";
    $data5 = array(
        "IdSalida"=>$_POST["IdSalida"],
        "IdCliente"=>$_POST["IdCliente"],
        "IdEmpleado"=>$_POST["IdEmpleado"],
        "FechaSalida"=>$_POST["FechaSalida"],
        "HoraSalida"=>$_POST["HoraSalida"],
        "SubTotalPesos"=>$_POST["SubTotalPesos"],
        "PlacaTransPorte"=>$_POST["PlacaTransPorte"],
        "Observaciones"=>$_POST["Observaciones"],
        "OldId"=>$_GET["IdSalida"]
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
        header("location: ../../../../Salidas");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdSalida">IdSalida</label>
        <input value="<?=$Output2[0]->IdSalida?>" type="text" name="IdSalida" id="IdSalida">
        <br><label for="IdCliente">IdCliente</label>
        <input value="<?=$Output2[0]->IdCliente?>" type="text" name="IdCliente" id="IdProducto">
        <br><label for="IdEmpleado">IdEmpleado</label>
        <input value="<?=$Output2[0]->IdEmpleado?>" type="text"  name="IdEmpleado" id="CantidadInicial">
        <br><label for="FechaSalida">FechaSalida</label>
        <input value="<?=$Output2[0]->FechaSalida?>" type="text" name="FechaSalida" id="CantidadIngresos">

        <br><label for="HoraSalida">HoraSalida</label>
        <input value="<?=$Output2[0]->HoraSalida?>" type="text" name="HoraSalida" id="CantidadSalidas">

        <br><label for="SubTotalPesos">SubTotalPesos</label>
        <input value="<?=$Output2[0]->SubTotalPesos?>" type="text" name="SubTotalPesos" id="CantidadFinal">

        <br><label for="PlacaTransPorte">PlacaTransPorte</label>
        <input value="<?=$Output2[0]->PlacaTransPorte?>" type="text" name="PlacaTransPorte" id="FechaSalida">

        <br><label for="Observaciones">Observaciones</label>
        <input value="<?=$Output2[0]->Observaciones?>" type="text" name="Observaciones" id="TipoOperacion">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
