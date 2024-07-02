<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de imagenes</title>
</head>
<body>
    <?php 
        include("Conexion.php");
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM producto where id = '$id'";
        $resultado=$conexion->query($query);
        $row = $resultado->fetch_assoc();
    ?>
    <center><br><br><br>
        <form action="proceso_modificar.php?id=<?php echo $row['Id']; ?>"  method="POST" enctype="multipart/form-data">
            <input type="text" required id="nombreProducto" name="producto" placeholder="Nombre del Producto"  value="<?php echo $row['Nombre'];?>"/><br/><br/>
            <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']);?>"/><br><br>
            <input type="file" required id="imagenProducto" name="Imagen" ><br><br>
            <input type="text" required  id="precioProducto" name="precio" placeholder="Introduce el Precio" value="<?php echo $row['Precio'];?>"/><br><br>
            <input type="text" required  id="talla" name="talla" placeholder="Introduce las tallas" value="<?php echo $row['Talla'];?>"/><br><br>
            <input type="text" required  id="color" name="color" placeholder="Introduce los colores" value="<?php echo $row['Color'];?>"/><br><br>
            <input type="text" required id="descripcionProducto" name="descripcion" placeholder="Introduce la descripcion del producto" value="<?php echo $row['Descripcion'];?>"/><br><br>
            <input type="submit" value="Aceptar">
        </form>
    </center>
</body>
</html>