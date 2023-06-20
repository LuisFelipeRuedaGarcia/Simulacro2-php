<?php
require_once("../Config/Conectar.php");
class Producto extends Conectar{
private $IdProducto;
private $Nombre;
private $Precio;
    public function __construct(
    $IdProducto=NULL,
    $Nombre=NULL,
    $Precio=NULL,
    $DbCnx=""){
    $this->IdProducto=$IdProducto;
    $this->Nombre=$Nombre;
    $this->Precio=$Precio;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Productos");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdProducto){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Productos WHERE IdProducto = ?");
            $stm->bindValue(1,$IdProducto);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert(
    $IdProducto,
    $Nombre,
    $Precio){
try {
            $stm = "INSERT INTO Productos(IdProducto, Nombre, Precio) VALUES(?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdProducto);
            $stm->bindValue(2,$Nombre);
            $stm->bindValue(3,$Precio);
            $stm->execute(/* [$this->IdProducto,
        $this->Nombre,
        $this->Precio] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdProducto){
        $stm="DELETE FROM Productos WHERE IdProducto = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdProducto);
        $stm->execute();
    }

    Public function Update($IdProducto,
    $Nombre,
    $Precio,
    $OldId){
try {
    $stm="UPDATE Productos SET 
    IdProducto = ?,
    Nombre = ?,
    Precio = ?
    WHERE IdProducto = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdProducto);
        $stm->bindValue(2,$Nombre);
        $stm->bindValue(3,$Precio);
        $stm->bindValue(4,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
/* $Body = array(
    "IdProducto"=>123,
    "Nombre"=>123,
    "Precio"=>123,
);*/
/* $Producto = new Producto();
var_dump($Producto->Fetch());
$Producto->Update(321,123,321,333); */
/*
    $Producto->IdProducto=123;
    $Producto->Nombre=321;
    $Producto->Precio=321;


$Producto->Insert(); */


?>