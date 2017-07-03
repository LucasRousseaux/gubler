


document.getElementById('btn-submit').onclick = function(event) {
    //console.log('enviando');

  var email = document.getElementById('email');
  var regexEmail=/^[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/;
  var pattEmail = new RegExp(regexEmail);
  console.log(email.value);
  console.log(pattEmail.test(email.value));


	if(!pattEmail.test(email.value)){
		document.getElementById('errores').innerHTML += '<br>'+'El Email no es valido';
		email.focus();
    event.preventDefault();
	}

  var nombre = document.getElementById('nombre');
  var regexCampoVacio=/^[a-z0-9]+$/i;
  var pattNombre = new RegExp(regexCampoVacio);
  console.log(nombre.value);
  console.log(pattNombre.test(nombre.value));

  if(!pattNombre.test(nombre.value)){
		document.getElementById('errores').innerHTML += '<br>'+'El Nombre no puede ser nulo';
		email.focus();
    event.preventDefault();
	}


  var password = document.getElementById('pass');
  var cpassword = document.getElementById('cpass');
  var minNumberofChars = 6;
  var maxNumberofChars = 16;
  var regexPassword  = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  var pattPassword = new RegExp(regexPassword);
  console.log(password.value);
  console.log(pattPassword.test(password.value));

  if(password.length < minNumberofChars || password.length > maxNumberofChars){
    document.getElementById('errores').innerHTML += '<br>'+'La password debe poseer mas de 5 y menos de 17 caracteres';
		password.focus();
    event.preventDefault();
  }

  if(!pattPassword.test(password.value)) {
    document.getElementById('errores').innerHTML += '<br>'+'La password debe poseer almenos un caracter especial y un número';
		password.focus();
    event.preventDefault();
	}

	if(password.value != cpassword.value){
		document.getElementById('errores').innerHTML += '<br>'+'Las contraseñas no coinciden';
    cpassword.focus();
    event.preventDefault();
	}

  document.getElementById('form-reg').submit;


};
