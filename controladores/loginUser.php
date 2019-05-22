<?php

        session_start();
 

        include('../config/conexionDB.php');
        $_SESSION['isLogged'] = FALSE;

        $email = isset($_POST["email"]) ? trim($_POST['email']) : null;
        $password = isset($_POST["contrasena"]) ? trim($_POST['contrasena']) : null;

        
        $sql = "SELECT * FROM usuarios WHERE user_email = '$email' and user_password = ('$password')";
        $aux = "SELECT user_rol from usuarios where user_email = '$email'";
    
        

        $result = $conn->query($sql);
        $aux = $conn->query($aux);
        $rol= $aux->fetch_assoc();
    
        

        if ($result->num_rows > 0) {
            
            if($rol["user_rol"]== 'ADMIN'){
                $_SESSION['isLoggedAdmin'] = TRUE;
                header("Location: ../admin/vista/index.php?mail=".$email);
            }else if($rol["user_rol"]== 'USER'){
                $_SESSION['isLogged'] = TRUE;
                header("Location: ../public/vista/index.php?mail=".$email);
            }
            
        } else {
            echo "<h1> Este Correo no existe, intentalo nuevamente. <a href= ../login/login.php>Inicia Sesion </a> </h1>";
            echo "<h1> Create una Cuenta! Es gratis. <a href= ../login/crear.html>Crear Cuenta</a> </h1>";
        }

        $conn->close();

        ?>