<!-- quick email widget -->
<div id="seccion-producto">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de producto</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>


        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fproducto">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_producto">ID producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_producto" name="id_producto" placeholder="ID"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="titulo">Titulo del producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese titulo del producto"
                            value = "">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="imagen">Imagen:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Ingrese una imagen"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripcion"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="precio">Precio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese un precio"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dto">Dto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="dto" name="dto" placeholder="Ingrese un Dto"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Producto">Grabar Producto</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>