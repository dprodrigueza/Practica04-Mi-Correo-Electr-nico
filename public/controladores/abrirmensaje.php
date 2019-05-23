<!doctype html>
<html>

<head>
	<meta charset="utf-8">
    <title>MENS USER</title>
    
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<body>

	<?php
	session_start();
	if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
		header("Location: ../../login/login.php");
	}
	
	?>

	


	<table style="width: 100%" border="1">
		
    

	<?php
    include('../../config/conexionDB.php');
    
    $cod = $_GET["codigo"];
    
	$sql = "SELECT * from mensajes where mens_id=$cod;";
	$result = $conn->query($sql);




	if ($result->num_rows > 0) {

        
		while ($row = $result->fetch_assoc()) {
            $codigo = $row["mens_id"];
            $remite = $row["mens_remite"];
            $destino = $row["mens_destin"];
            $asunto = $row["mens_asunto"];
            $mensaje = $row["mens_mensaje"];
            $fecEnv = $row["mens_fecEnv"];

			echo "<tr>";
            //echo ("<td>" . $row["mens_id"] . "</td>");
            echo ("<th>REMITENTE</th>");
            echo ("<td>" . $remite . "</td>");
            echo ("</tr>");
            echo "<tr>";
            echo ("<th>DESTINATARIO</th>");
            echo ("<td>" . $destino . "</td>");
            echo ("</tr>");
            echo "<tr>";
            echo ("<th>ASUNTO</th>");
            echo ("<td>" . $asunto . "</td>");
            echo ("</tr>");
            echo "<tr>";
            echo ("<th>MENSAJE</th>");
            echo ("<td>" . $mensaje . "</td>");
            echo ("</tr>");
            echo "<tr>";
            echo ("<th>FECHA ENVIO</th>");
            echo ("<td>" . $fecEnv . "</td>");
            echo ("</tr>");
            echo "<tr >";
			echo ("</tr>");
            
           
		}
	} else {
		echo "<tr>";
		echo ("<td colspan='7'>No existe ningún mensaje. </td>");
		echo ("</tr>");
	}

	echo "<a href=../vista/index.php?mail=$_GET[mail]>VOLVER</a>";

	$conn->close();
    ?>

	</table>


    
    

</body>

</html>