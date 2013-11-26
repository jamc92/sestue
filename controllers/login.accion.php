<?php
	//Requerimiento de archivos de consulta y html
	# Con este archivo se evita requerir las clases desde los archivos
	# y hacer session_start()
    require("../lib/config/config.php");
	

	//Objetos que seran usados en el archivo
	$db = Db::getInstance();
	$usuarioSesion = UsuarioSesion::getInstance();

	if (isset($_POST["entrar"])){

		$user = $_POST["user"];
		$pass = $_POST["password"];

		$session = "SELECT c_alias_pk, c_clave, c_nombres, c_apellidos, c_rol, c_estilo_css_pag FROM t_usuarios WHERE c_alias_pk='".$user."' AND c_clave=MD5('".$pass."')";
		$result_session = $db->select($session);

		if (!$result_session){
			echo "<script>
					alert('Usuario no encontrado o no coincide con la clave');
					location.href='../admin/index.sestue';
			</script>";
		}
		else
		{
			$usuarioSesion->setUsuarioSesion($result_session[0][0], $result_session[0][4], $result_session[0][2]." ".$result_session[0][3]);
			$_SESSION['objeto'] = $usuarioSesion;
			if($result_session[0][5])
				$_SESSION['estilo'] = $result_session[0][5];
			else
				$_SESSION['estilo'] = 'default';
			header("location:../admin/index.sestue");
		}
		
	}
	else{
		header("location:../admin/index.sestue");
	}
?>
