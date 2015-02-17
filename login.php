<!DOCTYPE html>
<html> 
	<head> 
		<meta charset="utf-8" />			
			<title>
				EducApp
			</title>
	</head> 
	<body BGCOLOR="#00BFFF"> 
		<h1 align="center">
			<IMG SRC="img/logotipoFinal1.jpg" WIDTH=200 HEIGHT=160>
		</h1> 
		<form action="menu.html" method="POST"> 
			<table align="center" width="225" cellspacing="2" cellpadding="2" border="0"> 
				<tr> 
					<td colspan="2" align="center" >
 					<?php
                            $mysqli = @mysqli_connect('educapp.no-ip.info', 'admin', '1234', 'educa');
                            if (!$mysqli) {
                                echo "Failed to connect to MySQL";
                            }

                            mysqli_select_db($mysqli,"educa");

                            if (isset($_REQUEST['user'])) {
                                $username = $_REQUEST['user'];

                            } else {
                                $username = "";
                            }

                            if (isset($_REQUEST['password'])) {

                                $password = $_REQUEST['password'];
                            } else {

                                $password = "";
                            }

                            $sql = "SELECT * from Socio WHERE Num_Socio LIKE '{$username}' AND contrasena LIKE '{$password}' LIMIT 1";
                                $result = $mysqli->query($sql);
                                if(isset($_POST["login"])){ 
                                    if (!$result->num_rows == 1) {
                                        echo '<div class="error">Su usuario o contraseña son incorrectas, intente nuevamente.</div>';
                                    } else {
                                        echo "<p>Logged in successfully</p>";
                                        header("location:menu.html");
                                    }
                                }
                             ?>
				</td> 
				</tr> 
				<tr> 
					<td align="right">Usuario:</td> 
					<td><input type="Text" name="usuario" size="8" maxlength="50"></td> 
				</tr> 
				<tr> 
					<td align="right">Contraseña:</td> 
					<td><input type="password" name="contrasena" size="8" maxlength="50"></td> 
				</tr> 
				<tr> 
					<td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td> 
				</tr> 
			</table> 
		</form> 
	</body> 
</html>
