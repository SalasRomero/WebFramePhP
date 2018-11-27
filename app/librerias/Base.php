<?php
//clase que se conecta a la base de base usando pdo
class Base{
	//variables para conectar a la base de tador
	private $host=DB_HOST;
	private $user=DB_USER;
	private $password=DB_PASSWORD;
	private $base=DB_NOMBRE;

	private $dbh;
	private $stmt;
	private $error;

	private $in;
	public function __construct(){
		//configurar la coneccion a la bd
		$dsn='mysql:host='. $this->host. ';dbname='. $this->base;
		$opciones= array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		);

		//necesitamos crear una instacioa

		try{
			$this->dbh=new PDO($dsn, $this->user, $this->password,
				$opciones);

			//esta linea arregla los caracteres especiales
			$this->dbh->exec('set names utf8');

		}catch(PDOException $e){
			$this->error=$e->getMessage();
			echo $this->error;
		}
	}

	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);

	}
	//este es para insertar
	public function bind($parametro,$valor,$tipo=null){
		if (is_null($tipo)) {
			switch (true) {
				case is_int($valor):
					$tipo=PDO::PARAM_INT;
					break;

				case is_bool($valor):
					$tipo=PDO::PARAM_BOOL;
					break;
				
				case is_null($valor):
					$tipo=PDO::PARAM_NULL;
					break;
				
				default:
					$tipo=PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($parametro,$valor,$tipo);
	}
	//ejecuta la consulta
	public function execute(){
		return $this->stmt->execute();
	}
	//busca los registros
	public function registros(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ); 
	}
	//busca un solo registro
		public function registro(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ); 
	}
	//obtiene las filas
	public function obtenerfilas(){
		$this->execute();
		return $this->stmt->rowCount(); 
	}


	public function insertar(){
		if($this->execute()){
			$this->in=true;
		}else{
			$this->in=false;
		}

		return $in;
	}
	 public function subir($nombre){
	 	$nombre_tempora=$_FILES[$nombre]["tmp_name"];
	 	$nombre=$_FILES[$nombre]["name"];
	 	move_uploaded_file($nombre_tempora, RUTA_URL.'/config/'.$nombre);
	 }
}

?>