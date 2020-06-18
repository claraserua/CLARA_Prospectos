$(document).ready(function(){
	
	
	 if(gup("alert")){
		 //$.growlUI('Plan Operativo Enviado', 'Se ha enviado para su Revisión');
		 
		  $("#alerta").fadeIn();
		  $("#alerta").removeClass();
          $("#alerta").addClass("alert alert-success");
	      $("#headAlerta").html("¡Correcto!");
			
				
	      switch(gup("alert"))
         {
   		    case '1':
 		      $("#bodyAlerta").html("Se ha guardado la segunda parte del formato para la propuesta del Proyecto"); 
   		     break;
   	    	case '2':
  		      $("#bodyAlerta").html("Se ha enviado el plan operativo para su revisión"); 
 		      break;    
	    
         }
		 			
	}
	
	$( "#finicio" ).datepicker({
        changeMonth: true,
        changeYear: true,
	    dateFormat: 'yy-mm-dd' 
    });
	
	
	$( "#ftermino" ).datepicker({
        changeMonth: true,
        changeYear: true,
	    dateFormat: 'yy-mm-dd' 
    });		
	
	
  });




/*$(function(){
	  	  
		 
	$( "#finicio" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	
	$( "#ftermino" ).datepicker({
      changeMonth: true,
      changeYear: true,
	    dateFormat: 'yy-mm-dd' 
    });		
	


});//End function jquery*/

function validarFormulario(){
	
	var valido = true;
	
	if($('#nomProyecto').val()==""){ valido = false;}
		
	if($('#finicio').val()==""){ valido = false;}
	if($('#ftermino').val()==""){ valido = false;}   
	
	
	return valido;
	
}



function GuardarProyecto(){
	
    var idProyecto = $('#idProyecto').val();
	var nomProyecto = $('#nomProyecto').val();
	var descripcion = $('#descripcion').val();
	var contPlanE = $('input[name=contPlanE]:checked').val();
	var estaEnplanO = $('input[name=estaEnplanO]:checked').val();
	var estaPpto = $('input[name=estaPpto]:checked').val();
	
	var finicio = $('#finicio').val();
	var ftermino = $('#ftermino').val();
	
	
  	
	if(validarFormulario()){
		
		 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
		
	$.ajax({ 
	 
	 // type: "POST",
     //data: { name: "John", location: "Boston" }
	 
    type: "POST",  
    url: "index.php?execute=proyectos/addproyectofrm2&method=GuardarProyecto&Menu=F1&SubMenu=SF11",  
    data: { idProyecto: idProyecto, nomProyecto: nomProyecto, descripcion : descripcion, contPlanE:contPlanE, estaEnplanO:estaEnplanO, estaPpto:estaPpto, finicio:finicio,ftermino:ftermino},  
    success: function(msg){  
	
                                          
	/*setTimeout("window.location.href ='?execute=proyectos/addproyecto&method=default&Menu=F1&SubMenu=SF11&alert=1'",100);*/  $.unblockUI();
	    
	 if(msg.trim()==""){
	   
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el plan"); 
      
	 // setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q='",1000);
               }else{
			   	
				
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("<font size=\"3\">¡Ups! ha ocurrido un Error</font>");
				$("#bodyAlerta").html("<strong>No te alarmes</strong>!! al parecer no Se ha guardado la segunda parte del formato para la propuesta del Proyecto correctamente, por favor intentalo guardar nuevamente."); 
	 
				
				} 		
				
	  
               } 
	
   
           });

     }else{
	 	
		$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debes de ingresar todos los campos obligatorios");
	 	
	 }
}

	
	function gup(name){
	
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );
	if( results == null )
		return"";
	else
		return results[1];
}
	


	


