<?php
session_start();
require 'funciones.php';

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id=$_GET['id'];
        require '../vendor/autoload.php';
        $producto= new infinity\Producto;    
        $resultado= $producto->mostrar_por_id($id);
            if(!$resultado)
                header('Location: index.php');

            
            if(isset($_SESSION['carrito'])){
                if(array_key_exists($id,$_SESSION['carrito'])){
                    actualizar_producto($id);
                }
                else{
                    agregar_producto($resultado,$id);
                }
            }
            else{
                agregar_producto($resultado,$id);
            }

            
    } 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <title>Carrito</title>
</head>
<body>
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <img src="../assets/img/logo.jpg" alt="logo" title="Logo Infinity"  height="72">  
                </a>
                <nav class="navegacion">
                    <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
                    <a href="catalogo.php"><i class="fas fa-book"></i> Catalogo</a>
                    <a href="cuenta/cuenta.php"><i class="fas fa-user"></i> Mi Cuenta</a>
                    <a href="carrito.php"><i class="fas fa-shopping-cart"></i> Mi carrito <?php print cantidad_producto() ?></a>
                    <a href="contacto.php"><i class="fas fa-phone-alt"></i> Contacto</a>
                    <a href="../index.php"><i class="fas fa-door-open"></i>Salir</a>
                </nav>
            </div>
        </div>
    </header>
    <main class="wrapper">
    <div class="datos-panel">
    
                <div class="tabla">
                <?php
                     if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                        $x=0;
                        $total=0;
                ?>
                    <table class="">
                        <tr>
                            <th><strong></strong></th>
                            <th><strong>Imagen</strong></th>
                            <th><strong>Producto</strong></th>
                            <th><strong>Cantidad</strong></th>
                            <th><strong>Precio</strong></th>
                            <th><strong>Total</strong></th>
                            <th><strong>Accion</strong></th>
                        </tr>
                         
                        <?php foreach($_SESSION['carrito'] as $indice=> $value){
                            $x=$x+1; 
                            $total=$total+($value['producto_precio']*$value['cantidad']);
                        ?>
                        <form action="actualizar_carrito.php" method="POST">
                            <tr class="centrar-texto">
                            <td><?php print $x ?></td>
                            <td class="centrar-texto">
                                    <?php $foto='../upload/'.$value['producto_foto']; 
                                        if(file_exists($foto)){
                                            ?>
                                            <img src="<?php print($foto) ?>" alt="<?php print $value['producto_descripcion'] ?>" title="<?php print $value['producto_descripcion'] ?>" width="50">
                                    <?php }
                                        else{?>
                                            SIN FOTO
                                    <?php
                                        }
                                    ?>
                                </td>
                            <td><?php print $value['producto_descripcion']?></td>
                            <td class="centrar-texto centrar-centrar">
                                <input type="text" class="pequeño centrar-texto" name="cantidad" value="<?php print $value['cantidad']?>">
                            </td>
                            <td>$<?php print $value['producto_precio']?></td>
                            <td>$<?php print ($value['producto_precio']*$value['cantidad'])?></td>
                            <td class="accion accion-2">
                                <input type="hidden" name="id" value="<?php print $value['producto_id']?>">
                                <button type="submit" title="Actualizar" class="a-actualizar"><i class="fas fa-sync-alt"></i></button>
                                <a class="a-eliminar no-margin" title="Eliminar" href="eliminar_carrito.php?id=<?php print $value['producto_id']?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            </tr>
                        </form>
                     <?php }?>
                     <tr>
                            <td style="border:none; text-align: center" colspan="4" rowspan="3"><img src="../assets/img/logo.jpg" alt="Logo Infinity" title="Logo Infinity" width="300"></td>
                            <td>Subtotal</td>
                            <td>$<?php print calcular_subtotal() ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>$<?php print calcular_iva() ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>$<?php print calcular_total() ?></td>
                        </tr>
                    <?php }else{ ?>
                            <h2>NO SE HAN AÑADIDO PRODUCTOS</h2>
                            <?php }    
                            ?>   
                        
                        
                    </table>
                    <br><br>
                </div>
                <?php if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){?>
                <div class="final-compra contenedor">
                    <h2>Total a pagar por este carrito:   $<?php print calcular_total() ?></h2>
                    <a class="boton boton-verde" href="finalizar_compra.php">Realizar Compra</a>
                </div>
                <?php } ?>
            </div>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catalogo</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        <p class="copyright">Todos los derechos reservados 2020</p>
        </div>
    </footer>
</body>
</html>
