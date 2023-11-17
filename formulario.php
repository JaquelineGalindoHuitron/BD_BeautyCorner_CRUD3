<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
	<label for="nomServicio">Servicio:</label>
			<input class="form-control" name="nomServicio" required type="text" id="nomServicio" placeholder="Escribe el Servicio">

			<label for="descripcion">Descripción:</label>
			<input class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Descripción">

			<label for="idempleado">ID del empleado:</label>
			<input class="form-control" name="idempleado" required type="text" id="idempleado" placeholder="ID del empleado">

			<label for="direccion">Dirección:</label>
			<input class="form-control" name="direccion" required type="text" id="direccion" placeholder="Dirección">

			<label for="telefono">Telefono:</label>
			<input class="form-control" name="telefono" required type="text" id="telefono" placeholder="Escribe el Telefono">

			<label for="precio">Precio:</label>
			<input class="form-control" name="precio" required type="text" id="precio" placeholder="Escribe el Precio">

			<label for="disponible">Disponible:</label>
			<input class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">
			

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>