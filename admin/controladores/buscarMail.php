<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <table style="width: 100%" border="1">
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
        

        $mail = $_GET['mail'];

        

        $sql = "SELECT * from mensajes WHERE mens_remite LIKE '%$mail%';";
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
                echo ("<td> <a href = ../controladores/abrirmensaje.php?codigo=" . $row['mens_id'] . ">ABRIR MENSAJE</a>" . " </td>");
                echo ("<td> <a href = ../controladores/borrarmensaje.php?codigo=" . $row['mens_id'] . ">BORRAR MENSAJE</a>" . " </td>");
                echo ("</tr>");
            }
        } else {
            echo "<tr>";
            echo ("<td colspan='7'>No existen mensajes registrados </td>");
            echo ("</tr>");
        }


        $conn->close();
        ?>


    </table>

</body>

</html>