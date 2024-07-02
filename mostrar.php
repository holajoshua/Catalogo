<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Mostrar Imagenes</title>
</head>
<body>
    <header class="header">
        <div class="menu container">
            <img src="img/logotipo.png" alt="" class="logotipo">
            <!-- <a href="#"class="logo">logo</a> -->
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img src="img/menu.png" alt="menu" class="menu-icono">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="Hombres.html">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="catalogo.php">Productos</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
            <div>
                <ul>
                    <li class="submenu">
                        <img src="img/car.svg" id="img-carrito" alt="carrito">
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <table border="2" class="styled-table">
        <thead>
            <tr>
                <th colspan="8"><a href="Hombres.html">Nuevo</a></th>
            </tr>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th colspan="2">Descripcion</th>
                <th colspan="2">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include("Conexion.php");
                $query = "SELECT * FROM producto";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
            ?>
                <tr>
                    <td rowspan="2"><?php echo $row['Id'];?></td>
                    <td rowspan="2"><?php echo $row['Nombre'];?></td>
                    <td rowspan="2"><img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></td>
                    <td rowspan="2"><?php echo $row['Precio'].' Bs';?></td>
                    <!-- <td><?php echo $row['Descripcion'];?></td> -->
                    <th>Talla</td>
                    <th>Color</td>
                    <th rowspan="2"><a href="modificar.php?id=<?php echo $row['Id']; ?>">Modificar</a></th>
                    <th rowspan="2"><a href="eliminar.php?id=<?php echo $row['Id']; ?>">Eliminar</a></th>
                </tr>
                <tr class="celda">
                    <td><?php echo $row['Talla'];?></td>
                    <td><?php echo $row['Color'];?></td>
                </tr>
                
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>