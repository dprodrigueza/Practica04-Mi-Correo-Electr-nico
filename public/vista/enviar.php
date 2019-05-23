<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>MENSAJE NUEVO</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>

</head>

<body>

    <?php

    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    echo "<header>";
    echo "<a href= index.php?mail=$_GET[mail]> MENSAJES RECIBIDOS </a>";
    echo "<a href= enviados.php?mail=$_GET[mail]>MENSAJES ENVIADOS</a>";
    echo "<a href=actualizar.php?mail=$_GET[mail]>PERFIL</a>";
    echo " <a  href=../../login/login.php> CERRAR SESION</a>";
    echo "<br/>";
    echo "</header>";

    ?>
    <form id="envioMensaje" method="POST" action="../controladores/enviarmensaje.php">
        <h1>Enviar nuevo Mensaje.</h1>


        <p>
            <input type="text" id="labelRemitente" name="labelRemitente" value="<?php echo $_GET['mail']; ?>" hidden> <br />
            Destinatario (*):
            <input type="text" id="destin" name="destin" placeholder="Ingrese el e-mail destino.." required onblur="validarMail(this)">
            <span id="mensajedestin" class="error"></span>
        </p>
        <br />
        <p>Asunto:
            <input type="text" id="asunto" name="asunto" placeholder="Ingrese un asunto">

        </p>
        <br />
        <p> MENSAJE (*):
            <input type="text" id="mensaje" name="mensaje">
        </p>
        <br />
        <button type="submit" id="btnEnviar"> ENVIAR </button>
        <br>
    </form>

</body>



</html>