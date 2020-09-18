<?php
    $id=$_GET['id'];
    require '../../vendor/autoload.php';
    $usuario= new infinity\Administradores;
    $resultado=$usuario->mostrar_por_id($id);
?>
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
    <title>Clientes</title>
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
                    <a href="../productos/index.php">Productos</a>
                    <a href="../categorias/index.php">Categoria</a>
                    <a href="../pedidos/index.php">Pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <h2 class="centrar-texto">Pedidos del cliente</h2>
                <h2 class="centrar-texto"><?php print $resultado['usuario_nombre']?> <?php print $resultado['usuario_apellido']?></h2>
                <h2></h2>
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
                            
                            $factura= new infinity\Factura;
                            $info_factura = $factura->mostrar_factura_cliente($id);
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
                                <a class="a-actualizar" href="../pedidos/detalle.php?id=<?php print $item['factura_id'] ?>">Ver Detalles</i></a>
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
                    