<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil.</title>
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    echo "<header>";
    echo "<a href= ../vista/crear.php?mail=$_GET[adm]> CREAR USUARIO ADMINISTRADOR </a>";
    echo "<a href= ../vista/index.php?mail=$_GET[adm]> MENSAJES </a>";
    echo "<a href=../vista/listar.php?mail=$_GET[adm]> USUARIOS </a>";
    echo " <a  href=../../login/login.php> CERRAR SESION </a>";
    echo "<br/>";
    echo "</header>";

    ?>


    <?php
    include('../../config/conexionDB.php');


    $mail = $_GET['mail'];


    $sql = "SELECT * FROM usuarios where user_email='$mail'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formularioUpdate" method="POST" action="../controladores/actualizarUsu.php?mail=<?php echo $row["user_email"]; ?>">

                <label for="nombres">Nombre: </label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["user_nombre"]; ?>" />
                <br>
                <label for="apellidos">Apelido: </label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["user_apellido"]; ?>" />
                <br>
                <label for="telefono">Teléfono: </label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["user_telefono"]; ?>" />
                <br>
                <label for="correo">Correo electrónico: </label>
                <input type="email" id="correo" name="correo" disabled value="<?php echo $row["user_email"]; ?>" />
                <br>
                <button id="btnCambiarContraseña"><a href="actualizarContra.php?mail=<?php echo $_GET['mail']; ?>">CAMBIAR CONTRASEÑA</a> </button>
                <br>
                <br>
                <input type="submit" id="GUARDAR" name="guardar" value="GUARDAR" />
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