<?php

if(isset($_POST["Registrar"])){

$Url3 = "http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Salida.php?op=Insert";
$data3 = array(
"IdSalida"=>$_POST["IdSalida"],
"IdCliente"=>$_POST["IdCliente"],
"IdEmpleado"=>$_POST["IdEmpleado"],
"FechaSalida"=>$_POST["FechaSalida"],
"HoraSalida"=>$_POST["HoraSalida"],
"SubTotalPesos"=>$_POST["SubTotalPesos"],
"PlacaTransPorte"=>$_POST["PlacaTransPorte"],
"Observaciones"=>$_POST["Observaciones"]
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
            <br><label for="IdSalida">IdSalida</label>
            <input type="number" name="IdSalida" id="IdSalida">
            <br><label for="IdCliente">IdCliente</label>
            <input type="number" name="IdCliente" id="IdCliente">
            <br><label for="IdEmpleado">IdEmpleado</label>
            <input type="number" name="IdEmpleado" id="IdEmpleado">
            <br><label for="FechaSalida">FechaSalida</label>
            <input type="date" name="FechaSalida" id="FechaSalida">
            <br><label for="HoraSalida">HoraSalida</label>
            <input type="time" name="HoraSalida" id="HoraSalida">
            <br><label for="SubTotalPesos">SubTotalPesos</label>
            <input type="number" name="SubTotalPesos" id="SubTotalPesos">
            <br><label for="PlacaTransPorte">PlacaTransPorte</label>
            <input type="text" name="PlacaTransPorte" id="PlacaTransPorte">
            <br><label for="Observaciones">Observaciones</label>
            <input type="text" name="Observaciones" id="Observaciones">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="Registrar" Value="Registrar">
        </div>
      </form>
     
    </div>
  </div>
</div>