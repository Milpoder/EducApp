<? 
	$conn = mysqli_connect("educapp.no-ip.info","usuario","password"); 
	mysqli_select_db("educa",$conn); 
	$ssql = "SELECT * FROM usuario WHERE nombre_usuario='$usuario' and clave_usuario='$password'"; 
	$rs = mysqli_query($ssql,$conn); 
	
	if (mysqli_num_rows($rs)!=0){ 
   		session_start(); 
   		session_register("autentificado"); 
   		$autentificado = "SI"; 
   		header ("Location: aplicacion.php");	
	}
	else { 
   		header("Location: index.php?errorusuario=si"); 
	} 
	mysqli_free_result($rs); 
	mysqli_close($conn); 
?>
