<?php
if (!isset($_POST["servicio"])) {
    return;
}

$servicio = $_POST["servicio"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM servicios WHERE nomservicio = ? LIMIT 1;");
$sentencia->execute([$servicio]);
$servicio = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$servicio) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($servicio->disponible < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar servicio dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->servicio === $servicio) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $servicio->cantidad = 1;
    $servicio->total = $servicio->precio;
    array_push($_SESSION["carrito"], $servicio);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $servicio->disponible) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
}
header("Location: ./vender.php");
