<?php
function conectar() {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "bdaguidasan";

    // Crear conexión
    $con = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($con->connect_error) {
        die("Conexión fallida: " . $con->connect_error);
    }

    return $con;
}
?>
