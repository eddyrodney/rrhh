$(document).ready(function($) {


    $('.salario').mask('000000.00', {reverse: false});

    //Llamada para completar las compañias
    $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/companies/select_all",
        data: { },
        success: function(data){
            
            // Parse the returned json data
            var opts = $.parseJSON(data);
            // Use jQuery's each to iterate over the opts value
            $.each(opts, function(i, d) {
                // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                $('#company_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
            }
        )}
      });

      // Llamada para completar los riesgos
      $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/risks/select_all",
        data: { },
        success: function(data){
            
            // Parse the returned json data
            var opts = $.parseJSON(data);
            // Use jQuery's each to iterate over the opts value
            $.each(opts, function(i, d) {
                // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                $('#risk_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
            }
        )}
      });

     //Crear DD dependiente Compañia-Departamento
     $("#company_id").change(function(){
        var changer_id = $(this).val();
        $('#department_id').empty();
        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/departments/select",
            data: { id: changer_id },
            success: function(data){

                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#department_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
                }
            )}
          });

    });



    //Checker para cambiar los estados
    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: ""+window.location.protocol+"/marte/positions/change_state",
            data: { id: changer_id }
          });
    });

   
   
   
   
});