var array_objespecificos = new Array();
//array_objespecificos.push("1");
var distribucion= new Array();
//distribucion.push("1");
var tab = "";
var nomBan="";




$(function(){
		
	$( ".finicio" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });

   $( ".ftermino" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	 
	 
	 var dates = $( "#finicio, #ftermino" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd' ,
			//numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "finicio" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	 
	 
	 
	 $( "#datetapai1" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	$( "#datetapaf1" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	
	
	 $( "#datetapai1e" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	$( "#datetapaf1e" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	 
	 
	
	  	  

});//End function jquery



$(document).ready(function(){
	

	
	if(gup('view')=='gantt'){
		
	$("#myTablab li").each( function (index) {
      index += 1;
     if(index % 7 == 0) {
       $(this).addClass("active");
      }
	  
     });
	 
	 $("#tab7").addClass("tab-pane active");
	}else{
		$('#myTablab a:first').tab('show');
	}
	
	
	
	$('#myTablab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	
	
	$('#inputField-gralproyecto').bind("blur focus keydown keypress keyup", function(){recountr();});
	$('update_button-gralproyecto').attr('disabled','disabled');
	$("#inputField-gralproyecto").Watermark("Agrega tu comentario ...");
	
	$("#btnaddetapas").click(function () {
		
	$('#dialogEtapas').modal('show');
	
	});
	
	
	$("#btnaddpasos").click(function () {
		
	$('#dialogPasos').modal('show');
	
	idProyecto = gup('IDProyecto');
	
	$.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=getEtapas&idProyecto="+idProyecto,  
    data: { idProyecto: idProyecto},  
    success: function(msg){  
	
	  
	  
	  $('#cboetapas').html(msg);
	
	  
     } 
   
     });
	
	});
	
	
	$("#btneditpasos").click(function () {
			$(".icongantt").show();
			$("#btneditpasos").hide();
			$("#btneditcancelar").show();
			});
	
	$("#btneditcancelar").click(function () {
			$(".icongantt").hide();
			$("#btneditpasos").show();
			$("#btneditcancelar").hide();
			});	
	
	buscarArchivos('1');
	buscarArchivos('2');
	buscarArchivos('3');
	buscarArchivos('4');
	buscarArchivos('5');
	
	//POST FRAME ADD IMAGE USER
	$('.frmadjuntos').iframePostForm
	({
		json : false,
		post : function ()
		{
			var message;			
				
			var num = $('#num').val();
			
									
			if ($('#titulo'+num).val().length/*&&$('#nomProyecto').val().length*/)
			{  
			
				//GUARDANDO ARCHIVOS
					
			$('html, body').animate({scrollTop:0}, 'slow');
              $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
				
			}else{
				
				//alert("Debes de ingresar todos los campos obligatorios y verifica que tenga Nombre el Proyecto");
				alert("Se debe ingresar el título del archivo");
				return false;
			}		
			
		},
		complete : function (response)
		{
			
			
	//alert(response);
			if (response.trim()=="false" || response.trim() != "")
			{
			    $('html, body').animate({scrollTop:0}, 10);
				$.unblockUI();
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("!Error!");
				$("#bodyAlerta").html("Se ha producido un error al guardar los datos, intentelo nuevamente.");
				
				return false;
			}
			
			else
			{
				var num = $('#num').val(); 
				//alert(num+' salida')
				
				buscarArchivos(num);
				
				$.unblockUI();
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado el Anexo");
				
				
				//$("#frmaddusuarios")[0].reset();
				
				//$('#sel2').empty();
				
				//window.setTimeout("window.location.href='?execute=usuarios&Menu=F3&SubMenu=SF8#&p=1&s=25&sort=1&q='",1000)
			 
				return false;
				
				
			}
		}
	});
	
		//END POST FRAME ADD IMAGE USER		
	
	 if(gup("alert")){
		 //$.growlUI('Plan Operativo Enviado', 'Se ha enviado para su Revisión');
		 
		  $("#alerta").fadeIn();
		  $("#alerta").removeClass();
          $("#alerta").addClass("alert alert-success");
	      $("#headAlerta").html("¡Correcto!");
			
				
	      switch(gup("alert"))
         {
   		    case '1':
 		      $("#bodyAlerta").html("Se ha guardado la propuesta del Proyecto"); 
   		     break;
   	    	case '2':
  		      $("#bodyAlerta").html("Se ha guardado el plan Estrategico para su revisión"); 
 		      break;    
	    
         }
		 			
	}
		
	//llama a una funcion esnumerico para Validar Input text para solo ingresar números con punto decimal
	jQuery(".comboNum").keydown(function(event) {
		
		/*alert("entro");
		alert(String.fromCharCode(event.which));
		alert(event.which);*/
             // teclas especiales backspace,  return, izquierda, derecha, suprimir, . y . teclado numerico
        var permitidos = [8,9,13,46,110,189,190];
        if(!esNumerico(event.which,permitidos))
            event.preventDefault();
	
	});
	
	//llama a una funcion para Validar solo ingresar letras
	/*jQuery(".comboLetras").keydown(function(event) {
		
			 validarLetras(event.which);     
	
	});*/
	
	      
		  
		/*  $("#alineacion,#alineacion2").click(function(){		
		     var x=$(this).val();
		      x = parseInt(x);	
		     
			  
			   
		     if(x == 1){
			   	
				$("#contPlanE").prop('disabled',true);
				$("#contPlanE2").prop('disabled',true);
				$("#estaEnplanO").prop('disabled',true);
				$("#estaEnplanO2").prop('disabled',true)
				
					
					
			}
				 else{
				 	
					$("#contPlanE").prop('disabled',false)
					$("#contPlanE2").prop('disabled',false)
					$("#estaEnplanO").prop('disabled',false)
					$("#estaEnplanO2").prop('disabled',false)
				 }
				 
				 
		 });*/
		  
		  
		  
		  
	
	//accion boton cancel modal plan estrategico 
	$("#cancel").click(function(){
		
		if($('#planE').val()== ""){
	//solo fijo el radio (no) a no, cuando no se ha seleccionado un plan e
		$("#contPlanE").prop('checked',true);
		
			
		}	
	 });
	 
	 //radio plan Estrategico no
	$("#contPlanE").click(function(){
	 	
	//borro el id y titulo de pe
	$('#idPlanE').attr("value","");
	$('#planE').attr("value","");
	
	$('#plan').fadeOut('slow');
	
//borro el id y titulo de po cuando se de click en radio plan estrategico (no)
	$('#idPlanO').attr("value","");
	$('#planO').attr("value","");
	
	$('#plan2').fadeOut('slow');
//fijo el radio (no) a no de po		
	$("#estaEnplanO").prop('checked','true');
	
	//actualiza los valores de los combos objetivosE y resultado cuando no hay una linea E y se desabilitan
	     actualizaTextoCombosEstrategicos();
		 desabilitarCombosEstrategicos();
	
	
	
		
	 });
	 
	  //radio plan operativo no
	 $("#estaEnplanO").click(function(){	 	
	
	//borro el id y titulo de po
	$('#idPlanO').attr("value","");
	$('#planO').attr("value","");

	$('#plan2').fadeOut('slow');
		
	 });
	 
 //accion boton cancel modal plan operativo
	 $("#cancel2").click(function(){	 	
//solo fijo el radio (no) a no, cuando no se ha seleccionado un plan o		
		if($('#planO').val()== ""){
			
		$("#estaEnplanO").prop('checked','true');
		
		}		
		
	 });
	 		
	//radio si no de fuentes de inversion interna
	$("#interna,#interna2").click(function(){		
		var x=$(this).val();
		  x = parseInt(x);		
		if(x == 1)
		{    	   // $("#etq").text('');				 
					 						 
              	      /* $('#ftesIntCheck input[type=checkbox]').each(function(){
			 					
			 	  	        if( $(this).prop('checked')){
								$(this).prop('checked',false);
								$(this).fadeOut();
					         //	
				             }
				
				         }); */
		 //campo ftesInversion Interna(text) y los checkboxMonto  
			$("#ftes").fadeIn("slow");			
			$("#ftesIntCheck").fadeIn("slow");
			  		
		     //selecciona a si el radio en analis financiero
		        $('#interna3').prop('checked',true);
				$('#intSi').show();				
				
				  
				 //pasa el valor del campo
				 var ftesinvint = $('input[name=ftesInvIntMonto]').val();
				
				$('input[name=ftesInvIntMonto2]').val(ftesinvint);
				 //muestra el campo monto(text) en analisis	
				$("#ftes3").fadeIn();
				$("#ftesIntText").css('display','block');
				
				//oculto radio no
				 $('#intNo').hide();
						  
			      //oculta label y todos los checkbox	de analisis	           
	             // ocultarLabelCheckInt(); 
		             
		}
		else{
			
			
			$("#ftes").fadeOut("slow");
		    $("#ftesIntCheck").fadeOut("slow");
			
			      //selecciona a no el radio en analis financiero
		          $('#interna4').prop('checked',true);	
				  $('#intNo').show();
				  
				   $('#intSi').hide();
				   //limpia Text
				  // $('input[name=ftesInvIntMonto]').val('');
				   		  
			       //oculta label y todos los checkbox	de analisis	           
	               ocultarLabelCheckInt();
		}		     
		 
       });
	   
	   
	   
	   $("#externa,#externa2").click(function(){		
		var x=$(this).val();
		  x = parseInt(x);		
		if(x == 1)
		{
				 $("#ftes2").fadeIn();
				 $("#ftesExtCheck").fadeIn("slow");
				 
				 //selecciona a si  el radio en analis financiero
		          $('#externa3').prop('checked',true);
				  $('#extSi').show();					 
				  //oculta label y todos los checkbox	de analisis	
				  
				  
				  $("#ftes4").fadeIn();
				$("#ftesExtText").css('display','block');
				
				//oculto radio no
				 $('#extNo').hide();
				  // ocultarLabelCheckExt();
		}
		else{
			    $("#ftes2").fadeOut();
				 $("#ftesExtCheck").fadeOut("slow");
				 
				 //selecciona a no el radio en analis financiero
		          $('#externa4').prop('checked',true);	        	
				  $('#extNo').show();			 
				
				  
				   $('#extSi').hide();
				   //limpia Text
				  // $('input[name=ftesInvExtMonto]').val('');
				   
				   ocultarLabelCheckExt();
				
			}
		        
       });
	   
	   
	/*   $("#estaPresAnual,#estaPresAnual2,#estaPresAnual3").click(function(){		
		var x=$(this).val();
		 // x = parseInt(x);
		 		  	
		if(x == 'S')
		{   
		    $("#ver2").fadeIn();
		    $("#ver3").fadeIn();
			$("#ver4").fadeOut();
			
			
			
		
		}else if(x == 'N')
		{
			$("#ver2").fadeOut();
			$("#ver3").fadeOut();
			$("#ver4").fadeIn();
		
		}
		
		else if(x == 'P'){			
			
		    $("#ver2").fadeIn();
			$("#ver3").fadeIn();
			$("#ver4").fadeIn();
		
		}		        
       });*/
	   
	   
	   $("#ver").click(function(){
	   			
		   if($('#interna').is(':checked')){
		   	var ftesinvint = $('input[name=ftesInvIntMonto]').val();
			//pasa el valor del campo				
				$('input[name=ftesInvIntMonto2]').val(ftesinvint);
				
				
				//selecciona a si el radio en analis financiero
		        $('#interna3').prop('checked',true);
				$('#intSi').show();				
				
			
				 //muestra el campo monto(text) en analisis	
				$("#ftes3").fadeIn();
				$("#ftesIntText").css('display','block');
				
				//oculto radio no
				 $('#intNo').hide(); 
				
				
				
			
		   }else{
		   	
			 $('#interna4').prop('checked',true);	
				  $('#intNo').show();
				  
				   $('#intSi').hide();
				   //limpia Text
				   ocultarLabelCheckInt();
		   	
			
		   }
		   
		    if($('#externa').is(':checked')){ 
			
			
				  //pasa el valor del text a otro de la seccion analisis
		          var ftesinvext = $('input[name=ftesInvExtMonto]').val();				
				$('input[name=ftesInvExtMonto2]').val(ftesinvext);
			
			//selecciona a si  el radio en analis financiero
		          $('#externa3').prop('checked',true);
				  $('#extSi').show();					 
				  //oculta label y todos los checkbox	de analisis	
				  
				  
				  $("#ftes4").fadeIn();
				$("#ftesExtText").css('display','block');
				
				//oculto radio no
				 $('#extNo').hide();
		   
		   
		     }else{
			 	//selecciona a no el radio en analis financiero
		          $('#externa4').prop('checked',true);	        	
				  $('#extNo').show();			 
				
				  
				   $('#extSi').hide();
				   //limpia Text
				  // $('input[name=ftesInvExtMonto]').val('');
				   
				   ocultarLabelCheckExt();
				
				
				
			 }
		   				
				
	   });
	   
	    /*seccion 6.1 */
	   
	   /*$("#interna3,#interna4").click(function(){		
		     var x=$(this).val();
		      x = parseInt(x);	
		       var nomcheck="";
			  
			   
		     if(x == 1){
			   	
				var ftesinvint = $('input[name=ftesInvIntMonto]').val();
				var ban=true;
				$('input[name=ftesInvIntMonto2]').val(ftesinvint);
				
			   	
				 //si el radio (no) esta seleccionado etiqueta a No en la etiqueta resumen
				 if($("#interna2").prop('checked')){
				 	
					$("#etq").html('<h2>No</h2>');
					
					//deseleccionar todos los check					
		
		            //oculta label y todos los checkbox		           
	                $("#ftes3").fadeOut();
					$("#ftesIntText").css('display','none');
					
					ban=false;
					
					
					
					}
				 else{
				 	     var ban2 = false;
				 	   // $("#etq").text('');				 
					 
					 
					 	//muestra las etiquetas no si no hay check seleccionados					 
              	       $('#ftesIntCheck input[type=checkbox]').each(function(){
			 					
			 	  	        if( $(this).prop('checked')){
								ban2=true;
					         // nomcheck = $(this).val();
				          	//alert(nomcheck);
				         	//$('#'+nomcheck).fadeIn();		
				             }
				
				         });  
				      if(!ban2){$("#etq").html('<h2>No</h2>');}
					  else{$("#etq").text('');}
					     
					 
				     }
				 
						//$("input[@name='ftesInvInt_array[]']:checked").each(function() {
          			 // categorias.push($(this).val());	      
                    
			
			       $("#ftes3").fadeIn();
				   
				   //si el radio (no) esta seleccionado etiqueta a No en la etiqueta resumen 
				   if(ban){
				   	$("#ftesIntText").fadeIn("slow");
				   }
			      			
		
		 }
		  else{ 
		 		  
		  //deseleccionar chk
		  
		  
		  //oculta label y todos checkbox
	    	ocultarLabelCheckInt();
		   
		 
		  }
		
		       
       });*/
	   
	   
	/*   $("#externa3,#externa4").click(function(){		
		var x=$(this).val();
		  x = parseInt(x);		
		if(x == 1)
		{        //pasa el valor del text a otro de la seccion analisis
		          var ftesinvext = $('input[name=ftesInvExtMonto]').val();
				
				$('input[name=ftesInvExtMonto2]').val(ftesinvext);
				var ban=true;
				//si el radio (no) esta seleccionado etiqueta a no
		          if($("#externa2").prop('checked')){
				  	      $("#etq2").html('<h2>No</h2>');
						  
						  
						  //oculta label y todos los checkbox	
	                     $("#ftes4").fadeOut();
	                     $("#ftesExtText").fadeOut("slow");
						  
						  ban=false;
						  
					}
				
				 else{
				 	   var ban2=false;
				 	   $("#etq2").text('');
					 
					   $('#ftesExtCheck input[type=checkbox]').each(function(){
			 	
			 	            if( $(this).prop('checked')){
					     	ban2=true;
					       // var nomcheck = $(this).val();
					         //alert(nomcheck);
					        //$('#'+nomcheck).fadeIn();			
				
				              }
					       
				
				         });	
					  if(!ban2){$("#etq2").html('<h2>No</h2>');} 
					 
					 }
				
				 
				//text de externa
				$("#ftes4").fadeIn();
				
				 if(ban){
				   	 $("#ftesExtText").fadeIn("slow");
				   }
				
		}
		else{ 
		  //borra el label y oculta todos checkbox de externa en pestaña analisis f
		  ocultarLabelCheckExt();
		  }
		        
       });*/
	   
	   //fija a no el radio y oculta los labels cuando seleccciona
	  /*$('#tab1 input[type=checkbox]').click(function(){	
		
	  });*/	   
	   
	    if(gup("p")){}else{
   urltag = "&p=1&s=25&sort=1&q=";
   window.location.hash = urltag;
   }
	
  });//End function jquery*/
  
  
  
  
  
  
  
  
  
  $('.stdelete').live("click",function() 
{
var ID = $(this).attr("id");

if(confirm("¿Estás seguro que deseas  borrar el comentario?"))
{
	
	$("#stbody"+ID).prepend('<img src="skins/default/img/spinner-mini.gif" />');
	$.ajax({
		type: "POST",
		url: "index.php?execute=proyectos/editproyecto&method=eliminarComentario",  
		data: {idcomentario: ID},  
		cache: false,
		success: function(html){
			
		$("#stbody"+ID).slideUp();
		}
 	});
}
return false;
});
  
  
  
  
 $('.stdeleter').live("click",function() 
{
var ID = $(this).attr("id");
var idcomentario =  ID.substring(1);
    

if(confirm("¿Estás seguro que deseas  borrar el comentario?"))
{
	
	$("#stbody"+ID).prepend('<img src="skins/default/img/spinner-mini.gif" />');
	$.ajax({
		type: "POST",
		url: "index.php?execute=proyectos/editproyecto&method=eliminarComentarioGral",  
		data: {idcomentario: idcomentario},  
		cache: false,
		success: function(html){
			
			
			
		$("#stbody"+ID).slideUp();
		}
 	});
}
return false;
});






/*function disabledAlineacion(id){
		
		
		 $("#estaEnplanO").value('');
		
	}*/
	


function Tooglecomentarios(id){
		var local = id.split("-");
		if($('#BOXCOM-'+local[1]).is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i> Comentarios');
		else $('#'+id).html('<i class="icon-chevron-up"></i> Comentarios');
		
		if ($('#BOXCOM-'+local[1]).is (':visible')) $('#BOXCOM-'+local[1]).slideUp();
		if ($('#BOXCOM-'+local[1]).is (':hidden')) $('#BOXCOM-'+local[1]).slideDown();
	}
	

function guardarComentario(id,idProyecto, num){
	
	
	id = id.substring(13)
	id = id.split("-");
	var tipo = "R";
	
  	
	if($("#mandatorio-proyecto-"+id[1]).is(':checked')){
		tipo = "M";
	}
	
    var comentario = $("#inputField-"+id[1]).val();
	
	$("#counter-"+id[1]).html('<img src="skins/default/img/spinner-mini.gif" />');
	
		$.ajax({
			type: "POST",
			url: "index.php?execute=proyectos/editproyecto&method=insertarComentario",  
			data: { comentario: comentario, idProyecto: idProyecto, num: num, tipo:tipo},  
			cache: false,
			success: function(html)
			{
				
				$("#comentarios-"+id[1]).prepend($(html).fadeIn('slow'));
				$("#inputField-"+id[1]).val('');	
				$("#inputField-"+id[1]).focus();
				$("#counter-"+id[1]).html('');
				//$("#stexpand").oembed(html);
  			}
 		});
	return false;

}

function recount(id)
{  

$('#update_button-T'+id).removeAttr('disabled').removeClass('inact');
}




 
 function ver_ocultarCheckInvInterna(id){
	    
		
		var local = id.split("-");
		
		if($('#interna').is(':checked')){
			
			if($('#'+id).is(':checked')){
				
				$("#ftes3").css('display','block');
				$("#ftesIntText").css('display','block');
				$('#LBL-'+local[1]).css('display','block');
				
	            
				
			}
				
			else{
				
				$('#LBL-'+local[1]).css('display','none');
				
				//selecciona a no el radio en analis financiero		
		        //$('#interna4').prop('checked',true);
			
			}			
						
		//$('#LBL-'+local[1]).toggle();
		
		//selecciona a no el radio en analis financiero		
		       // $('#interna4').prop('checked',true);
		
		//oculta label y todos los checkbox
		//ocultarLabelCheckInt();
		
		}
		
		else{
			
			$('#LBL-'+local[1]).css('display','none');
		}
		
			
	}
	
	 //oculta en la pestaña analisis financiero
  function ocultarLabelCheckInt(){
  	
	//borra label si existe cuando selecciona no
	 $("#etq").text('');
	//oculta label y todos los checkbox	
	//alert('entro');
	 $("#ftes3").css('display','none');
	 $("#ftesIntText").css('display','none');
	
			
			/* $('#ftesIntCheck input[type=checkbox]').each(function(){
			 	
				
			 	    if( $(this).prop('checked')){
					    nomcheck = $(this).val();
				      	//alert(nomcheck);
				      	$('#'+nomcheck).fadeOut('slow');		
				
				
				       }
				
				});	*/
  }
	
	function ver_ocultarCheckInvExterna(id){
	    
		//alert("entro");
		var local = id.split("-");
		
		if($('#externa').is(':checked')){
			
			if($('#'+id).is(':checked'))
			{   
			    $("#ftes4").css('display','block');
				$("#ftesExtText").css('display','block');
				$('#LBL-'+local[1]).css('display','block');
			}
			else{
				
				$('#LBL-'+local[1]).css('display','none');
			}
					
		//$('#LBL-'+local[1]).toggle();
		
		
		//oculta label y todos los checkbox
		//ocultarLabelCheckExt();
		
		
		}
		else{
			
			$('#LBL-'+local[1]).css('display','none');
		}
		
	} 
  
 
  
   function ocultarLabelCheckExt(){
  	
	//borra label si existe
	 $("#etq2").text('');
	//oculta label y todos los checkbox	
	 $("#ftes4").css('display','none');
	 $("#ftesExtText").css('display','none');
	 		         
			    
 }
 
 
  function disabledMonto(id){
	    //saco el valor del radio que se clickeo
		var valor = $('#'+id).val();
		valor = parseInt(valor);
		var local = id.split("-");
		
		if(valor == 0){$('#TXT-'+local[1]).prop('disabled', true);
		$('#TXT-'+local[1]).val('');
		}
		else {$('#TXT-'+local[1]).prop('disabled', false);}			
		
		
	}
	
	function recountr()
{  
$('#update_button-gralproyecto').removeAttr('disabled').removeClass('inact');
	
}	
	function ToogleGral(id){
		var local = id.split("-");
		if($('#BOXCOMENTGRALES').is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i> Comentarios');
		else $('#'+id).html('<i class="icon-chevron-up"></i> Comentarios');

		if ($('#BOXCOMENTGRALES').is (':visible')) $('#BOXCOMENTGRALES').slideUp();
		if ($('#BOXCOMENTGRALES').is (':hidden')) $('#BOXCOMENTGRALES').slideDown();
	}
	
	
	

function guardarComentarioGralProyecto(){

	//var idplan = gup('IDPlan');
	var idProyecto =  $('#idProyecto').val();
    var comentario = $("#inputField-gralproyecto").val();
	var tipo = "R";
	
 
	if($("#mandatorio-gralproyecto").is(':checked')){
		tipo = "M";
	}
	
		
	$("#counter-gralproyecto").html('<img src="skins/default/img/spinner-mini.gif" />');
	
		$.ajax({
			type: "POST",
			url: "index.php?execute=proyectos/editproyecto&method=insertarComentarioGral",  
			data: { comentario: comentario, idProyecto: idProyecto, tipo:tipo},  
			cache: false,
			success: function(html)
			{
				
				$("#comentarios-gralproyecto").prepend($(html).fadeIn('slow'));
				$("#inputField-gralproyecto").val('');	
				$("#inputField-gralproyecto").focus();
				$("#counter-gralproyecto").html('');
				//$("#stexpand").oembed(updateval);
  			}
 		});
	return false;

	
}



	
	
	
 function buscarObjetivosE_Res(){
  
 /*$('div.table').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });*/
  
    var idPlanO= $("#idPlanO").val();
	var idLineaE= $("#idLineaE").val();
	//alert(idLineaE);
	//var idObjE = $("#idObjE").val();				
   
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=obtenerObjetivosE_Res&idLineaE="+idLineaE+"&idPlanO="+idPlanO,  
    success: function(msg){  
	//alert('entro');
	var contenido = msg.split('#%#');

    	//alert(contenido);
   
   $('#idObjE').html(contenido[0]);
   $('#idResultado').html(contenido[1]); 
    
  
  
   if(contenido[1] == undefined){      
      $('#idObjE').prop("disabled",false); 
	} 
     // $('div.tableModal').unblock();	  
	
 
   } //fin success
   
           });//fin .ajax
	
  } 
  
  function buscarArchivos(num){
  
				 
	 $('#results-panel').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' }); 
 
 
 
 
    var idProyecto = $('#idProyecto').val();
	var editArchivo = $('#editArchivo').val();
   //alert(idProyecto+' buscar');
   
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=obtenerArchivo&num="+num+"&idProyecto="+idProyecto+"&editArchivo="+editArchivo,  
    success: function(msg){  
	
	var contenido = msg.split('#%#');
    var num = parseInt(contenido[1]);
	
    	// alert(contenido[1]+' aca');
		 
  if(num == 1){
  	$('#results-panel').html(contenido[0]); 
  }
  
  else if(num == 2){
  	 $('#results-panel2').html(contenido[0]);
  }  	
  
  else if(num == 3){
  	 $('#results-panel3').html(contenido[0]);
  }	
   else if(num == 4){
  	 $('#results-panel4').html(contenido[0]);//conclusiones
  }	
  else{
  	$('#results-panel5').html(contenido[0]);   
   
   }
   //alert(contenido[1]);
  // $('#results_text').html(contenido[1]+" Resultados"); 
 

	 
      $('#results-panel').unblock();	  
 // $.unblockUI();
               } 
   
           });
	
  }
  
  
  function WindowOpen(idArchivo,idProyecto){
  	
	  var href = "index.php?execute=proyectos/archivo&method=default&idArchivo="+idArchivo+"&idProyecto="+idProyecto;
		var caracteristicas = "height=600,width=900,scrollTo,resizable=1,scrollbars=1,location=0";
      	nueva=window.open(href, 'Popup', caracteristicas);
      	return false;
}
  
  
  function deleteArchivo(id,num){
  	
	var idArchivo = id; 
	
	
		
		
	var borrar =  confirm('¿Seguro que desea eliminar el Archivo?');	
		
	if(borrar){
				
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=EliminarArchivo&idArchivo="+idArchivo+"&num="+num,  
    success: function(msg){  
	
    // alert(msg+'actual');
	 buscarArchivos(msg);
    
            } 
      });
	  
	  }
	
	
  }


 
 
  
  function AsignarPlanEstrategico(confirm){
      
	 if(!confirm){
	
	 $("#aceptarmodalpe").attr("onClick", "javascript:RedirectPlanEstrategico();return false;");
	 
	  
     $('#myModalplanese').modal('show');
	setTimeout("buscarPlanesE()",900);
	 }else{
	 $('#myModalplanese').modal('hide');
	 
	 
	 }
}


