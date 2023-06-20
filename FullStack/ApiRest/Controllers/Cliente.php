<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Cliente.php");

$Cliente = new Cliente();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Cliente->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Cliente->FetchOne($Body["IdCliente"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Cliente->Insert($Body["IdCliente"],
        $Body["Nombre"],
        $Body["Correo"],
        $Body["Telefono"]);
        break;
        case "Delete":
            $datos=$Cliente->Delete($Body["IdCliente"]);
        break;
        case "Update":
            $datos=$Cliente->Update($Body["IdCliente"],
            $Body["Nombre"],
            $Body["Correo"],
            $Body["Telefono"],
            $Body["OldId"]
        );
            break;
    default:

}

?>