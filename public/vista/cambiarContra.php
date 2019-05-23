<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <script type="text/javascript" src="../controladores/funciones.js"></script>
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

    echo "<section>";
    echo "<a href=enviar.php?mail=$_GET[mail]>REDACTAR MENSAJE</a>";
    echo "</section>";
    echo "<br/>";


    ?>
    
    <?php
    include('../../config/conexionDB.php');


    $mail = $_GET['mail'];


    $sql = "SELECT * FROM usuarios where user_email='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" action="../controladores/actualizarContra.php?mail=<?php echo $row["user_email"]; ?>">

                <label for="contraNEW">Nueva Contraseña *: </label>
                <input type="password" id="contrasNew" name="contrasNew" placeholder="Ingrese la nueva contraseña" />
                <br>
                <label for="contraVer">Confirma tu contraseña: </label>
                <input type="password" id="verifi" name="verifi" placeholder="Ingresa nuevamente tu contraseña" onkeyup="validarContra()" />
                <span id="mensajeContra" class="error"></span>
                <br>
                <br>
                <input type="submit" id="btncontrasena" name="btncontrasena" value="CAMBIAR CONTRASEÑA" disabled />
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>


    <footer>
        <p>Diego Rodríguez A</p>
        <p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
        <p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
        <p>© Todos los derechos reservados</p>
    </footer>




</body>

</html>