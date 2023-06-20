<?php
require_once("../Config/Conectar.php");
class Cliente extends Conectar{
    
private $IdCliente;
private $Nombre;
private $Correo;
private $Telefono;  
    public function __construct($IdCliente=NULL,
    $Nombre=NULL,
    $Correo=NULL,
    $Telefono=NULL,
    $DbCnx=""){
        $this->IdCliente=$IdCliente;
    $this->Nombre=$Nombre;
    $this->Correo=$Correo;
    $this->Telefono=$Telefono;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdCliente){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Clientes WHERE IdCliente = ?");
            $stm->bindValue(1,$IdCliente);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdCliente,
    $Nombre,
    $Correo,
    $Telefono){
try {
            $stm = "INSERT INTO Clientes(IdCliente, Nombre, Correo, Telefono) VALUES(?,?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdCliente);
            $stm->bindValue(2,$Nombre);
            $stm->bindValue(3,$Correo);
            $stm->bindValue(4,$Telefono);
            $stm->execute(/* [$this->IdCliente,
        $this->Nombre,
        $this->Correo,
        $this->Telefono] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdCliente){
        $stm="DELETE FROM Clientes WHERE IdCliente = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdCliente);
        $stm->execute();
    }

    Public function Update($IdCliente,
    $Nombre,
    $Correo,
    $Telefono,
    $OldId){
try {
    $stm="UPDATE Clientes SET IdCliente = ?,
    Nombre = ?,
    Correo = ?,
    Telefono = ?
    WHERE IdCliente = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdCliente);
        $stm->bindValue(2,$Nombre);
        $stm->bindValue(3,$Correo);
        $stm->bindValue(4,$Telefono);
        $stm->bindValue(5,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
/* $Body = array(
    "IdCliente"=>321,
    "Nombre"=>4,
    "Correo"=>123,
    "Telefono"=>123,
    "CantidadSalidas"=>123,
    "CantidadFinal"=>123,
    "FechaCliente"=>"2023-06-14",
    "TipoOperacion"=>"123O"
); */
/* $Cliente = new Cliente();
var_dump($Cliente->Fetch()); */
/* $Cliente->Insert(321,4,321,321,321,321,"2023-06-14","operation"); */
/* $Cliente->IdCliente=321;
    $Cliente->Nombre=123;
    $Cliente->Correo=321;
    $Cliente->Telefono=321;
    $Cliente->CantidadSalidas=321;
    $Cliente->CantidadFinal=321;
    $Cliente->FechaCliente=321;
    $Cliente->TipoOperacion=321;

$Cliente->Insert(); */
?>