function AsignarPlanOperativo(confirm){
      
	 if(!confirm){
	 		 		
	 $("#aceptarmodalpo").attr("onClick", "javascript:RedirectPlanOperativo();return false;");
	
	 //valida que exista plan estrategico
	  var plane = $("#planE").val();
	  var idplane = $('#idPlan').val();
	    
	  if( plane == "" || idplane == ""){
	  	
		alert("Debes seleccionar un Plan Estrategico");
		
// fija el radio (no po del año) a no, cuando no se ha seleccionado un plan e		
		$("#estaEnplanO").prop('checked','true')
		return false;
	  	
	  }
	 $("#titlemodalplano").html(plane+" / Elige Plan Operativo");
	  
     $('#myModalplaneso').modal('show');
	setTimeout("buscarPlanesOperativos()",900);
	 }else{
	 $('#myModalplaneso').modal('hide');
	  }
}



function RedirectPlanEstrategico(){
	
  var valstring =  $("input:radio[name=rbtplane]:checked").val();
  
  
         if(valstring!=null){
		 	
			var nstring = valstring.split("|");
            var idplane = nstring[0];
            var idjerarquia = nstring[1];
            var plane = nstring[2];	
			
			//guardo el id del plan Estrategico(hidden) y titulo planE(input text)
			$("#idPlanE").val(idplane);
		    $("#planE").val(plane);
		    $('#plan').fadeIn('slow');
			
			
			
			
		 //actualiza los valores de los combos lineaE, objetivosE y resultado cuando no hay una linea E y se desabilitan
		 		 
		 actualizaTextoCombosEstrategicos();
		 desabilitarCombosEstrategicos();			
		 
		 
		 
		  //fijo el radio (no) a no de po		
	       $("#estaEnplanO").prop('checked','true');
		   //borro lo que hay en plan operativo id(hidden) y titulo(input text)
		   $("#idplanO").val('');
		   $("#planO").val('');
			//oculto el input text y boton  de operativo
			$("#plan2").fadeOut();
		   buscarLineaEstrategica();
		   $('#myModalplanese').modal('hide');		
			
			
		 }  
		 
		 else{
		alert("Debe seleccionar un Plan Estrategico");
	      }
 
		 
		 
  
/* if(idplane!=null){
   window.location.href = '?execute=planesoperativo/addplano&method=default&Menu=F2&SubMenu=SF21&IDPlanEstrategico='+idplane+'&IDJerarquia='+idjerarquia;
   	
    }*/
}

