
function validarNombre(nombre)
{
	//Patrón para el nombre
	var patron=/^([A-Za-záéíóúÁÉÍÓÚ]{2,12}\s){1,9}([A-Za-záéíóúÁÉÍÓÚ]){3,12}$/;
	var resultado = patron.test(nombre.value);
	if (!resultado)
	{
		alert("El nombre completo no es válido");
		nombre.focus();
	}
	return resultado;

}

function email(email)
{
	//Patrón para el email
	var patron=/^\w+([\.-]?\w+)*@\w+(\.\w{2,4})+$/;
	var resultado = patron.test(email.value);
	if (!resultado)
	{
		alert("El correo electrónico no es válido");
		email.focus();
	}
	return resultado;
}

function soloLetras(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Za-záéíóúÁÉÍÓÚñÑ]/;
	var caracteresEspeciales=[8,9,13,14,15,];
	
  if (!caracteresPermitidos.test(letra)) {
//    toastr.info('Solo Letras','', {
//     "closeButton": true, // Muestra el botón de cierre
//     "positionClass": "toast-top-right", // Posición del mensaje
//     "preventDuplicates": true, // Evita mensajes duplicados
//     "showDuration": "500", // Duración de la animación de mostrar
//     "hideDuration": "1000", // Duración de la animación de ocultar
//     "timeOut": "3000", // Tiempo de visualización del mensaje
//     "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
// });
    return false;
  }

  return true;

}

  function soloNumero(e) {
  var codigoCar = e.keyCode;
  var letra = String.fromCharCode(codigoCar);
  var caracteresPermitidos = /[0-9]/;

  if (!caracteresPermitidos.test(letra)) {
  //  toastr.info('Solo Numeros','', {
  //   "closeButton": true, // Muestra el botón de cierre
  //   "positionClass": "toast-top-right", // Posición del mensaje
  //   "preventDuplicates": true, // Evita mensajes duplicados
  //   "showDuration": "500", // Duración de la animación de mostrar
  //   "hideDuration": "1000", // Duración de la animación de ocultar
  //   "timeOut": "3000", // Tiempo de visualización del mensaje
  //   "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
// });
    return false;
  }

  return true;
}



function soloLetrasEspacio(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Za-záéíóúÁÉÍÓÚñÑ\s]/;
	var caracteresEspeciales=[8,9,13,14,15,];
	
  if (!caracteresPermitidos.test(letra)) {
//    toastr.info('Solo Letras y espacio','', {
//     "closeButton": true, // Muestra el botón de cierre
//     "positionClass": "toast-top-right", // Posición del mensaje
//     "preventDuplicates": true, // Evita mensajes duplicados
//     "showDuration": "500", // Duración de la animación de mostrar
//     "hideDuration": "1000", // Duración de la animación de ocultar
//     "timeOut": "3000", // Tiempo de visualización del mensaje
//     "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
// });
    return false;
  }

  return true;

}

function soloNumeroPunto(e) {
    var codigoCar = e.keyCode;
  var letra = String.fromCharCode(codigoCar);
  var caracteresPermitidos = /[0-9.]/;

  if (!caracteresPermitidos.test(letra)) {
//    toastr.info('Solo Numeros y punto','', {
//     "closeButton": true, // Muestra el botón de cierre
//     "positionClass": "toast-top-right", // Posición del mensaje
//     "preventDuplicates": true, // Evita mensajes duplicados
//     "showDuration": "500", // Duración de la animación de mostrar
//     "hideDuration": "1000", // Duración de la animación de ocultar
//     "timeOut": "3000", // Tiempo de visualización del mensaje
//     "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
// });
    return false;
  }

  return true;


}

function LetrasNumero(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[0-9A-Za-zñ\s]/;
	var caracteresEspeciales=[8,9,13,14,15,32];
	
  if (!caracteresPermitidos.test(letra)) {
//    toastr.info('Solo Letras y Numeros','', {
//     "closeButton": true, // Muestra el botón de cierre
//     "positionClass": "toast-top-right", // Posición del mensaje
//     "preventDuplicates": true, // Evita mensajes duplicados
//     "showDuration": "500", // Duración de la animación de mostrar
//     "hideDuration": "1000", // Duración de la animación de ocultar
//     "timeOut": "3000", // Tiempo de visualización del mensaje
//     "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
// });
    return false;
  }

  return true;


}


//validacione n impubos prueba

