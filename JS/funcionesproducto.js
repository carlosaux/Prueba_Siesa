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

    $("#contenedor").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var id_producto = $(this).data("id_producto");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el producto con codigo : " + id_producto + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "controladorproducto.php",
                        data: {id_producto: id_producto, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El producto con ID : ' + id_producto + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

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
                    'El registro se grabó correctamente',
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
    $("#contenedor").off("click", "a.borrar");
    $("#contenedor").off("click", "button#nuevo");
    $("#contenedor").off("click", "button#grabar");
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