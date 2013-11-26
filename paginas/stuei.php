<?php
	//Requerimiento de archivos de consulta y html
	# Con este archivo se evita requerir las clases desde los archivos
	# y hacer session_start()
    require("../lib/config/config.php");

	//Hago instancia las clases Db y Html
	$db = Db::getInstance();
	#$index = Index::getInstance();
	$template = Templates::getInstance($_SESSION['estilo']);
	
	//Armar el html
	$mensaje = '
   	 	<h2>Soporte técnico a usuarios y equipos I</h2>
	    <p>Hola! Bienvenidos al Software Educativo: Soporte Tecnico a Usuarios y Equipos (SESTUE).</p>
        <p>En esta aplicacion aprendera como realizar un trabajo de investigacion, a traves de las normas mas conocidas para trabajos de investigacion y tesis UPEL y APA, y el Manual del Colegio Universitario Francisco de Miranda.</p>
        <p>En el menu de arriba contiene de manera general lo que integra y aborda SESTUE </p>
		';
	//salida html
	print $template->getPage('SESTUE | Soporte Técnico a Usuarios y Equipos I', $mensaje);
	
?>
