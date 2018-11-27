<!--<h1>Hola yo soy el iniociador</h1>-->
<?php
//Cargar el archivo configurar.php
	require_once("config/configurar.php");

//cargar las librerias del frmaework que estan enla carpeta lobreria
	spl_autoload_register(function($nombreClase){
		require_once("librerias/".$nombreClase.".php");
	}
);

	//require_once("librerias/Base.php");
	//require_once("librerias/Controlador.php");
	//require_once("librerias/Core.php");
?>