<?php

/**
 * Descripción:
 * Este es el archivo de forbidden
 * @author Ramón Serrano
 */
include '../../lib/config/config.php';
$t = Templates::getInstance($_SESSION['estilo']);

$contenido = '<div class="jumbotron">
   <h1>

        Error 403. Acceso denegado

    </h1>
    <p>
       Usted no tiene permiso de acceder a este lugar.
    </p>
    <p>
        <button class="btn btn-primary btn-lg" onclick="location.href=\''.DIR_PAGES.'\'">
            Ir al inicio
        </button>

    </p>

</div>';
print $t->getPage('SESTUE | Error 403', $contenido);
#Para registrarse
#print $t->getPage('ejemplo', $contenido, 'registrarse');
#Para hacer login
#print $t->getPage('ejemplo', $contenido, 'login');