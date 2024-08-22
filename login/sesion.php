
<?php
	include 'conexion.php';
	$con = conectar();

	if (!$con) {
		die("Error de conexión: " . mysqli_connect_error());
	}
	$resultadoUsuario = $conn->query("SELECT codEmpleado FROM usuarios");
	$queyUsuario = fetch_assoc($resultadoUsuario);

	var_dump($queyUsuario);

	if ($resultadoUsuario->num_rows > 0) {
	while ($fila = $resultadoUsuario->fetch_assoc()) {
		echo "<option value='" . $fila["codEmpleado"] . "'>" . $fila["codEmpleado"] . "</option>";
	}
	} else {
		echo "<option value=''>No hay usuarios disponibles</option>";
	}
	$con->close();
?>