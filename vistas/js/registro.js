actualizarActivo();
/*=============================================
LLAMAR AL DNI QUE ESTA ALMACENADO EN EL LOCALSTRORE
 =============================================*/
$(document).ready(function() {

    /* 
        var dni = localStorage.getItem("dniLocalStore");
        $("#nuevDniVisitaFuncionario").val(dni);
    
        $("#nuevEntidadSelectSearch").select2(); */
    $(".btnImprimirObstetra").on("click", function() {

        var idObstetra = $(this).attr("idobstetra");
        console.log(idObstetra);
        window.open("extensiones/tcpdf/pdf/constanciahabilidad.php?idObstetra=" + idObstetra, "_blank");
    })

})

/*=============================================
 VALIDAR SOLO NUMERO EN DNI
 =============================================*/
$(function() {
    $(".dni").keydown(function(event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});


/*=============================================
 VALIDAR SOLO NUMERO EN COP
 =============================================*/
$(function() {
    $(".cop").keydown(function(event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});

/*=============================================
 VALIDAR SOLO LETRAS
 =============================================*/
$(function() {

    $("#nuevApellidoP").bind('keypress', function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $("#nuevApellidoM").bind('keypress', function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $("#nuevNombre").bind('keypress', function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
})



/*=============================================
ALMACENAR EL DNI EN EL LOCALSTRORE
 =============================================*/
/* $("#crearFuncionarioVisita").on("click", function () {

    var dniLocalStore = $(".dniLocalStore").val();

    localStorage.setItem("dniLocalStore", dniLocalStore);

}) */


/*=============================================
ELIMINAR DNI EN EL LOCALSTRORE
 =============================================*/
/* $("#limpiarFuncionario").on("click", function () {

    localStorage.removeItem("dniLocalStore");

    $("#nuevDniVisitaFuncionario").val("");
    $("#nuevDniVisitaFuncionario").removeClass('.')
    $("#nuevNombreFuncionario").val("");
    $("#nuevCargoFuncionario").val("");
    $("#nuevEntidadFuncionario").val("");

}) */
/*=============================================
 CARGAR MODAL DE FUNCIONARIO 
 =============================================*/
/* $("#agregarFuncionario").on("click", function () {

    $('#modalAgregarRegistro').modal('show'); */

/*     var dni = localStorage.getItem("dniLocalStore");
    $("#nuevDniVisitaFuncionario").val(dni); */



/* }) */

/* $("#crearFuncionario").on("click", function () {
    $('#modalAgregarFuncionarioVisita').modal('show');
}) */

/* $("#agregarEntidades").on("click", function () {
    $('#modalAgregarEntidadVisita').modal('show');
})
 */
/*=============================================
 CARGAR HORA DE DATETIMEPICKER
 =============================================*/
/* $(function () {
    $('#datetimepicker3').datetimepicker({
        format: 'LT'
    });
}); */

/*=============================================
 ACTUALIZAR PAGINA 
 =============================================*/
/* $("#actualizar").click(function () {
    window.location = "registro";
}) */
/*=============================================
 VALIDAR FUNCIONARIO SI EXISTE
 =============================================*/

/* $("#buscarFuncionario").click(function () {

    var funcionario = $("#nuevDniVisitaFuncionario").val();
    console.log("funcionario", funcionario);

    var datos = new FormData();
    datos.append("validarFuncionario", funcionario);

    $.ajax({
        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                $("#nuevDniVisitaFuncionario").parent()
                    .after(

                        swal({
                            type: "error",
                            title: "¡EL usuario no exite en la base de datos, CREAR USUARIO!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value) {



                            }
                        })

                    );
                $("#nuevNombreFuncionario").val("");
                $("#nuevCargoFuncionario").val("");
                $("#nuevEntidadFuncionario").val("");
            } else {

                $("#nuevIdFuncionario").val(respuesta["id"]);
                $("#nuevNombreFuncionario").val(respuesta["nombre"]);
                $("#nuevCargoFuncionario").val(respuesta["cargo"]);


                var datosEntidad = new FormData();
                datosEntidad.append("idEntidad", respuesta["identidad"]);

                //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
                $.ajax({

                    url: "ajax/entidad.ajax.php",
                    method: "POST",
                    data: datosEntidad,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {

                        $("#nuevEntidadFuncionario").val(respuesta["entidad"]);


                    }

                })


            }

        }

    })
})
 */
/*=============================================
 CARGAR LA TABLA DINÁMICA DE REGISTRO
 =============================================*/
function actualizarActivo() {

    $('.tablaRegistro').DataTable({

        "ajax": "ajax/datatable-registro.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })
}

/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
/* $("#nuevaCategoria").change(function () {


    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#nuevoCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);

            }

        }

    })

}) */


/*=============================================
 REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
 =============================================*/
/* $("#nuevoNombrePaciente").change(function () {


    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#nuevoNombrePaciente").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#nuevoNombrePaciente").val("");

            }

        }

    })
}); */


/* 
$("#dniPaciente").change(function () {
    //$('#consultar').on('click', function () {


    var dni = $('#dniPaciente').val();
    console.log("Tecla soltada", dni.length);

    if (dni.length < 8) {

        alert("INGRESE LOS 8 CARACTERES DEL DNI");
        $(".dniminivalidar").val('');
        return false;
    }

    $(".alert").remove();


    var dni = $('#dniPaciente').val();
    var datos = new FormData();
    datos.append("validarDni", dni);

    $.ajax({
        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#dniPaciente").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#dniPaciente").val("");
                $("#nuevoNombrePaciente").html("");

            }

        }

    })
});
 */

/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - EDITAR
 =============================================*/
/* $("#editarCategoria").change(function () {

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#editarCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#editarCodigo").val(nuevoCodigo);

            }

        }

    })

}) */



/*================================
 //REMOVER EL ID DEL COMBO
 ===================================*/
/* $("#editarCatg").on("click", function () {

    $("#editarCategoria").remove();
})

$('#editarFechaSalida').change(function () {
    var valor12 = $(this).val();
    console.log(valor12);
})

$('#editarHoraSalida').change(function () {
    var valor1 = $(this).val();
    console.log(valor1);
}) */

/*=============================================
 EDITAR REGISTRO
 =============================================*/

$(".tablas tbody").on("click", "button.btnVerConsulta", function() {

    var idRegistro = $(this).attr("idRegistro");
    console.log("consulta", idRegistro);
    var datos = new FormData();
    datos.append("idRegistro", idRegistro);

    $.ajax({

        url: "ajax/registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#editarIdRegistro').val(respuesta["cop"]);
            $('#editarApellidoPaterno').val(respuesta["apellido_paterno"]);
            $('#editarApellidoPaterno').html(respuesta["apellido_paterno"]);
            $('#editarApellidoMaterno').val(respuesta["apellido_materno"]);
            $('#editarApellidoMaterno').html(respuesta["apellido_materno"]);
            $('#editarNombre').val(respuesta["nombre"]);
            $('#editarNombre').html(respuesta["nombre"]);
            $('#editarColegioRegional').val(respuesta["colegio_regional"]);
            $('#editarColegioRegional').html(respuesta["colegio_regional"]);

            $('#editarEstado').val(respuesta["estado"]);
            $('#editarEstado').html(respuesta["estado"]);
            $('#editarPostGrado').val(respuesta["post_grado"]);
            $('#editarPostGrado').html(respuesta["post_grado"]);


            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})





/*=============================================
 EDITAR REGISTRO
 =============================================*/

$(".tablaRegistro tbody").on("click", "button.btnEditarRegistro", function() {

    var idRegistro = $(this).attr("idRegistro");

    var datos = new FormData();
    datos.append("idRegistro", idRegistro);

    $.ajax({

        url: "ajax/registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#editarIdRegistro').val(respuesta["cop"]);
            $('#editarApellidoPaterno').val(respuesta["apellido_paterno"]);
            $('#editarApellidoMaterno').val(respuesta["apellido_materno"]);
            $('#editarNombre').val(respuesta["nombre"]);
            $('#editarColegioRegional').val(respuesta["colegio_regional"]);
            $('#editarEstado').val(respuesta["estado"]);
            $('#editarEstado').html(respuesta["estado"]);
            $('#editarPostGrado').val(respuesta["post_grado"]);
            $('#editarUsuarioDigitador').val(respuesta["usuario"]);

            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})


/*=============================================
 SUBIENDO LA FOTO DEL TICKET
 =============================================*/

$(".nuevaImagen").change(function() {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})


/*=============================================
 ELIMINAR TICKET
 =============================================*/

$(".tablaRegistro tbody").on("click", "button.btnEliminarRegistro", function() {

    var idRegistro = $(this).attr("idRegistro");
    var imagen = $(this).attr("imagen");

    swal({

        title: '¿Está seguro de borrar el Registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Registro!'
    }).then(function(result) {
        if (result.value) {

            window.location = "index.php?ruta=registro&idRegistro=" + idRegistro + "&imagen=" + imagen;

        }


    })

})

/*=============================================
 IMPRIMIR TICKET
 =============================================*/
/* $(".btnImprimirObstetra").on("click", function() {

    var idObstetra = $(this).attr("idobstetra");
    console.log(idObstetra);
    window.open("extensiones/tcpdf/pdf/printTicket.php?idTicket=" + idObstetra, "_blank");
}) */

/*=============================================
MODAL PARA CREAR FUNCIONARIO DENTRO DEL MODAL DE REGISTRO
 =============================================*/
/*
$("#listarFuncionario").on("click", function () {
    $('#modalListarFuncionario').modal('show');
}) */

/*=============================================
SELECCIONAR FUNCIONARIO DE LISTA
 =============================================*/

/* $(".tablasListado tbody").on("click", "button.listarFuncionario", function () {


    var idFuncionario = $(this).attr("idFuncionarioLista");

    var datos = new FormData();
    datos.append("idFuncionario", idFuncionario);

    $.ajax({
        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#nuevIdFuncionario").val(respuesta["id"]);
            console.log('IDFuncionario', respuesta["id"]);
            $("#nuevDniVisitaFuncionario").val(respuesta["num_documento"]);
            $("#nuevNombreFuncionario").val(respuesta["nombre"]);
            $("#nuevCargoFuncionario").val(respuesta["cargo"]);


            var datosEntidad = new FormData();
            datosEntidad.append("idEntidad", respuesta["identidad"]);

            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR
            $.ajax({

                url: "ajax/entidad.ajax.php",
                method: "POST",
                data: datosEntidad,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nuevEntidadFuncionario").val(respuesta["entidad"]);


                }

            })

            console.log('Tipo Documento', respuesta["idtipo_documento"]);

            var datosTipoDocumento = new FormData();
            datosTipoDocumento.append("idDocumento", respuesta["idtipo_documento"]);

            $.ajax({

                url: "ajax/documento.ajax.php",
                method: "POST",
                data: datosTipoDocumento,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nuevTipoDocumento").val(respuesta["tipo_documento"]);


                }

            })

        }

    })
}) */