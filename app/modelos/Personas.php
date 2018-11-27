<?php
class Personas{
	private $conexion;
	public function __construct(){
		$this->conexion=new Base;
	}

	public function MostrarPersonas(){
		$this->conexion->query("SELECT * FROM testconexion;");
		return $this->conexion->registros();
	}

	public function re(){
		$this->conexion->redireccionar("www.google.com");
	}

	public function AgregarPersona($datos){
		$this->conexion->query("INSERT INTO testconexion (nombre,apellido) VALUES(:nombre,:apellido);");

		$this->conexion->bind(":nombre",$datos["nombre"]);
		$this->conexion->bind(":apellido",$datos["apellido"]);
		$this->conexion->subir($datos["archivo"]);

		if($this->conexion->execute()){
			return true;
		}else{
			return false;
		}
	}

public function EditarPersona($datos){
	$this->conexion->query("UPDATE testconexion SET nombre=:nombre, apellido=:apellido WHERE id=:id");

	$this->conexion->bind(":id",$datos["id"]);
	$this->conexion->bind(":nombre",$datos["nombre"]);
	$this->conexion->bind(":apellido",$datos["apellido"]);

		if($this->conexion->execute()){
			return true;
		}else{
			return false;
		}
}

public function EliminarPersona($datos){
	$this->conexion->query("DELETE FROM testconexion Where id=:id;");
	$this->conexion->bind(":id",$datos["id"]);
	if($this->conexion->execute()){
			return true;
		}else{
			return false;
		}
}
}

?>