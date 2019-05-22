<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>MENSAJE NUEVO</title>
    <script type="text/javascript" src="../controladores/funcion.js"></script>


</head>

<body>
    <form id="envioMensaje" method="POST" action="../controladores/enviarmensaje.php">
        <h1>Enviar nuevo Mensaje.</h1>


        <p>
            <input type="text" id="labelRemitente" name="labelRemitente" value="<?php echo $_GET['mail']; ?>" hidden> <br />
            Destinatario (*):
            <input type="text" id="destin" name="destin" placeholder="Ingrese el e-mail destino.." required onblur="validarMail(this)">
            <span id="mensajedestin" class="error"></span>
        </p>
        <br />
        <p>Asunto:
            <input type="text" id="asunto" name="asunto" placeholder="Ingrese un asunto">

        </p>
        <br />
        <p> MENSAJE (*):
            <input type="text" id="mensaje" name="mensaje">
        </p>
        <br />
        <button type="submit" id="btnEnviar"> ENVIAR </button>
        <button type="button" id="btnCancelar"> CANCELAR </button>
        <br>
    </form>


    <script type="text/javascript">
        function objetoAjax() {
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {

                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }

            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            return xmlhttp;
        }

        </body>



        </html>