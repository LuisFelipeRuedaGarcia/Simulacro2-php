
<?php
$Url="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Cliente.php?op=GetAll";

$Curl = curl_init();
curl_setopt($Curl, CURLOPT_URL, $Url);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,1);
$Output = Json_decode(curl_exec($Curl));
/* echo "<pre>";
var_dump($Output);
echo" </pre>----------------------------------------------------------------------------------------------------" */
?>

        <div class="row">
          <div class="col-14">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Expandable Table</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>IdCliente</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach ($Output as $Out) {

                    ?>

                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?=$Out->IdCliente?></td>
                      <td><?=$Out->Nombre?></td>
                      <td><?=$Out->Correo?></td>
                      <td><?=$Out->Telefono?></td>
                      <td> <a href="./Views/Pages/Clientes/Actions/Update.php?IdCliente=<?=$Out->IdCliente?>" >Editar</a></td>
                      <td> <a href="./Views/Pages/Clientes/Actions/Delete.php?IdCliente=<?=$Out->IdCliente?>" >Elminar</a></td>
                    </tr>

                    <tr class="expandable-body">
                      <td colspan="10">
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
