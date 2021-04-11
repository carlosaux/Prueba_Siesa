<?php
    $mysqli = new mysqli('localhost','root', '', 'aguitadecoco');
    if($mysqli->connect_errno):
        echo "Error al conectase con MySQL debido al error ".$mysqli->connect_error;
    endif;
?>

<?php
    require_once("../modeloAbstractoDB.php");
    class Proveedor extends ModeloAbstractoDB {
		private $id_proveedor;
		private $nombre_proveedor;
		private $telefono;
		private $direccion;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_proveedor(){
			return $this->id_proveedor;
		}

		public function getnombre_proveedor(){
			return $this->nombre_proveedor;
		}
		
		public function gettelefono(){
			return $this->telefono;
		}

		public function getdireccion(){
			return $this->direccion;
		}

		public function consultar($id_proveedor='') {
			if($id_proveedor !=''):
				$this->query = "
				SELECT *
				FROM proveedor
				WHERE id_proveedor = '$id_proveedor' order by id_proveedor
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() {
			$this->query = "
			SELECT * FROM proveedor
			";
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_proveedor', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_proveedor= utf8_decode($id_proveedor);
				$this->query = "
					INSERT INTO proveedor
					(nombre_proveedor, telefono, direccion)
					VALUES
					('$nombre_proveedor', '$telefono', '$direccion')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre_proveedor= utf8_decode($nombre_proveedor);
			$this->query = "
			UPDATE proveedor
			SET nombre_proveedor='$nombre_proveedor',
			telefono='$telefono',
			direccion='$direccion'
			WHERE id_proveedor = '$id_proveedor'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_proveedor='') {
			$this->query = "
			DELETE FROM proveedor
			WHERE id_proveedor = '$id_proveedor'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>