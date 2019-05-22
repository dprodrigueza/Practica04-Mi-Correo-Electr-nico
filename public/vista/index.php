<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>INDEX USER</title>

    <script type="text/javascript" src="../controladores/ajax.js"></script>
</head>

<body>




    <?php

    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    echo "<header>";
    echo "<a href= index.php?mail=$_GET[mail]> MENSAJES RECIBIDOS </a>";
    echo "<a href= enviados.php?mail=$_GET[mail]>MENSAJES ENVIADOS</a>";
    echo " <a  href=../../login/login.php> CERRAR SESION</a>";
    echo "</header>";

    echo "<section>";
    echo "<a href=enviar.php?mail=$_GET[mail]>REDACTAR MENSAJE</a>";
    echo "</section>";
    ?>


    <form id="busqueda" method="POST" onsubmit="return buscarCorreo()">
        <label> Buscar </label>
        <input type="text" id="buscarR" name="buscarR" placeholder="Ingrese un Remitente."> 
        <span id="mensajeBusqueda" class="error"></span>
        <input type="submit" id="btnBuscar" name="btnBuscar" value="BUSCAR"> 
        
    </form>


    <div id="tablaMails">
        <table id="tablaMail" style="width: 100%" border="1">
            <tr>
                <th>REMITENTE</th>
                <th>ASUNTO</th>
                <th>MENSAJE</th>
                <th>FECHA ENVIO</th>
                <th colspan="3">ACCIONES</th>

            </tr>


            <?php
            include('../../config/conexionDB.php');
            $mail = $_GET["mail"];
            $sql = "SELECT * from mensajes where mens_destin='$mail';";
            $result = $conn->query($sql);





            if ($result->num_rows > 0) {


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    //echo ("<td>" . $row["mens_id"] . "</td>");
                    echo ("<td>" . $row["mens_remite"] . "</td>");
                    //echo ("<td>" . $row["mens_destin"] . "</td>");
                    echo ("<td>" . $row["mens_asunto"] . "</td>");
                    echo ("<td>" . $row["mens_mensaje"] . "</td>");
                    echo ("<td>" . $row["mens_fecEnv"] . "</td>");
                    echo ("<td> <a href = ../controladores/abrirmensaje.php?codigo=" . $row['mens_id'] . ">ABRIR MENSAJE</a>" . " </td>");
                    echo ("<td> <a href = ../controladores/borrarmensaje.php?codigo=" . $row['mens_id'] . ">BORRAR MENSAJE</a>" . " </td>");
                    echo ("</tr>");
                }
            } else {
                echo "<tr>";
                echo ("<td colspan='5'>No existe ningún mensaje en su bandeja. </td>");
                echo ("</tr>");
            }



            $conn->close();
            ?>

        </table>
    </div>
    <footer>
        <p>Diego Rodríguez A</p>
        <p>e-mail:<a href="mailto:drodrigueza@est.ups.edu.ec">drodrigueza@est.ups.edu.ec </a></p>
        <p>Teléfono:<a href="tel:+593984053639">0984053639</a></p>
        <p>© Todos los derechos reservados</p>
    </footer>





</body>

</html>