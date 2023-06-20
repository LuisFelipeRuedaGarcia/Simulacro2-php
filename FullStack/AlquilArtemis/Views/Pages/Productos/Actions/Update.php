<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Producto.php?op=GetbyId";
$data2 = array("IdProducto"=>$_GET["IdProducto"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdProducto;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Producto.php?op=Update";
    $data5 = array(
        "IdProducto"=>$_POST["IdProducto"],
        "Nombre"=>$_POST["Nombre"],
        "Precio"=>$_POST["Precio"],
        "OldId"=>$_GET["IdProducto"]
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
        header("location: ../../../../Productos");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdProducto">IdProducto</label>
        <input value="<?=$Output2[0]->IdProducto?>" type="text" name="IdProducto" id="IdProducto">
        <br><label for="Nombre">Nombre</label>
        <input value="<?=$Output2[0]->Nombre?>" type="text"  name="Nombre" id="Nombre">
        <br><label for="Precio">Precio</label>
        <input value="<?=$Output2[0]->Precio?>" type="text" name="Precio" id="Precio">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
