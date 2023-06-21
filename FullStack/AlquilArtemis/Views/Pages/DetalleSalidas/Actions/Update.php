<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/DetalleSalida.php?op=GetbyId";
$data2 = array("IdDetalleSalida"=>$_GET["IdDetalleSalida"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdDetalleSalida;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/DetalleSalida.php?op=Update";
    $data5 = array(
        "IdDetalleSalida"=>$_POST["IdDetalleSalida"],
        "IdSalida"=>$_POST["IdSalida"],
        "IdProducto"=>$_POST["IdProducto"],
        "IdObra"=>$_POST["IdObra"],
        "IdEmpleado"=>$_POST["IdEmpleado"],
        "CantidadSalida"=>$_POST["CantidadSalida"],
        "CantidadPropia"=>$_POST["CantidadPropia"],
        "CantidadSubAlquilada"=>$_POST["CantidadSubAlquilada"],
        "ValorUnidad"=>$_POST["ValorUnidad"],
        "FechaStandBy"=>$_POST["FechaStandBy"],
        "Estado"=>$_POST["Estado"],
        "ValorTotal"=>$_POST["ValorTotal"],
        "OldId"=>$_GET["IdDetalleSalida"]
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
        header("location: ../../../../DetalleSalidas");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DetalleSalidas</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdDetalleSalida">IdDetalleSalida</label>
        <input value="<?=$Output2[0]->IdDetalleSalida?>" type="text" name="IdDetalleSalida" id="IdDetalleSalida">
        <br><label for="IdSalida">IdSalida</label>
        <input value="<?=$Output2[0]->IdSalida?>" type="text" name="IdSalida" id="IdSalida">
        <br><label for="IdProducto">IdProducto</label>
        <input value="<?=$Output2[0]->IdProducto?>" type="text"  name="IdProducto" id="IdProducto">
        <br><label for="IdObra">IdObra</label>
        <input value="<?=$Output2[0]->IdObra?>" type="text" name="IdObra" id="IdObra">

        <br><label for="IdEmpleado">IdEmpleado</label>
        <input value="<?=$Output2[0]->IdEmpleado?>" type="text" name="IdEmpleado" id="IdEmpleado">

        <br><label for="CantidadSalida">CantidadSalida</label>
        <input value="<?=$Output2[0]->CantidadSalida?>" type="text" name="CantidadSalida" id="CantidadSalida">

        <br><label for="CantidadPropia">CantidadPropia</label>
        <input value="<?=$Output2[0]->CantidadPropia?>" type="text" name="CantidadPropia" id="CantidadPropia">

        <br><label for="CantidadSubAlquilada">CantidadSubAlquilada</label>
        <input value="<?=$Output2[0]->CantidadSubAlquilada?>" type="text" name="CantidadSubAlquilada" id="CantidadSubAlquilada">
        <br><label for="ValorUnidad">ValorUnidad</label>
        <input value="<?=$Output2[0]->ValorUnidad?>" type="text" name="ValorUnidad" id="ValorUnidad">
        <br><label for="FechaStandBy">FechaStandBy</label>
        <input value="<?=$Output2[0]->FechaStandBy?>" type="text" name="FechaStandBy" id="FechaStandBy">
        <br><label for="Estado">Estado</label>
        <input value="<?=$Output2[0]->Estado?>" type="text" name="Estado" id="Estado">
        <br><label for="ValorTotal">ValorTotal</label>
        <input value="<?=$Output2[0]->ValorTotal?>" type="text" name="ValorTotal" id="ValorTotal">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
