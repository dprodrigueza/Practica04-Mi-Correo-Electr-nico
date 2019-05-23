<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    echo "<header>";
    echo "<a href= ../vista/crear.php?mail=$_GET[mail]> CREAR USUARIO ADMINISTRADOR </a>";
    echo "<a href= ../vista/index.php?mail=$_GET[mail]> MENSAJES </a>";
    echo "<a href=../vista/listar.php?mail=$_GET[mail]> USUARIOS </a>";
    echo " <a  href=../../login/login.php> CERRAR SESION </a>";
    echo "<br/>";
    echo "</header>";


    ?>

    <form id="creacion" method="POST" onsubmit="return validarCamposObligatorios()" action="../controladores/insertarDatos.php?mail=<?php echo $_GET['mail']; ?>">
        <h1>Formulario.</h1>
        <p>Nombre (*):
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre.">
            <span id="mensajeNombre" class="error"></span>
        </p>
        <br />
        <p>Apellido (*):
            <input type="text" id="apellido" name="apellido" placeholder="Ingrese apellido.">
            <span id="mensajeApellido" class="error"></span>
        </p>
        <br />
        <p>Teléfono (*):
            <input type="text" id="Telefono" name="telefono" placeholder="Ingrese numero telefonico.">
            <span id="mensajeTelefono" class="error"></span>
        </p>
        <br />
        <p>E-Mail (*):
            <input type="email" id="email" name="email" placeholder="Ingrese un email valido." onblur="validarMail(this)">
            <span id="mensajeEmail" class="error"></span>
        </p>
        <br />
        <p>Contraseña (*):
            <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese una contraseña.">
            <span id="mensajePassword" class="error"></span>
        </p>
        <br />
        <button type="submit" id="btnGuardar"> GUARDAR </button>
        <br>
    </form>




    <footer>
        <p>Diego Rodríguez A</p>
        <p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
        <p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
        <p>© Todos los derechos reservados</p>
    </footer>




</body>

</html>