<?php
/* Clase para crear formularios
 * a forma de instacias en las paginas
 * como todos los elementos que los conforman
 */
class Formulario{
	//Variables
	private $cadenaHtml = "";
	private $nombre, $pagAccion, $metodoAplicado;
	//Funcion del constructor de la clase
	public function __construct( $nombre, $accion, $metodo, $clase, $id, $atributosExtra ){
		if(!$nombre) $nombre = "formulario";
		if(!$accion or !$metodo){
			$this->cadenaHtml .= '<font color="red">Formulario sin pagina de accion o sin metodo</font>';
		}
		else{
			$this->nombre = $nombre;
			$this->pagAccion = $accion;
			$this->metodoAplicado = $metodo;
			$this->cadenaHtml .= '<form name="'.$this->nombre.'" action="'.$this->pagAccion.'" method="'.$this->metodoAplicado.'" ';
			if($clase)
				$this->cadenaHtml .= 'class="'.$clase.'" ';
			if($id)
				$this->cadenaHtml .= 'id="'.$id.'" ';
			if($atributosExtra)
				$this->cadenaHtml .= $atributosExtra;
			$this->cadenaHtml .= '>';
		}
	}
	public function cerrarFormulario(){
		$this->cadenaHtml .= '</form>';
	}
	public function agregarLeyenda($titulo, $clase, $id, $alineacion){
		if(!$titulo)
			$this->cadenaHtml .= '<font color="red">Leyenda sin titulo</font>';
		else{
			$this->cadenaHtml .= "\n\t\t\t<fieldset ";
			if($clase)
				$this->cadenaHtml .= 'class="'.$clase.'" ';
			if($id)
				$this->cadenaHtml .= 'id="'.$id.'" ';
			$this->cadenaHtml .= ">";
			if($alineacion)
				$this->cadenaHtml .= " <legend align='".$alineacion."'>".$titulo."</legend> \n";
			else 
				$this->cadenaHtml .= " <legend>".$titulo."</legend>\n ";
		}
	}
	public function cerrarLeyenda(){
		$this->cadenaHtml .= "</fieldset>\n";
	}
	public function agregarEtiqueta1($mensaje, $clase, $id){
		if(!$mensaje)
			$this->cadenaHtml .= '<font color="red">Etiqueta sin mensaje</font>';
		else{
			$this->cadenaHtml .= '<label';
			if($clase)
				$this->cadenaHtml .= ' class="'.$clase.'"';
			if($id)
				$this->cadenaHtml .= ' id="'.$id.'"';
			$this->cadenaHtml .= '>'.$mensaje.'</label> ';
		}
	}
	public function agregarEtiqueta($mensaje, $clase, $id){
		if(!$mensaje)
			$this->cadenaHtml .= '<font color="red">Etiqueta sin mensaje</font>';
		else{
			$this->cadenaHtml .= '<div';
			if($clase)
				$this->cadenaHtml .= ' class="'.$clase.'"';
			if($id)
				$this->cadenaHtml .= ' id="'.$id.'"';
			$this->cadenaHtml .= '>'.$mensaje.'</div> ';
		}
	}
	public function agregarInput($tipo, $nombre, $valor, $mensaje, $clase, $id, $atributosExtra){
		if (!$nombre or !$tipo)
			$this->cadenaHtml .= '<font color="red">Campo sin nombre o sin tipo</font>';
		else{
			$this->cadenaHtml .= '<input type="'.$tipo.'" name="'.$nombre.'" ';
			if($valor)
				$this->cadenaHtml .= 'value="'.$valor.'" ';
			if ($mensaje)
				$this->cadenaHtml .= 'placeholder="'.$mensaje.'" ';
			if($clase) 
				$this->cadenaHtml .= 'class="'.$clase.'" ';
			if($id)
				$this->cadenaHtml .= 'id="'.$id.'"';
			if($atributosExtra)
				$this->cadenaHtml .= ' '.$atributosExtra.' ';
		}
		$this->cadenaHtml .= '/>';
	}
	public function agregarSelect($nombre, $tipo, $clase, $id, $atributosExtra){
		if (!$nombre)
			$this->cadenaHtml .= '<font color="red">Select sin nombre</font>';
		else{
			$this->cadenaHtml .= '<select name="'.$nombre.'" ';
			if($tipo=="multiple")
				$this->cadenaHtml .= 'multiple ';
			if($clase) 
				$this->cadenaHtml .= 'class="'.$clase.'" ';
			if($id)
				$this->cadenaHtml .= 'id="'.$id.'" ';
			if($atributosExtra)
				$this->cadenaHtml .= $atributosExtra;
		}
		$this->cadenaHtml .= '>';
	}
	public function cerrarSelect(){
		$this->cadenaHtml .= '</select>';	
	}
	public function agregarOpcSel($valor, $mensaje){
		$this->cadenaHtml .= '<option value="'.$valor.'">'.$mensaje;
	}
	public function agregarRadioButton($nombre, $valor, $clase, $id, $atributosExtra){}
	public function agregarCheckBox($nombre, $valor, $clase, $id, $atributosExtra){}
	public function ln($valor){
		if(!$valor)
			$this->cadenaHtml .= "<br>\n";
		for($i=0; $i<$valor; $i++){
			$this->cadenaHtml .= "<br>\n";
		}
	}
	public function tab($valor){
		if(!$valor)
			$this->cadenaHtml .= "\t";
		for($i=0; $i<$valor; $i++){
			$this->cadenaHtml .= "\t";
		}	
	}
	public function agregarHtmlExtra($html){
		$this->cadenaHtml .= $html;
	}
	public function obtenerHtml(){
		return $this->cadenaHtml;
	}
}
?>