function RedirectPlanOperativo(){
	
  var valstring =  $("input:radio[name=rbtplano]:checked").val();
  
  
  
  
         if(valstring!=null){
		 	
			var nstring = valstring.split("|");
            var idplane = nstring[0];
            var idjerarquia = nstring[1];
            var plane = nstring[2];		
			
			
				$('#idResultado').prop("disabled",true);
			    $('#idResultado').html('<option></option>'); 
			
			$("#idPlanO").val(idplane);
		  $("#planO").val(plane);
		 $('#plan2').fadeIn('slow');
		 
		  obtenerResultados();
		   $('#myModalplaneso').modal('hide');		
			
		 }  
		 
		 else{
		alert("Debe seleccionar un Plan Operativo");
	      }
 
		 
		 
 
}

function showLimitPage(s,id){

  urltag = "&p="+gup('p')+"&s="+s+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
  
   window.location.hash = urltag;	
   buscarPlanesOperativos();	
  }

  
  
   function showLimitPage2(s,id){

  urltag = "&p="+gup('p')+"&s="+s+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
  
   window.location.hash = urltag;	
   buscarPlanesE();
  }
  //evento paginado modal pe
  function showPage(p){

  urltag = "&p="+p+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
 
   window.location.hash = urltag;
   buscarPlanesE();	
  }
  //evento paginado modal po
  function showPage2(p){

  urltag = "&p="+p+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
 
   window.location.hash = urltag;
   buscarPlanesOperativos();	
  }
  
  function buscarPE(){
  		
	q = $('#searchbar').val();
	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
	window.location.hash = urltag;
    buscarPlanesE();
	
  }
  
  function buscarPO(){
  		
	q = $('#searchbarpo').val();
	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
	
    if(gup('filter')){
	urltag += "&filter="+gup('filter');	
	}
	window.location.hash = urltag;
    buscarPlanesOperativos();
	
  }
  
  function buscarLineaEstrategica(){
  
 /*$('div.tableModal').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });*/
  
	
	
	
	
	if ($("#idPlanE").val().length)
	{ 
	    var idplane= $("#idPlanE").val();
	
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=obtenerLineas&idplane="+idplane,  
    success: function(msg){  
	
	var contenido = msg.split('#%#');

    	//alert(msg);
   
   $('#idLineaE').html(contenido[0]); 
   
   if(contenido[1] == undefined){
   	 $('#idLineaE').prop("disabled",false);
   	}
	
   //se desabilita el combo lineas E
      
  
   //actualiza los valores de los combos objetivosE y resultado cuando no hay una linea E y se desabilitan
  /* if(contenido[1] != undefined){
   
   $('#idObjE').html('<option>NO EXISTEN RESULTADOS</option>');
   $('#idResultado').html('<option>NO EXISTEN RESULTADOS</option>');
   desabilitarCombosEstrategicos();	 
   	
   }  */
   
    
      //$('div.tableModal').unblock();	  
	  
 
               } 
   
           });
		   
	 }else{
	 	//alert('Debes seleccionar un Plan Estrategico para traer una lines estrategica')
		   	
		   }
	
  }
  
  
  function buscarPlanesOperativos(){
  
 $('div.tableModal').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });
  
  var fil="";
  var q="";
  
    q = gup('q');
	//$('#searchbar').val(q);
	
	var idplanE= $("#idPlanE").val();
	 

  var s= parseInt(gup('s'));
  
  urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
  
  if(gup('filter')){
		urltag += "&filter="+gup('filter');
	}
   	
   window.location.hash = urltag;
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=BuscarPlanesOperativos&idplanE="+idplanE+""+urltag,  
    success: function(msg){  
	
	var contenido = msg.split('#%#');

    //	alert(msg);
    $('#paggingheadModal2').html(contenido[0]);
   $('#results-panel-Modal2').html(contenido[1]);
   $('#barfilterfooterModal2').html(contenido[2]);
   $('#results_textModal2').html(contenido[3]+" Resultados"); 
  
   
    
  
   //actualiza los valores de los combos objetivosE y resultado cuando no hay una linea E y se desabilitan
 /*  if(contenido[5] != undefined){
   
   $('#idObjE').html('<option>NO EXISTEN RESULTADOS</option>');
   $('#idResultado').html('<option>NO EXISTEN RESULTADOS</option>');
   desabilitarCombosEstrategicos();	 
   	
   } */ 
   
   
	switch(s)
{
 case 25:
 $("#page_size_25-panel").addClass("page_size_25-selected");
  break;
 
 case 50:
 $("#page_size_50-panel").addClass("page_size_50-selected");
 break;
 
 case 100:
 $("#page_size_100-panel").addClass("page_size_100-selected");
  break;
 
 case 200:
 $("#page_size_200-panel").addClass("page_size_200-selected");
  break;

 
 
}
	 
      $('div.tableModal').unblock();	  
	  //popover
	//$('[rel="popover"],[data-rel="popover"]').popover();
 
               } 
   
           });
	
  }
  
  
  function obtenerResultados(){
  
 /*$('div.tableModal').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });*/
  	
	
	
	if ($("#idPlanO").val().length)
	{ 
	    var idPlanO= $("#idPlanO").val();
	
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=obtenerResultados&idPlanO="+idPlanO,  
    success: function(msg){  
	
	var contenido = msg.split('#%#');

    	//alert(msg);
   
   $('#idResultado').html(contenido[0]); 
   
   if(contenido[1] == undefined){
   	 $('#idResultado').prop("disabled",false);
   	}
	
  
   
    
      //$('div.tableModal').unblock();	  
	  
 
  } 
   });
		   
	 }else{
	 	//alert('Debes seleccionar un Plan operativo para traer una Resultado()')
		   	
		   }
	
  }
  
  
 function desabilitarCombosEstrategicos(){  
   
    $('#idLineaE').prop("disabled",true);
    $('#idObjE').prop("disabled",true);
	$('#idResultado').prop("disabled",true);
	
 }
 
 function actualizaTextoCombosEstrategicos(){
 	
 	    $('#idLineaE').html('<option></option>');
		 $('#idObjE').html('<option></option>');
         $('#idResultado').html('<option></option>');
	
 }
  
   
  
  function buscarPlanesE(){
  
   
   $('div.tableModal').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });
  
  var fil="";
  var q ="";
  
    
	q = $('#searchbarpe').val();

     if(q==null){
	 	q="";
	 }	
		
  var s = parseInt(gup('s'));
  
  urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
  
   	
   window.location.hash = urltag;
	
	$.ajax({ 
    type: "GET",  
    url: "index.php", 
    data: "execute=proyectos/editproyecto&method=BuscarPlanesEstrategicos"+urltag,  
    success: function(msg){  
	
	var contenido = msg.split('#%#');

    	// alert(msg);
   $('#paggingheadModal').html(contenido[0]);
   $('#results-panel-Modal').html(contenido[1]);
   $('#barfilterfooterModal').html(contenido[2]);
   $('#results_textModal').html(contenido[3]+" Resultados");  
   
   
	switch(s)
{
 case 25:
 $("#page_size_25-panel2").addClass("page_size_25-selected");
  break;
 
 case 50:
 $("#page_size_50-panel2").addClass("page_size_50-selected");
 break;
 
 case 100:
 $("#page_size_100-panel2").addClass("page_size_100-selected");
  break;
 
 case 200:
 $("#page_size_200-panel2").addClass("page_size_200-selected");
  break;

 
 
}
	 
      $('div.tableModal').unblock();	  
 // $.unblockUI();
               } 
   
           });
	
  }
  

