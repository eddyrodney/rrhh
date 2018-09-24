$(document).ready(function() {

    //Llamada para completar las posiciones
    $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/positions/select_dd",
        data: { },
        success: function(data){

            var opts = $.parseJSON(data);
            $.each(opts, function(i, d) {
                $('#position_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
                $('#company_id').append('<option value="' + d.company_id + '" class="form-control">' + d.company + '</option>');
                $('#department_id').append('<option value="' + d.department_id + '" class="form-control">' + d.department + '</option>');
            });

             $("#payment").html("$"+opts[0].lowestpayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+" - $"+opts[0].highestpayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
        
      });

    // Llenar las habilidades disponibles
    $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/abilities/select_dd",
        data: { },
        success: function(data){

            console.log(data)
            var opts = $.parseJSON(data);
            $.each(opts, function(i, d) {
                $('#ability_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
            }
        )}

        });

    // Llenar los entranimientos disponibles
    $.ajax({
        method: "POST",
        url: window.location.protocol+"/marte/trainings/select_dd",
        data: { },
        success: function(data){

            var opts = $.parseJSON(data);
            $.each(opts, function(i, d) {
                $('#training_id').append('<option value="' + d.id + '" class="form-control">' + d.name + '</option>');
            }
        )}

        });


        

    //Checker para cambiar los estados
    $("#position_id").change(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: window.location.protocol+"/marte/positions/select_dd_d",
            data: { id : changer_id },
            success: function(data){
    
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#company_id').append('<option value="' + d.company_id + '" class="form-control" selected>' + d.company + '</option>');
                    $('#department_id').append('<option value="' + d.department_id + '" class="form-control" selected>' + d.department + '</option>');
                })


                $("#company_id").trigger("liszt:updated"); 
                $("#department_id").trigger("liszt:updated");
                $("#payment").html("$"+opts[0].lowestpayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+" - $"+opts[0].highestpayment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          
            }
          });
    });

    //Habilitar o deshabilitar un aplicante
    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: ""+window.location.protocol+"/marte/applicants/change_state",
            data: { id: changer_id }
          });
    });

   
   
   
   
});