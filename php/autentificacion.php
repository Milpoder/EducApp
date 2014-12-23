<? 
	$conn = mysql_connect("mysql.hostinger.es","usuario","password"); 
	mysql_select_db("u563240237_educa",$conn); 
	$ssql = "SELECT * FROM usuario WHERE nombre_usuario='$usuario' and clave_usuario='$contrasena'"; 
	$rs = mysql_query($ssql,$conn); 
	
	if (mysql_num_rows($rs)!=0){ 
   		session_start(); 
   		session_register("autentificado"); 
   		$autentificado = "SI"; 
   		header ("Location: aplicacion.php");	
	}
	else { 
   		header("Location: index.php?errorusuario=si"); 
	} 
	mysql_free_result($rs); 
	mysql_close($conn); 
?>
