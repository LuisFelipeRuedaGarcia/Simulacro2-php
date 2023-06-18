<?php
require_once("../Config/Conectar.php");
class Inventario extends Conectar{
    
private $IdInventario;
private $IdProducto;
private $CantidadInicial;
private $CantidadIngresos;
private $CantidadSalidas;
private $CantidadFinal;
private $FechaInventario;
private $TipoOperacion;    
    public function __construct($IdInventario=NULL,
    $IdProducto=NULL,
    $CantidadInicial=NULL,
    $CantidadIngresos=NULL,
    $CantidadSalidas=NULL,
    $CantidadFinal=NULL,
    $FechaInventario=NULL,
    $TipoOperacion=NULL,$DbCnx=""){
        $this->IdInventario=$IdInventario;
    $this->IdProducto=$IdProducto;
    $this->CantidadInicial=$CantidadInicial;
    $this->CantidadIngresos=$CantidadIngresos;
    $this->CantidadSalidas=$CantidadSalidas;
    $this->CantidadFinal=$CantidadFinal;
    $this->FechaInventario=$FechaInventario;
    $this->TipoOperacion=$TipoOperacion;
        parent::__construct($DbCnx);
    }

    public function __get($Property)
    {
        if(property_exists($this, $Property)){
            return $this->$Property;
        }
    }

    public function __set($Property, $value)
    {
        if(property_exists($this,$Property)){
            $this->$Property=$value;
        }
    }
    
    public function Fetch(){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Inventario");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdInventario){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Inventario WHERE IdInventario = ?");
            $stm->bindValue(1,$IdInventario);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdInventario,
    $IdProducto,
    $CantidadInicial,
    $CantidadIngresos,
    $CantidadSalidas,
    $CantidadFinal,
    $FechaInventario,
    $TipoOperacion){
try {
            $stm = "INSERT INTO Inventario(IdInventario, IdProducto, CantidadInicial, CantidadIngresos, CantidadSalidas, CantidadFinal, FechaInventario, TipoOperacion) VALUES(?,?,?,?,?,?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdInventario);
            $stm->bindValue(2,$IdProducto);
            $stm->bindValue(3,$CantidadInicial);
            $stm->bindValue(4,$CantidadIngresos);
            $stm->bindValue(5,$CantidadSalidas);
            $stm->bindValue(6,$CantidadFinal);
            $stm->bindValue(7,$FechaInventario);
            $stm->bindValue(8,$TipoOperacion);
            $stm->execute(/* [$this->IdInventario,
        $this->IdProducto,
        $this->CantidadInicial,
        $this->CantidadIngresos,
        $this->CantidadSalidas,
        $this->CantidadFinal,
        $this->FechaInventario,
        $this->TipoOperacion] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }
}
/* $Body = array(
    "IdInventario"=>321,
    "IdProducto"=>4,
    "CantidadInicial"=>123,
    "CantidadIngresos"=>123,
    "CantidadSalidas"=>123,
    "CantidadFinal"=>123,
    "FechaInventario"=>"2023-06-14",
    "TipoOperacion"=>"123O"
); */
/* $inventario = new Inventario();
var_dump($inventario->Fetch()); */
/* $inventario->Insert(321,4,321,321,321,321,"2023-06-14","operation"); */
/* $inventario->IdInventario=321;
    $inventario->IdProducto=123;
    $inventario->CantidadInicial=321;
    $inventario->CantidadIngresos=321;
    $inventario->CantidadSalidas=321;
    $inventario->CantidadFinal=321;
    $inventario->FechaInventario=321;
    $inventario->TipoOperacion=321;

$inventario->Insert(); */
?>