<?php
#Salir si alguno de los datos no está presente
if
(
!isset($_POST["nomServicio"]) || 
!isset($_POST["descripcion"]) || 
!isset($_POST["idempleado"]) || 
!isset($_POST["direccion"]) || 
!isset($_POST["telefono"]) || 
!isset($_POST["precio"])||
!isset($_POST["disponible"]))

 exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$nomServicio = $_POST["nomServicio"];
$descripcion = $_POST["descripcion"];
$idempleado = $_POST["idempleado"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$precio = $_POST["precio"];
$disponible = $_POST["disponible"];

$sentencia = $base_de_datos->prepare("INSERT INTO `servicios`(`nomServicio`, `descripcion`, `idempleado`, `direccion`, `telefono`, `precio`, `disponible`)  VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nomServicio, $descripcion, $idempleado, $direccion, $telefono, $precio, $disponible]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>