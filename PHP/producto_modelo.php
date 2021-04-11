<?php
    require_once("modeloAbstractoDB.php");
    class producto extends ModeloAbstractoDB {
		private $id_producto;
		private $imagen;
		private $titulo;
		private $descripcion;
		private $precio;
		private $dto;
		private $fecha_ini;
		private $fecha_fin;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_producto(){
			return $this->id_producto;
		}

		public function getimagen(){
			return $this->imagen;
		}

		public function gettitulo(){
			return $this->titulo;
		}
		
		public function getdescripcion(){
			return $this->descripcion;
		}

		public function getprecio(){
			return $this->precio;
		}

		public function getdto(){
			return $this->dto;
		}

		public function getfecha_ini(){
			return $this->fecha_ini;
		}

		public function getfecha_fin(){
			return $this->fecha_fin;
		}

		public function consultar($id_producto='') {
			if($id_producto !=''):
				$this->query = "
				SELECT *
				FROM productos
				WHERE id_producto = '$id_producto' order by id_producto
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
			SELECT * FROM productos
			";
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_producto', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_producto= utf8_decode($id_producto);
				$this->query = "
					INSERT INTO producto
					(titulo, imagen, descripcion, precio, dto, fecha_ini, fecha_fin)
					VALUES
					('$titulo', '$imagen', '$descripcion', '$precio', '$dto', '$fecha_ini', '$fecha_fin')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function borrar($id_producto='') {
			$this->query = "
			DELETE FROM productos
			WHERE id_producto = '$id_producto'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>