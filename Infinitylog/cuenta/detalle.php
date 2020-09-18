<?php
    session_start();
    require '../funciones.php';
    $id=$_GET['id'];
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
    <title>Detalle</title>
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
                    <a href=""><img src="../../assets/img/1200px-User_icon_2.svg.png" alt="Imagen usuario" title="Imagen Usuario"></a>
                </div>
                <nav class="navegacion-usuario">
                    <a href="cuenta.php">Mis Datos</a>
                    <a href="pedidos.php">Mis pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <h2 class="centrar-texto">DETALLE</h2>
                <div class="tabla">
                <table class="">
                        <tr>
                            <th><strong></strong></th>
                            <th><strong>Descripcion</strong></th>
                            <th><strong>Foto</strong></th>
                            <th><strong>Precio</strong></th>
                            <th><strong>Cantidad</strong></th>
                            <th><strong>Total</strong></th>
                        </tr>
                        <?php 
                            require '../../vendor/autoload.php';
                            $detalle= new infinity\Detalle_factura;
                            $info_detalle = $detalle->mostrar_por_factura($id);
                            $cantidad=count($info_detalle);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_detalle[$x];
                        ?>
                        <tr>
                            <td><?php print($x+1);?></td>
                            <td><?php print($item['producto_descripcion']);?></td>
                            <td class="centrar-texto">
                                <?php $foto='../../upload/'.$item['producto_foto']; 
                                    if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print($foto) ?>" alt="" width="50">
                                <?php }
                                    else{?>
                                        SIN FOTO
                                <?php
                                    }
                                ?>
                            </td>
                            <td>$<?php print($item['producto_precio']);?></td>
                            <td><?php print($item['detalle_cantidad']);?></td>
                            <td>$<?php print($item['detalle_total']);?></td>
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
                        <tr>
                            <td style="border:none; text-align: center" colspan="4" rowspan="3"><img src="../../assets/img/logo.jpg" alt="" width="300"></td>
                            <td colspan="">Subtotal</td>
                            <td>$<?php print($item['factura_subtotal']);?></td>
                        </tr>
                        <tr>
                            <td colspan="">IVA 12%</td>
                            <td>$<?php print($item['factura_iva']);?></td>
                        </tr>
                        <tr>
                            <td colspan="">Total</td>
                            <td>$<?php print($item['factura_total']);?></td>
                        </tr>
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