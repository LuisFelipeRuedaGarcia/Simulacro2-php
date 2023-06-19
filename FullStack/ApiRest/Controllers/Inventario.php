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
    case "GetbyId":
        $datos = $Inventario->FetchOne($Body["IdInventario"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Inventario->Insert($Body["IdInventario"],
        $Body["IdProducto"],
        $Body["CantidadInicial"],
        $Body["CantidadIngresos"],
        $Body["CantidadSalidas"],
        $Body["CantidadFinal"],
        $Body["FechaInventario"],
        $Body["TipoOperacion"]);
        break;
    default:
        case "Delete":
            $datos=$Inventario->Delete($Body["IdInventario"]);
        break;
}

?>