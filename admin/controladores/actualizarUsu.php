<?php
include('../../config/conexionDB.php');

$nombre = strtoupper($_POST['nombres']);
$apellido = strtoupper($_POST['apellidos']);
$telefono = $_POST['telefono'];
$mail = $_GET['mail'];  



$sql = "UPDATE usuarios SET user_nombre = '$nombre' , user_apellido = '$apellido' , user_telefono = '$telefono' where user_email = '$mail';";
echo $sql;
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Datos Actualizados correctamente.");
}

header ("Location: ../vista/actualizar.php?mail=$mail");

$conn->close();
?>