<?php
require_once("../Config/Conectar.php");
class Cotizacion extends Conectar{
    private $IdCotizacion;
    private $IdEmpleado;
    private $IdProducto;
    private $IdCliente;
    private $Fecha;
    private $Hora;
    private $DuracionDias;
    private $PrecioPorDia;
    private $TotalPesos;

    public function __Construct($IdCotizacion=0, $IdEmpleado=NULL, $IdProducto=NULL, $IdCliente=NULL, $Fecha=NULL,   $Hora=NULL,   $DuracionDias=NULL,   $PrecioPorDia=NULL,   $TotalPesos=NULL, $DbCnx=""){
        $this->IdCotizacion=$IdCotizacion;
        $this->IdEmpleado=$IdEmpleado;
        $this->IdProducto=$IdProducto;
        $this->IdCliente=$IdCliente;
        $this->Fecha=$Fecha;
        $this->Hora=$Hora;
        $this->DuracionDias=$DuracionDias;
        $this->PrecioPorDia=$PrecioPorDia;
        $this->TotalPesos=$TotalPesos;
        parent::__Construct($DbCnx);
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Cotizaciones");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdCotizacion){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Cotizaciones WHERE IdCotizacion = ?");
            $stm->bindValue(1,$IdCotizacion);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdCotizacion,
    $IdEmpleado,
    $IdProducto,
    $IdCliente,
    $Fecha,
    $Hora,
    $DuracionDias,
    $PrecioPorDia, $TotalPesos){
try {
            $stm = "INSERT INTO Cotizaciones(IdCotizacion, IdEmpleado, IdProducto, IdCliente, Fecha, Hora, DuracionDias, PrecioPorDia, TotalPesos) VALUES(?,?,?,?,?,?,?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdCotizacion);
            $stm->bindValue(2,$IdEmpleado);
            $stm->bindValue(3,$IdProducto);
            $stm->bindValue(4,$IdCliente);
            $stm->bindValue(5,$Fecha);
            $stm->bindValue(6,$Hora);
            $stm->bindValue(7,$DuracionDias);
            $stm->bindValue(8,$PrecioPorDia);
            $stm->bindValue(9,$TotalPesos);
            $stm->execute(/* [$this->IdCotizacion,
        $this->IdEmpleado,
        $this->IdProducto,
        $this->IdCliente,
        $this->Fecha,
        $this->Hora,
        $this->DuracionDias,
        $this->PrecioPorDia, TotalPesos] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdCotizacion){
        $stm="DELETE FROM Cotizaciones WHERE IdCotizacion = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdCotizacion);
        $stm->execute();
    }

    Public function Update($IdCotizacion,
    $IdEmpleado,
    $IdProducto,
    $IdCliente,
    $Fecha,
    $Hora,
    $DuracionDias,
    $PrecioPorDia, $TotalPesos,
    $OldId){
try {
    $stm="UPDATE Cotizaciones SET IdCotizacion = ?,
    IdEmpleado = ?,
    IdProducto = ?,
    IdCliente = ?,
    Fecha = ?,
    Hora = ?,
    DuracionDias = ?,
    PrecioPorDia = ?,
    TotalPesos = ?
    WHERE IdCotizacion = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdCotizacion);
        $stm->bindValue(2,$IdEmpleado);
        $stm->bindValue(3,$IdProducto);
        $stm->bindValue(4,$IdCliente);
        $stm->bindValue(5,$Fecha);
        $stm->bindValue(6,$Hora);
        $stm->bindValue(7,$DuracionDias);
        $stm->bindValue(8,$PrecioPorDia);
        $stm->bindValue(9,$TotalPesos);
        $stm->bindValue(10,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }
}
?>