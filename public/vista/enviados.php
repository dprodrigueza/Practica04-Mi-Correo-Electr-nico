<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>ENVIADOS USER</title>
</head>

<body>


    <h1></h1>

    <?php

    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    echo "<header>";
    echo "<a href= index.php?mail=$_GET[mail]> MENSAJES RECIBIDOS </a>";
    echo "<br/>";
    echo "<a href= enviados.php?mail=$_GET[mail]>MENSAJES ENVIADOS</a>";
    echo "<br/>";
    echo "<a href= ../../login/login.php>CERRAR SESION</a>";
    echo "<br/>";
    echo "</header>";

    ?>



    <table style="width: 100%" border="1">
        <tr>
            <th>REMITENTE</th>
            <th>ASUNTO</th>
            <th>MENSAJE</th>
            <th>FECHA ENVIO</th>
            <th colspan="2">ACCIONES</th>

        </tr>


        <?php
        include('../../config/conexionDB.php');
        $mail = $_GET["mail"];
        $sql = "SELECT * from mensajes where mens_remite='$mail';";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                //echo ("<td>" . $row["mens_id"] . "</td>");
                //echo ("<td>" . $row["mens_remite"] . "</td>");
                echo ("<td>" . $row["mens_destin"] . "</td>");
                echo ("<td>" . $row["mens_asunto"] . "</td>");
                echo ("<td>" . $row["mens_mensaje"] . "</td>");
                echo ("<td>" . $row["mens_fecEnv"] . "</td>");
                echo ("<td> <a href = ../controladores/abrirmensaje.php?codigo=" . $row['mens_id'] . "&mail=$_GET[mail]>ABRIR MENSAJE</a>" . " </td>");
                echo ("<td> <a href = ../controladores/borrarmensaje.php?codigo=" . $row['mens_id'] . "&mail=$_GET[mail]>BORRAR MENSAJE</a>" . " </td>");
                echo ("</tr>");
            }
        } else {
            echo "<tr>";
            echo ("<td colspan='5'>No existe ningún mensaje enviado en su bandeja. </td>");
            echo ("</tr>");
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