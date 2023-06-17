<?php

    echo 1;
    $Url3 = "http://localhost/SkylAb-118/Simulacro2-php/FullStack/ApiRest/Controllers/Inventario.php?op=Insert";

    $data = array(
"IdInventario"=>321,
"IdProducto"=>4,
"CantidadInicial"=>123,
"CantidadIngresos"=>123,
"CantidadSalidas"=>123,
"CantidadFinal"=>123,
"FechaInventario"=>"2023-06-14",
"TipoOperacion"=>"123O"
    );

    $Curl3 = curl_init();
curl_setopt($Curl3, CURLOPT_URL, $Url3);
curl_setopt($Curl3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($Curl3, CURLOPT_POST, 1);
curl_setopt($Curl3, CURLOPT_POSTFIELDS, json_encode($data));

// Establecer la cabecera "Content-Type" como "application/json"
curl_setopt($Curl3, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$Output3 = json_decode(curl_exec($Curl3));
curl_close($Curl3);

var_dump($Output3);
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
            <br><label for="IdInventario">IdInventario</label>
            <input type="number" name="IdInventario" id="IdInventario">
            <br><label for="IdProducto">IdProducto</label>
            <input type="number" name="IdProducto" id="IdProducto">
            <br><label for="CantidadInicial">CantidadInicial</label>
            <input type="number" name="CantidadInicial" id="CantidadInicial">
            <br><label for="CantidadIngresos">CantidadIngresos</label>
            <input type="number" name="CantidadIngresos" id="CantidadIngresos">
            <br><label for="CantidadSalidas">CantidadSalidas</label>
            <input type="number" name="CantidadSalidas" id="CantidadSalidas">
            <br><label for="CantidadFinal">CantidadFinal</label>
            <input type="number" name="CantidadFinal" id="CantidadFinal">
            <br><label for="FechaInventario">FechaInventario</label>
            <input type="date" name="FechaInventario" id="FechaInventario">
            <br><label for="TipoOperacion">TipoOperacion</label>
            <input type="text" name="TipoOperacion" id="TipoOperacion">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="Registrar" Value="Registrar">
        </div>
      </form>
     
    </div>
  </div>
</div>