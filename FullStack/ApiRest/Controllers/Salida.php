<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Salida.php");

$Salida = new Salida();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Salida->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Salida->FetchOne($Body["IdSalida"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Salida->Insert($Body["IdSalida"],
        $Body["IdCliente"],
        $Body["IdEmpleado"],
        $Body["FechaSalida"],
        $Body["HoraSalida"],
        $Body["SubTotalPesos"],
        $Body["PlacaTransPorte"],
        $Body["Observaciones"]);
        break;
        case "Delete":
            $datos=$Salida->Delete($Body["IdSalida"]);
        break;
        case "Update":
            $datos=$Salida->Update($Body["IdSalida"],
            $Body["IdCliente"],
            $Body["IdEmpleado"],
            $Body["FechaSalida"],
            $Body["HoraSalida"],
            $Body["SubTotalPesos"],
            $Body["PlacaTransPorte"],
            $Body["Observaciones"],
            $Body["OldId"]
        );
            break;
    default:

}

?>