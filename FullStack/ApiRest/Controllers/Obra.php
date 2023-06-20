<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Obra.php");

$Obra = new Obra();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Obra->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Obra->FetchOne($Body["IdObra"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Obra->Insert($Body["IdObra"],
        $Body["IdCliente"],
        $Body["Direccion"]);
        break;
        case "Delete":
            $datos=$Obra->Delete($Body["IdObra"]);
        break;
        case "Update":
            $datos=$Obra->Update($Body["IdObra"],
            $Body["IdCliente"],
            $Body["Direccion"],
            $Body["OldId"]
        );
            break;
    default:

}

?>