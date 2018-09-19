$(document).ready(function() {

    $(".checker").click(function(){
        var changer_id = $(this).val();
        $.ajax({
            method: "POST",
            url: ""+window.location.protocol+"/marte/languages/change_state",
            data: { id: changer_id }
          });
    });
   
   
});