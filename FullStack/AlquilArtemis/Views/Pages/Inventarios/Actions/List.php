
<?php
$Url="http://localhost/SkylAb-118/Simulacro2-php/FullStack/ApiRest/Controllers/Inventario.php?op=GetAll";

$Curl = curl_init();
curl_setopt($Curl, CURLOPT_URL, $Url);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,1);
$Output = Json_decode(curl_exec($Curl));
/* echo "<pre>";
var_dump($Output);
echo" </pre>----------------------------------------------------------------------------------------------------" */
?>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Expandable Table</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>IdInventario</th>
                      <th>IdProducto</th>
                      <th>CantidadInicial</th>
                      <th>CantidadIngresos</th>
                      <th>CantidadSalidas</th>
                      <th>CantidadFinal</th>
                      <th>FechaInventario</th>
                      <th>TipoOperacion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach ($Output as $Out) {
                      echo $Out->IdInventario;
                    ?>

                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td><?=$Out->IdInventario?></td>
                      <td><?=$Out->IdProducto?></td>
                      <td><?=$Out->CantidadInicial?></td>
                      <td><?=$Out->CantidadIngresos?></td>
                      <td><?=$Out->CantidadSalidas?></td>
                      <td><?=$Out->CantidadFinal?></td>
                      <td><?=$Out->FechaInventario?></td>
                      <td><?=$Out->TipoOperacion?></td>
                    </tr>

                    <tr class="expandable-body">
                      <td colspan="8">
                        <p>
                          123.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
