<!-- CONFIGURAR LOS SELECT PARA TRAER LOS DATOS DESDE LA BASE DE DATOS -->

<?php 
include('../conexion.php');
$con = conectar();
if ($con) {
    $sqlProducto = "SELECT idProducto, nombreProducto FROM productos";
    $resultadoProducto = $con->query($sqlProducto);



    $fila = $resultadoProducto->fetch_assoc();
    $producto = $fila['nombreProducto'];
}
else{
    echo "Ya veremos";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRADA-PRODUCTO</title>
    <!-- ELIMINAR CDN -->
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link rel="stylesheet" type="text/css" href="../styles/cartastilo.css">
        <link rel="stylesheet" href="../estilos/formStyles.css">
</head>
<body>
    <!-- Incluir la barra de navegación -->
    <div id="navbar-container"></div>
    <div class="container">
        <div class="title">ENTRADAS</div>
        <form action="registroEntrada.php" method="POST">
            <div class="user-details">


                <div class="input-box">
                    <label class="details">Proveedor:</label>
                    <!-- IMPORTANTE ATENDER! ALIMENTAR SELECT DESDE LA BBDD -->
                    <select id="nombreProveedor" name="nombreProveedor" >
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="IKMDL">INDUSTRIAL KM DE LEON</option>
                        <option value="CATSA">CATSA</option>
                        <option value="SANICHEM">SANICHEM</option>
                        <option value="IPS">IPS</option>
                        <option value="BETAPROCESOS">BETA PROCESOS</option>
                    </select>
                </div>


                <div class="input-box">
                    <span class="details">Fecha:</span>
                    <!--
                        -> Modificar de fecha para asignar actual automaticamente dejar opción para cambio
                    -->
                    <input type="date" id="fecha" name="fecha" value="" >
                </div>


                <div class="input-box">
                    <span class="details">Recibe:</span>
                    <input type="text" placeholder="Ingresa nombre" name="receptor" >
                </div>


                <div class="input-box">
                    <label class="details">Área Solicitante:</label>
                    <select id="area" name="areaSolicita" >
                        <option value="" selected disabled>- seleccione un área -</option>
                        <optgroup label="Almacenes y Áreas de Almacenamiento">
                            <option value="ASTZ">Almacén Sanitizantes</option>
                            <option value="AMP">Almacén MP</option>
                            <option value="APT">Almacén PT</option>
                            <option value="EMB">Embalaje</option>
                            <option value="ENV">Envasado</option>
                            <option value="FLEX100">A3 Flex 100</option>
                            <option value="TBA81LB">TBA8 1L Base</option>
                            <option value="TBA81LS">TBA8 1L Slim</option>
                            <option value="FLEXEDGE">A3 Flex Edge</option>
                            <option value="FLEXPRISMA">A3 Flex Prisma</option>
                            <option value="CFLEX">Compact Flex Prisma</option>
                        </optgroup>
                        <optgroup label="Oficinas y Servicios Generales">
                            <option value="ADM">Administración</option>
                            <option value="ING">Ingeniería</option>
                            <option value="IF">Inventario Físico</option>
                            <option value="LIM">Limpieza</option>
                            <option value="SHS">Seguridad, Higiene y Sanidad</option>
                            <option value="VIG">Vigilancia</option>
                        </optgroup>
                        <optgroup label="Producción y Mantenimiento">
                            <option value="AGRI">Agrícola/RN</option>
                            <option value="AC">Aseguramiento de Calidad</option>
                            <option value="CONS">Construcción</option>
                            <option value="CTAMB">Control Ambiental</option>
                            <option value="MTS">Mantenimiento Servicios</option>
                            <option value="MTP">Mantenimiento TP</option>
                            <option value="MPR">Mantenimiento Procesos</option>
                            <option value="PREP">Preparación</option>
                            <option value="PES">Pesadas</option>
                            <option value="PTAR">PTAR</option>
                        </optgroup>
                        <optgroup label="Áreas Comunes y Otros">
                            <option value="BCV">Baño Casa de Visitas</option>
                            <option value="BC">Baño Comedor</option>
                            <option value="BT">Baño Transportistas</option>
                            <option value="BH">Baños Hombres</option>
                            <option value="BM">Baños Mujeres</option>
                            <option value="BO">Baños Oficinas</option>
                            <option value="CV">Casa de Visitas</option>
                            <option value="COM">Comedor</option>
                            <option value="PROM1">Past.Promato</option>
                            <option value="SPIRA1">Past.Spiraflo</option>
                            <option value="TAS">Tanque Acepticos</option>
                            <option value="VEH">Vehículos y Taller Mecánico</option>
                        </optgroup>
                    </select>
                </div>



                <div class="input-box">
                    <span class="details">Turno:</span>
                    <select id="turno" name="turno" >
                        <option value="" selected disabled>- seleccione un turno -</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="M">M</option>
                    </select>
                </div>




                <div class="input-box">
                    <span class="details">Producción en Curso:</span>
                    <select name="produccionCurso" >
                        <option value="" selected>- seleccione una producción -</option>
                        <?php
                        if ($resultadoProducto->num_rows > 0) {
                            while ($fila = $resultadoProducto->fetch_assoc()) {
                                echo "<option value='" . $fila["idProducto"] . "'>" . $fila["nombreProducto"] . "</option>";
                            }
                        }


                        ?>
                    </select>
                </div>




                <div class="input-box">
                    <span class="details">Sanitizante:</span>
                    <select name="sanitizante" >
                        <option value="" selected>- seleccione un producto -</option>
                        <optgroup label="ALCALINOS">
                            <option value="S10">CAUSTI FOAM CL</option>
                            <option value="S11">CAUSTI LC 200</option>
                            <option value="S14">HIPOCLORITO 13%</option>
                            <option value="S20">SOSA LIQUIDA 50%</option>
                            <option value="S24">LCC ALKA</option>
                        </optgroup>
                        <optgroup label="ACIDOS">
                            <option value="S02">CLORHIDRICO</option>
                            <option value="S03">NITRICO</option>
                            <option value="S04">SULFURICO</option>
                            <option value="S12">DESINOX FN</option>
                            <option value="S18">SANIPER 15%</option>
                            <option value="S25">STONE NF</option>
                        </optgroup>
                        <optgroup label="NEUTROS">
                            <option value="S07">BETA QUAT 4</option>
                            <option value="S08">BIO BASIC A</option>
                            <option value="S09">BIO TECH</option>
                            <option value="S13">GEL TROLL FOAM</option>
                            <option value="S15">ML-100 FOAM</option>
                            <option value="S29">SHAMPOO MANOS</option>
                            <option value="S31">FX3</option>
                        </optgroup>
                        <optgroup label="PEROXIDOS">
                            <option value="S23">PEROXIDO BATH</option>
                            <option value="S26">PER WASH</option>
                            <option value="S23B">PEROXIDO IPS</option>
                        </optgroup>
                        <optgroup label="OTROS">
                            <option value="S05">ALCOHOL</option>
                            <option value="S27">AGUA DESTILADA</option>
                            <option value="S28">THINNER</option>
                            <option value="S32">CAUSTI LC 200</option>
                            <option value="S33">HIPOCLORITO 13%</option>
                        </optgroup>
                        <optgroup label="MMPP">
                            <option value="S30">CLORHIDRICO 2N</option>
                        </optgroup>
                    </select>
                </div>



                <div class="input-box">
                    <span class="details">Cantidad Recibida:</span>
                    <input type="number" name="cantidadRecibida" min="1" >
                </div>
            </div>




            <div class="button">
                <input type="submit" value="ENVIAR">
            </div>



        </form>
    </div>
</body>
</html>