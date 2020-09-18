<?php
    session_start();
    require 'funciones.php';
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
    <title>Inicio</title>
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
    <div class="imagenes">
        <span></span>
    </div>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto sub_seccion">Ultimos Productos</h2>
        <div class="contenedor-anuncios"> 
            <?php 
                            require '../vendor/autoload.php';
                            $producto= new infinity\Producto;
                            $info_producto = $producto->mostrar();
                            $cantidad=count($info_producto);
                            if($cantidad > 9)
                                $cantidad=9;
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_producto[$x];
            ?>
            <div class="anuncio">
                <div class="imagen-producto">
                    <?php
                        $foto='../upload/'.$item['producto_foto'];
                        if(file_exists($foto)){
                    ?>
                        <img src="<?php print $foto ?>" alt="<?php print $item['producto_descripcion']?> <?php print $item['producto_marca'] ?>" title="<?php print $item['producto_descripcion']?> <?php print $item['producto_marca'] ?>">
                    <?php }else {?>
                        <img src="" alt="">
                    <?php }?>
                </div>
                <div class="contenido-anuncio">
                    <h3 class="pad"><?php print $item['categoria_descripcion']?></h3>
                    <p class="pad"><?php print $item['producto_descripcion']?></p>
                    <p class="precio pad">$<?php print $item['producto_precio']?></p>
                    <a  href="carrito.php?id=<?php print $item['producto_id']?>" class="boton boton-amarillo d-block comprar">Comprar</a>
                </div>
            </div>
            <?php } ?>

            
        </div>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="inicio.html">Inicio</a>
                <a href="catalogo.html">Catalogo</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        <p class="copyright">Todos los derechos reservados 2020</p>
        </div>
    </footer>
</body>
</html>