function AgregarObjetivo(){
	
	 var numobjesp = array_objespecificos.length; //obtenemos el numero 
	
	 array_objespecificos.push("1");
	
	 var clon = $("#P1").clone(false).insertAfter("#P"+numobjesp);
	    clon.attr('id','P'+parseInt(numobjesp+1));
	
	 clon.find('#LABEL-P1').html(parseInt(numobjesp+1));
	 clon.find('#LABEL-P1').attr('id','LABEL-P'+parseInt(numobjesp+1));
	 clon.find('#P1-S1').val("");
	 clon.find('#P1-S1').attr('id','P'+parseInt(numobjesp+1)+'-S'+parseInt(numobjesp+1));
	
	 
	 $('#BEP').removeAttr("disabled");	   
}



function EliminarObjetivo(){
	
	var numobjesp = array_objespecificos.length;


	if(numobjesp==2){
	 	$('#BEP').attr('disabled','disabled');
	 }
	 
	 $("#P"+numobjesp).remove(); 
	 array_objespecificos.pop();
	 
}

function AgregarDistribucion(){
	
	 var numdistribucion = distribucion.length; 
	
	 distribucion.push("1");
	
	 var clon = $("#D1").clone(false).insertAfter("#D"+numdistribucion);
	    clon.attr('id','D'+parseInt(numdistribucion+1));
		
	
	 clon.find('#LABEL-D1').html(parseInt(numdistribucion+1));
	 clon.find('#LABEL-D1').attr('id','LABEL-D'+parseInt(numdistribucion+1));
	  clon.find('#D1-C1').val("");
	 clon.find('#D1-C1').attr('id','D'+parseInt(numdistribucion+1)+'-C'+parseInt(numdistribucion+1));
	 clon.find('#D1-M1').val("");
	 clon.find('#D1-M1').attr('id','D'+parseInt(numdistribucion+1)+'-M'+parseInt(numdistribucion+1));
	 
	 
	 $('#BED').removeAttr("disabled");	   
}



