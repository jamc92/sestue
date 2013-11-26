<?php

/**
 * Descripción:
 * Este es el archivo de not found
 * @author Ramón Serrano
 */
include '../../lib/config/config.php';
$t = Templates::getInstance($_SESSION['estilo']);

$contenido = '<div class="jumbotron">
   <h1>

        Error 404. Archivo no encontrado

    </h1>
    <p>
       La página que ha intentado acceder no existe.
    </p>
    <p>
        <button class="btn btn-primary btn-lg" onclick="location.href=\''.DIR_PAGES.'\'">
            Ir al inicio
        </button>

    </p>

</div>';
print $t->getPage('SESTUE | Error 404', $contenido);
#Para registrarse
#print $t->getPage('ejemplo', $contenido, 'registrarse');
#Para hacer login
#print $t->getPage('ejemplo', $contenido, 'login');