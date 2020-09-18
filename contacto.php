<?php
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
    <title>Contacto</title>
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
    <div class="imagen-contacto">
    </div>
    
    <h1 class="fw-300 centrar-texto">CONTACTO</h1>
    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Llena el formulario de contacto</h2>

        <form action="">
            <fieldset>
                <legend>INFORMACION PERSONAL</legend>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu nombre" required>
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Tu correo" required>
                <label for="telefono">Telefono</label>
                <input type="tel" id="telefono" placeholder="Tu telefono" required>
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
           
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado:</p>
                <div class="forma-contacto">
                    <label for="telefono">Telefono</label>
                    <input type="radio" name="contacto" value="telefono" id="telefono">
                    <label for="correo">e-mail</label>
                    <input type="radio" name="contacto" value="correo" id="correo">
                </div>
            </fieldset>
            <input type="submit" value="Enviar" class="boton boton-verde">
        </form>
    </main>
    
    <div>
        <h2 class="centrar-texto">Ubícanos</h2>
        <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5641.614322339761!2d-80.69243749792065!3d-0.9891683590846564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8b4083fda70e7b99!2sModerna%20Alimentos!5e0!3m2!1ses!2sec!4v1598827235904!5m2!1ses!2sec" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
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
