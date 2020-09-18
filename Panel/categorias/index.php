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
    <title>Categorias</title>
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
                    <a href="">Categoria</a>
                    <a href="../pedidos/index.php">Pedidos</a>
                </nav>
            </div>
            <div class="datos-panel">
                <div class="tabla tabla-categoria">
                    <div class="tabla-cat">
                        <table class="">
                            <tr>
                                <th><strong></strong></th>
                                <th><strong>Categoria</strong></th>
                                <th><strong>Accion</strong></th>
                            </tr>
                            <?php
                            require '../../vendor/autoload.php';
                            $categoria= new infinity\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad=count($info_categoria);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_categoria[$x];
                            ?>
                            <tr>
                                <td><?php print ($x+1) ?></td>
                                <td><?php print $item['categoria_descripcion'] ?></td>
                                <td class="accion">
                                    <a class="a-eliminar" href="acciones.php?id=<?php print $item['categoria_id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php }} ?>
                        </table>
                    </div>
                    <div class="submit-cat">
                        <fieldset>
                            <legend>REGISTRAR NUEVA CATEGORIA</legend>
                            <form method="POST" action="acciones.php" enctype="multipart/form-data">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" placeholder="Descripcion" required>
                                <input type="submit" name="accion" value="Añadir" class="boton boton-verde enviar">
                            </form>
                        </fieldset>
                    </div>
                   
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