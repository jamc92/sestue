<?php

    //Requerimiento de archivos de consulta y html
    # Con este archivo se evita requerir las clases desde los archivos
    # y hacer session_start()
    require("../lib/config/config.php");

    //Hago instancia las clases Db y Html
    $db = Db::getInstance();
    #$index = Index::getInstance();
    $template = Templates::getInstance($_SESSION['estilo']);

    //Armar el formulario
    //Instanciamos un formulario de la clase Formulario
    $formPreg = new Formulario("pregunta", "preg-resp.php", "post", 0, "registro-usuario", 0, 0);
    $formPreg->agregarLeyenda("<h3>Preguntar</h3>", 0, 0, 0);
    $formPreg->tab(4);
    $formPreg->agregarInput("text", "pregunta", "", "Introduzca su pregunta", 0, "input-text", 0);
    $formPreg->agregarInput("submit", "buscar", "Buscar", 0, 0, 0, 0);
    $formPreg->ln();
    $formPreg->tab(3);
    $formPreg->cerrarLeyenda();
    $formPreg->tab(2);
    $formPreg->cerrarFormulario();
    $formPregHtml = $formPreg->obtenerHtml();
    //salida html
    if (isset($_POST["buscar"])){
    $formPregHtml = "Busqueda";
    }
    #$index->construirHtml("SESTUE| Preguntas", $datosUser[1], $formPregHtml, $datosUser[2]);
    print $template->getPage('SESTUE | Preguntas', $formPregHtml);
?>
