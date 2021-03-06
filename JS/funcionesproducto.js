var dt;

function producto() {
    $("#contenedor").on("click", "button#actualizar", function() {
        var datos = $("#fproducto").serialize();
        $.ajax({
            type: "get",
            url: "controladorproducto.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.respuesta) {
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado de producto");
                $("#nuevo").html("");
                $("#nuevo").removeClass("show");
                $("#nuevo").addClass("hide");
                $("#municipio").removeClass("hide");
                $("#municipio").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })

    
    $("#contenedor").on("click", "button.btncerrar2", function() {
        $("#titulo").html("Listado de producto");
        $("#nuevo").html("");
        $("#nuevo").removeClass("show");
        $("#nuevo").addClass("hide");
        $("#municipio").removeClass("hide");
        $("#municipio").addClass("show");

    })

    $("#contenedor").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenedor").html('')
    })

    $("#contenedor").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo producto");
        $("#nuevo").load("../PHP/Vista/nuevoproducto.php");
        $("#nuevo").removeClass("hide");
        $("#nuevo").addClass("show");
        $("#producto").removeClass("show");
        $("#producto").addClass("hide");
    })

    $("#contenedor").on("click", "button#grabar", function() {

        var datos = $("#fproducto").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "controladorproducto.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal(
                    'Grabado!!',
                    'El registro se grab?? correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado de producto");
                $("#nuevo").html("");
                $("#nuevo").removeClass("show");
                $("#nuevo").addClass("hide");
                $("#producto").removeClass("hide");
                $("#producto").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    });

}

$(document).ready(() => {
    $("#contenedor").off("click", "button#actualizar");
    $("#titulo").html("Listado de productos");
    dt = $("#carta").DataTable({
        "ajax": "controladorproducto.php?accion=listar",
        "columns": [
            { "data": "id_producto" },
            { "data": "imagen" },
            { "data": "titulo" },
            { "data": "descripcion" },
            { "data": "precio" },
            { "data": "dto" },
            { "data": "fecha_ini" },
            { "data": "fecha_fin" }
        ]
    });
    producto();
});