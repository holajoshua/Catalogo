<?php
include("Conexion.php");
$nombre = $_POST['producto'];
$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$talla = $_POST['talla'];
$color = $_POST['color'];

$query = "INSERT INTO producto(Nombre,Imagen,Precio,Talla,Color,Descripcion) VALUES ('$nombre','$Imagen','$precio','$talla','$color','$descripcion')";
$resultado = $conexion->query($query);
if($resultado){
  header("Location: mostrar.php");
}else{
  echo "No se inserto";
}
?>
