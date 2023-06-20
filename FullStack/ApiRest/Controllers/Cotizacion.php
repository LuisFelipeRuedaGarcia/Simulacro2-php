<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Cotizacion.php");

$Cotizacion = new Cotizacion();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Cotizacion->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Cotizacion->FetchOne($Body["IdCotizacion"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Cotizacion->Insert(        
        $Body["IdCotizacion"],
        $Body["IdEmpleado"],
        $Body["IdProducto"],
        $Body["IdCliente"],
        $Body["Fecha"],
        $Body["Hora"],
        $Body["DuracionDias"],
        $Body["PrecioPorDia"],
        $Body["TotalPesos"]);
        break;
        case "Delete":
            $datos=$Cotizacion->Delete($Body["IdCotizacion"]);
        break;
        case "Update":
            $datos=$Cotizacion->Update(              
            $Body["IdCotizacion"],
            $Body["IdEmpleado"],
            $Body["IdProducto"],
            $Body["IdCliente"],
            $Body["Fecha"],
            $Body["Hora"],
            $Body["DuracionDias"],
            $Body["PrecioPorDia"],
            $Body["TotalPesos"],
            $Body["OldId"]
        );
            break;
    default:

}

?>