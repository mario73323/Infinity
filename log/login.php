<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-sacalable=yes, 
    initial-scale=1.0,maximum-scale=3.0,minimum-sacle=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <title>Iniciar Sesion</title>
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

        <div class="contenedor-formulario">
            <form class="formulario" method="POST" action="Acciones.php" enctype="multipart/form-data">
                <h3>Iniciar sesión</h1>
                <div class="cuadro">    

                <div class="imput-cuadro">
                    <i class="fas fa-at"></i>
                    <input type="text" placeholder="Correo electrónico" name="correo" require>
                    </div>

                <div class="imput-cuadro">
                    <i class="fas fa-key"></i>
                    <input type="password" placeholder="Contraseña" name="pass">
                    </div>
                    <input type = "submit" value ="iniciar" class="button" name="accion">

                    <p>¿No tienes una cuenta?<a class="link" href="registro.php">Registrate</a>
                    </p>
                </div>
            </form>
    </div>
    
