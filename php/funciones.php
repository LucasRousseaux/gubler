<?php

function esUnaImagen($ext) {
	$ext = strtolower($ext);
	if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif') {
		return TRUE;
	}
	return FALSE;
}

function tienePesoValido($size) {

	$pesoMaximo = 90000;
	// 90 KB

	if ($size > $pesoMaximo) {
		return FALSE;
	}
	return TRUE;
}


	function validarUsuario($miUsuario)
	{
		$errores = [];
		$ext = pathinfo($_FILES['imgPerfil']['name'], PATHINFO_EXTENSION);

		if (trim($miUsuario["nombre"]) == "")
		{
			$errores[] = "Falta el nombre";
		}
		if (trim($miUsuario["pass"]) == "")
		{
			$errores[] = "Falta la pass";
		}
		if (trim($miUsuario["cpass"]) == "")
		{
			$errores[] = "Falta el cpass";
		}
		if ($miUsuario["pass"] != $miUsuario["cpass"])
		{
			$errores[] = "Pass y Cpass son distintas";
		}
		if ($miUsuario["email"] == "")
		{
			$errores[] = "Falta el mail";
		}
		if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
		{
			$errores[] = "El mail tiene forma fea";
		}
		if (existeElMail($miUsuario["email"]))
		{
			$errores[] = "Usuario ya registrado";
		}
		if (empty($_FILES["imgPerfil"])) {
			$errores[] = "Falta cargar una imagen de perfil";
		}
		if (!esUnaImagen($ext)) {
			$errores[] = "El formato de imagen deber ser jpg, png o gif";
		}
		if (!tienePesoValido($_FILES["imgPerfil"]["size"])) {
			$errores[] = "La imagen es muy pesada";
		}
		return $errores;
	}

	function existeElMail($mail)
	{
		$usuarios = file_get_contents("json/usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["email"])
			{
				return true;
			}
		}

		return false;
	}

	function guardarUsuario($miUsuario)
	{
		$usuarioJSON = json_encode($miUsuario);

		file_put_contents("json/usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	function crearUsuario($miUsuario)
	{
		$usuario = [
			"nombre" => $miUsuario["nombre"],
			"email" => $miUsuario["email"],
			"password" => password_hash($miUsuario["pass"], PASSWORD_DEFAULT),
			"imgPerfil" => $_FILES['imgPerfil']['name'],
			"id" => traerNuevoId()
		];
		return $usuario;
	}


	function traerNuevoId()
	{
		$usuarios = file_get_contents("json/usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		//Para quitar el último ENTER
		array_pop($usuariosArray);

		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 1];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}

	function enviarAFelicidad()
	{
		header("location:index.php");exit;
	}

	function tituloPagina() {
		$estoy = dirname(__FILE__);

		$titulo = "Bienvenido";
		if ($estoy == "ofrece"){
			$titulo = "Ofrece tus servicios";
		}
		if ($estoy == "registro"){
			$titulo = "registrate";
		}
		if ($estoy == "sesion") {
			$titulo = "iniciá sesión";
		}
		if ($estoy == "ayuda"){
			$titulo = "preguntas frecuentes";
		}
		return $titulo;
		}


?>
