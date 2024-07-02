<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
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
                    <li><a href="index.php">Agregar</a></li>
                    <li><a href="#">Servicios</a></li>
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
    <br>

    <h1 class="title">CATALOGO DE PRODUCTOS</h1>

    <div class="catalogo">
    
    <!-- Segunda parte -->
        <?php 
            include("Conexion.php");
            $query = "SELECT * FROM producto";
            $resultado = $conexion->query($query);
            while ($row = $resultado->fetch_assoc()) {
        ?>

            <div class="contenedor">
                <div class="producto">
                    <div class="producto-img">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>" alt="<?php echo $row['Nombre']; ?>"/>
                    </div>
                    <div class="producto-info">
                        <h3><?php echo $row['Nombre']; ?></h3>
                        <!-- <p>ID: <?php echo $row['Id'];?></p> -->
                        <p><?php echo $row['Precio'].' Bs';?></p>
                        <p>Tallas: <?php echo $row['Talla'];?></p>
                        <p>Colores: <?php echo $row['Color'];?></p>
                        <p>Descripcion: <?php echo $row['Descripcion'];?></p>
                    </div>
                </div>
            </div>
            
        <?php
            }
        ?>
    </div>
</body>
</html>