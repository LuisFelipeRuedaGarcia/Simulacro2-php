<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Inventario.php");

$Inventario = new Inventario();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Inventario->Fetch();
        echo json_encode($datos);
        break;
    
    default:
        # code...
        break;
}

?>