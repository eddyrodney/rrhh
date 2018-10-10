$(document).ready(function($) {

    $('#ssn').mask("000-0000000-0");
    $('.salario').mask('000000.00', {reverse: false});

    //Comparador de fechas
    $("#enddate").change(function(){
        var date = moment($("#startdate").val());
        var now = moment($("#enddate").val());

        if (now < date) {
            alert("La fecha de salida no concuerda con la fecha de entrada");
            $("#enddate").val("");
        }
    });

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

    
    $("#ssn").focusout(function(){
        var validador = valida_cedula($("#ssn").val());
        switch(validador){
            case 0:
                alert("Cédula Inválida");
            break;
            case 1:
                alert("Cédula Válida");
            break;
            default:
                alert("Cantidad de Caracteres Inválida");

         }
    });


    function valida_cedula(ced) {  
	    var c = ced.replace(/-/g,'');  
	    var cedula = c.substr(0, c.length - 1);  
	    var verificador = c.substr(c.length - 1, 1);  
	    var suma = 0;  
		var cedulaValida = 0;
	    if(ced.length < 11) { return false; }  
	    for (i=0; i < cedula.length; i++) {  
	        mod = "";  
	         if((i % 2) == 0){mod = 1} else {mod = 2}  
	         res = cedula.substr(i,1) * mod;  
	         if (res > 9) {  
	              res = res.toString();  
	              uno = res.substr(0,1);  
	              dos = res.substr(1,1);  
	              res = eval(uno) + eval(dos);  
	         }  
	         suma += eval(res);  
	    }  
	    el_numero = (10 - (suma % 10)) % 10;  
	    if (el_numero == verificador && cedula.substr(0,3) != "000") {  
	      cedulaValida = 1;
	    }  
	    else   {  
	     cedulaValida = 0;
	    }  
		return cedulaValida;
    }
    
  
});