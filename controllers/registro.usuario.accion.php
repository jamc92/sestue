<?php
	
	//Requerimiento de archivos de consulta y html
    require("../lib/config/config.php");
	

	//Objetos que seran usados en el archivo
	$db = Db::getInstance();

	if(isset($_POST['guardar'])){
		$sql = "INSERT INTO `t_usuarios` VALUES ('".$_POST['ci']."','".$_POST['carnet']."','".$_POST['names']."','".$_POST['lastname']."','".$_POST['user']."',MD5('".$_POST['password']."'),'".$_POST['psecreta']."', '".$_POST['rol']."', '')";
		$sqlAlias = "SELECT c_alias_pk FROM t_usuarios WHERE c_alias_pk='".$_POST['user']."'";
		$sqlCedula = "SELECT c_cedula_pk FROM t_usuarios WHERE c_cedula_pk='".$_POST['ci']."'";
		$sqlCarnet = "SELECT c_cedula_pk FROM t_usuarios WHERE c_carnet_pk='".$_POST['carnet']."'";
		//echo $sqlAlias."<br>".$sqlCedula."<br>".$sqlCarnet."<br>";
		if($db->select($sqlAlias)){
			echo "<script>
					alert('Nombre de usuario ya existente.'); 
					location.href='../paginas/registrousuario.php'
				  </script>";
		}
		else if($db->select($sqlCedula)){
			echo "<script> 
					alert('Cedula de usuario ya registrada.'); 
					location.href='../paginas/registrousuario.php'
				  </script>";
		}
		else if($db->select($sqlCarnet)){
			echo "<script> 
					alert('Carnet de usuario ya registrado.'); 
					location.href='../paginas/registrousuario.php'
				  </script>";
		}
		else if ($db->ejecutarSql($sql)){
			echo "<script> 
					alert('Registro exitoso');
					location.href='../paginas';
				  </script>";
		}
		else{
			echo "<script>
					alert('Ocurrio un problema en la base de datos y no se guardaron sus datos');
					location.href='../paginas/registrousuario.php'
				</script>
				";
		}
	}
	else{
		header("location:../paginas/registrousuario.php");
	}
?>
