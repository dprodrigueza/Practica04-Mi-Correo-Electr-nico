<?php
include('../../config/conexionDB.php');


$sql = "DELETE FROM mensajes where mens_id = $_GET[codigo];";
ECHO $sql;
$result = $conn->query($sql);



if ($conn->query($sql) === TRUE) {
    echo ("El MENSAJE A SIDO ELIMINADO.");
}


header("Location: ../vista/index.php?mail=$_GET[mail]");

$conn->close();
?>