<?php
require_once("../Config/Conectar.php");
class Salida extends Conectar{
    
private $IdSalida;
private $IdCliente;
private $IdEmpleado;
private $FechaSalida;
private $HoraSalida;
private $SubTotalPesos;
private $PlacaTransPorte;    
private $Observaciones;
    public function __construct($IdSalida=NULL,
    $IdCliente=NULL,
    $IdEmpleado=NULL,
    $FechaSalida=NULL,
    $HoraSalida=NULL,
    $SubTotalPesos=NULL,
    $PlacaTransPorte=NULL,
    $Observaciones=NULL,$DbCnx=""){
        $this->IdSalida=$IdSalida;
    $this->IdCliente=$IdCliente;
    $this->IdEmpleado=$IdEmpleado;
    $this->FechaSalida=$FechaSalida;
    $this->HoraSalida=$HoraSalida;
    $this->SubTotalPesos=$SubTotalPesos;
    $this->PlacaTransPorte=$PlacaTransPorte;
    $this->Observaciones=$Observaciones;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Salidas");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdSalida){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Salidas WHERE IdSalida = ?");
            $stm->bindValue(1,$IdSalida);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdSalida,
    $IdCliente,
    $IdEmpleado,
    $FechaSalida,
    $HoraSalida,
    $SubTotalPesos,
    $PlacaTransPorte,
    $Observaciones){
try {
            $stm = "INSERT INTO Salidas(IdSalida, IdCliente, IdEmpleado, FechaSalida, HoraSalida, SubTotalPesos, PlacaTransPorte, Observaciones) VALUES(?,?,?,?,?,?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdSalida);
            $stm->bindValue(2,$IdCliente);
            $stm->bindValue(3,$IdEmpleado);
            $stm->bindValue(4,$FechaSalida);
            $stm->bindValue(5,$HoraSalida);
            $stm->bindValue(6,$SubTotalPesos);
            $stm->bindValue(7,$PlacaTransPorte);
            $stm->bindValue(8,$Observaciones);
            $stm->execute(/* [$this->IdSalida,
        $this->IdCliente,
        $this->IdEmpleado,
        $this->FechaSalida,
        $this->HoraSalida,
        $this->SubTotalPesos,
        $this->FechaSalida,
        $this->PlacaTransPorte] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdSalida){
        $stm="DELETE FROM Salidas WHERE IdSalida = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdSalida);
        $stm->execute();
    }

    Public function Update($IdSalida,
    $IdCliente,
    $IdEmpleado,
    $FechaSalida,
    $HoraSalida,
    $SubTotalPesos,
    $PlacaTransPorte,
    $Observaciones,
    $OldId){
try {
    $stm="UPDATE Salidas SET IdSalida = ?,
    IdCliente = ?,
    IdEmpleado = ?,
    FechaSalida = ?,
    HoraSalida = ?,
    SubTotalPesos = ?,
    PlacaTransPorte = ?,
    Observaciones = ?
    WHERE IdSalida = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdSalida);
        $stm->bindValue(2,$IdCliente);
        $stm->bindValue(3,$IdEmpleado);
        $stm->bindValue(4,$FechaSalida);
        $stm->bindValue(5,$HoraSalida);
        $stm->bindValue(6,$SubTotalPesos);
        $stm->bindValue(7,$PlacaTransPorte);
        $stm->bindValue(8,$Observaciones);
        $stm->bindValue(9,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
/* $Body = array(
    "IdSalida"=>321,
    "IdCliente"=>4,
    "IdEmpleado"=>123,
    "FechaSalida"=>123,
    "HoraSalida"=>123,
    "SubTotalPesos"=>123,
    "FechaSalida"=>"2023-06-14",
    "PlacaTransPorte"=>"123O"
); */
/* $Salida = new Salida();
var_dump($Salida->Fetch());
$Salida->Update(666,222,111, "2006-06-06", "06:06:06", 666,666,666, 123); */
/* $Salida->IdSalida=321;
    $Salida->IdCliente=123;
    $Salida->IdEmpleado=321;
    $Salida->FechaSalida=321;
    $Salida->HoraSalida=321;
    $Salida->SubTotalPesos=321;
    $Salida->FechaSalidaSalida=321;
    $Salida->PlacaTransPorte=321;

$Salida->Insert(); */
?>