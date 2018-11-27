<?php
	class Controlador{
		public function modelo($modelo){
			require_once ("../app/modelos/". $modelo .".php");
			return new $modelo();
		}

		public function vista($vista, $datos=[]){
			if(file_exists("../app/vistas/paginas/". $vista .".php")){
				require_once ("../app/vistas/paginas/". $vista .".php");
			}else{
				die("La vista no existe");
			}

		}


	public function redireccionar($direccion){
		header("Location: http://".$direccion);
	}
	}

?>