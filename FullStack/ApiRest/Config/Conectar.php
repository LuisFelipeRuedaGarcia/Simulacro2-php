<?php 
abstract class Conectar{
    protected $DbCnx;
    public function __construct(){
        $this->DbCnx = new PDO("mysql:host=localhost;dbname=AlquilArtemis","campus","campus2023",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    }
}