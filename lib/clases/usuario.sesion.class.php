<?php

/**
 * Description of UsuarioSesion
 * @author Ramón Serrano <ramon_calle-88@hotmail.com>
 */
//Archivo para saber si usuario esta logueado y 
//permitir ingresar a otras paginas a traves de este archivo
class UsuarioSesion {

    private $nombreApellido, $usuario, $nivelUsuario;
    private static $_objeto;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!(self::$_objeto instanceof self)) {
            self::$_objeto = new self();
        }
        return self::$_objeto;
    }

    public function setUsuarioSesion($usuario, $nivelUsuario, $nombreApellido) {
        if (!$usuario or !$nivelUsuario or !$nombreApellido) {
            $this->usuario = null;
            $this->nombreApellido = null;
            $this->nivelUsuario = null;
        } else {
            $this->usuario = $usuario;
            $this->nombreApellido = $nombreApellido;
            $this->nivelUsuario = $nivelUsuario;
        }
    }

    public function getUsuarioSesion() {
        return array($this->usuario, $this->nivelUsuario, $this->nombreApellido/*, $_COOKIE['PHPSESSID']*/);
    }

    public function existeUsuario() {
        if (!$this->usuario or !$this->nivelUsuario or !$this->nombreApellido)
            return false;
        else
            return true;
    }

}
