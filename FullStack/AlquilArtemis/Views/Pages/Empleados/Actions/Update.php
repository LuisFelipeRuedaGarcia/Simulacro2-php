<?php

$Url2="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Empleado.php?op=GetbyId";
$data2 = array("IdEmpleado"=>$_GET["IdEmpleado"]);
$Curl2 = curl_init();
curl_setopt($Curl2, CURLOPT_URL, $Url2);
curl_setopt($Curl2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($Curl2,CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($Curl2,CURLOPT_POSTFIELDS, json_encode($data2));
curl_setopt($Curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output2 = Json_decode(curl_exec($Curl2));

/* echo "<pre>";
echo$Output2[0]->IdEmpleado;
echo" </pre>----------------------------------------------------------------------------------------------------";*/

if(isset($_POST["Editar"])){
    $Url5="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Empleado.php?op=Update";
    $data5 = array(
        "IdEmpleado"=>$_POST["IdEmpleado"],
        "Username"=>$_POST["Username"],
        "Password"=>$_POST["Password"],
        "OldId"=>$_GET["IdEmpleado"]
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
        header("location: ../../../../Empleados");
}
?>
<!DOCTYPE text>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <form action="" method="POST">
        <br><label for="IdEmpleado">IdEmpleado</label>
        <input value="<?=$Output2[0]->IdEmpleado?>" type="text" name="IdEmpleado" id="IdEmpleado">
        <br><label for="Username">Username</label>
        <input value="<?=$Output2[0]->Username?>" type="text" name="Username" id="Username">
        <br><label for="Password">Password</label>
        <input value="<?=$Output2[0]->Password?>" type="text"  name="Password" id="Password">
        <input type="submit" name="Editar">
    </form>
</body>
</html>
