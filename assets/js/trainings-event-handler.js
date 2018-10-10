$(document).ready(function() {

    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: ""+window.location.protocol+"/marte/trainings/change_state",
            data: { id: changer_id }
          });
    });

     //Comparador de fechas
     $("#enddate").change(function(){
        var date = moment($("#startdate").val());
        var now = moment($("#enddate").val());

        if (now < date) {
            alert("La fecha de salida no concuerda con la fecha de entrada");
            $("#enddate").val("");
        }
    });
   
   
});