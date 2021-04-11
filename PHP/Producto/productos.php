<div id="titulo">
<h1>Productos</h1>
</div>
    <nav class=" btn-group nav navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-end"> 
                    
        <form id="Buscador" class="d-flex bd-highlight">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>              
        <button class="btn btn-outline-success" id="nuevo"  data-toggle="tooltip" title="Nuevo producto" >Subir producto</button>
        <button class="btn btn-outline-success btncerrar"  data-toggle="tooltip" title="Ocultar"> Cancelar</button>
    </div>
    </nav>
    <div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para un nuevo user o editar un user -->
    </div>

    <div id="producto">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        </div><!-- /. tools -->
                    
    </div><!-- /.box-header -->

    <div class="box-body">

    <div id="carta" class="card" style="width: 18rem;">
        <img src="../../img/producto1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del producto</h5>
            <p class="card-text">Descripcion del producto, tiene que ser una descripcion breve</p>
            <p class="card-text"><strong>Precio:</strong>$2000</p>
            <p class="card-text"><strong>Dto:</strong>50%</p>
            <p class="card-text"><strong>Primer dia del descuento:</strong><br/>Enero 01 del 2020</p>
            <p class="card-text"><strong>Ultimo dia del descuento:</strong><br/>Enero 30 del 2020</p>
            <a href="#" class="btn btn-primary">Agregar al carrito</a>
        </div>
    </div>
    </div><!-- /.box-body -->  
    <script src="../js/funcionesproducto.js"></script>

