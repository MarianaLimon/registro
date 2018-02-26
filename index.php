<?php
    require ('conexion.php');
    $query = "SELECT id_estado, name_estado FROM estados ORDER BY name_estado asc";
    $resultado = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registro PromoXtreme</title>
        <script language="javascript" src="js/jquery-3.3.1.min.js"></script>
        <LINK REL=StyleSheet HREF="/css/style.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body>
    <?php
    if (isset($_GET['aid']) && is_numeric($_GET['aid'])) {
        $aid = (int) $_GET['aid'];
    } else {
        $aid = 1;
    }
    // conecxion bd
    $mysqli = new mysqli('localhost', 'xtremepower', 'mdmM4rketing', 'xtremepromo');
    $acentos = $mysqli->query("SET NAMES 'utf8'");
    // falla al conectar con la base
    if ($mysqli->connect_errno) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";

        exit;
    }
    // consulta SQL
    $sql = "SELECT id_estado, name_estado FROM estados WHERE id_estado = $aid";
    if (!$resultado = $mysqli->query($sql)) {
        // mensaje para consulta inservible.
        echo "Lo sentimos, este sitio web está experimentando problemas.";

        // obtener información del error
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }
    // resultado de la consulta
    if ($resultado->num_rows === 0) {
        // consulta fracasada
        echo "Lo sentimos. No se pudo encontrar una coincidencia para el ID $aid. Inténtelo de nuevo.";
        exit;
    }
    // manejo de errores
    $sql = "SELECT id_estado, name_estado FROM estados ORDER BY name_estado asc";
    if (!$resultado = $mysqli->query($sql)) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    }
    // imprimir resultado de consulta
    echo "<form id=\"combo\" name=\"combo\" action=\"guarda.php\" method=\"post\">";
    echo "<div>";
    ?>

    <input type="text" name="name" id="name" placeholder="Nombre..." value=""><br><br>
    <input type="email" name="mail" id="mail" placeholder="E-mail..." value=""><br><br>
    <input type="tel" name="tel" id="tel" placeholder="Teléfono..." value=""><br><br>

    <?php
    echo "<select id=\"cbx_estado\" name=\"cbx_estado\">";
    echo "<option value=\"0\">Seleccionar estado</option>";

    while ($estado = $resultado->fetch_assoc()) { ?>

        <option value="<?php echo $estado['id_estado']; ?>"><?php echo $estado['name_estado']; ?></option>

    <?php }
    echo "</select>";
    ?>

    <br><br><input type="number" name="numtiket" id="numtiket" placeholder="Número de tiket..." value=""><br><br>
    Carga una fotografía de tu tiket<br>
    <input type="file" id="imgtiket" name="imgtiket" ><br><br>
    <input type="submit" id="enviar" name="enviar" value="Guardar">

    <?php
    echo "</form>";

    // cerrar conexion
    $resultado->free();
    $mysqli->close();
    ?>

    </body>
</html>


