<?php

    $actividad = ( (!empty($_POST['actividad']['titulo']) and !empty($_POST['actividad']['capitulo']) ) and !empty($_POST['actividad']['contenido']) ) ? $_POST['actividad'] : "vacio";
    if ($actividad != "vacio") {

        //Requerimiento de archivos de consulta y html
        require("../lib/config/config.php");

        //Objetos que seran usados en el archivo
        $objActiv = new Actividades();

        $sqlInsert = "INSERT INTO t_proy_activ VALUES ( null, '$actividad[capitulo]', '$actividad[titulo]', '$actividad[contenido]' , NOW(), NOW())";
        $selectExiste = "SELECT c_id_pk FROM t_proy_activ WHERE c_cap_perteneciente = '$actividad[capitulo]' AND c_actividad = '$actividad[titulo]' AND c_contenido = '$actividad[contenido]' ";

        if ($result = $objActiv->insertActividad($actividad)) {
            echo "<script>
                                alert('Registro exitoso!'); 
                                location.href='../paginas/ejemplos/crear.actividad.php'
                            </script>";
        }
        else if ($result == "existe") {
            echo "<script>
                    alert('Actividad ya existente!'); 
                    location.href='../paginas/ejemplos/crear.actividad.php'
                  </script>";
        }
        else{
            echo $sqlInsert;
        }/*
        if ($db->select($selectExiste)) {
            echo "<script>
                                            alert('Actividad ya existente!'); 
                                            location.href='../paginas/ejemplos/crear.actividad.php'
                                    </script>";
        } elseif ($db->ejecutarSql($sqlInsert)) {
            echo "<script>
                                            alert('Registro exitoso!'); 
                                            location.href='../paginas/ejemplos/crear.actividad.php'
                                    </script>";
        } else {
            echo $sqlInsert;
        }*/
    } else {
        echo "<script>
                                            alert('Ningún dato fue enviado al servidor!'); 
                                            location.href='../paginas/ejemplos/crear.actividad.php'
                                    </script>";
    }
?>
