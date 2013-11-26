<?php

/**
 * Descripcion de Db
 * @author Ramón Serrano <ramon_calle-88@hotmail.com>
 */

interface FuncionesDb {

    public function selectAll();

    public function selectExist($data = null);
}

class Actividades extends Db implements FuncionesDb {

    /**
     * Constructor
     * @param Sin parametros
     * Guardar una instancia de la clase Db
     */
    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {
        $query = "SELECT * FROM t_proy_activ";
        return $this->select($query);
    }

    public function insertActividad($datosActividad = null) {
        if (!empty($datosActividad)) {
            if ($this->selectExist($datosActividad)) {
                return "existe";
            } else {
                $sql = "INSERT INTO t_proy_activ VALUES ( null, '$datosActividad[capitulo]', '$datosActividad[titulo]', '$datosActividad[contenido]' , NOW(), NOW())";
                if ($this->ejecutarSql($sql)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            throw new Exception("La actividad no se creó: <b>No se enviaron los datos de la actividad</b>", 1);
        }
    }

    public function selectExist($actividad = null) {
        if ($actividad != null) {
            $query = "SELECT c_id_pk FROM t_proy_activ WHERE c_cap_perteneciente = '$actividad[capitulo]' AND c_actividad = '$actividad[titulo]' AND c_contenido = '$actividad[contenido]' ";
            return $this->select($query);
        } else {
            return false;
        }
    }

}

class PreguntasRespuestas extends Db implements FuncionesDb {

    public function __construct() {
        parent::__construct();
    }

    public function selectExist($dataPregResp = null) {
        if ($dataPregResp != null) {
            $query = "SELECT c_id_pk FROM t_proy_activ WHERE c_cap_perteneciente = '$dataPregResp[capitulo]' AND c_actividad = '$dataPregResp[titulo]' AND c_contenido = '$dataPregResp[contenido]' ";
            return $this->select($query);
        } else {
            return false;
        }
    }

    public function selectAll() {
        $query = "SELECT * FROM  t_preguntas_respuestas";
        return $this->select($query);
    }

    public function insertPregResp($dataPregResp = null) {
        if (!empty($dataPregResp)) {
            if ($this->selectExist($dataPregResp)) {
                return "existe";
            } else {
                $sql = "INSERT INTO t_proy_activ VALUES ( null, '$dataPregResp[capitulo]', '$dataPregResp[titulo]', '$dataPregResp[contenido]' , NOW(), NOW())";
                if ($this->ejecutarSql($sql)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            throw new Exception("La pregunta no se creó: <b>No se enviaron los datos de la pregunta</b>", 1);
        }
    }

}

class Usuarios extends Db implements FuncionesDb{

    public function __construct(){
        parent::__construct();
    }

    public function selectAll(){

    }

    public function selectUsuario($alias = null){
        $query = "SELECT c_cedula_pk, c_carnet_pk, c_nombres, c_apellidos FROM t_usuarios WHERE c_alias_pk='$alias'";
        return $this->select($query);
    }

    public function updateUsuario($data=null){
        if(!empty($data)){
            $query = "UPDATE 
                        t_usuarios 
                      SET 
                        c_cedula_pk=$data[cedula], 
                        c_carnet_pk=$data[carnet], 
                        c_nombres='$data[nombres]', 
                        c_apellidos='$data[apellidos]' 
                      WHERE 
                        c_alias_pk = '$data[user]'";
            $this->ejecutarSql($query);
        }
    }

    public function selectExist($data = null){

    }
}

class Busqueda extends Db {

    public function __contruct() {
        parent::__construct();
    }

    public function selectBusqueda($palabras = null) {
        if ($palabras != null) {
            return $this->select(null);
        }
    }

}