<?php
require_once("../Config/Conectar.php");
class Empleado extends Conectar{
    private $IdEmpleado;
    private $Username;
    private $Password;
    public function __construct($IdEmpleado=NULL, $Username=NULL, $Password=NULL, $DbCnx="")
    {
        $this->IdEmpleado=$IdEmpleado;
        $this->Username=$Username;
        $this->Password=$Password;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne($IdEmpleado){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Empleados WHERE IdEmpleado = ?");
            $stm->bindValue(1,$IdEmpleado);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert($IdEmpleado,
    $Username,
    $Password,
    ){
try {
            $stm = "INSERT INTO Empleados(IdEmpleado, Username, Password) VALUES (?,?,?)";
            $stm=$this->DbCnx->prepare($stm);
            $stm->bindValue(1,$IdEmpleado);
            $stm->bindValue(2,$Username);
            $stm->bindValue(3,$Password);
            $stm->execute(/* [$this->IdEmpleado,
        $this->Username,
        $this->Password] */);
            return $stm->FetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}

    }

    public function Delete($IdEmpleado){
        $stm="DELETE FROM Empleados WHERE IdEmpleado = ?";
        $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdEmpleado);
        $stm->execute();
    }

    Public function Update($IdEmpleado,
    $Username,
    $Password,
    $OldId){
try {
    $stm="UPDATE Empleados SET IdEmpleado = ?,
    Username = ?,
    Password = ?
    WHERE IdEmpleado = ?";
    $stm=$this->DbCnx->prepare($stm);
        $stm->bindValue(1,$IdEmpleado);
        $stm->bindValue(2,$Username);
        $stm->bindValue(3,$Password);
        $stm->bindValue(4,$OldId);
    $stm->execute();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }

    public function CheckUsername($Username){
        try {
            $stm=$this->DbCnx->Prepare("SELECT * FROM Empleados WHERE Username = ?");
            $stm->execute([$Username]);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function Login($Username,$Password){
        $stm=$this->DbCnx->prepare("SELECT * FROM Empleados WHERE Username = ? AND Password= ?");
        $stm->execute([$Username, md5($Password)]);
        $Array=$stm->FetchAll();
        if($Array){
            session_start();
            $_SESSION["IdEmpleado"]=$Array[0]["IdEmpleado"];
            $_SESSION["Username"]=$this->Username;
            session_start();
            $_SESSION["Password"]=$this->Password;
            return true;
        }else {
            return false;
        }

    }
}
/* $Body = array(
    "IdEmpleado"=>321,
    "Username"=>4,
    "Password"=>123,
); */
/* $Empleado = new Empleado();
var_dump($Empleado->Fetch()); */
/* $Empleado->Insert(321,4,321,321,321,321,"2023-06-14","operation"); */
/* $Empleado->IdEmpleado=321;
    $Empleado->Username=123;
    $Empleado->Password=321;


$Empleado->Insert(); */

/* if($_GET["op"] *//* =="GetAll" *//* ){
    $Empleado = new Empleado();
    $Array = $Empleado->Fetch();
    echo json_encode($Array);
} */

?>