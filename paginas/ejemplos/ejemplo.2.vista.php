<?php
	require("../../clases/usuario.sesion.class.php");
	session_start();
	print_r($_SESSION['objeto']);
	$objUsuarioSesion = $_SESSION['objeto'];
	if($objUsuarioSesion->existeUsuario()){
		echo '<br>Existe';
	}
	else
		echo '<br>No existe';
?>