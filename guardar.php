<?php
// Configuración de conexión
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dreamtech";

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
// Es importante que el 'name' en el HTML coincida con estas llaves
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$pago = $_POST['pago'];
$email = $_POST['email'];

// Preparar la consulta SQL
// Nota: metodo_pago debe coincidir con el nombre de la columna en SQL
$sql = "INSERT INTO clientes (dni, nombre, direccion, metodo_pago, email) 
        VALUES ('$dni', '$nombre', '$direccion', '$pago', '$email')";

if ($conexion->query($sql) === TRUE) {
    echo "<div style='text-align:center; margin-top:50px; font-family:Arial;'>";
    echo "<h2>Compra realizada con éxito ✅</h2>";
    echo "<a href='index.html'>Volver al inicio</a>";
    echo "</div>";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar conexión
$conexion->close();
?>