<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listar datos de Usuarios.</title>
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


    <table id="contenido" style="width: 100%" border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>E-MAIL</th>
            <th>ROL</th>
            <th colspan="3">ACCIONES</th>

        </tr>


        <?php
        include('../../config/conexionDB.php');

        $sql = "SELECT * from usuarios where user_del = 'N';";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo ("<td>" . $row["user_nombre"] . "</td>");
                echo ("<td>" . $row["user_apellido"] . "</td>");
                echo ("<td>" . $row["user_telefono"] . "</td>");
                echo ("<td>" . $row["user_email"] . "</td>");
                echo ("<td>" . $row["user_rol"] . "</td>");
                echo ("<td> <a href = ../controladores/eliminarUsu.php?mail=" . $row["user_email"] . "&adm=". $_GET['mail'] . ">ELIMINAR</a>" . " </td>");
                echo ("<td> <a href=actualizar.php?mail=" . $row["user_email"] . "&adm=". $_GET['mail'] . ">Modificar</a> </td>");
                echo ("</tr>");
            }
        } else {
            echo "<tr>";
            echo ("<td colspan='7'>No existen usuarios registrados </td>");
            echo ("</tr>");
        }



        $conn->close();
        ?>


    </table>




</body>

</html>