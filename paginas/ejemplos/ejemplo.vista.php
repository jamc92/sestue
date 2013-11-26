<?php
	//Incluimos el fichero de la clase
	require("../../clases/db.class.php");
	require("../../clases/index.class.php");
	require("../../clases/usuario.sesion.class.php");
	//Creamos la instancia de la clase. Ya estariamos conectados
	$bd = Db::getInstance();
	//Creamos la instancia de la clase para construir el html de la pagina
	$index = Index::getInstance();
	/* Creamos la instancia de la clase UsuarioSesion para saber 
	 * si hay usuario logueado o no permitir su ingreso a la pagina
	 */
	$usuarioSesion = UsuarioSesion::getInstance();
	$usuarioSesion->setUsuarioSesion("R","Administrador","Password");
	$usuarioSesionArray = $usuarioSesion->getUsuarioSesion();
	print_r($usuarioSesionArray);
	session_start();
	$_SESSION['objeto'] = $usuarioSesion;

	//Creamos la vista html
	$index->construirHtml("Titulo", "", 'Html  <a href="ejemplo.2.vista.php">Ir a</a>',"");
?>
