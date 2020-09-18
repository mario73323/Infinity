<?php 
    require '../../vendor/autoload.php';
    $id=$_GET['id'];
    $producto= new infinity\Producto;
    $resultado = $producto->mostrar_por_id($id);
    if(!$resultado)
        header('Location:index.php')
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
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/styles_panel.css">
    <link rel="stylesheet" href="../../assets/css/all.css">
    <title>Document</title>
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
        <div id="main" >
        <fieldset>
            <legend>DETALLES DEL PRODUCTO</legend>
        <form method="POST" action="acciones.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php print $resultado['producto_id'] ?>">
                <label>Descripcion</label>
                <input type="text" name="descripcion" placeholder="Descripcion" required value="<?php print $resultado['producto_descripcion'] ?>">
                <label>Color</label>
                <input type="text" name="color" placeholder="Color" required value="<?php print $resultado['producto_color'] ?>">
                <label>Talla</label>
                <input type="text" name="talla" placeholder="Talla" required value="<?php print $resultado['producto_talla'] ?>">
                <label>Marca</label>
                <input type="text" name="marca" placeholder="Marca" required value="<?php print $resultado['producto_marca'] ?>">
                <label>Precio</label>
                <input type="text" name="precio" placeholder="0.00" required value="<?php print $resultado['producto_precio'] ?>">
                <label>Categoria</label>
                <select name="categoria_id" required>
                    <option value="">--seleccione--</option>
                    <?php
                            require '../../vendor/autoload.php';
                            $categoria= new infinity\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad=count($info_categoria);
                            if($cantidad > 0){
                            for($x = 0; $x<$cantidad; $x++){
                                $item= $info_categoria[$x];
                        ?>
                        <option value="<?php print $item['categoria_id'] ?>"
                                <?php if($resultado['categoria_id']==$item['categoria_id']) print(" selected "); ?>>
                                <?php print $item['categoria_descripcion'] ?></option>
                            <?php }}?>
                </select>
                <label>Foto</label>
                <input type="file" name="foto">
                <input type="hidden" name="foto_temp" value="<?php print $resultado['producto_foto'] ?>">
        
        <input type="submit" name="accion" value="Actualizar" class="boton boton-verde enviar">
        <a class="boton boton-rojo" href="index.php">Cancelar</a>
        </form>
        </fieldset>
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