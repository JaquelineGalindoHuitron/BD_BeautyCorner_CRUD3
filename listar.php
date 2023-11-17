<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM  servicios;");
$servicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Servicios</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Servicio</th>
					<th>Descripción</th>
					<th>ID empleado</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Precio</th>
					<th>Disponible</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($servicios as $servicio){ ?>
				<tr>
					<td><?php echo $servicio->id ?></td>
					<td><?php echo $servicio->nomServicio ?></td>
					<td><?php echo $servicio->descripcion ?></td>
					<td><?php echo $servicio->idempleado ?></td>
					<td><?php echo $servicio->direccion ?></td>
					<td><?php echo $servicio->telefono ?></td>
					<td><?php echo $servicio->precio ?></td>
					<td><?php echo $servicio->disponible ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $servicio->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $servicio->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>