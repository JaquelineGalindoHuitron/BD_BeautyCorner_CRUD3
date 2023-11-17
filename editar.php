<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM servicios WHERE id = ?;");
$sentencia->execute([$id]);
$servicio = $sentencia->fetch(PDO::FETCH_OBJ);
if($servicio === FALSE){
	echo "¡No existe algún servicio con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar servicio con el ID <?php echo $servicio->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
			<label for="nomServicio">Servicio:</label>
			<input value="<?php echo $servicio->nomServicio ?>" class="form-control" name="nomServicio" required type="text" id="nomServicio" placeholder="Escribe el Servicio">

			<label for="descripcion">Descripción:</label>
			<input value="<?php echo $servicio->descripcion ?>" class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Descripción">

			<label for="idempleado">ID del empleado:</label>
			<input value="<?php echo $servicio->idempleado ?>" class="form-control" name="idempleado" required type="text" id="idempleado" placeholder="ID del empleado">

			<label for="direccion">Dirección:</label>
			<input value="<?php echo $servicio->direccion ?>" class="form-control" name="direccion" required type="text" id="direccion" placeholder="Dirección">

			<label for="telefono">Telefono:</label>
			<input value="<?php echo $servicio->telefono ?>" class="form-control" name="telefono" required type="text" id="telefono" placeholder="Escribe el Telefono">

			<label for="precio">Precio:</label>
			<input value="<?php echo $servicio->precio ?>" class="form-control" name="precio" required type="text" id="precio" placeholder="Escribe el Precio">

			<label for="disponible">Disponible:</label>
			<input value="<?php echo $servicio->disponible ?>" class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
