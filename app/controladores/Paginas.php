<?php
	//Esto es un controlador 
	//heredamos del controlador para llamr a los metodos
	class Paginas extends Controlador{
		public function __construct(){
			//echo "Cargar Paginas";
			//modelos
			$this->Personas=$this->modelo('Personas');
		}

		public function index(){
			//Para pasar datos es necesario declarar un arreglo
			//$nombre=$this->articuloModelo->obtenerDatos();
			$PersonasRequest=$this->Personas->MostrarPersonas();
			//$PersonasR=$this->Personas->Insertar();
			$datos=[
			'Valores'=> 'Bienvenido',
			'Personas' => $PersonasRequest
			];
			$this->vista("PersonasV",$datos);

		}

		public function VistaEditar($id,$nom,$ape){
			$datos=[
				"id" => $id,
				"nombre" => $nom,
				"apellido" => $ape];
			$this->vista("PersonasE",$datos);
		}

		public function Editar($id,$nom,$ape){
			$datos=[
				"id" => $id,
				"nombre" => $nom,
				"apellido" => $ape
			];
			$edi=$this->Personas->EditarPersona($datos);

			if($edi){
				header("Location:".RUTA_URL."/Paginas/index");
			}else{
				header("Location:".RUTA_URL."/Paginas/VistaEditar/".$id."/".$nom."/".$ape);
			}

		}


		public function VistaAgregar(){
			$datos=[];
			$this->vista("Agregar",$datos);
		}

		public function Agregar($nom,$ape){
			$datos=[
				"nombre" => $nom,
				"apellido" => $ape
			];
			//$this->conexion->subir($datos["archivo"]);
			//echo "se pudo"; 
			$agre=$this->Personas->AgregarPersona($datos);
			//$this->vista("PersonasV",$datos);
			if($agre){
				header("Location:".RUTA_URL."/Paginas/index");
			}else{
				header("Location:".RUTA_URL."/Paginas/VistaAgregar");
			}
		}

		public function Eliminar($id){

			$datos=[
				"id"=>$id
			];
			$eli=$this->Personas->EliminarPersona($datos);

			if($eli){
				header("Location:".RUTA_URL."/Paginas/index");
			}else{
				header("Location:".RUTA_URL."/Paginas/index");
			}
		}
	
	}
?>