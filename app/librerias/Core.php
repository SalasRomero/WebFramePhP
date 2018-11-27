<?php
	//Traer la ulr o mapear la ulr ingresada en el navegador
	//1-Controlador
	//2-metodo
	//3-parametro que tenga
	
	class Core{
		protected $controladorActual="paginas";
		protected $metodoActual="index";
		protected $parametros=[];

		//constructor de la clase
		public function __construct(){
			$url= $this->getUrl();
			//print_r($this->getUrl());

			//Valido si el archivo existe 
			//el ucwords sirve para que la primera letra sea mayuscula
			//busco el archivo con el file:exist
			//concateno todo para no tener que manejar solo un string
			//Si existe se guarda como controlador por defecto
			if(file_exists("../app/controladores/".ucwords($url[0]).".php")){

				//seteo el controlador por defecto man
				$this-> controladorActual=ucwords($url[0]);
				unset($url[0]);
			}

			require_once("../app/controladores/".$this->controladorActual.".php");
			$this->controladorActual= new $this->controladorActual;

			//Validar si el esta pasando el metodo
			if(isset($url[1])){
				//Validamos si el metodo existe
				if(method_exists($this->controladorActual, $url[1])){
					$this-> metodoActual= $url[1];
					unset($url[1]);
				}
			}
			//echo $this->metodoActual;
			//Validacion para pasar parametros
			$this->parametros= $url ? array_values($url): [];
			call_user_func_array([$this->controladorActual,$this->metodoActual], $this->parametros);
		}

		public function getUrl(){
			//echo $_GET["url"];
			if(isset($_GET['url'])){
				//Esta linea quita los espacios de la url
				$url = rtrim($_GET['url'],'/');
				//Esta linea divide la url por loe /
				$url = filter_var($url,FILTER_SANITIZE_URL);
				//Delimita por el /
				$url= explode('/',$url);

				//Retirnamos la url ya interpretada
				return $url;
			}
		}
	}

?>