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
    <title>Mis pedidos</title>
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
                    <a href=""><img src="../../assets/img/1200px-User_icon_2.svg.png" alt="Imagen usuario" title="Imagen usuario"></a>
                </div>
                <nav class="navegacion-usuario">
                    <a href="cuenta.php">Mis Datos</a>
                    <a href="pedidos.php">Mis pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <h2 class="centrar-texto">MIS PEDIDOS</h2>
                <div class="tabla">
                <table class="">
                        <tr>
                            <th><strong></strong></th>
                            <th><strong>Fecha</strong></th>
                            <th><strong>Nombre</strong></th>
                            <th><strong>Apellido</strong></th>
                            <th><strong>Subtotal</strong></th>
                            <th><strong>IVA 12%</strong></th>
                            <th><strong>Total</strong></th>
                            <th><strong>Acciones</strong></th>
                        </tr>
                        <?php 
                            require '../../vendor/autoload.php';
                            $factura= new infinity\Factura;
                            $info_factura = $factura->mostrar_factura_cliente($_SESSION['id']);
                            $cantidad=count($info_factura);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_factura[$x];
                        ?>
                        <tr>
                            <td><?php print($x+1);?></td>
                            <td><?php print($item['factura_fehca']);?></td>
                            <td><?php print($item['usuario_nombre']);?></td>
                            <td><?php print($item['usuario_apellido']);?></td>
                            <td>$<?php print($item['factura_subtotal']);?></td>
                            <td>$<?php print($item['factura_iva']);?></td>
                            <td>$<?php print($item['factura_total']);?></td>
                            <td class="accion">
                                <a class="a-actualizar" href="detalle.php?id=<?php print $item['factura_id'] ?>">Ver Detalles</i></a>
                            </td>
                        </tr>
                        <?php
                            }
                            }
                            else{
                        ?>
                            <tr>
                                <td colspan="6">NO HAY REGISTROS</td>
                            </tr>
                        <?php }?>
                        
                    </table>
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