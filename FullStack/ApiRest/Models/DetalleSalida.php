<?php
require_once("../Config/Conectar.php");
class DetalleSalida extends Conectar{
private $IdDetalleSalida;
private $IdSalida;
private $IdProducto;
private $IdObra;
private $IdEmpleado;
private $CantidadSalida;
private $CantidadPropia;
private $CantidadSubAlquilada;    
private $ValorUnidad; 
private $FechaStandBy; 
private $Estado; 
private $ValorTotal; 
    public function __construct($IdDetalleSalida=NULL,
    $IdSalida=NULL,
    $IdProducto=NULL,
    $IdObra=NULL,
    $IdEmpleado=NULL,
    $CantidadSalida=NULL,
    $CantidadPropia=NULL,
    $CantidadSubAlquilada=NULL,
    $ValorUnidad=NULL,
    $FechaStandBy=NULL,
    $Estado=NULL,
    $ValorTotal=NULL,
    $DbCnx=""){
        $this->IdDetalleSalida=$IdDetalleSalida;
    $this->IdSalida=$IdSalida;
    $this->IdProducto=$IdProducto;
    $this->IdObra=$IdObra;
    $this->IdEmpleado=$IdEmpleado;
    $this->CantidadSalida=$CantidadSalida;
    $this->CantidadPropia=$CantidadPropia;
    $this->CantidadSubAlquilada=$CantidadSubAlquilada;
    $this->ValorUnidad=$ValorUnidad;
    $this->FechaStandBy=$FechaStandBy;
    $this->Estado=$Estado;
    $this->ValorTotal=$ValorTotal;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM DetalleSalidas");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdDetalleSalida){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM DetalleSalidas WHERE IdDetalleSalida = ?");
            $stm->bindValue(1,$IdDetalleSalida);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdDetalleSalida,
    $IdSalida,
    $IdProducto,
    $IdObra,
    $IdEmpleado,
    $CantidadSalida,
    $CantidadPropia,
    $CantidadSubAlquilada,
    $ValorUnidad,
    $FechaStandBy,
    $Estado,
    $ValorTotal
    ){
try {
            $stm = "INSERT INTO DetalleSalidas(IdDetalleSalida, IdSalida, IdProducto, IdObra, IdEmpleado, CantidadSalida, CantidadPropia, CantidadSubAlquilada, ValorUnidad, FechaStandBy, Estado, ValorTotal) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdDetalleSalida);
            $stm->bindValue(2,$IdSalida);
            $stm->bindValue(3,$IdProducto);
            $stm->bindValue(4,$IdObra);
            $stm->bindValue(5,$IdEmpleado);
            $stm->bindValue(6,$CantidadSalida);
            $stm->bindValue(7,$CantidadPropia);
            $stm->bindValue(8,$CantidadSubAlquilada);
            $stm->bindValue(9,$ValorUnidad);
            $stm->bindValue(10,$FechaStandBy);
            $stm->bindValue(11,$Estado);
            $stm->bindValue(12,$ValorTotal);
            $stm->execute(/* [$this->IdDetalleSalida,
        $this->IdSalida,
        $this->IdProducto,
        $this->IdObra,
        $this->IdEmpleado,
        $this->CantidadSalida,
        $this->CantidadPropia,
        $this->CantidadSubAlquilada] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdDetalleSalida){
        $stm="DELETE FROM DetalleSalidas WHERE IdDetalleSalida = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdDetalleSalida);
        $stm->execute();
    }

    Public function Update($IdDetalleSalida,
    $IdSalida,
    $IdProducto,
    $IdObra,
    $IdEmpleado,
    $CantidadSalida,
    $CantidadPropia,
    $CantidadSubAlquilada,
    $ValorUnidad,
    $FechaStandBy,
    $Estado,
    $ValorTotal,
    $OldId){
try {
    $stm="UPDATE DetalleSalidas SET IdDetalleSalida = ?,
    IdSalida = ?,
    IdProducto = ?,
    IdObra = ?,
    IdEmpleado = ?,
    CantidadSalida = ?,
    CantidadPropia = ?,
    CantidadSubAlquilada = ?,
    ValorUnidad = ?,
    FechaStandBy = ?,
    Estado = ?,
    ValorTotal = ?
    WHERE IdDetalleSalida = ?

    ";
    $stm=$this->DbCnx->prepare($stm);
    $stm->bindValue(1,$IdDetalleSalida);
    $stm->bindValue(2,$IdSalida);
    $stm->bindValue(3,$IdProducto);
    $stm->bindValue(4,$IdObra);
    $stm->bindValue(5,$IdEmpleado);
    $stm->bindValue(6,$CantidadSalida);
    $stm->bindValue(7,$CantidadPropia);
    $stm->bindValue(8,$CantidadSubAlquilada);
    $stm->bindValue(9,$ValorUnidad);
    $stm->bindValue(10,$FechaStandBy);
    $stm->bindValue(11,$Estado);
    $stm->bindValue(12,$ValorTotal);
        $stm->bindValue(13,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
/* $Body = array(
    "IdDetalleSalida"=>321,
    "IdSalida"=>4,
    "IdProducto"=>123,
    "IdObra"=>123,
    "IdEmpleado"=>123,
    "CantidadSalida"=>123,
    "CantidadPropia"=>"2023-06-14",
    "CantidadSubAlquilada"=>"123O"
); */

/* $DetalleSalida = new DetalleSalida();
var_dump($DetalleSalida->Fetch());
$DetalleSalida->Insert(111,666,111,111,111,111,111,111,111,111,111,111); */

/* $DetalleSalida->IdDetalleSalida=321;
    $DetalleSalida->IdSalida=123;
    $DetalleSalida->IdProducto=321;
    $DetalleSalida->IdObra=321;
    $DetalleSalida->IdEmpleado=321;
    $DetalleSalida->CantidadSalida=321;
    $DetalleSalida->CantidadPropia=321;
    $DetalleSalida->CantidadSubAlquilada=321;
$DetalleSalida->Insert(); */
?>