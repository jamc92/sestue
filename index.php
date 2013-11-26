<?php
	//Requerimiento de los ficheros de las clases que se usaran en el archivo
	include_once "lib/config/config.php";

	//Objetos a usar en el archivo
	$db = Db::getInstance();

	//Consultar si existen usuarios nuevos ademas del administrador
	$sql = "SELECT c_alias_pk FROM t_usuarios";
	$usuarios = $db->select($sql);
	
	if (!$usuarios[0]){
		$insertAdmin = "INSERT INTO `t_usuarios` (`c_cedula_pk` , `c_carnet_pk` , `c_nombres` , `c_apellidos` , `c_alias_pk` , `c_clave` , `c_palabra_secreta` , `c_rol` , `c_estilo_css_pag` )
													VALUES ( '1', '1', 'Administrador', 'del Sistema', 'admin', MD5( 'admin' ) , 'admin', '5', '' )
						";
		if($db->ejecutarSql($insertAdmin)){
			header("location:paginas");
		}
		else{
			echo '<font color="red"><h1>No se pudo configurar el administrador del sistema.</h1></font>';
		}
	}
	else
		header("location:paginas");
?>
