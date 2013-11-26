<?php

/**
 * Descripcion de Db
 * @author Ramon Serrano
 * @email <ramon_calle-88@hotmail.com>
 */
class Db {

    private $servidor = SERVIDOR_BD;
    private $usuario = USUARIO_BD;
    private $password = PASS_BD;
    private $base_datos = BD;
    private $link, $query, $arreglo, $registros, $columnas, $filas;
    static $_instance;

    /* La función construct es privada para evitar que el objeto pueda ser creado mediante new */

    protected function __construct() {
        $this->conectar();
    }

    /* Evitamos el clonaje del objeto. Patrón Singleton */

    private function __clone() {
        
    }

    //funcion encargada de crear, si es necesario, el objeto. Esta es la funcion que debemos
    //llamar desde fuera de la clase para instanciarla
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //funcion que realiza la conexion a la base de datos
    private function conectar() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->password);
        mysql_select_db($this->base_datos, $this->link);
        @mysql_query("SET NAMES 'utf8'");
    }

    //funcion que realiza una consulta a la base de datos y devuelve el id
    public function ejecutarSql($sql) {
        $this->query = mysql_query($sql, $this->link);
        return $this->query;
    }

    //funcion que realiza la consulta select
    public function select(/* Código SQL */ $sql) {
        $query = $this->ejecutarSql($sql);
        if (!mysql_num_rows($query))
            return false;
        else {
            $this->filas = mysql_num_rows($query);
            $this->columnas = mysql_num_fields($query);
            for ($f_actual = 0; $f_actual < $this->filas; $f_actual++) {
                $this->arreglo = mysql_fetch_array($query);
                for ($c_actual = 0; $c_actual < $this->columnas; $c_actual++)
                    $this->registros[$f_actual][$c_actual] = $this->arreglo[$c_actual];
            }
            return $this->registros;
        }
    }

}

