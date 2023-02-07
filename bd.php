<?php

	$servidor="localhost";
	$BaseDeDatos="salud";
	$usuario="root";
	$contrasea="";

	try{
		$conexion= new PDO("mysql:host=$servidor;dbname=$BaseDeDatos",$usuario,$contrasea);
	}catch(Exeption $ex	)
	{
		echo  $ex->getMessage();
	}
?>