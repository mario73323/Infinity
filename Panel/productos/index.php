<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=PT+Sans:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/styles_panel.css">
    <link rel="stylesheet" href="../../assets/css/all.css">
    <title>Productost</title>
</head>

<body>
    <header class="site-header borde-inferior">
        <div class="contenedor">
            <div class="barra">
                <a href="../dashboard.php">
                    <h1 class="no-margin">Infi<span>nity</span></h1>
                </a>
                <a href="">Panel de administración</a>
                <a href="../../index.php">Cerrar sesion <i class="fas fa-door-open"></i></a>
            </div>
        </div>
    </header>

    <section class="contenedor wrapper">
        <div class="contenido-panel">
            <div class="usuario">
                <div class="imagen-usuario">
                    <a href=""><img src="../../assets/img/1200px-User_icon_2.svg.png" alt=""></a>
                </div>
                <nav class="navegacion-usuario">
                    <a href="../administradores/index.php">Administradores</a>
                    <a href="../clientes/index.php">Clientes</a>
                    <a href="">Productos</a>
                    <a href="../categorias/index.php">Categoria</a>
                    <a href="../pedidos/index.php">Pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <div class="añadir">
                    <a class="boton boton-verde" href="form_registrar.php"><i class="fas fa-plus"></i> Añadir nuevo producto</a>
                </div>
                <div class="tabla">
                    <table class="">
                        <tr>
                            <th><strong></strong></th>
                            <th><strong>Producto</strong></th>
                            <th><strong>Marca</strong></th>
                            <th><strong>Precio</strong></th>
                            <th><strong>Imagen</strong></th>
                            <th><strong>Accion</strong></th>
                        </tr>
                        <?php 
                            require '../../vendor/autoload.php';
                            $producto= new infinity\Producto;
                            $info_producto = $producto->mostrar();
                            $cantidad=count($info_producto);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_producto[$x];
                        ?>
                        <tr>
                            <td><?php print($x+1);?></td>
                            <td><?php print($item['producto_descripcion']);?></td>
                            <td><?php print($item['producto_marca']);?></td>
                            <td>$<?php print($item['producto_precio']);?></td>
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
                            <td class="accion">
                                <a class="a-actualizar" href="form_actualizar.php?id=<?php print $item['producto_id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a class="a-eliminar" href="acciones.php?id=<?php print $item['producto_id'] ?>"><i class="fas fa-trash-alt"></i></a>
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
                <a href="inicio.html">Panel de administrador</a>
            </nav>
            <p class="copyright">Todos los derechos reservados 2020</p>
        </div>
    </footer>
</body>

</html>