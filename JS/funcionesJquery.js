function inicio() {
    $("#cargarproductos").click(function(e) {
        e.preventDefault();
        $("contenedor").load("../php/index.php");
    })
    $("#opciones a").click(function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.post(url, function(resultado) {
            if (url != "#")
                $("#contenedor").removeClass("hide");
            $("#contenedor").addClass("show");
            $("contenedor").html(resultado);
        });
    });
}