function EliminarDistribucion(){
	
	var numdistribucion = distribucion.length;


	if(numdistribucion==2){
	 	$('#BED').attr('disabled','disabled');
	 }
	 
	 $("#D"+numdistribucion).remove(); 
	 distribucion.pop();
	 
}

function validarFormulario(){
	
	var valido = true;	
	
	if($('#nomProyecto').val()=="")
	{
		 valido = false;
		 nomBan = "Nombre del Proyecto";
		 tab =  "Resumen Ejecutivo";
		 
	} 
	
	
	/*if($('#totalInv').val()=="")
	{
		 valido = false;
		 nomBan = "Total de Inversión";
		 tab =  "Resumen Ejecutivo";
		 
	}    
	
	//Identificacion del Proyecto
	cont = 1;
	for(i=0;i<array_objespecificos.length;i++){
       
	  if($('#P'+cont+'-S'+cont).val()==""){
	  	
		 valido = false;
	     nomBan = "Objetivos Específicos";
		 tab =  "Identificación del Proyecto";
		 break;
	  
	  }
	  cont++;
	}
	 
	
	if($('#planInversion').val()=="")
	{
		 valido = false;
		 nomBan = "Plan de Inversión";
		 tab =  "Análisis Financiero";
		 
	}  
	
	
	
	//Análisis Financiero
	var ban=0;
	cont = 1;
	for(i=0;i<distribucion.length;i++){
       
	  if($('#D'+cont+'-C'+cont).val()==""){
	  ban=1;	
	  valido = false;
	  break;
	  }
	  if($('#D'+cont+'-M'+cont).val()==""){
	  ban=1;
	  valido = false;
	   break;
	  
	  }
	  	  	   
	  cont++;
	}
	if(ban==1){
		
		 nomBan = "Distribución de Inversión";
		 tab =  "Análisis Financiero";
		
		
	}
	
	
	
	
	if($('#evalFinanciera').val()=="")
	{
		 valido = false;
		 nomBan = "Evaluación Financiera";
		 tab =  "Análisis Financiero";
		 
	} */
	
	return valido;
	
}



