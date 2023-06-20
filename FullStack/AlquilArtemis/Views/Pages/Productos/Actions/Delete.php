
<?php
if(isset($_GET["IdProducto"])){
$Url4 ="http://localhost/Simulacro2-php/FullStack/ApiRest/Controllers/Producto.php?op=Delete";
$data4 = array("IdProducto"=>$_GET["IdProducto"]);
$Curl4 = curl_init();
curl_setopt($Curl4, CURLOPT_URL, $Url4);
curl_setopt($Curl4, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($Curl4,CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($Curl4,CURLOPT_POSTFIELDS, json_encode($data4));

curl_setopt($Curl4, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
$Output4=json_decode(curl_exec($Curl4));
curl_close($Curl4);
/* var_dump($Output4); */
header("location: ../../../../Productos");
}

?>
