$(document ).ready(function() {
//busca todos los datos
function buscarDatos(consulta){
    $.ajax({
        url: 'buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
       $(".resultados").html(respuesta);
        
        // console.log(respuesta);
    } )
    .fail(function(){
        console.log("error");
    })
    .always(function(){
        console.log("complete");
    });

}




$(document).on("keyup", ".search", function(){
    var valor = $(this).val();
    if(valor != ""){
        buscarDatos(valor);
    }else{
        buscarDatos();  
    }
   

 } );





//busco los datos por el id que seleccione el usuario
function buscoDatosPorId(id){
    $.ajax({
        url: 'buscarPorID.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id},
    })
    .done(function(respuesta){
         var datos = JSON.parse(respuesta);
         console.log(datos);
         //nombre y apellido
            $(".h1-perfil-persona").html(datos.nombre+ " " + datos.apellido);
        //conyuge
        console.log(datos.conyugue_nombre + " " + datos.conyugue_apellido);

        if(datos.conyugue_nombre == null || datos.conyugue_apellido == null){
            $(".infoConyugue").html("<p>Sin Datos</p>");
        }else{
            $(".infoConyugue").html(datos.conyugue_nombre+ " " + datos.conyugue_apellido);
        }

        //edad
        console.log(datos.edad);
        if(datos.edad == null){
            $(".edad").html("<p>Sin Datos</p>");
        }else{
            $(".infoEdad").html(datos.edad);
        }

        //hijos
        console.log(datos.hijos);
        if(datos.hijos == null){
            $(".infoHijos").html("<p>Sin Datos</p>");
        }else{
            $(".infoHijos").html(datos.hijos);
        }
         
        //profesion
        console.log(datos.profesion);
        if(datos.profesion == null){
            $(".infoProfesion").html("<p>Sin Datos</p>");
        }else{
            $(".infoProfesion").html(datos.profesion);
        }

        //año de partida
        console.log(datos.anio_llegada);
        if(datos.anio_llegada == null){
            $(".anioPartida").html("<p>Sin Datos</p>");
        }
        else{
            $(".infoPartida").html(datos.anio_llegada);
        }

        //comuna
        console.log(datos.comuna);
        if(datos.comuna == null){
            $("#infoComuna").html("<p>Sin Datos</p>");
        }else{
            $("#infoComuna").html(datos.comuna);
        }

        //region
        console.log(datos.region);
        if(datos.region == null){
            $("#infoRegion").html("<p>Sin Datos</p>");
        }else{
            $("#infoRegion").html(datos.region);
        }




    } )
    .fail(function(){
        console.log("error");
    })
    .always(function(){
        console.log("complete");
    });

}

//traer los datos con la funcion buscoDatosPorId cuando el usuario haga click en el a con clase resultadoPersona
$(document).on("click", ".resultadoPersona", function(){
    var id = $(this).attr("id");
    buscoDatosPorId(id);
 });


});