function GuardarProyecto(){
	
  	
	if(validarFormulario()){
		
		 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 }); 
				 
				 
	//Resumen Ejecutivo
    var idProyecto = $('#idProyecto').val();
	var nomProyecto = $('#nomProyecto').val();
	var folio = $('#folio').val();
	var descripcion = $('#descripcion').val();
	var contPE = $('input[name=contPE]:checked').val();
	var estaEnPO = $('input[name=estaEnPO]:checked').val();
	var estaPpto = $('input[name=estaPpto]:checked').val();		
	var totalInv = $('#totalInv').val();
	
	var fIIM="";
	var ftesInvInt_array;
	
	 if($('#interna').is(':checked')){		 
		 
	  	   fIIM = $('#ftesInvIntMonto').val();	
		  var count=1;	
		  ftesInvInt_array = new Array(5);		   
		  for(i=0;i<5;i++){	
	   	     if($('#CHK-I'+count).is(':checked')){
			   ftesInvInt_array[i] = 1;		       
	           }
		     else{
		 	     ftesInvInt_array[i] = 0;		         	
		        }
				 count++;
	       }		 
	 
	 }	
	
	var fIEM="";
	var ftesInvExt_array;
	 if($('#externa').is(':checked')){
	 	
			 fIEM = $('#ftesInvExtMonto').val();	
			count=1;
		    ftesInvExt_array = new Array(4);
			for(i=0;i<4;i++){	
	          if($('#CHK-E'+count).is(':checked')){
		          ftesInvExt_array[i] = 1;		 
	           }else{
		           ftesInvExt_array[i] = 0;		  
		        }
		               count++;	  
	        }	
	}
	
	
	var tEjecucion = $('#tEjecucion').val();
	var jerarquia = $('#jerarquia').val();
	
	//var estado =  $('input[name=estado]').val();

	//Identificacion del Proyecto
	var antecedentes = $('#antecedentes').val();
	var iMI = $('#iMI').val();
	var idPlanE = $('#idPlanE').val();
	var idPlanO = $('#idPlanO').val();
	var idLineaE = $('#idLineaE').val();
	
	if(idLineaE==null||(idLineaE.trim() == "NO EXISTEN RESULTADOS")){
		idLineaE = "";		
	}
	var idObjE = $('#idObjE').val();
	if(idObjE==null||(idObjE.trim() == "NO EXISTEN RESULTADOS")){
		idObjE = "";		
	}
	var idResultado = $('#idResultado').val();
	if(idResultado==null||(idResultado.trim() == "NO EXISTEN RESULTADOS")){
		idResultado = "";		
	}	
	
	var contLineaObj = $('#contLineaObj').val();
	//var estaPresAnual = $('input[name=estaPresAnual]:checked').val();
	//var mtoPres = $('#mtoPres').val();
	//var partida = $('#partida').val();	
	//var iPA = $('#iPA').val();
	var pNEstatutos = $('#pNEstatutos').val();
	var objGral = $('#objGral').val();
	
	var seguimiento = "";
	var checa = false;
	cont = 1;
	for(i=0;i<array_objespecificos.length;i++){   
	   
	   if($('#P'+cont+'-S'+cont).val()!=""){
	    seguimiento += $('#P'+cont+'-S'+cont).val();		  	   
	    seguimiento += "|";
	    cont++;
	   }
	   else{
	   	 checa = true;
		 break;
	   }   
	  
	}	
	
	if(checa){
		seguimiento = "";
	}
	
	//alert(seguimiento);
	//alert(array_objespecificos);
	
	
	//return false;
	
	
	var dCProyecto = $('#dCProyecto').val();
	var participantes = $('#participantes').val();
	
	//Análisis de Mercado	
	var proveedores = $('#proveedores').val();
	var oferta = $('#oferta').val();
	var demanda = $('#demanda').val();
	var balOfertaDeman = $('#balOfertaDeman').val();
	var sPrecios = $('#sPrecios').val();
	var canalDist = $('#canalDist').val();
	var promocion = $('#promocion').val();
	var ftesInf = $('#ftesInf').val();
	
	// Aspectos Técnicos
	var localizacion = $('#localizacion').val();
	var dispRecursos = $('#dispRecursos').val();
	
	//Aspectos Legales	
	var consLegales = $('#consLegales').val();
	var consJuridicas = $('#consJuridicas').val();
	var consPatrimoniales = $('#consPatrimoniales').val();	
	
	//Análisis Financiero
	//var planInversion = $('#planInversion').val();
	var descInterna = $('#descInterna').val();
	var descExterna = $('#descExterna').val();
	
	var seguimiento2 = "";
	cont = 1;
	checa2=false;
	for(i=0;i<distribucion.length;i++){
       
	   
	   if($('#D'+cont+'-C'+cont).val()!=""/*&&$('#D'+cont+'-M'+cont).val()!=""*/){
	   seguimiento2 += $('#D'+cont+'-C'+cont).val();
	   seguimiento2 += "^"+$('#D'+cont+'-M'+cont).val();
	   seguimiento2 += "|";
	   cont++;
	   }
	   else{
	   	 checa2 = true;
		 break;
	   } 		   
	 
	}
	if(checa2){
		seguimiento2 = "";
	}
	 //alert(seguimiento2);
	// return false;	
	//var evalFinanciera = $('#evalFinanciera').val();	
	var dinVPN = $('input[name=dinVPN]').val();
	var vPN = $('input[name=vPN]').val();
	var porcTIR = $('input[name=porcTIR]').val();
	var tIR = $('input[name=tIR]').val();
	//alert(vPN);
	var rBC = $('input[name=rBC]').val();
	var dinPtoEqui = $('input[name=dinPtoEqui]').val();
	var ptoEqui = $('input[name=ptoEqui]').val();
	var porcROI = $('input[name=porcROI]').val();
	var rOI = $('input[name=rOI]').val();
	
	
	//programa(grafica de gantt)	
	
	//Equipo Directivo
	var eResponsable = $('#eResponsable').val();	
	//Conclusiones
	var conclusiones = $('#conclusiones').val();	 
	var consideraciones = $('#consideraciones').val();			 
			 
		
	$.ajax({ 
	 
	 	
    type: "POST",  
    url: "index.php?execute=proyectos/editproyecto&method=GuardarProyecto&Menu=F1&SubMenu=SF11",  
    data: { idProyecto: idProyecto, nomProyecto: nomProyecto, folio: folio, descripcion : descripcion, contPE: contPE, estaEnPO: estaEnPO, estaPpto: estaPpto, totalInv: totalInv, jerarquia: jerarquia, fIIM: fIIM, antecedentes: antecedentes, ftesInvInt_array: ftesInvInt_array, fIEM: fIEM, ftesInvExt_array: ftesInvExt_array, tEjecucion: tEjecucion, iMI: iMI, idPlanE: idPlanE, idPlanO: idPlanO, idLineaE: idLineaE, idObjE: idObjE, idResultado: idResultado, contLineaObj: contLineaObj, pNEstatutos: pNEstatutos, objGral: objGral, seguimiento: seguimiento, dCProyecto: dCProyecto, participantes: participantes, proveedores: proveedores, oferta: oferta, demanda: demanda, balOfertaDeman: balOfertaDeman, sPrecios: sPrecios, canalDist: canalDist, promocion: promocion, ftesInf: ftesInf, localizacion: localizacion, dispRecursos: dispRecursos, consLegales: consLegales, consJuridicas: consJuridicas, consPatrimoniales: consPatrimoniales, descInterna: descInterna, descExterna: descExterna, seguimiento2: seguimiento2, dinVPN: dinVPN, vPN: vPN, rBC: rBC, porcTIR: porcTIR, tIR: tIR, dinPtoEqui: dinPtoEqui, ptoEqui: ptoEqui, porcROI: porcROI, rOI: rOI, eResponsable: eResponsable, conclusiones: conclusiones, consideraciones: consideraciones},  
    success: function(msg){  
	
            //   alert(msg);                       
	/*setTimeout("window.location.href ='?execute=proyectos/addproyecto&method=default&Menu=F1&SubMenu=SF11&alert=1'",100);*/
	  $.unblockUI();
	    
	 if(msg.trim()==""){
	 
			 	
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el proyecto"); 
				
				
      
	/* setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF11&alert=1#&p=1&s=25&sort=1&q='",1000);*/
               }else{
			   	
						// alert(msg);	
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("<font size=\"3\">¡Ups! ha ocurrido un Error</font>");
				$("#bodyAlerta").html("<strong>No te alarmes</strong>!! al parecer no se guardo la propuesta del Proyecto correctamente, por favor intentalo guardar nuevamente."); 
	 
				
				 }  
	  
               } //fin  success: function de  $.ajax
   
           });//fin $.ajax 

     }
	 //fin validarFormulario()
	 else{
	 	
		$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debes de ingresar todos los campos obligatorios.  \nIngresar: "+nomBan+"     en el Tab: "+tab+". ¡Gracias!" );
	 	
	 }
}

