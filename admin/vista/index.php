<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>INDEX ADMIN</title>
	<script type="text/javascript" src="../controladores/ajax.js"></script>
	<link href="../css/estilo.css" rel="stylesheet">
</head>

<body>

	<?php
	session_start();
	if (!isset($_SESSION['isLoggedAdmin']) || $_SESSION['isLoggedAdmin'] === FALSE) {
		header("Location: ../../login/login.php");
	}

	echo "<header>";
	echo "<a href= ../vista/crear.php?mail=$_GET[mail]> CREAR USUARIO ADMINISTRADOR </a>";
	echo "<a href= ../vista/index.php?mail=$_GET[mail]> MENSAJES </a>";
	echo "<a href=../vista/listar.php?mail=$_GET[mail]> USUARIOS </a>";
	echo " <a  href=../../login/login.php> CERRAR SESION </a>";
	echo "<br/>";
	echo "</header>";


	?>





	<form id="busqueda" method="POST" onkeyup="return buscarCorreo()">
	<label> Buscar </label>
        <input type="text" id="buscarR" name="buscarR" placeholder="@"> 
		<input type="text" id="destinoMail" disabled	 name="destinoMail" value="<?php echo $_GET["mail"]; ?> ">
		<span id="mensajeBusqueda" class="error"></span>
	</form>


	<section id="contenido">
	<table id="tablaMail" style="width: 100%" border="1">
		<tr>
			<th>REMITENTE</th>
			<th>DESTINATARIO</th>
			<th>ASUNTO</th>
			<th>MENSAJE</th>
			<th>FECHA ENVIO</th>
			<th colspan="2">ACCIONES</th>

		</tr>


		<?php
		include('../../config/conexionDB.php');

		$sql = "SELECT * from mensajes;";
		$result = $conn->query($sql);




		if ($result->num_rows > 0) {


			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				//echo ("<td>" . $row["mens_id"] . "</td>");
				echo ("<td>" . $row["mens_remite"] . "</td>");
				echo ("<td>" . $row["mens_destin"] . "</td>");
				echo ("<td>" . $row["mens_asunto"] . "</td>");
				echo ("<td>" . $row["mens_mensaje"] . "</td>");
				echo ("<td>" . $row["mens_fecEnv"] . "</td>");
				echo ("<td> <a href = ../controladores/abrirmensaje.php?codigo=" . $row['mens_id'] . "&mail=" . $_GET['mail'] .">ABRIR MENSAJE</a>" . " </td>");
				echo ("<td> <a href = ../controladores/borrarmensaje.php?codigo=" . $row['mens_id'] . "&mail=" . $_GET['mail'] .  ">BORRAR MENSAJE</a>" . " </td>");
				echo ("</tr>");
			}
		} else {
			echo "<tr>";
			echo ("<td colspan='6'>No existe ningún mensaje. </td>");
			echo ("</tr>");
		}



		$conn->close();
		?>

	</table>
	</section>>

	<footer>
		<p>Diego Rodríguez A</p>
		<p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
		<p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
		<p>© Todos los derechos reservados</p>
	</footer>


</body>

</html>