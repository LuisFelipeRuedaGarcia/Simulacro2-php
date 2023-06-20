<?php

if(isset($_POST["Registrar"])){

$Url3 = "http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cotizacion.php?op=Insert";
$data3 = array(
  "IdCotizacion"=>$_POST["IdCotizacion"],
  "IdEmpleado"=>$_POST["IdEmpleado"],
  "IdProducto"=>$_POST["IdProducto"],
  "IdCliente"=>$_POST["IdCliente"],
  "Fecha"=>$_POST["Fecha"],
  "Hora"=>$_POST["Hora"],
  "DuracionDias"=>$_POST["DuracionDias"],
  "PrecioPorDia"=>$_POST["PrecioPorDia"],
  "TotalPesos"=>$_POST["TotalPesos"]
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
            <br><label for="IdCotizacion">IdCotizacion</label>
            <input type="number" name="IdCotizacion" id="IdCotizacion">
            <br><label for="IdEmpleado">IdEmpleado</label>
            <input type="number" name="IdEmpleado" id="IdEmpleado">
            <br><label for="IdProducto">IdProducto</label>
            <input type="number" name="IdProducto" id="IdProducto">
            <br><label for="IdCliente">IdCliente</label>
            <input type="number" name="IdCliente" id="IdCliente">
            <br><label for="Fecha">Fecha</label>
            <input type="date" name="Fecha" id="Fecha">
            <br><label for="Hora">Hora</label>
            <input type="time" name="Hora" id="Hora">
            <br><label for="DuracionDias">DuracionDias</label>
            <input type="number" name="DuracionDias" id="DuracionDias">
            <br><label for="PrecioPorDia">PrecioPorDia</label>
            <input type="text" name="PrecioPorDia" id="PrecioPorDia">
            <br><label for="TotalPesos">TotalPesos</label>
            <input type="text" name="TotalPesos" id="TotalPesos">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="Registrar" Value="Registrar">
        </div>
      </form>
     
    </div>
  </div>
</div>