<?php
/**
 * Descripcion de Db
 * @author Ramon Serrano
 * @email <ramon_calle-88@hotmail.com>
 */
require("../../config/config.php");
class Actividades{
	 /**
	 * @var Variable para la instancia de la clase Db
	 */
    private $objDb;
	 /**
     * Constructor
	 * @param Sin parametros
	 * Guardar una instancia de la clase Db
	 */
    public function __construct(){
    	$this->objDb = Db::getInstance();
    }
    public function getActividades(){
    	$query = "SELECT * FROM t_proy_activ";
    	return $this->objDb->select($query);
    }
}
