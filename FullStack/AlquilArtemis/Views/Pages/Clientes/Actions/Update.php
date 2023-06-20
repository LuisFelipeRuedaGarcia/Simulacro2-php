<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cliente.php?op=GetbyId";
$data2 = array("IdCliente"=>$_GET["IdCliente"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdCliente;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cliente.php?op=Update";
    $data5 = array(
        "IdCliente"=>$_POST["IdCliente"],
        "Nombre"=>$_POST["Nombre"],
        "Correo"=>$_POST["Correo"],
        "Telefono"=>$_POST["Telefono"],
        "OldId"=>$_GET["IdCliente"]
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
        header("location: ../../../../Clientes");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdCliente">IdCliente</label>
        <input value="<?=$Output2[0]->IdCliente?>" type="text" name="IdCliente" id="IdCliente">
        <br><label for="Nombre">Nombre</label>
        <input value="<?=$Output2[0]->Nombre?>" type="text" name="Nombre" id="Nombre">
        <br><label for="Correo">Correo</label>
        <input value="<?=$Output2[0]->Correo?>" type="text"  name="Correo" id="Correo">
        <br><label for="Telefono">Telefono</label>
        <input value="<?=$Output2[0]->Telefono?>" type="text" name="Telefono" id="Telefono">
        <br>
        <input type="submit" name="Editar">
    </form>
</body>
</html>
