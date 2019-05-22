<?php
include('../config/conexionDB.php');

$nombre = strtoupper(trim($_POST['nombre']));
$apellido = strtoupper(trim($_POST['apellido']));
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$eva = false;

$aux = "SELECT MAX(user_id) from usuarios";


$aux = $conn->query($aux);
$id = $aux->fetch_assoc();
$cod = $id['MAX(user_id)'];
$cod++;



$sql = "INSERT INTO usuarios VALUES ( $cod , '$email', '$contrasena', '$nombre', '$apellido', '$telefono', 'USER');";
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("Hey! Bienvenido. Ahora ya puedes iniciar sesión con tu nueva cuenta. <br>");
}

echo ("<a href='../login/login.php'> INICIAR SESION </a>");

$conn->close();
?>