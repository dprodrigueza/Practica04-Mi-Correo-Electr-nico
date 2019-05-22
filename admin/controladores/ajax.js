function buscarCorreo() {
    var referencia = document.getElementById("buscarR").value;
    var destino = document.getElementById("destinoMail").value;
    if (referencia == "") {

    } else {
        document.getElementById("tablaMail").innerHTML = "";
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tablaMail").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../controladores/buscarMail.php?mail=" + referencia, true);
        xmlhttp.send();
    }
    return false;
}