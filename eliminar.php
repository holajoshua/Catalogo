<?php
include("Conexion.php");

$id=$_REQUEST['id'];

$query = "DELETE FROM producto WHERE id ='$id'";
$resultado = $conexion->query($query);

if($resultado){
   header("Location: mostrar.php");
}else{
  echo "No se elimino";
}
?>