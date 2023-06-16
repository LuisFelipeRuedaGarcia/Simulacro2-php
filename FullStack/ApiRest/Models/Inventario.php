<?php
require_once("../Config/Conectar.php");
class Inventario extends Conectar{
    
    public function __construct($DbCnx=""){
        parent::__construct($DbCnx);
        
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
        $stm = "INSERT INTO Inventario(IdInventario,IdProducto, CantidadInicial, CantidadIngresos, CantidadSalidas,CantidadFinal, FechaInventario, TipoOperacion,) VALUES(?,?,?,?,?,?,?,?,)";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdInventario);
        $stm->bindValue(2,$IdProducto);
        $stm->bindValue(3,$CantidadInicial);
        $stm->bindValue(4,$CantidadIngresos);
        $stm->bindValue(5,$CantidadSalidas);
        $stm->bindValue(6,$CantidadFinal);
        $stm->bindValue(7,$FechaInventario);
        $stm->bindValue(8,$TipoOperacion);
        $stm->execute();
        return $stm->FetchAll();

    }
}
?>