function Toogle(id){
	
		var local = id.split("-");
		if($('#BOX-'+local[1]+"-"+local[2]).is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i>');
		else $('#'+id).html('<i class="icon-chevron-up"></i>');
		
		$('#BOX-'+local[1]+"-"+local[2]).toggle();
	}
	
//Validar Input para solo ingresar números	
	/*function soloNumeros(event){
    // 8 -&gt; borrado
    // 9 -&gt; tabulador
    // 37-40 -&gt; flechas
    // 188 -&gt; .
    // 190 -&gt; ,    
   if ( event.keyCode == 8 || event.keyCode == 9 || (event.keyCode &gt;= 37 &amp;&amp; event.keyCode &lt;= 40)
            || event.keyCode == 188 || event.keyCode == 190 ) {
        // permitimos determinadas teclas, no hacemos nada
    } else {
        // Nos aseguramos que sea un numero, sino evitamos la accion
       if ((event.keyCode &lt; 48 || event.keyCode &gt; 57) &amp;&amp; (event.keyCode &lt; 96 || event.keyCode &gt; 105 ))        {
            event.preventDefault();
        }   
    }
} */

	
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
	
	//seccion 10 Anexos(Adjuntar archivos)
	function uploadEditFiles(num, editar,id, titulo, descripcionModal, idproyecto){
		
		 
		
		 if(!editar){
		
		 $('#myModalupload'+num).modal('show');
		 $('#editar'+num).val('FALSE');
		 $('#titulo'+num).val("");
		 $('#descripcionModal'+num).val("");
		 
		  var idproyect = $('#idProyecto').val();
		 $('#idProyecto'+num).val(idproyect);
		  	
		 }
		
		 else{
		 	
		 $('#myModalupload'+num).modal('show');
		 $('#idArchivo'+num).val(id);
		 $('#editar'+num).val('TRUE');
		 $('#titulo'+num).val(titulo);
		 $('#descripcionModal'+num).val(descripcionModal);
		 $('#idProyecto'+num).val(idproyecto);
		 	
		 }
		
		 
		
		
}

//funcion para Validar Input text para solo ingresar números con punto decimal
function esNumerico(pulsada,permitidos){
   /* if($.inArray(pulsada,permitidos)){
        return true;
    }*/
	
	for(i=0;i<permitidos.length;i++){
		if(pulsada == permitidos[i]){
			
	 	return true;
	 }
		
	}
	 
	
    if(pulsada >= 48 && pulsada <= 57){
        return true;
    }
    if(pulsada >= 96 && pulsada <= 105){
        return true;
    }
    return false;
}

 /*function validarLetras(tecla) { // 1
    
    if (tecla==8) return true; // backspace
    if (tecla==32) return true; // espacio
    if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
    if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
    if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
    patron = /[a-zA-Z]/; //patron
 
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba de patron
  } */
function validarFormularioEnviar(){
	
	 valido = true;
	
	if($('#nomProyecto').val()=="")
	{
		 valido = false;
		 nomBan = "Nombre del Proyecto";
		 tab =  "Resumen Ejecutivo";
		 
	} 
	
	
	if($('#folio').val()=="")
	{
		 valido = false;
		// nomBan = "Total de Inversión";
		 //tab =  "Resumen Ejecutivo";
		 
	}    
	
	if($('#totalInv').val()=="")
	{
		 valido = false;
		 nomBan = "Total de Inversión";
		 tab =  "Resumen Ejecutivo";
		 
	}  
	if($('#tEjecucion').val()=="")
	{
		 valido = false;
		// nomBan = "Total de Inversión";
		 //tab =  "Resumen Ejecutivo";
		 
	}    
	return valido;
	
}
function Enviar(confirm){
		
	 	
	if(validarFormularioEnviar()){
		
	 if(!confirm){
	 //	alert('entro');
	 $('#titlemodal1').html('Enviar Proyecto');
	 $('#bodymodal1').html('Asegurese de haber guardado el proyecto antes de enviarlo');
	  $("#aceptarmodal1").attr("onClick", "javascript:Enviar(true);return false;");
	 
     $('#myModal').modal('show');
	 }else{		
		
	 $('#myModal').modal('hide');	
	 
	 
	  $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 }); 	
		
	var idProyecto = $('#idProyecto').val();
	var estado = $('#estado').val();
	
	
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=proyectos/editproyecto&method=Enviar&idProyecto="+idProyecto+'&estado='+estado,  
    success: function(msg){ 
    
    
	
	 $.unblockUI();
	
	setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF11&alert=1#&p=1&s=25&sort=1&q=&alert=3'",1000);
	
	}
	
	 });	
		
		
		
	}	
} else{
	 	
		$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debes de ingresar todos los campos obligatorios. ¡Gracias!" );
	 	
	 }
	
	

}



function actualizarGannt (){
		
   var fechastart = document.getElementById('finicio').value;
 
   var fechaend = document.getElementById('ftermino').value;
  	 
   var idProyecto = gup('IDProyecto');
   
    $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 }); 
   
	 
	 $.ajax({
	
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=updateGantt",  
    data: { idProyecto:idProyecto,fechastart:fechastart,fechaend:fechaend},  
    success: function(msg){  


      location.hash = "&view=gantt";
      location.reload();

     } 
   
     });
	
}



function addetapa(){
	
	
	etapa = $('#idetapa').val();
	idProyecto = gup('IDProyecto');
	

	
	$.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=agregarEtapa&idProyecto="+idProyecto,  
    data: { etapa: etapa, idProyecto: idProyecto},  
    success: function(msg){  
	     
		 id = msg.trim();
	
	
	    $('#idetapa').val("");
	    $.growlUI('Etapa Agregada', 'Si lo desea puede agregar más'); 
		
		
		
	 divetapa = '<div class="ganttview-vtheader-item" id="etapa'+id+'"><div class="ganttview-vtheader-item-name" id="E'+id+'" style="height: 31px;"><img src="libs/gantt/img/delete.gif" width="16" height="16" class="icongantt"  onClick="removeEtapa('+id+');" style="cursor:pointer; display:none;"/>&nbsp;<img src="libs/gantt/img/pencil.png" width="16" height="16" class="icongantt"  onClick="editEtapa('+id+',\''+etapa+'\');" style="cursor:pointer; display:none;"/><span>'+etapa+'</span></div><div class="ganttview-vtheader-series" id="etapaseries'+id+'"></div></div>';
	
	
	
	block = '<div id="block'+id+'" style="min-height: 31px;"></div>';
	

	$('div.ganttview-vtheader').append(divetapa);
	$('div.ganttview-blocks').append(block);
	

     } 
   
     });
	
	
}

 var DateDiff = {
 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
		var ONE_DAY = 1000 * 60 * 60 * 24;
		var difference_ms = Math.abs(t1 - t2);
 
       return Math.round(difference_ms/ONE_DAY);
       // return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000*7));
    },
 
    inMonths: function(d1, d2) {
		
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();
		
	
 
        return Math.round((d2M+12*d2Y)-(d1M+12*d1Y));
    },
 
    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }


}	



