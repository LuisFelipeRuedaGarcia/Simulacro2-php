<?php

if(isset($_POST["Registrar"])){

$Url3 = "http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cliente.php?op=Insert";
$data3 = array(
"IdCliente"=>$_POST["IdCliente"],
"Nombre"=>$_POST["Nombre"],
"Correo"=>$_POST["Correo"],
"Telefono"=>$_POST["Telefono"],
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
            <br><label for="IdCliente">IdCliente</label>
            <input type="number" name="IdCliente" id="IdCliente">
            <br><label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre">
            <br><label for="Correo">Correo</label>
            <input type="text" name="Correo" id="Correo">
            <br><label for="Telefono">Telefono</label>
            <input type="text" name="Telefono" id="Telefono">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="Registrar" Value="Registrar">
        </div>
      </form>
     
    </div>
  </div>
</div>