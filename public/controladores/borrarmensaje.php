<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>BORRAR MENSAJE</title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
        header("Location: ../../login/login.php");
    }

    ?>




        <?php
        include('../../config/conexionDB.php');

        $cod = $_GET["codigo"];

        $sql = "DELETE FROM mensajes WHERE mens_id = $cod;";
        $result = $conn->query($sql);

        

        $conn->close();


        header ("Location: ../vista/index.php?mail=$_GET[mail]");
        ?>







</body>

</html>