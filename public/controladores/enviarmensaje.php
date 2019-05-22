<?php
include('../../config/conexionDB.php');


$remitente = $_POST['labelRemitente'];
$destinatario= $_POST['destin'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];


date_default_timezone_set('America/Guayaquil');
$fecCrea = date('Y-m-d G:i');

$aux = "SELECT MAX(mens_id) from mensajes";


$aux = $conn->query($aux);
$id = $aux->fetch_assoc();
$cod = $id['MAX(mens_id)'];
$cod++;



$sql = "INSERT INTO mensajes VALUES ( $cod , '$remitente', '$destinatario', '$asunto', '$mensaje', '$fecCrea' );";
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo ("<p>Tu mensaje a sido enviado con exito!.");
}


header ("Location: ../vista/index.php?mail=$remitente");



$conn->close();

?>
