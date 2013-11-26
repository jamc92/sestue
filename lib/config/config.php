<?php 

/**
 * Descripcion de config
 * Fecha de creacion 05/10/2013
 * @author Ramon Serrano <ramon_calle-88@hotmail.com>
 */
//No ver errores de PHP
error_reporting(E_ALL);
//Variables de Base de Datos
defined("DIR")                    || define('DIR', $_SERVER['DOCUMENT_ROOT'] . "/sestue/");
defined("DIR_PAGES")              || define('DIR_PAGES', "http://".$_SERVER['HTTP_HOST']."/sestue/paginas/");
defined("DIR_ADMIN")              || define('DIR_ADMIN', "http://".$_SERVER['HTTP_HOST']."/sestue/admin/");
defined("APP_NAME")               || define("APP_NAME", "SESTUE");
defined("APP_VERSION")		  || define("APP_VERSION", "1.0");

/*define("SERVIDOR_BD", "sql102.eshost.es");
define("USUARIO_BD", "eshos_13988615");
define('PASS_BD', 'ramoncit');
define('BD', 'eshos_13988615_sestuebd');*/

/*defined("USUARIO_BD")             || define("SERVIDOR_BD", "sql102.260mb.net");
defined("USUARIO_BD")             || define("USUARIO_BD", "n260m_13975387");
defined("PASS_BD")                || define('PASS_BD', 'ramoncit');
defined("BD")                     || define('BD', 'n260m_13975387_sestuebd');*/

defined("SERVIDOR_BD")            || define("SERVIDOR_BD", $_SERVER['HTTP_HOST']);
defined("USUARIO_BD")             || define("USUARIO_BD", "root");
defined("PASS_BD")                || define('PASS_BD', '');
defined("BD")                     || define('BD', 'sestuebd');

defined("CLASS_DB")               || define('CLASS_DB', DIR . 'lib/clases/db.class.php');
defined("CLASS_UsuarioSesion")    || define('CLASS_UsuarioSesion', DIR . 'lib/clases/usuario.sesion.class.php');
defined("CLASS_Formulario")       || define('CLASS_Formulario', DIR . 'lib/clases/formulario.class.php');
defined("CLASS_Templates")        || define('CLASS_Templates', DIR . 'lib/clases/templates.class.php');
defined("CLASS_BOOTSTRAP_SESTUE") || define('CLASS_BOOTSTRAP_SESTUE', DIR . 'themes/bootstrap/bootstrap.sestue.class.php');
defined("CLASS_BOOTSTRAP_SBADMIN") || define('CLASS_BOOTSTRAP_SBADMIN', DIR . 'themes/bootstrap-sb-admin/bootstrap.sbadmin.class.php');
defined("CLASS_MODELS")           || define("CLASS_MODELS", DIR . "lib/clases/model/class.models.php");

require(CLASS_DB);
require(CLASS_UsuarioSesion);
require(CLASS_Formulario);
require(CLASS_Templates);
require(CLASS_BOOTSTRAP_SESTUE);
require(CLASS_BOOTSTRAP_SBADMIN);
require(CLASS_MODELS);

//Iniciar variables de sesion
# Siempre se debera hacer despues de requerir los archivos
session_start();
//Configuracion de CSS
if (!$_SESSION['estilo']) {
    define('ESTILO_CSS', 'default');
} else {
    define('ESTILO_CSS', $_SESSION['estilo']);
}
?>
