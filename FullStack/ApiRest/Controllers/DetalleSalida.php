<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/DetalleSalida.php");

$DetalleSalida = new DetalleSalida();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $DetalleSalida->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $DetalleSalida->FetchOne($Body["IdDetalleSalida"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $DetalleSalida->Insert($Body["IdDetalleSalida"],
        $Body["IdSalida"],
        $Body["IdProducto"],
        $Body["IdObra"],
        $Body["IdEmpleado"],
        $Body["CantidadSalida"],
        $Body["CantidadPropia"],
        $Body["CantidadSubAlquilada"],
        $Body["ValorUnidad"],
        $Body["FechaStandBy"],
        $Body["Estado"],
        $Body["ValorTotal"]
    );
        break;
        case "Delete":
            $datos=$DetalleSalida->Delete($Body["IdDetalleSalida"]);
        break;
        case "Update":
            $datos=$DetalleSalida->Update($Body["IdDetalleSalida"],
            $Body["IdSalida"],
            $Body["IdProducto"],
            $Body["IdObra"],
            $Body["IdEmpleado"],
            $Body["CantidadSalida"],
            $Body["CantidadPropia"],
            $Body["CantidadSubAlquilada"],
            $Body["ValorUnidad"],
            $Body["FechaStandBy"],
            $Body["Estado"],
            $Body["ValorTotal"],
            $Body["OldId"]
        );
            break;
    default:

}

?>