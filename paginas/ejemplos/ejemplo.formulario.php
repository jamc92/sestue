<?php
	//No ver errores
	error_reporting(1);

	//Requerimiento de archivos de clases
	//Clase de consulta a base de datos
	//require("../clases/db.class.php");
	//Clase que genera el codigo html de la pagina
	require("../../clases/index.class.php");
	//Clase que genera los formularios en html a traves de objetos
	require("../../clases/formulario.class.php");

	//Objetos que seran usados en el archivo
	//$db = Db::getInstance();
	$index = Index::getInstance();

	//Consultar en base de datos
	//Armar el sql
	//$sql = "SELECT c_alias_pk FROM t_usuarios";
	//Guardar en una variable la matriz que envia la consulta
	//$usuarios = $db->select($sql);

	//Objeto del formulario a crear
	$formularioEjemplo = new Formulario(/*Nombre de formulario*/ "formulario",
										/*Pagina de accion*/ "formulario.accion.php",
										/*Metodo del formulario*/ "post",
										/*Clase para CSS*/ "clase",
										/*Id para CSS*/ "id",
										/*Atributos extras*/ "");
	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(3);

	//Agregar leyenda del formulario
	$formularioEjemplo->agregarLeyenda(/*Titulo de la leyenda*/ "Ejemplo Titulo",
										/*Clase para CSS*/ 0,
										/*Id para CSS*/ 0,
										/*Alineacion*/ "center");

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(3);

	//Agregar un input
	//atributos guardados en una variable
	$atributosExtraNombreApellido	= 'maxlength=10 autofocus required';
	$formularioEjemplo->agregarInput(/*Tipo de input*/ "text",
							/*Nombre de input*/ "nombre-apellido",
							/*Valor de input*/ "",
							/*Mensaje del input*/ "Nombre y Apellido",
							/*Clase para CSS*/ "",
							/*Id para CSS*/ "",
							/*Atributos extras del input*/ $atributosExtraNombreApellido);
	
	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(3);

	//Agregar un select
	//atributos guardados en una variable
	$atributosExtraSelect = "";
	$formularioEjemplo->agregarSelect(/*Nombre del select*/ "sexo",
							/*Tipo del select*/ null,
							/*Clase para CSS*/ "",
							/*Id para CSS*/ "",
							/*Atributos extras del select*/ $atributosExtraSelect);
	//Agregar las opciones del select

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(4);

	$formularioEjemplo->agregarOpcSel(/*Valor de la opcion*/ "",
									/*Mensaje de la opcion*/ "Seleccione");

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(4);

	$formularioEjemplo->agregarOpcSel(/*Valor de la opcion*/ "Femenino",
									/*Mensaje de la opcion*/ "Femenino");

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(4);

	$formularioEjemplo->agregarOpcSel(/*Valor de la opcion*/ "Masculino",
									/*Mensaje de la opcion*/ "Masculino");

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(3);

	$formularioEjemplo->cerrarSelect();

	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(3);

	$formularioEjemplo->agregarInput(/*Tipo de input*/ "Reset",
							/*Nombre de input*/ "borrar",
							/*Valor de input*/ "Borrar",
							/*Mensaje del input*/ "",
							/*Clase para CSS*/ "",
							/*Id para CSS*/ "",
							/*Atributos extras del input*/ "");	

	$formularioEjemplo->agregarInput(/*Tipo de input*/ "submit",
							/*Nombre de input*/ "enviar",
							/*Valor de input*/ "Enviar",
							/*Mensaje del input*/ "",
							/*Clase para CSS*/ "",
							/*Id para CSS*/ "",
							/*Atributos extras del input*/ "");	
	
	//Dar salto de linea <br>\n
	$formularioEjemplo->ln(1);
	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(2);

	//Cerrar el leyenda
	$formularioEjemplo->cerrarLeyenda();

	//Dar (valor) tabulacion al html
	$formularioEjemplo->tab(2);

	//Cerrar el formulario
	$formularioEjemplo->cerrarFormulario();
	//Guardar en una variable el codigo html del formulario
	$formularioEjemploHtml = $formularioEjemplo->obtenerHtml();

	$index->construirHtml(/*Titulo de la pagina*/"Ejemplo",
						/*Nivel de usuario para menu*/ 0,
						/*Contenido html del formulario o demas html de la pagina*/ $formularioEjemploHtml,
						/*Pie de pagina*/ "Pie de pagina");
?>