$(document).ready(function() {

    //Llamada para completar las compañias
    $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/companies/select_all",
        data: { },
        success: function(data){

            var opts = $.parseJSON(data);
            $.each(opts, function(i, d) {
                $('#company_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
            }
        )}
      });

    //Checker para cambiar los estados
    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/departments/change_state",
            data: { id: changer_id }
          });
    });

   
   
   
   
});