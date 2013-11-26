function validaPass(){
	if (document.getElementById("p2").value != document.getElementById("p").value){
		alert("Clave incorrecta! Confirme su clave nuevamente");
	}
	else{
		return 1;
	}
}
function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var numeros_letras = numeros + letras;
  var teclas_especiales = [8, 9, 13];
  // 8 = BackSpace, 9 = Tabular, 46 = Supr, 13 = Enter
 
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 1:
      permitidos = numeros;
      break;
    case 2:
      permitidos = letras;
      break;
    case 3:
      permitidos = numeros_letras;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
 
// Sólo números
//<input type="text" id="texto" onkeypress="return permite(event, 1)" />
 
// Sólo letras
//<input type="text" id="texto" onkeypress="return permite(event, 2)" />
 
// Sólo letras o números
//<input type="text" id="texto" onkeypress="return permite(event, 3)" />
