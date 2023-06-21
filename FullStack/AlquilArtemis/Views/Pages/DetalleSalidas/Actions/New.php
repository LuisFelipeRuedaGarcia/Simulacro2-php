<?php

if(isset($_POST["Registrar"])){

$Url3 = "http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/DetalleSalida.php?op=Insert";
$data3 = array(
"IdDetalleSalida"=>$_POST["IdDetalleSalida"],
"IdSalida"=>$_POST["IdSalida"],
"IdProducto"=>$_POST["IdProducto"],
"IdObra"=>$_POST["IdObra"],
"IdEmpleado"=>$_POST["IdEmpleado"],
"CantidadSalida"=>$_POST["CantidadSalida"],
"CantidadPropia"=>$_POST["CantidadPropia"],
"CantidadSubAlquilada"=>$_POST["CantidadSubAlquilada"],
"ValorUnidad"=>$_POST["ValorUnidad"],
"FechaStandBy"=>$_POST["FechaStandBy"],
"Estado"=>$_POST["Estado"],
"ValorTotal"=>$_POST["ValorTotal"]
  );

$Curl3 = curl_init();
curl_setopt($Curl3, CURLOPT_URL, $Url3);
curl_setopt($Curl3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($Curl3, CURLOPT_POST, 1);
curl_setopt($Curl3, CURLOPT_POSTFIELDS, json_encode($data3));
curl_setopt($Curl3, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$Output3 = json_decode(curl_exec($Curl3));
curl_close($Curl3);
}
?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
            <br><label for="IdDetalleSalida">IdDetalleSalida</label>
            <input type="number" name="IdDetalleSalida" id="IdDetalleSalida">
            <br><label for="IdSalida">IdSalida</label>
            <input type="number" name="IdSalida" id="IdSalida">
            <br><label for="IdProducto">IdProducto</label>
            <input type="number" name="IdProducto" id="IdProducto">
            <br><label for="IdObra">IdObra</label>
            <input type="number" name="IdObra" id="IdObra">
            <br><label for="IdEmpleado">IdEmpleado</label>
            <input type="number" name="IdEmpleado" id="IdEmpleado">
            <br><label for="CantidadSalida">CantidadSalida</label>
            <input type="number" name="CantidadSalida" id="CantidadSalida">
            <br><label for="CantidadPropia">CantidadPropia</label>
            <input type="number" name="CantidadPropia" id="CantidadPropia">
            <br><label for="CantidadSubAlquilada">CantidadSubAlquilada</label>
            <input type="text" name="CantidadSubAlquilada" id="CantidadSubAlquilada">
            <br><label for="ValorUnidad">ValorUnidad</label>
            <input type="text" name="ValorUnidad" id="ValorUnidad">
            <br><label for="FechaStandBy">FechaStandBy</label>
            <input type="text" name="FechaStandBy" id="FechaStandBy">
            <br><label for="Estado">Estado</label>
            <input type="text" name="Estado" id="Estado">
            <br><label for="ValorTotal">ValorTotal</label>
            <input type="text" name="ValorTotal" id="ValorTotal">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="Registrar" Value="Registrar">
        </div>
      </form>
     
    </div>
  </div>
</div>