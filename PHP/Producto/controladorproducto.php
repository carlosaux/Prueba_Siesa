<?php 
require_once 'producto_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'nuevo':
        $producto = new producto();
		$resultado = $producto->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
		$producto = new producto();
		$resultado = $producto->borrar($datos['id_producto']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $producto = new producto();
        $producto->consultar($datos['id_producto']);

        if($producto->getid_producto() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_producto' => $producto->getid_producto(),
                'imagen'=> $producto->getimagen(),
                'titulo' => $producto->gettitulo(),
                'descripcion' =>$producto->getdescripcion(),
                'precio' =>$producto->getprecio(),
                'dto' =>$producto->getdto(),
                'fecha_ini' =>$producto->getfecha_ini(),
                'fecha_fin' =>$producto->getfecha_fin(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $producto = new producto();
        $listado = $producto->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
