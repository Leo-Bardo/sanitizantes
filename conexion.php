<?php
function conectar() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'bdaguidasan';
    $socket = '/opt/lampp/var/mysql/mysql.sock';
    
    $mysqli = new mysqli($host, $user, $password, $database, null, $socket);
    
    if ($mysqli->connect_errno) {
        die("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }
    
    return $mysqli;
}
?>