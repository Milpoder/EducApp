<?php

$conexion = @mysqli_connect('educapp.no-ip.info', 'admin', '1234', 'educa');
if($conexion){
	echo "Conectado a la base de datos!!!\n";
}else{
	die("No pudo conectarse:" . mysqli_error() . "\n");
}

mysqli_select_db($conexion, "educa");

$sql = "INSERT INTO educa.docenteImparte(Usuario, Contrasenia, Nombre, CorreoInstitucional)
VALUES ('admin', '1234', 'admin', 'prueba@correo.com')";//ENCRIPTAR CONTRASENIA

if (mysqli_query($conexion, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);

?>