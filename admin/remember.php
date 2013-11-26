<?php
	//Requerimiento de archivos de consulta y html
	# Con este archivo se evita requerir las clases desde los archivos
	# y hacer session_start()
    require("../lib/config/config.php");
	//Objetos Db y Html
	$db = Db::getInstance();
	#$index = Index::getInstance();
	$template = Templates::getInstance($_SESSION['estilo']);
	//Consultar si existen usuarios nuevos ademas del administrador
	$sql = "SELECT c_alias_pk FROM t_usuarios";
	$usuarios = $db->select($sql);
	
	if (!$usuarios[1]){
		header('location:registrousuario.php');
	}
	elseif($_SESSION['objeto']){
		header("location:index.php");
	}
	else if($_GET["user"] && $_GET["ps"]){
		$mensaje = '    	
			<h2 align="center">Nueva contraseña</h2>
			<center>
			<form method="post" action="" autocomplete="off" class="form-signin">
			<table border="2" rules="no">
				<tr>
					<td>
						<input class="form-control" type="password" name="pass" onkeypress="return permite(event, 3)" placeholder="Introduce una nueva contraseña" required autofocus maxlength=8/>
					</td>
				</tr>
				<tr>
					<td>
						<input class="form-control" type="password" name="pass2" onkeypress="return permite(event, 3)" placeholder="Vuelve a introducir la nueva contraseña" required maxlength=8 onchange="validaPass()"/>
					</td>
				</tr>
				<tr>
					<td align="center">
						<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
					</td>
				</tr>
			</table>
			</form>
			</center>
		';
	}
	else{
		$mensaje = '    	
			<h2 align="center">Recordar contraseña</h2>
			<center>
			<form method="post" action="" autocomplete="off" class="form-signin">
			<table border="2" rules="no">
				<tr>
					<td>
						<input class="form-control" type="text" name="user" onkeypress="return permite(event, 2)" placeholder="Nombre/Alias de usuario" required autofocus maxlength=10/>
					</td>
				</tr>
				<tr>
					<td>
						<input class="form-control" type="text" name="psecreta" onkeypress="return permite(event, 2)" placeholder="Palabra secreta" required maxlength=32 />
					</td>
				</tr>
				<tr>
					<td align="center">
						<button type="submit" class="btn btn-primary" name="recordar">Validar</button>
					</td>
				</tr>
			</table>
			</form>
			</center>
		';
	}
	#$index->construirHtml("SESTUE | Recordar", 1, $mensaje, "");
	print $template->getPage("SESTUE | Recordar clave de usuario", $mensaje, 'recordar');
	//*************************************************************
	//print_r($usuarios);

	if (isset($_POST["recordar"])){

		$user = $_POST["user"];
		$psecreta = $_POST["psecreta"];

		$usuario = "SELECT c_alias_pk, c_palabra_secreta FROM t_usuarios WHERE c_alias_pk='".$user."' AND c_palabra_secreta='".$psecreta."'";
		$result_usuario = $db->select($usuario);

		if (!$result_usuario){
			echo "<script>
					alert('Usuario no encontrado o no coincide con la palabra secreta');
					location.href='remember.php';
			</script>";
		}
		else
		{
			echo "<script>
					location.href='remember.php?user=".$user."&ps=".$psecreta."';
				 </script>";
		}
		
	}
	else if(isset($_POST["guardar"])){
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];
		if ($pass == $pass2){
			if($db->ejecutarSql("UPDATE t_usuarios SET c_clave = MD5( '".$pass."' ) WHERE `c_alias_pk` = '".$_GET['user']."'")){
				echo "<script>
						alert('Contraseña nueva con éxito.');
						location.href='inicio.sesion.php';
					 </script>";	
			}
		}
	}
	
?>
