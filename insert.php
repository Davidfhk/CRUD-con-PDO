<?php
try{
	require "conexion.php";

	$name = $_POST['name'];
	$apell = $_POST['surname'];
	$direc = $_POST['address'];

	$conexion = $pdo->prepare("INSERT INTO `datos_usuarios`(`nombre`, `apellido`, `direccion`) VALUES (:name,:apell,:direc)");
	$conexion->bindValue(':name',$name);
	$conexion->bindValue(':apell',$apell);
	$conexion->bindValue(':direc',$direc);
	$conexion->execute();

	header('location:index.php');
}catch(Exception $e){
	die("Error " . $e->getMessage());
}