<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-sacalable=yes, 
    initial-scale=1.0,maximum-scale=3.0,minimum-sacle=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <title>Registro</title>
</head>
<body>
    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
                <a href="index.php">
                    <img src="../assets/img/logo.jpg" alt=""  height="72">
                </a>
                <nav class="navegacion">
                    <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
                    <a href="../catalogo.php"><i class="fas fa-book"></i> Catalogo</a>
                    <a href="../contacto.php"><i class="fas fa-phone-alt"></i> Contacto</a>
                    <a href="../contacto.html"><i class="fas fa-door-open"></i>Ingresar</a>
                </nav>
            </div>
        </div>
    </header>

        <form class="formulario" method="POST" action="Acciones.php" enctype="multipart/form-data">
            <h3>Registrate</h1>
            <div class="cuadro">    

            <div class="imput-cuadro">
                <i class="fas fa-user"></i>
                <input type="text" name="nombre" placeholder=" Nombres" require>
                </div>

            <div class="imput-cuadro">
                <i class="fas fa-user"></i>
                <input type="text" name="apellido" placeholder="Apellidos" require>
                </div>

            <div class="imput-cuadro">
                <i class="fas fa-at"></i>
                <input type="text" name="correo" placeholder="Correo electrónico" require>
                </div>

            <div class="imput-cuadro">
                <i class="fas fa-phone-volume"></i>
                <input type="text" name="telefono" placeholder="Teléfono">
            </div>

            <div class="imput-cuadro">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="ciudad" placeholder="Ciudad" require>
            </div>
            <input type="hidden" name="rol" value="2">

            <div class="imput-cuadro">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="direccion" placeholder="Dirección" require>
                </div>

            

            <div class="imput-cuadro">
                <i class="fas fa-key"></i>
                <input type="password" name="pass" placeholder="Contraseña" require>
                </div>
                <input type = "submit" value ="registrar" class="button" name="accion">

                <p>¿Ya tienes una cuenta?<a class="link" href="login.php">Iniciar sesión</a>
                </p>

                


            </div>
        </form>
    
