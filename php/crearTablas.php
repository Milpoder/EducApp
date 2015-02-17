<?php
$mysqli = new mysqli('educapp.no-ip.info', 'admin', '1234', 'educa');

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$conexion = @mysqli_connect('educapp.no-ip.info', 'admin', '1234', 'educa');
if($conexion){
	echo "Conectado a la base de datos!!!\n";
}else{
	die("No pudo conectarse:" . mysqli_error() . "\n");
}

mysqli_select_db($conexion, "educa");

$docenteImparte = "CREATE TABLE educa.docenteImparte(
	Usuario varchar(20),
	Contrasenia varchar(20) NOT NULL,
	Nombre varchar(30) NOT NULL,
	Apellidos varchar(60),
	Localidad varchar(20),
	CorreoInstitucional varchar(40) NOT NULL UNIQUE,
	NumeroDeTelefono varchar(20),
	Despacho varchar(10),
	InstitucionOAcademia varchar(50),

	PRIMARY KEY (Usuario)
	)
";

if($docenteImparte){
	echo "Tabla docenteImparte creada!\n";
}else{
	die("No pudo crear la tabla:" . mysqli_error() . "\n");
}

$asignaturas = "CREATE TABLE educa.asignaturas(
	Nombre varchar(50) NOT NULL,
	Codigo varchar(20),
	NivelAcademico varchar(40) NOT NULL,

	PRIMARY KEY (Codigo)
	)
";

if($asignaturas){
	echo "Tabla asignaturas creada!\n";
}else{
	die("No pudo crear la tabla:" . mysqli_error() . "\n");
}

$calificaciones = "CREATE TABLE educa.calificaciones(
	Examenes float,
	Practicas float,
	Trabajos float,
	Ejercicios float
	)
";

if($calificaciones){
	echo "Tabla calificaciones creada!\n";
}else{
	die("No pudo crear la tabla:" . mysqli_error() . "\n");
}

$alumnoTieneCalificaciones = "CREATE TABLE educa.alumnoTieneCalificaciones(
	Nombre varchar(30) NOT NULL,
	Apellidos varchar(60) NOT NULL,
	DNI varchar(10),
	CorreoInstitucional varchar(40) NOT NULL UNIQUE,
	Localidad varchar(20),
	fkExamenes float REFERENCES educa.calificaciones(Examenes),
	fkPracticas float REFERENCES educa.calificaciones(Practicas),
	fkTrabajos float REFERENCES educa.calificaciones(Trabajos),
	fkEjercicios float REFERENCES educa.calificaciones(Ejercicios),

	PRIMARY KEY (DNI)
	)
";

if($alumnoTieneCalificaciones){
	echo "Tabla alumnoTieneCalificaciones creada!\n";
}else{
	die("No pudo crear la tabla:" . mysqli_error() . "\n");
}

mysqli_query($conexion, $docenteImparte);
mysqli_query($conexion, $asignaturas);
mysqli_query($conexion, $calificaciones);
mysqli_query($conexion, $alumnoTieneCalificaciones);
mysqli_close($conexion);

?>