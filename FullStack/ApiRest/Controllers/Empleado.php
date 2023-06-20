<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Empleado.php");

$Empleado = new Empleado();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Empleado->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Empleado->FetchOne($Body["IdEmpleado"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Empleado->Insert($Body["IdEmpleado"],
        $Body["Username"],
        $Body["Password"]);
        break;
        case "Delete":
            $datos=$Empleado->Delete($Body["IdEmpleado"]);
        break;
        case "Update":
            $datos=$Empleado->Update($Body["IdEmpleado"],
            $Body["Username"],
            $Body["Password"],
            $Body["OldId"]
        );
            break;
    default:

}

?>