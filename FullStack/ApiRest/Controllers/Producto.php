<?php
header('Content-Type: application/json');
require_once("../Config/Conectar.php");
require_once("../Models/Producto.php");

$Producto = new Producto();
$Body = json_decode(file_get_contents("php://input"), true);
switch ($_GET["op"]) {
    case 'GetAll':
        $datos = $Producto->Fetch();
        echo json_encode($datos);
        break;
    case "GetbyId":
        $datos = $Producto->FetchOne($Body["IdProducto"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $Producto->Insert($Body["IdProducto"],
        $Body["Nombre"],
        $Body["Precio"]);
        break;
        case "Delete":
            $datos=$Producto->Delete($Body["IdProducto"]);
        break;
        case "Update":
            $datos=$Producto->Update($Body["IdProducto"],
            $Body["Nombre"],
            $Body["Precio"],
            $Body["OldId"]
        );
            break;
    default:

}

?>