<?php
include("Conexion.php");
$id=$_REQUEST['id'];

$nombre = $_POST['producto'];
$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
$precio = $_POST['precio'];
$talla = $_POST['talla'];
$color = $_POST['color'];
$descripcion = $_POST['descripcion'];

$query = "UPDATE producto SET Nombre='$nombre',Imagen='$Imagen',Precio='$precio',Talla='$talla',Color='$color',Descripcion='$descripcion' WHERE id ='$id'";
$resultado = $conexion->query($query);

if($resultado){
  header("Location: mostrar.php");
}else{
  echo "No se modifico";
}
?>