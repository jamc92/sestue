<?php

    //Requerimiento de archivos de consulta y html
    # Con este archivo se evita requerir las clases desde los archivos
    # y hacer session_start()
    include_once "../lib/config/config.php";

    //Objetos a usar en el archivo
    $db = Db::getInstance();
    #$index = Index::getInstance();
    $template = Templates::getInstance($_SESSION['estilo']);

    //Consultar si existen usuarios nuevos ademas del administrador
    $sql = "SELECT c_alias_pk FROM t_usuarios";
    $usuarios = $db->select($sql);

    if (!$usuarios[1]) {
        header('location:registrousuario.php');
    } else {
        $mensaje = '<div class="jumbotron">

                    <h2>¡Bienvenido!</h2>
            <p>¡Hola! Bienvenidos al Software Educativo: Soporte Técnico a Usuarios y Equipos (SESTUE).</p>
            <p>En esta aplicación aprenderá como realizar un trabajo de investigación, a través de las normas más conocidas para trabajos de investigación y tesis UPEL y APA, y el Manual del Colegio Universitario Francisco de Miranda.</p>
            <p>En el menú de arriba contiene de manera general lo que integra y aborda SESTUE</p>
            <p>Para ver todo el contenido de portal debe crear un usuario y luego iniciar sesión.</p>
                    </div>';
        //Mostrar Html
        #$index->construirHtml("SESTUE | Principal", 1, $mensaje, 0);
        print $template->getPage('SESTUE | Principal', $mensaje);
    }
?>
