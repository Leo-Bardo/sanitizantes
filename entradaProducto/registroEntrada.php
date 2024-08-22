<?php
include('../conexion.php');

$con = conectar();

if ($con) {
$nombreProveedor = $_POST['nombreProveedor'];
//******** revisar formato de fecha, ya que según el servidor Uncaught mysqli_sql_exception: Incorrect date value: '1959' for column `bdaguidasan`.`entrada`.`fecha` at row 1
$fecha = $_POST['fecha'];
$receptor = $_POST['receptor'];
$areaSolicita = $_POST['areaSolicita'];
$turno = $_POST['turno'];
$produccionCurso = $_POST['nombreProducto'];
$sanitizante = $_POST['sanitizante'];
$cantidadRecibida = $_POST['cantidadRecibida'];

    $fecha = date("Ymd");



    $sql = "INSERT INTO entrada (nombreProveedor, fecha, receptor, area, turno, produccionCurso, sanitizante, cantidadRecibida) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssssssi", $nombreProveedor, $fecha, $receptor, $areaSolicita, $turno, $produccionCurso, $sanitizante, $cantidadRecibida);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Cambios subidos correctamente";
        } else {
            $response["message"] = "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $response["message"] = "Error en la preparación de la consulta: " . $con->error;
    }
    $con->close();
}
?>