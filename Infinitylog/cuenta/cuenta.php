<?php
    session_start();
    require '../funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/all.css">
    <title>Mis Datos</title>
</head>
<body>
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                <img src="../../assets/img/logo.jpg" alt="logo" title="Logo Infinity"  height="72">
                </a>
                <nav class="navegacion">
                    <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
                    <a href="../catalogo.php"><i class="fas fa-book"></i> Catalogo</a>
                    <a href="cuenta.php"><i class="fas fa-user"></i> Mi Cuenta</a>
                    <a href="../carrito.php"><i class="fas fa-shopping-cart"></i> Mi carrito <?php print cantidad_producto() ?></a>
                    <a href="../contacto.php"><i class="fas fa-phone-alt"></i> Contacto</a>
                    <a href="../../index.php"><i class="fas fa-door-open"></i>Salir</a>
                </nav>
            </div>
        </div>
    </header>
    
    <section class="contenedor wrapper">
        <div class="contenido-panel">
            <div class="usuario">
                <div class="imagen-usuario">
                    <a href=""><img src="../../assets/img/1200px-User_icon_2.svg.png" alt="imagen usuario" title="Imagen usuario"></a>
                </div>
                <nav class="navegacion-usuario">
                    <a href="cuenta.php">Mis Datos</a>
                    <a href="pedidos.php">Mis pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <h2 class="centrar-texto">MIS DATOS</h2>
                <div class="tabla">
                    <table class="">
                        <?php 
                            require '../../vendor/autoload.php';
                            $user= new infinity\Administradores;
                            $item=$user->mostrar_por_id($_SESSION["id"])
                        ?>
                        <tr>
                            <td><strong>NOMBRES</strong></td>
                            <td><?php print $item['usuario_nombre'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>APELLIDOS</strong></td>
                            <td><?php print $item['usuario_apellido'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>TELEFONO</strong></td>
                            <td><?php print $item['usuario_telefono'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>CORREO ELECTRONICO</strong></td>
                            <td><?php print $item['usuario_correo'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>CIUDAD</strong></td>
                            <td><?php print $item['usuario_ciudad'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>DIRECCION</strong></td>
                            <td><?php print $item['usuario_direccion'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="añadir">
                        <a class="boton boton-verde" href="form_registrar.php">Editar mis datos</a>
                </div>
            </div>
            
        </div>
    </section>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="../index.php">Inicio</a>
                <a href="../catalogo.php">Catalogo</a>
                <a href="../contacto.php">Contacto</a>
            </nav>
        <p class="copyright">Todos los derechos reservados 2020</p>
        </div>
    </footer>
</body>
</html>
