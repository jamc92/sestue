<?php
	
	//Requerimiento de archivos de consulta y html
	# Con este archivo se evita requerir las clases desde los archivos
	# y hacer session_start()
    include_once "../lib/config/config.php";

	$DB = Db::getInstance();
		
	$index = Index::getInstance();
		
	#Hacer la consulta a la tabla de actividades

	$vista = "SELECT * FROM t_proy_activ WHERE c_id_pk = ".$_GET['iid'];
	$resultado = $DB->select($vista);

	$contenido = $resultado[0][3];

		$index->construirHtml("SESTUE | Vista de Actividad", 1, $contenido, null);


		
?>