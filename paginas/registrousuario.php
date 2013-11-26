<?php

//Requerimiento de archivos de consulta y html
# Con este archivo se evita requerir las clases desde los archivos
# y hacer session_start()
require("../lib/config/config.php");

if ($_SESSION['objeto']) {
    header("location:index.php");
} else {
    //Objetos que seran usados en el archivo
    $db = Db::getInstance();
    #$index = Index::getInstance();
    $template = Templates::getInstance($_SESSION['estilo']);
    //Construccion del formulario de Registro de usuario
    $mensaje = '
			<form name="registro-usuario" action="../controllers/registro.usuario.accion.php" method="post" id="registro-usuario" style="min-width:300px;max-width:400px;margin:auto">			
				<fieldset > <legend align="center">
				<style type="text/css">
					.input-group-addon{
						width:200px;
						text-align:left;
					}
					input[type="text"]{
						width:300px;
					}
				</style>
				<h3>Registrar nuevo usuario</h3></legend>
					<div class="input-group">
					  <span class="input-group-addon">Usuario</span>
					  <input  type="text" name="user" title="Solo letras. Ej.: UsuarioEjemplo" class="form-control" id="input-text" onkeypress="return permite(event, 2)" autofocus required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Clave</span>
					  <input  type="password" name="password" title="Solo letras y numeros. Ej.: Usu4r1o0" class="form-control" id="p" maxlength=8  onkeypress="return permite(event, 3)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Confirme su clave</span>
					  <input  type="password" name="password2" title="Introduzca su clave nuevamente" class="form-control" id="p2" maxlength=8  onkeypress="return permite(event, 3)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Palabra secreta</span>
					  <input  type="text" name="psecreta" title="Palabra sin simbolos para recordar su clave" class="form-control" id="input-text" onkeypress="return permite(event, 2)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Nombre(s)</span>
					  <input  type="text" name="names" title="Introduzca su(s) nombre(s)" class="form-control" id="input-text" onkeypress="return permite(event, 2)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Apellido(s)</span>
					  <input  type="text" name="lastname" title="Introduzca su(s) apellido(s)" class="form-control" id="input-text" onkeypress="return permite(event, 2)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Cedula/Pasaporte</span>
					  <input  type="text" name="ci" title="Introduzca su numero de cedula/pasaporte" class="form-control" id="input-text" onkeypress="return permite(event, 1)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Carnet</span>
					  <input  type="text" name="carnet" title="Introduzca su numero de carnet" class="form-control" id="input-text" maxlength=9 onkeypress="return permite(event, 1)" required />
					</div>
					<div class="input-group">
					  <span class="input-group-addon">Rol</span>
					  <select  name="rol" class="form-control" required>
						<option value="">Seleccione<br>
						<option value="3">Estudiante<br>
						<option value="4">Profesor<br>
					  </select>
					</div>
					<br>
					<input type="submit" name="guardar" value="Guardar" title="form-control" class="btn btn-log btn-success" id="boton"/><br>
				</fieldset>
					<br>
			</form>
		';

    //Salida del html
    #$index->construirHtml("SESTUE | Registrarse", 1, $formRegistroUserHtml, "");
    print $template->getPage('SESTUE | Entrar', $mensaje, 'registrarse');
}
?>
