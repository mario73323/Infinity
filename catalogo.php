<?php

use infinity\Producto;

require 'Infinitylog/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <title>Catalogo</title>
</head>
<body>
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <img src="assets/img/logo.jpg" alt="logo" title="Logo Infinity"  height="72">
                </a>
                <nav class="navegacion">
                    <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
                    <a href="catalogo.php"><i class="fas fa-book"></i> Catalogo</a>
                    <a href="contacto.php"><i class="fas fa-phone-alt"></i> Contacto</a>
                    <a href="log/login.php"><i class="fas fa-door-open"></i>Ingresar</a>
                </nav>
            </div>
        </div>
    </header>
    
    <section class="seccion contenedor">
        <h2 class="fw-300 centrar-texto sub_seccion">Catálogo de Productos</h2>
        <div class="form-categoria">
            <fieldset>
            <legend>Selector de categorias</legend>
            <form method="POST" action="catalogo_busqueda.php" enctype="multipart/form-data">
            <label>Categoria</label>
                <select name="categoria_id" required>
                    <option value="-1">--TODOS LOS PRODUCTOS--</option>
                    <?php
                            require 'vendor/autoload.php';
                            $categoria= new infinity\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad=count($info_categoria);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_categoria[$x];
                        ?>
                        <option value="<?php print $item['categoria_id'] ?>"><?php print $item['categoria_descripcion'] ?></option>
                            <?php }}?>
                </select>
                <input type="submit" name="accion" value="Filtrar" class="boton boton-celeste enviar">
            </form>
            </fieldset>
        </div>
        <div class="contenedor-anuncios"> 
            <?php 
                            require 'vendor/autoload.php';
                            $producto= new infinity\Producto;
                            $info_producto = $producto->mostrar();
                            $cantidad=count($info_producto);
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_producto[$x];
            ?>
            <div class="anuncio">
                <div class="imagen-producto">
                    <?php
                        $foto='upload/'.$item['producto_foto'];
                        if(file_exists($foto)){
                    ?>
                        <img src="<?php print $foto ?>" alt="<?php print $item['producto_descripcion'] ?> <?php print $item['producto_marca'] ?>" title="<?php print $item['producto_descripcion'] ?> <?php print $item['producto_marca'] ?>">
                    <?php }else {?>
                        <img src="" alt="">
                    <?php }?>
                </div>
                <div class="contenido-anuncio">
                    <h3 class="pad"><?php print $item['categoria_descripcion']?></h3>
                    <p class="pad"><?php print $item['producto_descripcion']?></p>
                    <p class="precio pad">$<?php print $item['producto_precio']?></p>
                    <a  href="log/login.php" class="boton boton-amarillo d-block comprar">Comprar</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="inicio.php">Inicio</a>
                <a href="catalogo.php">Catalogo</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        <p class="copyright">Todos los derechos reservados 2020</p>
        </div>
    </footer>
</body>
</html>
