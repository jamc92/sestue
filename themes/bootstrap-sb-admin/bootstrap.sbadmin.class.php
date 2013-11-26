<?php

/**
 * Description of BootstrapSbAdmin
 *
 * @author Ramón Serrano
 */
class BootstrapSbAdmin extends Templates {

    /**
     * @var $instance
     */
    private static $instance;

    /**
     * @var $dir_path
     */
    private $dir_path;

    /**
     * @var $html
     */
    private $html;

    /**
     * @var $objUser
     */
    private $objUser;

    /**
     * @param 
     * Crear objetos a traves de __construct
     */
    public function __construct() {
        $this->dir_path = $this->getHost() . "bootstrap-sb-admin/";
        if ($this->objUser = $this->validateUser()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param 
     * No permitir la clonacion del objeto
     */
    private function __clone() {
        
    }

    /**
     * @param 
     * Iniciar las etiquetas html del documento
     */
    private function __mainBootstrap() {
        $this->html = '
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html lang="es">
	';
    }

    /**
     * @param 
     * Terminar las etiquetas html del documento
     */
    private function __endBootstrap() {
        $this->html .= '</html>';
    }

    private function setTitle($pageTitle) {
        $this->html .= "<title>" . APP_NAME . " | $pageTitle</title>";
    }

    private function setHeaders($headerExtras = null) {
        $this->html .= '
                        <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta name="description" content="Softawre Educativo para Soporte Técnico a Usuarios y Equipos del Colegio Universitario Francisco de Miranda">
                            <meta name="author" content="Ramón Serrano">
                            <!-- Bootstrap core CSS -->
                            <link href="' . $this->dir_path . 'css/bootstrap.css" rel="stylesheet">

                            <!-- Add custom CSS here -->
                            <link href="' . $this->dir_path . 'css/sb-admin.css" rel="stylesheet">
                            <link rel="stylesheet" href="' . $this->dir_path . 'font-awesome/css/font-awesome.min.css">
                            <!-- Page Specific CSS -->
                            <!--<link rel="stylesheet" href="' . $this->dir_path . 'css/morris-0.4.3.min.css">
                            <!-- Bootstrap core JavaScript -->
                            <script src="' . $this->dir_path . 'js/jquery.min.js"></script>
                            <script src="' . $this->dir_path . 'js/bootstrap.js"></script>
			</head>
			<body>
	';
    }

    /**
     * @param $perfilUser
     * Setear la variable menu para el html
     */
    private function setMenu($exception = null) {
        if(!empty($this->objUser)){
            $this->html .= '<div id="wrapper">';
            include DIR."admin/inc/menu-principal.php";
            $this->html .= $menu;
        }
        else{
            include DIR."admin/inc/menu-login.php";
            $this->html .= $menu;
        }
    }

    private function setContentPage($contentPage, $pageTitle, $exception = null) {
        if(!empty($this->objUser)){
            $this->html .= '
                    <div id="page-wrapper">

                        <div class="row">
                        <div class="col-lg-12">
                            <h1>' . APP_NAME . ' ' . $pageTitle . '<small></small></h1>
                            <ol class="breadcrumb">
                            <li><a href="'.DIR_ADMIN.'index.sestue"><i class="icon-dashboard"></i>' . APP_NAME . '</a></li>
                            <li class="active"><i class="icon-file-alt"></i> ' . $pageTitle . '</li>
                            </ol>
                        </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            ' . $contentPage . '
                        </div>
                    </div>
                    <!-- /#page-wrapper -->
            ';
        }
		else if($exception == "forbidden" or $exception == "not-found"){
			$this->html .= $contentPage;
		}
        else{
            $this->html .= '
                <form class="form-signin" action="../controllers/login.accion.php" method=post style="width:300px; margin:auto;margin-top:100px" autocomplete="off">
                    <h2 class="form-signin-heading">
		      	<span class="glyphicon glyphicon-lock btn-lg"></span>
		       	Entrar al sistema
		    </h2>
                    <div class="input-group">
                        <span class="input-group-addon">Usuario</span>
                        <input  type="text" name="user" title="Solo letras. Ej.: UsuarioEjemplo" class="form-control" id="input-text" pattern="[a-zA-Z0-9]+" autofocus required />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Clave&nbsp;&nbsp;&nbsp;</span>
                        <input name="password" type="password" class="form-control" maxlength=8 pattern="[a-zA-Z0-9]+" required title="Ingrese su clave" />
                    </div>
		    <label class="checkbox" onclick="location.href=\'remember.php\'" title="Haga click aqui para recordar su clave">Recordar contraseña</label>
		    <button name="entrar" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		</form>
                ';
        }
    }

    private function setFooter($contentHtml = null) {
        $this->html .= '
                       </div>
        ';
    }

    public function getPage($pageTitle = null, $contentPage = null, $exception = null) {
        if ((!empty($pageTitle) and !empty($contentPage) ) or $exception) {
            $this->__mainBootstrap();
            $this->setTitle($pageTitle);
            $this->setHeaders();
            $this->setMenu($exception);
            $this->setContentPage($contentPage, $pageTitle, $exception);
            $this->setFooter();
            $this->__endBootstrap();
            return $this->html;
        } else {
            throw new Exception("No se puede crear pagina sin el titulo o el contenido", 1);
        }
    }

}

