<?php
require_once("../Config/Conectar.php");
class Obra extends Conectar{
    
private $IdObra;
private $IdCliente;
private $Direccion;  
    public function __construct($IdObra=NULL,
    $IdCliente=NULL,
    $Direccion=NULL,
    $DbCnx=""){
    $this->IdObra=$IdObra;
    $this->IdCliente=$IdCliente;
    $this->Direccion=$Direccion;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Obras");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdObra){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Obras WHERE IdObra = ?");
            $stm->bindValue(1,$IdObra);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdObra,
    $IdCliente,
    $Direccion){
try {
            $stm = "INSERT INTO Obras(IdObra, IdCliente, Direccion) VALUES(?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdObra);
            $stm->bindValue(2,$IdCliente);
            $stm->bindValue(3,$Direccion);
            $stm->execute(/* [$this->IdObra,
        $this->IdCliente,
        $this->Direccion] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdObra){
        $stm="DELETE FROM Obras WHERE IdObra = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdObra);
        $stm->execute();
    }

    Public function Update($IdObra,
    $IdCliente,
    $Direccion,
    $OldId){
try {
    $stm="UPDATE Obras SET IdObra = ?,
    IdCliente = ?,
    Direccion = ?
    WHERE IdObra = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdObra);
        $stm->bindValue(2,$IdCliente);
        $stm->bindValue(3,$Direccion);
        $stm->bindValue(4,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
/* $Body = array(
    "IdObra"=>321,
    "IdCliente"=>4,
    "Direccion"=>123,
    "CantidadIngresos"=>123,
    "CantidadSalidas"=>123,
    "CantidadFinal"=>123,
    "FechaObra"=>"2023-06-14",
    "TipoOperacion"=>"123O"
); */
/* $Obra = new Obra();
var_dump($Obra->Fetch());
$Obra->Update(333,333,333,222); */
/* $Obra->IdObra=321;
    $Obra->IdCliente=123;
    $Obra->Direccion=321;
    $Obra->CantidadIngresos=321;
    $Obra->CantidadSalidas=321;
    $Obra->CantidadFinal=321;
    $Obra->FechaObra=321;
    $Obra->TipoOperacion=321;

$Obra->Insert(); */
?>