function addPaso(){
	
	
	etapa = $('#cboetapas').val();
	idProyecto = gup('IDProyecto');
	paso = $('#paso').val();
	

	finicio = $('#datetapai1').val();
	ftermino = $('#datetapaf1').val();
	
	var color = getRandomColor();
	
	var fechastart = $('#finicio').val();
    var fec = fechastart.split('-');
   dias = fec[2];
   mess = fec[1]-1;
   anos = fec[0];
			 
	
   var fec = finicio.split('-');
   diai = fec[2];
   mesi = fec[1]-1;
   anoi = fec[0];
 
 
   var etapadateinicial = anoi+"-"+fec[1]+"-"+diai;
	

   var fec2 = ftermino.split('-');
   diaf = fec2[2];
   mesf = fec2[1]-1;
   anof = fec2[0];
   
   
   var etapadatefinal = anof+"-"+fec2[1]+"-"+diaf;


   var ds = new Date(anos,mess,dias);
   var d1 = new Date(anoi,mesi,diai);
   var d2 =new Date(anof,mesf,diaf);
	
	
	
	
	var size =  DateDiff.inDays(d1, d2) + 1;
	var offset = DateDiff.inDays(ds, d1);
			
			
	descestapa = 'Duracion:'+size+' dias';
	

	
	$.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=agregarPaso&idProyecto="+idProyecto,  
    data: { paso: paso, etapa:etapa, idProyecto: idProyecto,finicio:finicio,ftermino:ftermino,color:color},  
    success: function(msg){  
	
	   id = msg.trim();
	
	  $('#paso').val("");
	
	  $.growlUI('Paso Agregado', 'Si lo desea puede agregar más pasos en la etapa'); 
	    
		
		divpaso ='<div class="ganttview-vtheader-series-name"><img src="libs/gantt/img/delete.gif" width="16" height="16" class="icongantt"  onClick="removeEtapa('+id+');" style="cursor:pointer; display:none;"/>&nbsp;<img src="libs/gantt/img/pencil.png" width="16" height="16" class="icongantt"  onClick="editEtapa('+id+',\''+etapa+'\');" style="cursor:pointer; display:none;"/>'+paso+'</div>';
	
		block = '<div class="ganttview-block-container" ><div class="ganttview-block ui-resizable ui-draggable" title="Tiempo, '+size+' días" style="width: '+((size * 21) - 9)+'px; margin-left: '+((offset * 21) + 3)+'px; background-color: '+color+'"><div class="ganttview-block-text">'+descestapa+'</div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 1000;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 1000;"></div></div></div>';
		
		$('#etapaseries'+etapa).append(divpaso);
		
		$('#block'+etapa).append(block);
		
		
		//$('#block'+etapa).append(divpaso);
		
		
		
	  
     } 
   
     });
	
	
}

function editEtapa(id,etapa){
	
	document.getElementById('id').value = id;
	document.getElementById('idetapae').value = etapa;
	
    $('#dialogEtapasEditar').modal('show');
	
}


function editPaso(id,etapa,dinicial,dfinal){

var date = new Date(dinicial);
dinicial = date.getFullYear()+ '-' +(date.getMonth() + 1) + '-' + date.getDate();

var date = new Date(dfinal);
dfinal = date.getFullYear()+ '-' +(date.getMonth() + 1) + '-' + date.getDate();


document.getElementById('idpaso').value = id;	
document.getElementById('pasoe').value = etapa;
document.getElementById('datetapai1e').value = dinicial;
document.getElementById('datetapaf1e').value = dfinal;

$('#dialogPasosEditar').modal('show');


}


     function updateetapa(){
	
     var idetapa = $("#id").val();
	 var etapa = $("#idetapae").val();
	 
	 var idProyecto = gup('IDProyecto');
	 
	 
	 $('#dialogEtapasEditar').modal('hide');
	 
	 $.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=updateEtapa&idProyecto="+idProyecto,  
    data: {idetapa:idetapa,etapa:etapa, idProyecto: idProyecto},  
    success: function(msg){  


      
	  $('#E'+idetapa).find("span").html(etapa);


    $.growlUI('Etapa Actualizada', 'Se ha actualizado la etapa'); 
	    
		
	  
     } 
   
     });
	
	
	 }
	 
	 

    function removeEtapa(id){
	
	var idProyecto = gup('IDProyecto');
	var idetapa = id;
	
    var eliminar = confirm("Desea eliminar la etapa, se eliminaran los pasos de la etapa?");
	
	if(eliminar){
		
	$.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=eliminarEtapa&idProyecto="+idProyecto,  
    data: {idetapa:idetapa, idProyecto: idProyecto},  
    success: function(msg){  

	var myarr = msg.split(",");
		
	for (var i=0;i<myarr.length;i++)
    {
	  $('#P'+myarr[i]).remove();
	  $('#G'+myarr[i]).remove();
	 	
	}
	
	 $('#E'+id).remove();
	
	$.growlUI('Etapa Eliminada', 'Se ha eliminado la etapa y los pasos'); 
	    
		
	  
     } 
   
     });
		
		
		
	}
	
	
    }

     
	 function updatepaso(){
	 	
		var idpaso = $("#idpaso").val();
	    var paso = $("#pasoe").val();
	    var idProyecto = gup('IDProyecto');
	 
  		
		var finicio = $('#datetapai1e').val();
	    var ftermino = $('#datetapaf1e').val();
	
	    var color = getRandomColor();
	
	var fechastart = $('#finicio').val();
    var fec = fechastart.split('-');
   dias = fec[2];
   mess = fec[1]-1;
   anos = fec[0];
			 
	
   var fec = finicio.split('-');
   diai = fec[2];
   mesi = fec[1]-1;
   anoi = fec[0];
 
 
   var etapadateinicial = anoi+"-"+fec[1]+"-"+diai;
	

   var fec2 = ftermino.split('-');
   diaf = fec2[2];
   mesf = fec2[1]-1;
   anof = fec2[0];
   
   
   var etapadatefinal = anof+"-"+fec2[1]+"-"+diaf;


   var ds = new Date(anos,mess,dias);
   var d1 = new Date(anoi,mesi,diai);
   var d2 =new Date(anof,mesf,diaf);
	
	
	
	
	var size =  DateDiff.inDays(d1, d2) + 1;
	var offset = DateDiff.inDays(ds, d1);
			
			
	var descestapa = 'Duracion:'+size+' dias';
		   
		   	 
	    $('#dialogPasosEditar').modal('hide');
	 
	  $.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=updatePaso&idProyecto="+idProyecto,  
    data: {idpaso:idpaso,paso:paso, idProyecto: idProyecto,finicio:finicio,ftermino:ftermino},  
    success: function(msg){  
      
	  $('#P'+idpaso).find("span").html(paso);
	  	  
	  var barra = '<div class="ganttview-block ui-resizable ui-draggable" title="Tiempo, '+size+' días" style="width: '+((size * 21) - 9)+'px; margin-left: '+((offset * 21) + 3)+'px; background-color: '+color+'"><div class="ganttview-block-text">'+descestapa+'</div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 1000;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 1000;"></div></div>';
	  
	  $('#G'+idpaso).html(barra);

      $.growlUI('Paso Actualizado', 'Se ha actualizado el paso'); 
	    
	  
     } 
   
     });
	
     
	 
	 }
	 
	 
	 
	 
	 function updatepasofecha(id,dinicio,dfinal){
	 	
		
	  $.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=updatePasoDate&idProyecto="+idProyecto,  
    data: {id:id,dinicio:dinicio,dfinal:dfinal},  
    success: function(msg){  
      
      $.growlUI('Paso Actualizado', 'Se ha actualizado el paso'); 
	    
     } 
   
     });
	
     
	 
	 }
	 
	


function removePaso(id){

	var idProyecto = gup('IDProyecto');
	var idpaso = id;
	
    var eliminar = confirm("¿Desea eliminar el paso?");
	
	if(eliminar){
		
	$.ajax({ 	 
    type: "POST",  
    url: "?execute=proyectos/editproyecto&method=eliminarPaso&idProyecto="+idProyecto,  
    data: {idpaso:idpaso, idProyecto: idProyecto},  
    success: function(msg){  
	
	  $.growlUI('Paso Eliminado', 'Se ha eliminado el paso'); 
	  $('#P'+id).remove();
	  $('#G'+id).remove();
     } 
   
     });
		
		
		
	}
		
}




function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.round(Math.random() * 15)];
    }
    return color;
}

