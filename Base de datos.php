<?php
$conexion = new mysqli("localhost", "root", "", "dreamtech");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$pago = $_POST['pago'];
$email = $_POST['email'];

$sql = "INSERT INTO clientes (dni, nombre, direccion, metodo_pago, email)
        VALUES ('$dni', '$nombre', '$direccion', '$pago', '$email')";

if ($conexion->query($sql) === TRUE) {
    echo "<h2>Compra realizada con éxito ✅</h2>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>