<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>MENS ADMIN</title>
	<link href="../css/estilo.css" rel="stylesheet">
</head>

<body>

	<?php
	session_start();
	if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
		header("Location: ../../login/login.php");
	}

	?>


	<table style="width: 100%" border="1">



		<?php
		include('../../config/conexionDB.php');

		$sql = "SELECT * from mensajes where mens_id=$_GET[codigo];";
		$result = $conn->query($sql);




		if ($result->num_rows > 0) {


			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				//echo ("<td>" . $row["mens_id"] . "</td>");
				echo ("<th>REMITENTE</th>");
				echo ("<td>" . $row["mens_remite"] . "</td>");
				echo ("</tr>");
				echo "<tr>";
				echo ("<th>DESTINATARIO</th>");
				echo ("<td>" . $row["mens_destin"] . "</td>");
				echo ("</tr>");
				echo "<tr>";
				echo ("<th>ASUNTO</th>");
				echo ("<td>" . $row["mens_asunto"] . "</td>");
				echo ("</tr>");
				echo "<tr>";
				echo ("<th>MENSAJE</th>");
				echo ("<td>" . $row["mens_mensaje"] . "</td>");
				echo ("</tr>");
				echo "<tr>";
				echo ("<th>FECHA ENVIO</th>");
				echo ("<td>" . $row["mens_fecEnv"] . "</td>");
				echo ("</tr>");
				echo "<tr >";
				echo ("</tr>");
			}
		} else {
			echo "<tr>";
			echo ("<td colspan='7'>No existe ningún mensaje. </td>");
			echo ("</tr>");
		}



		$conn->close();
		echo "<a href=../vista/index.php?mail=$_GET[mail]>VOLVER</a>";
		?>

	</table>

	




	<footer>
		<p>Diego Rodríguez A</p>
		<p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
		<p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
		<p>© Todos los derechos reservados</p>
	</footer>


</body>

</html>