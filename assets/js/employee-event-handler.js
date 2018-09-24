$(document).ready(function() {

    //Checker para cambiar los estados
    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/employees/change_state",
            data: { id: changer_id }
          });
    });

    //Botón para convertir un candidato en empleado
    $(".converter").click(function(){
        var converter_id = $(this).val();
        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/employees/converter",
            data: { id: converter_id },
            success: function(data){
                window.location.assign(window.location.protocol+"/marte/employee")
            }
          });
    });


   
   
   
   
});