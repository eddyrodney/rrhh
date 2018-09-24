$(document).ready(function() {

    //Obterner conteo de lenguajes, entrenamientos, compañias, aplicantes y empleados
    $.when(
        $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/dashboards/select_counted_languages",
        data: { },
        success: function(data){
            var opts = $.parseJSON(data);
            $("#c_idiomas").html(opts[0].conteo);

        }
      })).done(
             $.ajax({
                method: "POST",
                url: window.location.protocol+"/marte/dashboards/select_counted_trainings",
                data: { },
                success: function(data){
                    var opts = $.parseJSON(data);
                    $("#c_capacitaciones").html(opts[0].conteo);
        
                }
            })


      ).done(
            $.ajax({
                method: "POST",
                url: window.location.protocol+"/marte/dashboards/select_counted_companies",
                data: { },
                success: function(data){
                    var opts = $.parseJSON(data);
                    $("#c_companias").html(opts[0].conteo);
        
                }
            }) 
      ).done(
            $.ajax({
                method: "POST",
                url: window.location.protocol+"/marte/dashboards/select_counted_applicants",
                data: { },
                success: function(data){
                    var opts = $.parseJSON(data);
                    $("#c_candidatos").html(opts[0].conteo);
        
                }
            })

      ).done(
            $.ajax({
                method: "POST",
                url: window.location.protocol+"/marte/dashboards/select_counted_employees",
                data: { },
                success: function(data){
                    var opts = $.parseJSON(data);
                    $("#c_empleados").html(opts[0].conteo);
        
                }
            })
      );

    //Limpiar cuando se selecciona un criterio
    $("#criterio").change(function(){
        $('#datos_encontrados').empty()
        $("#buscador").val("");
    });

    //Crear tabla de busqueda segun criterio escrito
    $("#buscador").keypress(function(){

        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/dashboards/select_by",
            data: {data : $(this).val(), criterio : $("#criterio").val() },
            success: function(data){
                
                var opts = $.parseJSON(data);
                console.log(opts);
                $('#datos_encontrados').empty()
                $.each(opts, function(i, d) {
                       
                    $('#datos_encontrados').append("<tr><th scope='row'>"+d.id+"<td>"+d.fullname+"</td><td>"+d.job_title+"</td><td>"+d.company_name+"</td><td>"+d.date+"</td></tr>");
                       
                    })
            }
         });

        })


   
   
   
   
});