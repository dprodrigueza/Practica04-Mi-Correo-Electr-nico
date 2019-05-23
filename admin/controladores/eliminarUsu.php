<?php
include('../../config/conexionDB.php');

$mail = $_GET['mail'];


$sql = "UPDATE usuarios SET user_del = 'Y' WHERE user_email = '$mail';";

$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Hey! Bienvenido. Ahora ya puedes iniciar sesión con tu nueva cuenta. <br>");
}

header("Location: ../vista/listar.php?mail=$_GET[adm]");

$conn->close();
?>