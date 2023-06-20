<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Inventario.php?op=GetbyId";
$data2 = array("IdInventario"=>$_GET["IdInventario"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdInventario;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Inventario.php?op=Update";
    $data5 = array(
        "IdInventario"=>$_POST["IdInventario"],
        "IdProducto"=>$_POST["IdProducto"],
        "CantidadInicial"=>$_POST["CantidadInicial"],
        "CantidadIngresos"=>$_POST["CantidadIngresos"],
        "CantidadSalidas"=>$_POST["CantidadSalidas"],
        "CantidadFinal"=>$_POST["CantidadFinal"],
        "FechaInventario"=>$_POST["FechaInventario"],
        "TipoOperacion"=>$_POST["TipoOperacion"],
        "OldId"=>$_GET["IdInventario"]
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
        header("location: ../../../../Inventarios");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdInventario">IdInventario</label>
        <input value="<?=$Output2[0]->IdInventario?>" type="text" name="IdInventario" id="IdInventario">
        <br><label for="IdProducto">IdProducto</label>
        <input value="<?=$Output2[0]->IdProducto?>" type="text" name="IdProducto" id="IdProducto">
        <br><label for="CantidadInicial">CantidadInicial</label>
        <input value="<?=$Output2[0]->CantidadInicial?>" type="text"  name="CantidadInicial" id="CantidadInicial">
        <br><label for="CantidadIngresos">CantidadIngresos</label>
        <input value="<?=$Output2[0]->CantidadIngresos?>" type="text" name="CantidadIngresos" id="CantidadIngresos">

        <br><label for="CantidadSalidas">CantidadSalidas</label>
        <input value="<?=$Output2[0]->CantidadSalidas?>" type="text" name="CantidadSalidas" id="CantidadSalidas">

        <br><label for="CantidadFinal">CantidadFinal</label>
        <input value="<?=$Output2[0]->CantidadFinal?>" type="text" name="CantidadFinal" id="CantidadFinal">

        <br><label for="FechaInventario">FechaInventario</label>
        <input value="<?=$Output2[0]->FechaInventario?>" type="text" name="FechaInventario" id="FechaInventario">

        <br><label for="TipoOperacion">TipoOperacion</label>
        <input value="<?=$Output2[0]->TipoOperacion?>" type="text" name="TipoOperacion" id="TipoOperacion">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
