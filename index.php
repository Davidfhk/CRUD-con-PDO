<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	//Requerimos la conexion a la bbdd
		require "conexion.php";
	//creamos un resource en $conexion con la consulta
		$conexion = $pdo->query("SELECT * FROM datos_usuarios");
	//almacenamos en $registro un array de objetos, y asi luego poder usar sus propiedades
		$registro = $conexion->fetchAll(PDO::FETCH_OBJ);
		// var_dump($registro);
		echo "<br>";
	?>
	<table id="form">
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Dirección</td>
		</tr>

		<!-- recorremos el array de objetos -->
		
			<?php foreach($registro as $persona): ?>
		<tr>

		<!-- pintamos las propiedades de cada objeto en un td -->
				<td><?=$persona->id?></td>
				<td><?=$persona->nombre?></td>
				<td><?=$persona->apellido?></td>
				<td><?=$persona->direccion?></td>
				<td><a href="delete.php?id=<?=$persona->id ?>"><input type="button" name="del" value="borrar"></a></td>
				<td><input type="button" name="act" value="actualizar"></td>
		</tr>
			<?php endforeach ?>
		<form action="insert.php" method="POST">
		<tr>
			<td></td>
			<td><input type="text" name="name"></td>
			<td><input type="text" name="surname"></td>
			<td><input type="text" name="address"></td>
			<td><input type="submit" name="enviar" value="Enviar"></td>
		</tr>
		</form>
	</table>
</body>
</html>